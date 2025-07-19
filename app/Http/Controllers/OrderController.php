<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of orders for the authenticated seller.
     */
    public function index()
    {
        $orders = Order::where('user_store_id', Auth::user()->id)
                      ->with(['items.productVariant.product'])
                      ->orderBy('created_at', 'desc')
                      ->paginate(10);

        return view('dashboard.orders.index', compact('orders'));
    }

    /**
     * Display the specified order.
     */
    public function show($id)
    {
        $order = Order::where('user_store_id', Auth::user()->id)
                     ->with(['items.productVariant.product'])
                     ->findOrFail($id);

        return view('dashboard.orders.show', compact('order'));
    }

    /**
     * Update the order status.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,shipped,cancelled'
        ]);

        $order = Order::where('user_store_id', Auth::user()->id)->findOrFail($id);
        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Order status updated successfully!');
    }

    /**
     * Get order statistics for dashboard.
     */
    public function getStats()
    {
        $userId = Auth::user()->id;
        
        $stats = [
            'total_orders' => Order::where('user_store_id', $userId)->count(),
            'pending_orders' => Order::where('user_store_id', $userId)->where('status', 'pending')->count(),
            'paid_orders' => Order::where('user_store_id', $userId)->where('status', 'paid')->count(),
            'shipped_orders' => Order::where('user_store_id', $userId)->where('status', 'shipped')->count(),
            'total_revenue' => Order::where('user_store_id', $userId)->where('status', '!=', 'cancelled')->sum('total_amount'),
        ];

        return response()->json($stats);
    }
}
