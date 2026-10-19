@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<!-- Dashboard Stat Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mb-10">
    
    <!-- Stat 1: Total Bookings -->
    <div class="bg-white rounded-3xl p-5 border border-slate-100 shadow-sm hover:scale-[1.02] transition-transform duration-300 flex items-center justify-between">
        <div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Bookings</span>
            <h3 class="text-2xl font-black text-slate-800 mt-2">{{ $totalBookings }}</h3>
            <a href="{{ route('admin.orders.index') }}" class="text-[10px] text-brand-red font-bold hover:underline mt-2 inline-block">View all &rarr;</a>
        </div>
        <div class="w-10 h-10 bg-red-50 rounded-2xl flex items-center justify-center text-brand-red">
            <i class="fas fa-shopping-basket text-lg"></i>
        </div>
    </div>

    <!-- Stat 2: New Bookings -->
    <div class="bg-white rounded-3xl p-5 border border-slate-100 shadow-sm hover:scale-[1.02] transition-transform duration-300 flex items-center justify-between">
        <div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">New</span>
            <h3 class="text-2xl font-black text-slate-800 mt-2">{{ $newBookings }}</h3>
            <a href="{{ route('admin.orders.index', ['status' => 'New']) }}" class="text-[10px] text-amber-600 font-bold hover:underline mt-2 inline-block">Review new &rarr;</a>
        </div>
        <div class="w-10 h-10 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-650">
            <i class="fas fa-bell text-lg animate-pulse"></i>
        </div>
    </div>

    <!-- Stat 3: Confirmed Bookings -->
    <div class="bg-white rounded-3xl p-5 border border-slate-100 shadow-sm hover:scale-[1.02] transition-transform duration-300 flex items-center justify-between">
        <div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Confirmed</span>
            <h3 class="text-2xl font-black text-slate-800 mt-2">{{ $confirmedBookings }}</h3>
            <a href="{{ route('admin.orders.index', ['status' => 'Confirmed']) }}" class="text-[10px] text-blue-600 font-bold hover:underline mt-2 inline-block">View confirmed &rarr;</a>
        </div>
        <div class="w-10 h-10 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-550">
            <i class="fas fa-check text-lg"></i>
        </div>
    </div>

    <!-- Stat 4: Completed Bookings -->
    <div class="bg-white rounded-3xl p-5 border border-slate-100 shadow-sm hover:scale-[1.02] transition-transform duration-300 flex items-center justify-between">
        <div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Completed</span>
            <h3 class="text-2xl font-black text-slate-800 mt-2">{{ $completedBookings }}</h3>
            <a href="{{ route('admin.orders.index', ['status' => 'Completed']) }}" class="text-[10px] text-emerald-600 font-bold hover:underline mt-2 inline-block">View completed &rarr;</a>
        </div>
        <div class="w-10 h-10 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600">
            <i class="fas fa-check-double text-lg"></i>
        </div>
    </div>

    <!-- Stat 5: Total Customers -->
    <div class="bg-white rounded-3xl p-5 border border-slate-100 shadow-sm hover:scale-[1.02] transition-transform duration-300 flex items-center justify-between">
        <div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Customers</span>
            <h3 class="text-2xl font-black text-slate-800 mt-2">{{ $totalCustomers }}</h3>
            <a href="{{ route('admin.customers.index') }}" class="text-[10px] text-slate-500 font-bold hover:underline mt-2 inline-block">Manage &rarr;</a>
        </div>
        <div class="w-10 h-10 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-700">
            <i class="fas fa-users text-lg"></i>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">
    <!-- Quick Actions -->
    <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm lg:col-span-3">
        <h4 class="font-bold text-md text-slate-800 uppercase tracking-tight mb-4">Quick Shortcuts</h4>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            
            <a href="{{ route('admin.orders.index', ['status' => 'New']) }}" class="flex flex-col items-center justify-center p-4 bg-red-50/40 hover:bg-red-50/80 border border-red-100 rounded-2xl text-center transition-all group">
                <i class="fas fa-clock text-brand-red text-lg group-hover:scale-110 transition-transform mb-2"></i>
                <span class="text-xs font-bold text-slate-700">New Bookings</span>
            </a>

            <a href="{{ route('admin.services.index') }}" class="flex flex-col items-center justify-center p-4 bg-amber-50/40 hover:bg-amber-50/80 border border-amber-100 rounded-2xl text-center transition-all group">
                <i class="fas fa-tags text-amber-600 text-lg group-hover:scale-110 transition-transform mb-2"></i>
                <span class="text-xs font-bold text-slate-700">Pricing & Services</span>
            </a>

            <a href="{{ route('admin.customers.index') }}" class="flex flex-col items-center justify-center p-4 bg-blue-50/40 hover:bg-blue-50/80 border border-blue-100 rounded-2xl text-center transition-all group">
                <i class="fas fa-users text-blue-600 text-lg group-hover:scale-110 transition-transform mb-2"></i>
                <span class="text-xs font-bold text-slate-700">Customers List</span>
            </a>

            <a href="/" target="_blank" class="flex flex-col items-center justify-center p-4 bg-yellow-50 hover:bg-yellow-100 border border-yellow-200 rounded-2xl text-center transition-all group">
                <i class="fas fa-external-link-alt text-yellow-600 text-lg group-hover:scale-110 transition-transform mb-2"></i>
                <span class="text-xs font-bold text-slate-700">Visit Website</span>
            </a>
            
        </div>
    </div>
