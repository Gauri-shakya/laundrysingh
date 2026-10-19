<section id="testimonials" class="py-24 bg-[#EBF5EE] overflow-hidden relative">
    
    <div class="container mx-auto px-4 max-w-7xl relative z-10">
        
        <!-- Section Header -->
        <div class="text-center mb-20">
            <div class="flex items-center justify-center gap-4 mb-4">
                <div class="h-[2px] w-12 bg-green-600"></div>
                <span class="text-green-600 font-bold uppercase tracking-[4px] text-sm">Our Clients</span>
                <div class="h-[2px] w-12 bg-green-600"></div>
            </div>
           <h2 class="text-4xl md:text-5xl lg:text-6xl font-black text-[#1e293b] tracking-tight">
  Praise Us For <span class="text-green-600">Great Service</span>
</h2>
        </div>

        <!-- Carousel Outer Wrapper -->
        <div class="relative w-full px-4 lg:px-0">
            
            <!-- Navigation Buttons -->
            <button class="custom-final-prev absolute -left-2 lg:-left-16 top-1/2 -translate-y-1/2 w-12 h-12 border-2 border-[#f59e0b] text-[#f59e0b] hover:bg-[#f59e0b] hover:text-white rounded-full flex items-center justify-center transition-all duration-300 z-30 bg-white lg:bg-transparent">
                <i class="fas fa-arrow-left text-lg"></i>
            </button>
            <button class="custom-final-next absolute -right-2 lg:-right-16 top-1/2 -translate-y-1/2 w-12 h-12 border-2 border-[#f59e0b] text-[#f59e0b] hover:bg-[#f59e0b] hover:text-white rounded-full flex items-center justify-center transition-all duration-300 z-30 bg-white lg:bg-transparent">
                <i class="fas fa-arrow-right text-lg"></i>
            </button>

            <!-- Owl Carousel -->
            <div class="testimonials-modern-carousel owl-carousel owl-theme">
                @php
$testimonials = [
    [
        'name' => 'AbhinashABD',
        'text' => 'LaundrySingh provides excellent laundry service with great attention to detail. My clothes always come back fresh, neatly cleaned, perfectly ironed, and professionally packed. Highly recommended!'
    ],
    [
        'name' => 'Arjun',
        'text' => 'I had a very good experience with LaundrySingh. Their pickup and delivery service is always on time, and every garment is handled with proper care. The quality of cleaning is impressive.'
    ],
    [
        'name' => 'Sameer',
        'text' => 'LaundrySingh has become my trusted choice for dry cleaning. My clothes were cleaned perfectly and returned in excellent condition. The service is professional, reliable, and worth it.'
    ],
    [
        'name' => 'Akhil',
        'text' => 'The ironing and laundry quality is outstanding. Every cloth is neatly pressed, fresh, and properly packed. Their service saves a lot of time and gives premium results every time.'
    ],
    [
        'name' => 'Priya',
        'text' => 'Excellent service! They picked up my clothes on time and delivered them back perfectly cleaned and ironed. The packaging was neat, and the clothes smelled fresh and clean.'
    ],
    [
        'name' => 'Sneha',
        'text' => 'Fast delivery and premium laundry care. They handle every garment carefully and provide amazing cleaning results. I am very happy with their professional and convenient service.'
    ]
];
@endphp

                @foreach($testimonials as $t)
                <div class="item p-4">
                    <div class="bg-white border border-gray-200 hover:border-green-500 rounded-tl-[40px] rounded-br-[40px] rounded-tr-[10px] rounded-bl-[10px] p-8 shadow-lg hover:shadow-2xl transition-all duration-300 relative h-full flex flex-col min-h-[350px]">

    <!-- Quote Icon -->
    <div class="absolute top-6 right-6 opacity-20">
        <i class="fas fa-quote-right text-green-500 text-4xl"></i>
    </div>

    <!-- Content -->
    <div class="flex flex-col h-full">

        <h4 class="text-zinc-900 font-semibold text-xl mb-1">
            {{ $t['name'] }}
        </h4>

        <!-- Stars -->
        <div class="flex gap-1 mb-6">
            @for($i=0; $i<5; $i++)
                <i class="fas fa-star text-yellow-400 text-xs"></i>
            @endfor
        </div>

        <p class="text-gray-600 text-base leading-relaxed">
            {{ $t['text'] }}
        </p>

    </div>

</div>



                </div>
                @endforeach
            </div>
        </div>
    </div>
    
    @include('partials.cta')
</section>

<style>
    /* Remove manual flex overrides that might conflict with Owl Carousel */
    .testimonials-modern-carousel .item {
        width: 100%;
    }
    
    /* Dots Styling */
    .testimonials-modern-carousel .owl-dots {
        margin-top: 40px !important;
        text-align: center;
    }
    .testimonials-modern-carousel .owl-dot span {
        width: 8px !important;
        height: 8px !important;
        background: rgba(27, 86, 140, 0.2) !important;
        margin: 0 5px !important;
        transition: all 0.3s ease;
    }
    .testimonials-modern-carousel .owl-dot.active span {
        background: #1b568c !important;
        width: 24px !important;
    }
</style>

<script>
    $(document).ready(function(){
        var modernSlider = $(".testimonials-modern-carousel");
        
        modernSlider.owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            smartSpeed: 1000,
            responsive:{
                0:{ items: 1 },
                640:{ items: 1 },
                768:{ items: 2 },
                1024:{ items: 3 },
                1440:{ items: 4 }
            }
        });

        $(".custom-final-next").click(function(){
            modernSlider.trigger('next.owl.carousel');
        });
        $(".custom-final-prev").click(function(){
            modernSlider.trigger('prev.owl.carousel');
        });
    });
</script>
