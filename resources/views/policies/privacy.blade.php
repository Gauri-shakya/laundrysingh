@extends('layouts.app')

@section('content')
<section class="py-24 bg-zinc-50 relative overflow-hidden">
    <!-- Decor -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-green-600/5 rounded-full -mr-48 -mt-48 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-zinc-200/5 rounded-full -ml-48 -mb-48 blur-3xl"></div>

    <div class="container mx-auto px-4 max-w-4xl relative z-10">
        <div class="bg-white p-8 md:p-16 rounded-[40px] shadow-2xl border-b-8 border-green-600">
            <h1 class="text-4xl md:text-5xl font-black text-zinc-900 font-oswald mb-4 uppercase tracking-tighter">Privacy <span class="text-green-600">Policy</span></h1>
            <div class="w-20 h-1.5 bg-zinc-900 mb-10 rounded-full"></div>

            <div class="prose prose-zinc prose-lg max-w-none text-zinc-600 font-medium leading-relaxed">
                <p class="mb-6">At Laundry Singh, we are committed to protecting your privacy. This Privacy Policy explains how we collect, use, and safeguard your personal information when you use our laundry and dry-cleaning services.</p>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">1. Information We Collect</h3>
                <p class="mb-6">We collect information that you provide to us directly, such as your name, phone number, email address, and pickup/delivery address when you schedule a service. We also collect information about your garment preferences and service history.</p>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">2. How We Use Your Information</h3>
                <p class="mb-6">We use your information to provide and improve our services, including:</p>
                <ul class="list-disc pl-6 mb-6 space-y-2">
                    <li>Processing and scheduling your laundry pickups and deliveries.</li>
                    <li>Communicating with you about your orders and promotional offers.</li>
                    <li>Ensuring quality control and personalized garment care.</li>
                    <li>Analyzing service trends to improve our operations.</li>
                </ul>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">3. Data Security</h3>
                <p class="mb-6">We implement industry-standard security measures to protect your personal data. However, no method of transmission over the internet or electronic storage is 100% secure, and we cannot guarantee absolute security.</p>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">4. Sharing Your Information</h3>
                <p class="mb-6">We do not sell or rent your personal information to third parties. We may share your information with trusted service providers who assist us in operating our business (e.g., delivery partners), provided they agree to keep your information confidential.</p>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">5. Your Rights</h3>
                <p class="mb-6">You have the right to access, update, or request the deletion of your personal information. Please contact us at info@laundrysingh.com if you wish to exercise these rights.</p>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">6. Changes to This Policy</h3>
                <p class="mb-6">We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new policy on our website.</p>

                <div class="mt-12 pt-8 border-t border-zinc-100 italic text-sm text-zinc-400">
                    Last Updated: June 2026
                </div>
            </div>
        </div>

        <div class="mt-12 text-center">
            <a href="{{ url('/') }}" class="inline-flex items-center text-green-600 font-black uppercase tracking-widest text-sm hover:text-zinc-900 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Back to Home
            </a>
        </div>
    </div>
</section>
@endsection
