<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CustomerDashboardController extends Controller
{
    /**
     * Customer Dashboard Home Overview.
     */
    public function index()
    {
        $user = auth('customer')->user();
        
        $totalBookings = $user->orders()->count();
        $activeOrdersCount = $user->orders()->whereIn('status', ['New', 'Confirmed'])->count();
        $completedOrdersCount = $user->orders()->where('status', 'Completed')->count();
        
        $recentOrders = $user->orders()
            ->latest()
            ->take(5)
            ->get();

        return view('customer.dashboard', compact(
            'user',
            'totalBookings',
            'activeOrdersCount',
            'completedOrdersCount',
            'recentOrders'
        ));
    }

    /**
     * Display customer's order history.
     */
    public function orders()
    {
        $orders = auth('customer')->user()->orders()
            ->latest()
            ->paginate(10);

        return view('customer.orders.index', compact('orders'));
    }

    /**
     * Display detailed order view.
     */
    public function showOrder(Order $order)
    {
        if ($order->user_id !== auth('customer')->id()) {
            abort(403, 'Unauthorized access to this booking.');
        }

        $order->load('items');
        
        return view('customer.orders.show', compact('order'));
    }

    /**
     * Display profile editing page.
     */
    public function editProfile()
    {
        $user = auth('customer')->user();
        return view('customer.profile', compact('user'));
    }

    /**
     * Process profile update request.
     */
    public function updateProfile(Request $request)
    {
        $user = auth('customer')->user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone' => ['required', 'string', 'max:20', 'unique:users,phone,' . $user->id],
            'address' => ['nullable', 'string'],
            'pincode' => ['nullable', 'string', 'max:10'],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->pincode = $request->pincode;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Profile information updated successfully!');
    }
}
