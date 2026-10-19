<section id="home" class="relative">
    <div class="hero-carousel owl-carousel owl-theme">

        <!-- Banner 1 -->
        <div class="item relative w-full flex flex-col md:block bg-white overflow-hidden">
            <div class="w-full aspect-[16/7] sm:aspect-[16/8] md:aspect-[1600/600] relative overflow-hidden">
                <img src="{{ asset('images/LSbanner2.jpg') }}"
                     class="w-full h-full object-contain"
                     alt="Laundry Service">
            </div>

            <div class="relative md:absolute md:bottom-16 left-0 right-0 md:left-auto md:right-24 z-10 text-center md:text-right px-4 py-4 md:py-0">
                <button onclick="openPickupModal()" class="inline-block bg-green-700 hover:bg-green-600 text-white font-bold py-3 px-10 sm:py-3 sm:px-10 md:py-4 md:px-12 rounded-full transition duration-300 shadow-2xl text-sm sm:text-sm md:text-lg uppercase tracking-wider active:scale-95 transform text-center">
                    Book Now
                </button>
            </div>
        </div>

        <!-- Banner 2 -->
        <div class="item relative w-full flex flex-col md:block bg-white overflow-hidden">
            <div class="w-full aspect-[16/7] sm:aspect-[16/8] md:aspect-[1600/600] relative overflow-hidden">
                <img src="{{ asset('images/finalbanner2.jpg') }}"
                     class="w-full h-full object-contain"
                     alt="Laundry Service">
            </div>

            <div class="relative md:absolute md:bottom-8 left-0 right-0 md:left-auto md:right-24 z-10 text-center md:text-left px-4 py-4 md:py-0">
                <button onclick="openPickupModal()" class="inline-block bg-green-700 hover:bg-green-600 text-white font-bold py-3 px-10 sm:py-3 sm:px-10 md:py-4 md:px-12 rounded-full transition duration-300 shadow-2xl text-sm sm:text-sm md:text-lg uppercase tracking-wider active:scale-95 transform text-center">
                    Book Now
                </button>
            </div>
        </div>

        <!-- Banner 3 -->
        <div class="item relative w-full flex flex-col md:block bg-white overflow-hidden">
            <div class="w-full aspect-[16/7] sm:aspect-[16/8] md:aspect-[1600/600] relative overflow-hidden">
                <img src="{{ asset('images/finalbanner3.jpg') }}"
                     class="w-full h-full object-contain"
                     alt="Laundry Service">
            </div>

            <div class="relative md:absolute md:bottom-16 left-0 right-0 md:left-auto md:right-24 z-10 text-center md:text-right px-4 py-4 md:py-0">
                <button onclick="openPickupModal()" class="inline-block bg-green-700 hover:bg-green-600 text-white font-bold py-3 px-10 sm:py-3 sm:px-10 md:py-4 md:px-12 rounded-full transition duration-300 shadow-2xl text-sm sm:text-sm md:text-lg uppercase tracking-wider active:scale-95 transform text-center">
                    Book Now
                </button>
            </div>
        </div>

    </div>
    
</section>


<!-- Super Saver Family Package Section -->
<section class="family-package-section w-full bg-white overflow-hidden pt-8 pb-8 md:pt-12 md:pb-12">

    <!-- Heading -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center mb-5 md:mb-8">
        <p class="text-green-700 font-semibold tracking-[0.18em] uppercase text-xs sm:text-sm mb-2">
            Premium Laundry Care for Busy Families
        </p>

        <p class="mt-3 text-sm sm:text-base md:text-lg text-gray-600 max-w-2xl mx-auto">
            Premium laundry care with steam ironing, free pickup and delivery at special family package prices.
        </p>
    </div>

    <!-- Banner Image -->
    <div class="w-full aspect-[16/7] sm:aspect-[16/8] md:aspect-[1600/600] relative overflow-hidden">
        <img 
            src="{{ asset('images/LSbanner.jpg') }}" 
            class="w-full h-full object-contain"
            alt="Super Saver Family Package"
        >
    </div>

</section>



<script>
$(document).ready(function () {
    $(".hero-carousel").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 10000,
        nav: true,
        dots: false,
        autoHeight: true,
        navText: [
            "<i class='fa fa-chevron-left'></i>",
            "<i class='fa fa-chevron-right'></i>"
        ]
    });
});
</script>