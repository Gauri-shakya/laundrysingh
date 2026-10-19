@extends('layouts.admin')

@section('title', 'Manage Bookings')
@section('page_title', 'Bookings')

@section('content')
{{-- Success Flash Message --}}
@if(session('success'))
<div class="bg-emerald-50 border border-emerald-200 text-emerald-800 font-semibold text-xs px-5 py-4 rounded-2xl mb-6 flex items-center gap-3">
    <i class="fas fa-check-circle text-emerald-500 text-base"></i>
    <span>{{ session('success') }}</span>
</div>
@endif

<!-- Filter & Search Card -->
<div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 mb-8">
    <h4 class="font-bold text-md text-slate-800 uppercase tracking-tight mb-4 flex items-center gap-2">
        <i class="fas fa-filter text-brand-red"></i>
        <span>Filter and Search</span>
    </h4>
    
    <form action="{{ route('admin.orders.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
        
        <!-- Booking ID -->
        <div>
            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Booking ID</label>
            <input type="text" name="order_id" value="{{ request('order_id') }}" placeholder="e.g. LS-10001"
                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 font-semibold focus:outline-none focus:border-brand-red focus:ring-1 focus:ring-brand-red">
        </div>

        <!-- Customer Name -->
        <div>
            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Customer Name</label>
            <input type="text" name="customer_name" value="{{ request('customer_name') }}" placeholder="e.g. John Doe"
                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 font-semibold focus:outline-none focus:border-brand-red focus:ring-1 focus:ring-brand-red">
        </div>

        <!-- Phone Number -->
        <div>
            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Mobile Number</label>
            <input type="text" name="customer_phone" value="{{ request('customer_phone') }}" placeholder="e.g. 98765..."
                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 font-semibold focus:outline-none focus:border-brand-red focus:ring-1 focus:ring-brand-red">
        </div>

        <!-- Status -->
        <div>
            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Booking Status</label>
            <select name="status" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 font-semibold focus:outline-none focus:border-brand-red focus:ring-1 focus:ring-brand-red cursor-pointer">
                <option value="">All Statuses</option>
                @foreach(['New', 'Confirmed', 'Completed', 'Cancelled'] as $status)
                    <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>{{ $status }}</option>
                @endforeach
            </select>
        </div>

        <!-- Actions -->
        <div class="flex items-end gap-2">
            <button type="submit" class="flex-1 bg-brand-red hover:bg-brand-darkRed text-white font-bold py-2.5 px-4 rounded-xl text-xs uppercase tracking-wider transition-all flex items-center justify-center gap-1.5 shadow-md shadow-brand-red/20">
                <i class="fas fa-search"></i>
                <span>Filter</span>
            </button>
            <a href="{{ route('admin.orders.index') }}" class="flex-1 bg-slate-50 hover:bg-slate-100 border border-slate-200 text-slate-600 font-bold py-2.5 px-4 rounded-xl text-xs uppercase tracking-wider transition-all text-center">
                Reset
            </a>
        </div>
    </form>
</div>

<!-- Bookings Table Card -->
<div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 overflow-hidden">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h4 class="font-bold text-md text-slate-800 uppercase tracking-tight">Booking List</h4>
            <p class="text-xs text-slate-400 font-semibold">Total: {{ $orders->total() }} bookings found</p>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-zinc-950 text-white text-[10px] font-bold uppercase tracking-wider">
                    <th class="py-4 px-6 rounded-l-2xl">Booking ID</th>
                    <th class="py-4 px-6">Customer</th>
                    <th class="py-4 px-6">Services Booked</th>
                    <th class="py-4 px-6">Requested Pickup</th>
                    <th class="py-4 px-6">Status</th>
                    <th class="py-4 px-6">Booking Date</th>
                    <th class="py-4 px-6 text-center rounded-r-2xl">Actions</th>
                </tr>
            </thead>
            <tbody class="text-xs font-medium text-slate-700 divide-y divide-slate-100">
                @forelse($orders as $order)
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
                                'New' => 'bg-red-50 text-red-600 border-red-100',
                                'Confirmed' => 'bg-blue-50 text-blue-600 border-blue-100',
                                'Completed' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                'Cancelled' => 'bg-slate-100 text-slate-500 border-slate-200',
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
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="bg-brand-red hover:bg-brand-darkRed text-white font-bold px-3.5 py-2 rounded-xl transition-all shadow-sm shadow-brand-red/10 text-xs">
                                Manage
                            </a>
                            <form action="{{ route('admin.orders.delete', $order->id) }}" method="POST" class="inline-block" onsubmit="return confirmDelete('Are you sure you want to delete booking {{ $order->order_id }}? This action cannot be undone.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-slate-100 hover:bg-red-600 text-slate-600 hover:text-white font-bold px-3.5 py-2 rounded-xl transition-all text-xs border border-slate-200 hover:border-red-600">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="py-12 text-center text-slate-400 font-semibold">
                        No bookings match your filter criteria.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 border-t border-slate-100 pt-6">
        {{ $orders->links() }}
    </div>
</div>

<script>
    function confirmDelete(message) {
        return confirm(message);
    }
</script>
@endsection
