@extends('layouts.app')
@section('title', 'Point of Sale')
@section('content')
<div class="max-w-2xl mx-auto mt-8 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Point of Sale (POS)</h1>
    <p class="mb-4 text-green-700 font-semibold">Selamat! Domain toko Anda telah selesai. Anda siap menggunakan POS untuk transaksi offline.</p>
    <a id="back-to-dashboard" href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Back to Dashboard</a>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Jika kembali ke dashboard, set flag di localStorage
    const backBtn = document.getElementById('back-to-dashboard');
    if (backBtn) {
        backBtn.addEventListener('click', function(e) {
            localStorage.setItem('showDashboardReadyModal', '1');
        });
    }
});
</script>
@endsection