</div>

<!-- Recent Activities Table -->
<div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 overflow-hidden">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h4 class="font-bold text-md text-slate-800 uppercase tracking-tight">Recent Booking Activity</h4>
            <p class="text-xs text-slate-400 font-semibold">Latest booking requests submitted from website</p>
        </div>
        <a href="{{ route('admin.orders.index') }}" class="bg-slate-50 hover:bg-slate-100 border border-slate-200 px-4 py-2 rounded-2xl text-xs font-bold transition-all">View All Bookings</a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-zinc-950 text-white text-[10px] font-bold uppercase tracking-wider">
                    <th class="py-4 px-6 rounded-l-2xl">Booking ID</th>
                    <th class="py-4 px-6">Customer</th>
                    <th class="py-4 px-6">Services Requested</th>
                    <th class="py-4 px-6">Requested Pickup</th>
                    <th class="py-4 px-6">Status</th>
                    <th class="py-4 px-6">Booking Date</th>
                    <th class="py-4 px-6 text-center rounded-r-2xl">Actions</th>
                </tr>
            </thead>
            <tbody class="text-xs font-medium text-slate-700 divide-y divide-slate-100">
                @forelse($recentBookings as $order)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="py-4 px-6 font-bold text-brand-red">{{ $order->order_id }}</td>
                    <td class="py-4 px-6">
                        <div>
                            <p class="font-bold text-slate-800 text-sm">{{ $order->customer_name }}</p>
                            <span class="text-slate-400 font-semibold text-[10px]">{{ $order->customer_phone }}</span>
                        </div>
                    </td>
                    <td class="py-4 px-6">
                        <span class="px-2.5 py-1 bg-slate-100 text-slate-800 rounded-lg font-bold text-[10px]">{{ $order->service_type }}</span>
                    </td>
                    <td class="py-4 px-6 text-slate-500 font-semibold">
                        {{ $order->pickup_date ? $order->pickup_date->format('M d, Y h:i A') : 'N/A' }}
                    </td>
                    <td class="py-4 px-6">
                        @php
                            $badgeColor = match($order->status) {
                                'New' => 'bg-red-50 text-red-650 border-red-150',
                                'Confirmed' => 'bg-blue-50 text-blue-650 border-blue-150',
                                'Completed' => 'bg-emerald-50 text-emerald-650 border-emerald-150',
                                'Cancelled' => 'bg-slate-100 text-slate-650 border-slate-200',
                                default => 'bg-slate-50 text-slate-600 border-slate-100'
                            };
                        @endphp
                        <span class="px-2.5 py-1 border rounded-full font-bold text-[9px] uppercase {{ $badgeColor }}">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td class="py-4 px-6 text-slate-400 font-semibold">
                        {{ $order->created_at->format('M d, Y h:i A') }}
                    </td>
                    <td class="py-4 px-6 text-center">
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="bg-brand-red hover:bg-brand-darkRed text-white font-bold px-3.5 py-2 rounded-xl transition-all shadow-sm shadow-brand-red/10">
                            Manage
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="py-8 text-center text-slate-400 font-semibold">
                        No bookings recorded yet.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
