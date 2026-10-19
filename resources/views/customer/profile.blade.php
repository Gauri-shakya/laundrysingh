@extends('layouts.customer')

@section('title', 'Edit Profile')
@section('page_title', 'Edit Profile')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-3xl border border-slate-100 shadow-sm p-6 md:p-8">
    <div class="border-b border-slate-100 pb-4 mb-6">
        <h4 class="font-bold text-sm text-slate-800 uppercase tracking-tight flex items-center gap-2">
            <i class="fas fa-user-cog text-green-700"></i>
            <span>Update Account Profile</span>
        </h4>
        <p class="text-xs text-slate-400 mt-1">Keep your contact details and default delivery coordinates up-to-date</p>
    </div>

    <form action="{{ route('customer.profile.update') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <!-- Full Name -->
            <div>
                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Full Name*</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                    class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-slate-700 font-semibold focus:outline-none focus:border-green-600 focus:ring-1 focus:ring-green-600 transition-all text-sm">
                @error('name')
                    <span class="text-brand-red text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Mobile Number -->
            <div>
                <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Mobile Number*</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" required
                    class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-slate-700 font-semibold focus:outline-none focus:border-green-600 focus:ring-1 focus:ring-green-600 transition-all text-sm">
                @error('phone')
                    <span class="text-brand-red text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="sm:col-span-2">
                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Email Address*</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-slate-700 font-semibold focus:outline-none focus:border-green-600 focus:ring-1 focus:ring-green-600 transition-all text-sm">
                @error('email')
                    <span class="text-brand-red text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Default Address -->
            <div class="sm:col-span-2">
                <label for="address" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Default Address</label>
                <textarea id="address" name="address" rows="3" placeholder="Enter house details, street and locality..."
                    class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-slate-700 font-semibold focus:outline-none focus:border-green-600 focus:ring-1 focus:ring-green-600 transition-all text-sm">{{ old('address', $user->address) }}</textarea>
                @error('address')
                    <span class="text-brand-red text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Pincode -->
            <div>
                <label for="pincode" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Pincode</label>
                <input type="text" id="pincode" name="pincode" value="{{ old('pincode', $user->pincode) }}" placeholder="e.g. 110001"
                    class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-slate-700 font-semibold focus:outline-none focus:border-green-600 focus:ring-1 focus:ring-green-600 transition-all text-sm">
                @error('pincode')
                    <span class="text-brand-red text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="border-t border-slate-100 pt-6">
            <h5 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 flex items-center gap-1.5">
                <i class="fas fa-lock text-green-700"></i>
                <span>Change Password (Leave blank to keep current)</span>
            </h5>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <!-- New Password -->
                <div>
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">New Password</label>
                    <input type="password" id="password" name="password" placeholder="••••••••"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-slate-700 font-semibold focus:outline-none focus:border-green-600 focus:ring-1 focus:ring-green-600 transition-all text-sm">
                    @error('password')
                        <span class="text-brand-red text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Confirm New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-slate-700 font-semibold focus:outline-none focus:border-green-600 focus:ring-1 focus:ring-green-600 transition-all text-sm">
                </div>
            </div>
        </div>

        <button type="submit" class="w-full bg-green-700 hover:bg-green-600 text-white font-black py-4 px-6 rounded-2xl transition-all duration-300 shadow-xl shadow-green-100 uppercase tracking-widest text-xs flex items-center justify-center gap-2">
            <i class="fas fa-save"></i>
            <span>Save Profile Modifications</span>
        </button>
    </form>
</div>
@endsection
