@extends('layouts.app')

@section('content')
<section class="py-24 bg-zinc-50 relative overflow-hidden">
    <!-- Decor -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-green-600/5 rounded-full -mr-48 -mt-48 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-zinc-200/5 rounded-full -ml-48 -mb-48 blur-3xl"></div>

    <div class="container mx-auto px-4 max-w-4xl relative z-10">
        <div class="bg-white p-8 md:p-16 rounded-[40px] shadow-2xl border-b-8 border-green-600">
            <h1 class="text-4xl md:text-5xl font-black text-zinc-900 font-oswald mb-4 uppercase tracking-tighter">Shipping & <span class="text-green-600">Delivery</span></h1>
            <div class="w-20 h-1.5 bg-zinc-900 mb-10 rounded-full"></div>

            <div class="prose prose-zinc prose-lg max-w-none text-zinc-600 font-medium leading-relaxed">
                <p class="mb-6">This policy outlines the logistics for our pickup and delivery services, ensuring a smooth experience for all Laundry Singh customers.</p>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">1. Service Area</h3>
                <p class="mb-6">We currently provide pickup and delivery services within specific zones in New Delhi. Please check your location's eligibility by entering your pin code on our website or contacting our support team.</p>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">2. Pickup & Delivery Scheduling</h3>
                <p class="mb-6">You can schedule a pickup through our website or via WhatsApp. Our delivery partners will arrive within the selected time slot. Please ensure someone is available at the provided address during this time.</p>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">3. Delivery Timeline</h3>
                <ul class="list-disc pl-6 mb-6 space-y-2">
                    <li><strong>Regular Service:</strong> Delivery within 48 to 72 hours.</li>
                    <li><strong>Express Service:</strong> Delivery within 24 hours (subject to 1.5x service charge).</li>
                    <li><strong>Specialty Items:</strong> Carpets, curtains, and luxury items may take 5-7 working days.</li>
                </ul>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">4. Delivery Charges</h3>
                <ul class="list-disc pl-6 mb-6 space-y-2">
                    <li><strong>Free Pickup</strong> on orders above ₹350.</li>
                    <li>A <strong>₹100 pickup charge</strong> will apply to orders below ₹350.</li>
                    <li>This pickup service is available within a distance of <strong>up to 3 km</strong> from the branch.</li>
                </ul>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">5. Handling and Packaging</h3>
                <p class="mb-6">All garments are returned in high-quality, eco-friendly packaging. Hangers are provided for suits, blazers, and sarees to maintain their crisp finish. Please check your items upon delivery and notify the delivery partner of any discrepancies immediately.</p>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">6. Failed Delivery Attempts</h3>
                <p class="mb-6">If our delivery partner is unable to reach you or access your address during the scheduled time, we will attempt to contact you to reschedule. A re-delivery fee may apply for subsequent attempts.</p>

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
