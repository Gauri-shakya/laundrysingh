@extends('layouts.app')

@section('content')
<section class="py-24 bg-zinc-50 relative overflow-hidden">
    <!-- Decor -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-green-600/5 rounded-full -mr-48 -mt-48 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-zinc-200/5 rounded-full -ml-48 -mb-48 blur-3xl"></div>

    <div class="container mx-auto px-4 max-w-4xl relative z-10">
        <div class="bg-white p-8 md:p-16 rounded-[40px] shadow-2xl border-b-8 border-green-600">
            <h1 class="text-4xl md:text-5xl font-black text-zinc-900 font-oswald mb-4 uppercase tracking-tighter">Refund <span class="text-green-600">Policy</span></h1>
            <div class="w-20 h-1.5 bg-zinc-900 mb-10 rounded-full"></div>

            <div class="prose prose-zinc prose-lg max-w-none text-zinc-600 font-medium leading-relaxed">
                <p class="mb-6">At Laundry Singh, we strive for 100% customer satisfaction. If you are not happy with our service, our Refund Policy outlines how we address your concerns.</p>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">1. Satisfaction Guarantee</h3>
                <p class="mb-6">If you find that a garment has not been cleaned to our professional standards, please notify us within 24 hours of delivery. We will re-clean the item free of charge.</p>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">2. Eligibility for Refunds</h3>
                <p class="mb-6">Refunds are considered on a case-by-case basis and may be issued under the following circumstances:</p>
                <ul class="list-disc pl-6 mb-6 space-y-2">
                    <li>Duplicate payments made by mistake.</li>
                    <li>Service cancellations made at least 4 hours before the scheduled pickup time.</li>
                    <li>Significant service failure directly attributable to our negligence.</li>
                </ul>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">3. Non-Refundable Items</h3>
                <p class="mb-6">The following are generally non-refundable:</p>
                <ul class="list-disc pl-6 mb-6 space-y-2">
                    <li>Services already completed to standard.</li>
                    <li>Packages or subscriptions partially used (unless otherwise specified in the package terms).</li>
                    <li>Damage resulting from pre-existing fabric conditions or missing care labels.</li>
                </ul>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">4. Refund Process</h3>
                <p class="mb-6">To request a refund, please contact us at info@laundrysingh.com with your order details and the reason for the request. Once approved, refunds will be processed via the original payment method within 7-10 working days.</p>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">5. Special Saver Packages</h3>
                <p class="mb-6">Amounts recharged in Special Saver Packages (Silver, Golden, Platinum) are non-refundable but carry no expiry date and can be used for any service at any time.</p>

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
