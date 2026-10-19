@extends('layouts.customer')

@section('title', 'Booking ID: ' . $order->order_id)
@section('page_title', 'Booking Details')

@section('content')
<div class="mb-6">
    <a href="{{ route('customer.orders.index') }}" class="bg-white hover:bg-slate-50 text-slate-500 border border-slate-200 px-4 py-2.5 rounded-2xl text-xs font-bold transition-all inline-flex items-center gap-2">
        <i class="fas fa-arrow-left"></i>
        <span>Back to My Bookings</span>
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <!-- Left column: Booking Status card -->
    <div class="space-y-8 lg:col-span-1">
        
        <!-- Status card -->
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6" id="status-card">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-2">Booking Status</span>
            
            @php
                $badgeColor = match($order->status) {
                    'New' => 'bg-red-50 text-red-650 border-red-150',
                    'Confirmed' => 'bg-blue-50 text-blue-650 border-blue-150',
                    'Completed' => 'bg-emerald-50 text-emerald-650 border-emerald-150',
                    'Cancelled' => 'bg-slate-100 text-slate-650 border-slate-200',
                    default => 'bg-slate-50 text-slate-600 border-slate-100'
                };
            @endphp
            <div class="inline-flex items-center px-4 py-2 border rounded-full font-black text-xs uppercase tracking-wider {{ $badgeColor }}">
                {{ $order->status }}
            </div>
            
            <p class="text-[11px] text-slate-400 font-semibold mt-3">Updated: {{ $order->updated_at->format('M d, Y h:i A') }}</p>
        </div>

    </div>

    <!-- Right columns: Details summary -->
    <div class="lg:col-span-2 space-y-8">
        
        <!-- Booking schedule & Details -->
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 md:p-8">
            <div class="border-b border-slate-100 pb-5 mb-5">
                <span class="text-[10px] bg-slate-100 text-slate-500 font-bold px-2.5 py-1 rounded border border-slate-200">BOOKING ID: #{{ $order->order_id }}</span>
                <h3 class="text-xl font-black text-slate-800 mt-2">Garment Booking Summary</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xs font-semibold text-slate-500">
                <div class="space-y-3">
                    <h5 class="text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1">Schedule Details</h5>
                    <p class="flex justify-between">
                        <span>Services Booked:</span>
                        <strong class="text-slate-800 text-right">{{ $order->service_type }}</strong>
                    </p>
                    <p class="flex justify-between">
                        <span>Placed Date:</span>
                        <strong class="text-slate-800">{{ $order->created_at->format('M d, Y h:i A') }}</strong>
                    </p>
                    <p class="flex justify-between">
                        <span>Requested Pickup Time:</span>
                        <strong class="text-slate-800">{{ $order->pickup_date ? $order->pickup_date->format('M d, Y h:i A') : 'Not Scheduled' }}</strong>
                    </p>
                    @if($order->delivery_date && $order->status === 'Completed')
                    <p class="flex justify-between">
                        <span>Completed Date:</span>
                        <strong class="text-slate-800">{{ $order->delivery_date->format('M d, Y h:i A') }}</strong>
                    </p>
                    @endif
                </div>

                <div class="space-y-3">
                    <h5 class="text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1">Customer Details</h5>
                    <p class="flex items-start justify-between gap-4">
                        <span>Name:</span>
                        <strong class="text-slate-800 text-right">{{ $order->customer_name }}</strong>
                    </p>
                    <p class="flex items-start justify-between gap-4">
                        <span>Address:</span>
                        <strong class="text-slate-800 text-right leading-relaxed">{{ $order->customer_address }}</strong>
                    </p>
                    <p class="flex justify-between">
                        <span>Pincode:</span>
                        <strong class="text-slate-800">{{ $order->customer_pincode }}</strong>
                    </p>
                </div>
            </div>
            
            @if(!empty($order->special_instructions))
            <div class="mt-6 p-4 bg-slate-50 border border-slate-100 rounded-2xl text-xs font-semibold text-slate-500">
                <i class="fas fa-quote-left text-slate-350 text-base block mb-2"></i>
                <p class="leading-relaxed">{{ $order->special_instructions }}</p>
            </div>
            @endif
        </div>

    </div>

</div>
@endsection
