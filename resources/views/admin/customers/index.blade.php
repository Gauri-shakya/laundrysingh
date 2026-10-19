@extends('layouts.admin')

@section('title', 'Manage Customers')
@section('page_title', 'Customers')

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
        <i class="fas fa-search text-brand-red"></i>
        <span>Search Customers</span>
    </h4>
    
    <form action="{{ route('admin.customers.index') }}" method="GET" class="flex gap-4 max-w-md">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, email or phone..."
            class="flex-1 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 font-semibold focus:outline-none focus:border-brand-red focus:ring-1 focus:ring-brand-red">
        <button type="submit" class="bg-brand-red hover:bg-brand-darkRed text-white font-bold py-2.5 px-6 rounded-xl text-xs uppercase tracking-wider transition-all flex items-center gap-1.5 shadow-md shadow-brand-red/20">
            <span>Search</span>
        </button>
        @if(request('search'))
        <a href="{{ route('admin.customers.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold py-2.5 px-4 rounded-xl text-xs uppercase tracking-wider transition-all text-center flex items-center">
            Reset
        </a>
        @endif
    </form>
</div>

<!-- Customers Table Card -->
<div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 overflow-hidden">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h4 class="font-bold text-md text-slate-800 uppercase tracking-tight">Registered Customers</h4>
            <p class="text-xs text-slate-400 font-semibold">Total: {{ $customers->total() }} customer accounts found</p>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-zinc-950 text-white text-[10px] font-bold uppercase tracking-wider">
                    <th class="py-4 px-6 rounded-l-2xl">Customer</th>
                    <th class="py-4 px-6">Email</th>
                    <th class="py-4 px-6">Phone</th>
                    <th class="py-4 px-6">Address</th>
                    <th class="py-4 px-6">Registered Date</th>
                    <th class="py-4 px-6 text-center">Total Bookings</th>
                    <th class="py-4 px-6 text-center rounded-r-2xl">Actions</th>
                </tr>
            </thead>
            <tbody class="text-xs font-medium text-slate-700 divide-y divide-slate-100">
                @forelse($customers as $customer)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="py-4 px-6">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-red-50 text-brand-red rounded-full flex items-center justify-center font-bold">
                                {{ substr($customer->name, 0, 1) }}
                            </div>
                            <span class="font-bold text-slate-800 text-sm">{{ $customer->name }}</span>
                        </div>
                    </td>
                    <td class="py-4 px-6 text-slate-600 font-semibold">{{ $customer->email }}</td>
                    <td class="py-4 px-6 text-slate-600 font-semibold">{{ $customer->phone }}</td>
                    <td class="py-4 px-6 text-slate-500 font-semibold leading-relaxed">
                        @if($customer->address)
                            {{ $customer->address }}@if($customer->pincode), PIN: {{ $customer->pincode }}@endif
                        @else
                            <span class="text-slate-400 italic">Not set</span>
                        @endif
                    </td>
                    <td class="py-4 px-6 text-slate-400 font-semibold">{{ $customer->created_at->format('M d, Y') }}</td>
                    <td class="py-4 px-6 text-center font-black text-slate-800 text-sm">
                        {{ $customer->orders()->count() }}
                    </td>
                    <td class="py-4 px-6 text-center">
                        <form action="{{ route('admin.customers.delete', $customer->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete customer account for {{ addslashes($customer->name) }}? Their bookings will be retained as guest bookings.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-slate-100 hover:bg-red-600 text-slate-600 hover:text-white font-bold px-3.5 py-2 rounded-xl transition-all text-xs border border-slate-200 hover:border-red-600">
                                <i class="fas fa-trash-alt mr-1"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="py-12 text-center text-slate-400 font-semibold">
                        No customer accounts found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 border-t border-slate-100 pt-6">
        {{ $customers->links() }}
    </div>
</div>
@endsection
