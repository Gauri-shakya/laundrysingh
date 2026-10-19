<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Services\WhatsAppService;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    /**
     * Admin Panel Home Page Dashboard Overview.
     */
    public function index()
    {
        $totalBookings = Order::count();
        $newBookings = Order::where('status', 'New')->count();
        $confirmedBookings = Order::where('status', 'Confirmed')->count();
        $completedBookings = Order::where('status', 'Completed')->count();
        $totalCustomers = User::where('role', 'customer')->count();
            
        $recentBookings = Order::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalBookings',
            'newBookings',
            'confirmedBookings',
            'completedBookings',
            'totalCustomers',
            'recentBookings'
        ));
    }

    /**
     * Display a listing of bookings with advanced search and filtering.
     */
    public function orders(Request $request)
    {
        $query = Order::query();

        // Search by Order ID
        if ($request->filled('order_id')) {
            $query->where('order_id', 'like', '%' . $request->order_id . '%');
        }

        // Search by Customer Name
        if ($request->filled('customer_name')) {
            $query->where('customer_name', 'like', '%' . $request->customer_name . '%');
        }

        // Search by Customer Mobile/Phone
        if ($request->filled('customer_phone')) {
            $query->where('customer_phone', 'like', '%' . $request->customer_phone . '%');
        }

        // Search by Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search by Date Range
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('created_at', [
                Carbon::parse($request->start_date)->startOfDay(),
                Carbon::parse($request->end_date)->endOfDay()
            ]);
        }

        $orders = $query->latest()->paginate(15)->withQueryString();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show individual Order detail page.
     */
    public function showOrder(Order $order)
    {
        $order->load('items');
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Update order workflow status.
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string|in:New,Confirmed,Completed,Cancelled',
        ]);

        $oldStatus = $order->status;
        $order->status = $request->status;
        
        if ($request->status === 'Completed') {
            $order->delivery_date = Carbon::now();
        }
        
        $order->save();

        // If status actually changed, notify customer
        if ($oldStatus !== $request->status) {
            $custMsg = "🧺 *Booking Status Update!* \n\n" .
                "Hello {$order->customer_name},\n" .
                "The status of your laundry Booking *{$order->order_id}* is now: *{$order->status}*.\n\n" .
                "Thank you for choosing LaundrySingh!";
            WhatsAppService::send($order->customer_phone, $custMsg);
        }

        return back()->with('success', 'Booking status updated to ' . $request->status . '.');
    }

    /**
     * Display listing of registered customers.
     */
    public function customers(Request $request)
    {
        $query = User::where('role', 'customer');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('phone', 'like', '%' . $search . '%');
            });
        }

        $customers = $query->latest()->paginate(15)->withQueryString();

        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Delete a specific booking (order) from the database.
     */
    public function destroyOrder(Order $order)
    {
        $orderId = $order->order_id;
        // Delete related items first to avoid FK errors
        $order->items()->delete();
        $order->delete();

        return redirect()->route('admin.orders.index')
            ->with('success', "Booking {$orderId} has been deleted successfully.");
    }

    /**
     * Delete a customer account and nullify their related bookings.
     */
    public function destroyCustomer(User $customer)
    {
        $name = $customer->name;
        // Nullify user_id on the customer's bookings so they are retained as guest bookings
        $customer->orders()->update(['user_id' => null]);
        $customer->delete();

        return redirect()->route('admin.customers.index')
            ->with('success', "Customer account for '{$name}' has been deleted. Their bookings are retained as guest bookings.");
    }
}
