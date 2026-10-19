@extends('layouts.app')

@section('content')
<section class="py-24 bg-zinc-50 relative overflow-hidden">
    <!-- Decor -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-green-600/5 rounded-full -mr-48 -mt-48 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-zinc-200/5 rounded-full -ml-48 -mb-48 blur-3xl"></div>

    <div class="container mx-auto px-4 max-w-4xl relative z-10">
        <div class="bg-white p-8 md:p-16 rounded-[40px] shadow-2xl border-b-8 border-green-600">
            <h1 class="text-4xl md:text-5xl font-black text-zinc-900 font-oswald mb-4 uppercase tracking-tighter">Terms & <span class="text-green-600">Conditions</span></h1>
            <div class="w-20 h-1.5 bg-zinc-900 mb-10 rounded-full"></div>

            <div class="prose prose-zinc prose-lg max-w-none text-zinc-600 font-medium leading-relaxed">
                <p class="mb-6">By using the services of Laundry Singh, you agree to the following terms and conditions. Please read them carefully.</p>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">1. Service Agreement</h3>
                <p class="mb-6">Laundry Singh provides professional laundry, dry cleaning, and home care services. We reserve the right to refuse service to anyone for any reason at any time.</p>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">2. Garment Care</h3>
                <p class="mb-6">We follow the care label instructions on each garment. If a care label is missing or illegible, we will use our professional judgment but cannot be held responsible for any damage resulting from the cleaning process.</p>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">3. Damage and Loss Policy</h3>
                <p class="mb-6">While we exercise the utmost care, we are not responsible for:</p>
                <ul class="list-disc pl-6 mb-6 space-y-2">
                    <li>Normal wear and tear, shrinkage, or color fading.</li>
                    <li>Damage to buttons, zippers, beads, or other decorative elements.</li>
                    <li>Items left in pockets (please check your pockets before pickup!).</li>
                    <li>Damage resulting from pre-existing conditions or improper care labels.</li>
                </ul>
                <p class="mb-6">In the rare event of loss or damage caused directly by our negligence, our liability is limited to a maximum of 5 times the service charge of that specific item.</p>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">4. Pickup and Delivery</h3>
                <p class="mb-6">We strive to meet all scheduled pickup and delivery times. However, delays may occur due to traffic, weather, or unforeseen circumstances. We are not liable for any consequential damages resulting from such delays.</p>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">5. Payment Terms</h3>
                <p class="mb-6">Payment is due upon delivery or in advance for special packages. We accept cash, UPI, and major digital payment methods. All prices are subject to change without prior notice.</p>

                <h3 class="text-xl font-black text-zinc-900 uppercase font-oswald mb-4 border-l-4 border-green-600 pl-4">6. Unclaimed Items</h3>
                <p class="mb-6">Items not collected or delivered within 30 days of the service completion date will be disposed of or donated to charity without further notice.</p>

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
