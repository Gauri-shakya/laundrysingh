@extends('layouts.admin')

@section('title', 'Booking Details: ' . $order->order_id)
@section('page_title', 'Booking Details')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.orders.index') }}" class="bg-white hover:bg-slate-50 text-brand-red border border-slate-200 px-4 py-2.5 rounded-2xl text-xs font-bold transition-all inline-flex items-center gap-2">
        <i class="fas fa-arrow-left"></i>
        <span>Back to Bookings</span>
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <!-- Left column: Booking Status & Workflow -->
    <div class="space-y-8 lg:col-span-1">
        
        <!-- Status card -->
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6" id="status-card">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-2">Booking Status</span>
            
            @php
                $badgeColor = match($order->status) {
                    'New' => 'bg-red-50 text-red-600 border-red-100',
                    'Confirmed' => 'bg-blue-50 text-blue-600 border-blue-100',
                    'Completed' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                    'Cancelled' => 'bg-slate-100 text-slate-500 border-slate-200',
                    default => 'bg-slate-50 text-slate-600 border-slate-100'
                };
            @endphp
            <div class="inline-flex items-center px-4 py-2 border rounded-full font-black text-xs uppercase tracking-wider mb-6 {{ $badgeColor }}">
                {{ $order->status }}
            </div>

            <!-- Update status form -->
            <form action="{{ route('admin.orders.status', $order->id) }}" method="POST" class="space-y-4 pt-4 border-t border-slate-100">
                @csrf
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-2">Update Booking State</label>
                    <select name="status" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs text-slate-700 font-semibold focus:outline-none focus:border-brand-red focus:ring-1 focus:ring-brand-red cursor-pointer">
                        @foreach(['New', 'Confirmed', 'Completed', 'Cancelled'] as $status)
                            <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="w-full bg-brand-red hover:bg-brand-darkRed text-white font-bold py-3.5 px-4 rounded-xl text-xs uppercase tracking-wider transition-all flex items-center justify-center gap-1.5 shadow-md shadow-brand-red/20">
                    <i class="fas fa-check-circle"></i>
                    <span>Update Status</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Right columns: Booking details summary -->
    <div class="lg:col-span-2 space-y-8">
        
        <!-- Customer Details & Booking Metadata -->
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 md:p-8">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between border-b border-slate-100 pb-6 mb-6 gap-4">
                <div>
                    <span class="text-[10px] bg-slate-100 text-slate-500 font-bold px-2 py-1 rounded-md uppercase tracking-wider border border-slate-200">Booking ID: {{ $order->order_id }}</span>
                    <h3 class="text-2xl font-black text-slate-800 mt-2">Laundry Booking Details</h3>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-slate-700">
                <!-- Customer info -->
                <div>
                    <h5 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Customer Information</h5>
                    <div class="space-y-3 text-sm">
                        <div>
                            <span class="text-[9px] text-slate-450 uppercase block font-bold">Name</span>
                            <p class="font-bold text-slate-800">{{ $order->customer_name }}</p>
                        </div>
                        <div>
                            <span class="text-[9px] text-slate-450 uppercase block font-bold">Mobile Number</span>
                            <p class="font-bold text-slate-850 flex items-center gap-1.5">
                                <i class="fas fa-phone-alt text-brand-red text-xs"></i>
                                <span>{{ $order->customer_phone }}</span>
                            </p>
                        </div>
                        @if($order->customer_email || ($order->customer && $order->customer->email))
                        <div>
                            <span class="text-[9px] text-slate-450 uppercase block font-bold">Email Address</span>
                            <p class="font-bold text-slate-800 flex items-center gap-1.5">
                                <i class="fas fa-envelope text-brand-red text-xs"></i>
                                <span>{{ $order->customer_email ?: $order->customer->email }}</span>
                            </p>
                        </div>
                        @endif
                        <div>
                            <span class="text-[9px] text-slate-450 uppercase block font-bold">Address</span>
                            <p class="font-semibold text-slate-700 leading-relaxed flex items-start gap-1.5">
                                <i class="fas fa-map-marker-alt text-brand-red text-xs mt-1"></i>
                                <span>{{ $order->customer_address }}<br><span class="text-xs font-black text-slate-650">PINCODE: {{ $order->customer_pincode }}</span></span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Booking info -->
                <div>
                    <h5 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Booking Schedule Info</h5>
                    <div class="space-y-3 text-sm">
                        <div>
                            <span class="text-[9px] text-slate-455 uppercase block font-bold">Services Selected</span>
                            <span class="font-bold text-brand-red bg-red-50 px-2.5 py-1 rounded-lg text-xs border border-red-150 inline-block mt-1">{{ $order->service_type }}</span>
                        </div>
                        <div>
                            <span class="text-[9px] text-slate-455 uppercase block font-bold">Requested Pickup Time</span>
                            <p class="font-bold text-slate-800 flex items-center gap-1.5 mt-1">
                                <i class="fas fa-clock text-brand-red text-xs"></i>
                                <span>{{ $order->pickup_date ? $order->pickup_date->format('M d, Y h:i A') : 'Not Scheduled' }}</span>
                            </p>
                        </div>
                        <div>
                            <span class="text-[9px] text-slate-455 uppercase block font-bold">Booking Date</span>
                            <p class="font-bold text-slate-750 flex items-center gap-1.5 mt-1">
                                <i class="fas fa-calendar text-brand-red text-xs"></i>
                                <span>{{ $order->created_at->format('M d, Y h:i A') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            @if(!empty($order->special_instructions))
            <div class="mt-8 pt-6 border-t border-slate-100">
                <span class="text-[9px] text-slate-450 uppercase block font-bold mb-2">Special Instructions / Message</span>
                <div class="p-4 bg-slate-50 border border-slate-100 rounded-2xl text-xs font-semibold text-slate-650 flex items-start gap-2">
                    <i class="fas fa-quote-left text-slate-350 text-base mt-0.5"></i>
                    <p class="leading-relaxed">{{ $order->special_instructions }}</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
