<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Services\WhatsAppService;

class PickupController extends Controller
{
    /**
     * Store a new pickup request.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'required|string',
            'pincode' => 'required|string|max:10',
            'service' => 'required',
            'pickup_time' => 'nullable|string',
            'special_instructions' => 'nullable|string',
        ]);

        // Process services (can be array or string)
        $serviceType = '';
        if (is_array($validated['service'])) {
            $serviceType = implode(', ', $validated['service']);
        } else {
            $serviceType = $validated['service'];
        }

        // Generate Order ID
        $latest = Order::latest('id')->first();
        $nextNum = $latest ? ($latest->id + 10001) : 10001;
        $orderId = 'LS-' . $nextNum;

        // Parse pickup date/time
        $pickupDate = null;
        if (!empty($validated['pickup_time'])) {
            try {
                $pickupDate = \Carbon\Carbon::parse($validated['pickup_time']);
            } catch (\Exception $e) {
                // Ignore parsing errors
            }
        }

        // Create Order
        $order = Order::create([
            'order_id' => $orderId,
            'customer_name' => $validated['name'],
            'customer_phone' => $validated['phone'],
            'customer_email' => $validated['email'] ?? null,
            'customer_address' => $validated['address'],
            'customer_pincode' => $validated['pincode'],
            'service_type' => $serviceType,
            'user_id' => auth('customer')->check() ? auth('customer')->id() : null,
            'status' => 'New',
            'pickup_date' => $pickupDate,
            'special_instructions' => $validated['special_instructions'] ?? null,
            'payment_method' => 'COD',
            'payment_status' => 'Pending',
        ]);

        if (!auth('customer')->check()) {
            session(['pending_order_id' => $order->id]);
        }

        // Send WhatsApp Notification to Admin
        $adminPhone = '+919289891258'; // Admin mobile number
        $adminMessage = "🔔 *New Service Booking Request!* \n\n" .
            "*Booking ID:* {$order->order_id}\n" .
            "*Customer:* {$order->customer_name}\n" .
            "*Phone:* {$order->customer_phone}\n" .
            ($order->customer_email ? "*Email:* {$order->customer_email}\n" : "") .
            "*Address:* {$order->customer_address}, Pincode: {$order->customer_pincode}\n" .
            "*Selected Services:* {$order->service_type}\n" .
            ($order->pickup_date ? "*Requested Pickup:* " . $order->pickup_date->format('M d, Y h:i A') . "\n" : "") .
            ($order->special_instructions ? "*Special Instructions:* {$order->special_instructions}\n" : "") .
            "\nPlease log in to manage this booking: " . route('login');
        
        WhatsAppService::send($adminPhone, $adminMessage);

        // Determine redirect URL
        if (auth('customer')->check()) {
            $redirectUrl = route('customer.orders.index');
        } else {
            $email = $validated['email'] ?? null;
            $phone = $validated['phone'];
            
            $userExists = false;
            if (!empty($email)) {
                $userExists = \App\Models\User::where('email', $email)
                    ->orWhere('phone', $phone)
                    ->exists();
            } else {
                $userExists = \App\Models\User::where('phone', $phone)->exists();
            }
            
            $redirectUrl = $userExists ? route('login') : route('register');
        }

        session()->flash('success', 'Your booking request has been scheduled successfully! Booking ID: ' . $orderId);

        return response()->json([
            'status' => 'success',
            'message' => 'Your booking request has been scheduled successfully! Booking ID: ' . $orderId,
            'order_id' => $orderId,
            'id' => $order->id,
            'redirect_url' => $redirectUrl,
        ]);
    }
}
