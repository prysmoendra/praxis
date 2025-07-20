<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Store;

class DashboardController extends Controller
{


    /**
     * Show the dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateStore(Request $request)
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        $store = \App\Models\Store::where('user_id', $user->id)->first();

        // Jika pengguna mencoba mengirim 'domain' dan domain sudah ada, abaikan
        if ($request->has('domain') && $store && !empty($store->domain)) {
            // Abaikan input domain baru atau kembalikan error
            $request->request->remove('domain');
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'domain' => 'sometimes|required|string|max:255|unique:stores,domain,' . ($store->id ?? 'NULL') . ',id',
        ]);

        // Update store
        if ($store) {
            $store->update($validated);
        } else {
            // Create new store if doesn't exist
            $store = \App\Models\Store::create([
                'user_id' => $user->id,
                'name' => $validated['name'] ?? $user->name . "'s Store",
                'domain' => $validated['domain'] ?? null,
                'description' => 'Welcome to our store',
                'status' => 'active',
                'is_locked' => true,
            ]);
        }

        // Cek jika domain BARU SAJA diatur di request ini
        if ($request->has('domain') && !empty($store->domain)) {
            $domain = $store->domain;
            $selectedTheme = $store->selected_theme ?? 'horizon'; // Gunakan 'horizon' sebagai default jika belum ada

            // 1. Buat path direktori. Gunakan subfolder 'storefronts' agar rapi.
            $directoryPath = resource_path('views/storefronts/' . $domain);

            // 2. Buat direktorinya jika belum ada
            if (!File::isDirectory($directoryPath)) {
                File::makeDirectory($directoryPath, 0755, true);
            }

            // 3. Siapkan konten untuk file index.blade.php
            // Menggunakan @extends lebih baik daripada menyalin seluruh kode tema
            $bladeContent = "@extends('themes.' . '{$selectedTheme}')";

            // 4. Tulis konten ke dalam file
            File::put($directoryPath . '/index.blade.php', $bladeContent);
        }

        return back()->with('success', 'Store updated successfully!');
    }

    public function index()
    {
        $user = Auth::user();
        $onboardingStatus = $user->onboarding_status ?? [];

        // Definisikan semua tugas onboarding
        $allTasks = ['has_added_product', 'designed_store', 'set_store_name', 'set_store_domain'];
        $totalTasks = count($allTasks);

        // Hitung tugas yang selesai
        $completedTasks = collect($allTasks)->filter(function ($task) use ($onboardingStatus) {
            return !empty($onboardingStatus[$task]);
        })->count();

        return view('dashboard.dashboard', [
            'user' => $user,
            'onboardingStatus' => $onboardingStatus,
            'totalTasks' => $totalTasks,
            'completedTasks' => $completedTasks,
        ]);
    }

    public function unlockStore(Request $request)
    {
        $user = Auth::user();
        $store = \App\Models\Store::where('user_id', $user->id)->first();
        if ($store) {
            $store->is_locked = false;
            $store->save();
        }
        return back()->with('success', 'Store unlocked!');
    }

    public function pos()
    {
        return view('dashboard.pos.index');
    }
}
