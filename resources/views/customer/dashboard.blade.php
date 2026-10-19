@extends('layouts.customer')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<!-- Overview Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6 mb-8">
    <div class="bg-white rounded-3xl p-5 border border-slate-100 shadow-sm flex items-center gap-4">
        <div class="w-10 h-10 md:w-12 md:h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center shadow-inner shrink-0">
            <i class="fas fa-shopping-basket text-base md:text-lg"></i>
        </div>
        <div>
            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Bookings</h3>
            <p class="text-xl md:text-2xl font-black text-slate-800 mt-1">{{ $totalBookings }}</p>
        </div>
    </div>

    <div class="bg-white rounded-3xl p-5 border border-slate-100 shadow-sm flex items-center gap-4">
        <div class="w-10 h-10 md:w-12 md:h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center shadow-inner shrink-0">
            <i class="fas fa-spinner text-base md:text-lg animate-spin"></i>
        </div>
        <div>
            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">In Progress</h3>
            <p class="text-xl md:text-2xl font-black text-slate-800 mt-1">{{ $activeOrdersCount }}</p>
        </div>
    </div>

    <div class="bg-white rounded-3xl p-5 border border-slate-100 shadow-sm flex items-center gap-4">
        <div class="w-10 h-10 md:w-12 md:h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center shadow-inner shrink-0">
            <i class="fas fa-check-circle text-base md:text-lg"></i>
        </div>
        <div>
            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Completed</h3>
            <p class="text-xl md:text-2xl font-black text-slate-800 mt-1">{{ $completedOrdersCount }}</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Profile Info Card -->
    <div class="lg:col-span-1 space-y-6">
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 space-y-5">
            <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                <h4 class="font-bold text-sm text-slate-800 uppercase tracking-tight flex items-center gap-2">
                    <i class="fas fa-user-circle text-green-700"></i>
                    <span>Profile Details</span>
                </h4>
                <a href="{{ route('customer.profile') }}" class="text-[10px] text-green-700 hover:text-green-600 font-bold uppercase tracking-wider flex items-center gap-1">
                    <i class="fas fa-edit"></i> Edit
                </a>
            </div>

            <div class="text-xs font-semibold text-slate-500 space-y-3">
                <div>
                    <span class="text-[9px] text-slate-400 font-bold uppercase block tracking-wider">Full Name</span>
                    <strong class="text-slate-800 text-sm mt-0.5 block">{{ $user->name }}</strong>
                </div>
                <div>
                    <span class="text-[9px] text-slate-400 font-bold uppercase block tracking-wider">Email Address</span>
                    <strong class="text-slate-700 text-sm mt-0.5 block">{{ $user->email }}</strong>
                </div>
                <div>
                    <span class="text-[9px] text-slate-400 font-bold uppercase block tracking-wider">Mobile Number</span>
                    <strong class="text-slate-700 text-sm mt-0.5 block">{{ $user->phone }}</strong>
                </div>
                <div>
                    <span class="text-[9px] text-slate-400 font-bold uppercase block tracking-wider">Default Address</span>
                    <strong class="text-slate-700 mt-0.5 block leading-relaxed">{{ $user->address ?: 'Not configured' }}</strong>
                    @if($user->pincode)
                        <span class="text-[10px] bg-slate-100 px-1.5 py-0.5 rounded text-slate-600 font-bold mt-1 inline-block uppercase">PIN: {{ $user->pincode }}</span>
                    @endif
                </div>
            </div>
            
            <div class="pt-4 border-t border-slate-100">
                <button onclick="openPickupModal()" class="w-full bg-green-700 hover:bg-green-600 text-white font-black py-3 px-4 rounded-2xl text-xs uppercase tracking-widest transition-all shadow-lg shadow-green-100 flex items-center justify-center gap-2">
                    <i class="fas fa-calendar-plus"></i>
                    <span>Schedule Free Pickup</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Recent Bookings Table -->
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6">
            <div class="border-b border-slate-100 pb-4 mb-5 flex items-center justify-between">
                <h4 class="font-bold text-sm text-slate-800 uppercase tracking-tight flex items-center gap-2">
                    <i class="fas fa-history text-green-700"></i>
                    <span>Recent Bookings</span>
                </h4>
                <a href="{{ route('customer.orders.index') }}" class="text-[10px] text-green-700 hover:text-green-600 font-bold uppercase tracking-wider">
                    View All Bookings <i class="fas fa-arrow-right ml-0.5"></i>
                </a>
            </div>

            @if($recentOrders->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-slate-50 text-slate-700 font-bold uppercase border-b border-slate-100">
                                <th class="py-3 px-4 font-black">Booking ID</th>
                                <th class="py-3 px-4 font-black">Booking Date</th>
                                <th class="py-3 px-4 font-black">Services Requested</th>
                                <th class="py-3 px-4 font-black">Requested Pickup</th>
                                <th class="py-3 px-4 text-center font-black">Status</th>
                                <th class="py-3 px-4 text-right font-black rounded-r-2xl">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-slate-600 divide-y divide-slate-100 font-semibold">
                            @foreach($recentOrders as $order)
                            <tr>
                                <td class="py-3 px-4 text-slate-800 font-bold uppercase">{{ $order->order_id }}</td>
                                <td class="py-3 px-4 text-slate-500">{{ $order->created_at->format('M d, Y') }}</td>
                                <td class="py-3 px-4">
                                    <span class="px-2 py-0.5 bg-slate-100 text-slate-800 rounded text-[9px] font-bold border border-slate-200">{{ $order->service_type }}</span>
                                </td>
                                <td class="py-3 px-4 text-slate-500 font-semibold">
                                    {{ $order->pickup_date ? $order->pickup_date->format('M d, Y h:i A') : 'N/A' }}
                                </td>
                                <td class="py-3 px-4 text-center">
                                    @php
                                        $badgeColor = match($order->status) {
                                            'New' => 'bg-red-50 text-red-650 border-red-150',
                                            'Confirmed' => 'bg-blue-50 text-blue-650 border-blue-150',
                                            'Completed' => 'bg-emerald-50 text-emerald-650 border-emerald-150',
                                            'Cancelled' => 'bg-slate-105 text-slate-650 border-slate-200',
                                            default => 'bg-slate-50 text-slate-600 border-slate-100'
                                        };
                                    @endphp
                                    <span class="px-2 py-0.5 rounded border text-[9px] font-black uppercase tracking-wider {{ $badgeColor }}">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-right">
                                    <a href="{{ route('customer.orders.show', $order->id) }}" class="bg-slate-100 hover:bg-green-700 hover:text-white text-slate-700 border border-slate-200 px-3 py-1.5 rounded-xl text-[10px] font-bold transition-all inline-block shadow-sm">
                                        View Details
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="py-12 text-center text-slate-400 font-semibold border border-dashed border-slate-200 rounded-3xl bg-slate-50/50">
                    <i class="fas fa-box-open text-4xl mb-4 text-slate-350"></i>
                    <p class="text-sm">You haven't scheduled any bookings yet.</p>
                    <span class="text-[10px] text-slate-400 max-w-xs block mx-auto mt-2 leading-relaxed font-medium">
                        Schedule your first laundry service using the button on the left!
                    </span>
                </div>
            @endif
        </div>
    </div>
</div>

@include('partials.pickup-modal')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('booking') === '1') {
            setTimeout(function() {
                if (typeof openPickupModal === 'function') {
                    openPickupModal();
                    // Clean query parameters from address bar to prevent repeated popup on reload
                    const cleanUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
                    window.history.replaceState({path: cleanUrl}, '', cleanUrl);
                }
            }, 300);
        }
    });
</script>
@endsection
