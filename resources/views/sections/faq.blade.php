<section id="faq" class="py-24 bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <span class="text-green-600 font-bold uppercase tracking-[4px] text-sm">Got Questions?</span>
            <h2 class="text-4xl md:text-5xl font-black text-zinc-900 mt-4 uppercase">
                Frequently Asked <span class="text-green-600">Questions</span>
            </h2>
        </div>

        <!-- FAQ Accordion -->
        <div class="space-y-4">
            @php
            $faqs = [
                [
                    'q' => 'What services does Laundry Singh provide?',
                    'a' => 'We offer a comprehensive range of services including Dry Cleaning, Wash & Fold, Steam Ironing, Premium Laundry, and specialized cleaning for carpets, sofas, and shoes.'
                ],
                [
                    'q' => 'How can I schedule a free pickup?',
                    'a' => 'You can schedule a pickup by clicking any "Schedule Free Pickup" button on our website, through our mobile app, or by contacting us directly on WhatsApp.'
                ],
                [
                    'q' => 'Is there a minimum order requirement for free pickup?',
                    'a' => 'Yes, free pickup and delivery are available for orders above ₹500. For orders below this amount, a nominal delivery fee may apply.'
                ],
                [
                    'q' => 'What is the typical turnaround time?',
                    'a' => 'Our standard turnaround time is 48-72 hours. However, we also offer an Express Service with delivery within 24 hours for urgent needs.'
                ],
                [
                    'q' => 'Are your cleaning solutions safe for delicate fabrics?',
                    'a' => 'Absolutely. We use premium German cleaning solutions and eco-friendly detergents that are tough on stains but gentle on delicate fabrics like silk, wool, and luxury apparel.'
                ],
                [
                    'q' => 'Do you wash my clothes with other customers\' clothes?',
                    'a' => 'No. At Laundry Singh, we maintain strict hygiene standards. Every customer\'s laundry is processed in a separate cycle to ensure zero mixing and maximum hygiene.'
                ]
            ];
            @endphp

            @foreach($faqs as $index => $faq)
            <div class="border border-gray-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <button class="faq-btn w-full flex items-center justify-between p-6 text-left bg-white hover:bg-green-50/30 transition-colors group" 
                        data-target="faq-{{ $index }}">
                    <span class="text-lg font-bold text-zinc-800 group-hover:text-green-700 transition-colors pr-8">
                        {{ $faq['q'] }}
                    </span>
                    <div class="flex-shrink-0 w-8 h-8 rounded-full border-2 border-green-600 flex items-center justify-center text-green-600 group-hover:bg-green-600 group-hover:text-white transition-all">
                        <i class="fas fa-plus text-xs faq-icon"></i>
                    </div>
                </button>
                <div id="faq-{{ $index }}" class="faq-content hidden bg-green-50/20 px-6 pb-6">
                    <p class="text-gray-600 leading-relaxed font-medium">
                        {{ $faq['a'] }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
    @include('partials.cta')
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const faqButtons = document.querySelectorAll('.faq-btn');
        
        faqButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const content = document.getElementById(targetId);
                const icon = this.querySelector('.faq-icon');
                
                // Toggle current FAQ
                const isHidden = content.classList.contains('hidden');
                
                // Close all other FAQs first (Accordion effect)
                document.querySelectorAll('.faq-content').forEach(c => c.classList.add('hidden'));
                document.querySelectorAll('.faq-icon').forEach(i => {
                    i.classList.remove('fa-minus');
                    i.classList.add('fa-plus');
                });
                
                if (isHidden) {
                    content.classList.remove('hidden');
                    icon.classList.remove('fa-plus');
                    icon.classList.add('fa-minus');
                    this.classList.add('bg-green-50/50');
                } else {
                    content.classList.add('hidden');
                    icon.classList.remove('fa-minus');
                    icon.classList.add('fa-plus');
                    this.classList.remove('bg-green-50/50');
                }
            });
        });
    });
</script>
