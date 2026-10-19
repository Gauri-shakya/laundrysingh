@extends('layouts.customer')

@section('title', 'My Bookings')
@section('page_title', 'My Bookings')

@section('content')
<div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 md:p-8">
    <div class="border-b border-slate-100 pb-4 mb-6 flex items-center justify-between">
        <h4 class="font-bold text-sm text-slate-800 uppercase tracking-tight flex items-center gap-2">
            <i class="fas fa-shopping-basket text-green-700"></i>
            <span>Booking History</span>
        </h4>
        <span class="text-xs bg-slate-100 px-3 py-1 rounded-full text-slate-500 font-bold uppercase">
            Total: {{ $orders->total() }} Bookings
        </span>
    </div>

    @if($orders->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-zinc-950 text-white font-bold uppercase tracking-wider">
                        <th class="py-3.5 px-4 rounded-l-2xl font-black">Booking ID</th>
                        <th class="py-3.5 px-4 font-black">Booking Date</th>
                        <th class="py-3.5 px-4 font-black">Services Booked</th>
                        <th class="py-3.5 px-4 font-black">Requested Pickup</th>
                        <th class="py-3.5 px-4 font-black text-center border-r-0">Booking Status</th>
                        <th class="py-3.5 px-4 rounded-r-2xl text-right font-black">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-slate-700 divide-y divide-slate-100 font-semibold">
                    @foreach($orders as $order)
                    <tr>
                        <td class="py-4 px-4 font-black text-slate-900 uppercase">{{ $order->order_id }}</td>
                        <td class="py-4 px-4 text-slate-500 font-medium">{{ $order->created_at->format('M d, Y h:i A') }}</td>
                        <td class="py-4 px-4">
                            <span class="px-2 py-0.5 bg-slate-100 text-slate-800 rounded text-[10px] font-bold border border-slate-200">{{ $order->service_type }}</span>
                        </td>
                        <td class="py-4 px-6 text-slate-500 font-semibold">
                            {{ $order->pickup_date ? $order->pickup_date->format('M d, Y h:i A') : 'N/A' }}
                        </td>
                        <td class="py-4 px-4 text-center">
                            @php
                                $badgeColor = match($order->status) {
                                    'New' => 'bg-red-50 text-red-650 border-red-150',
                                    'Confirmed' => 'bg-blue-50 text-blue-650 border-blue-150',
                                    'Completed' => 'bg-emerald-50 text-emerald-650 border-emerald-150',
                                    'Cancelled' => 'bg-slate-100 text-slate-650 border-slate-200',
                                    default => 'bg-slate-50 text-slate-600 border-slate-100'
                                };
                            @endphp
                            <span class="px-2.5 py-0.5 rounded border text-[9px] font-black uppercase tracking-wider {{ $badgeColor }}">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td class="py-4 px-4 text-right">
                            <a href="{{ route('customer.orders.show', $order->id) }}" class="bg-slate-50 hover:bg-green-700 hover:text-white text-slate-700 border border-slate-200 px-3.5 py-2 rounded-xl text-[10px] font-bold transition-all inline-block shadow-sm">
                                View Details
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $orders->links() }}
        </div>
    @else
        <div class="py-16 text-center text-slate-400 font-semibold border border-dashed border-slate-200 rounded-3xl bg-slate-50/50">
            <i class="fas fa-box-open text-4xl mb-4 text-slate-350"></i>
            <p class="text-sm">You haven't scheduled any bookings yet.</p>
        </div>
    @endif
</div>
@endsection
