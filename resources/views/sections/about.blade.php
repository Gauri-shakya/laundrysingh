<!-- Load Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- Custom styling to style Flatpickr popup to match the green theme -->
<style>
    .flatpickr-calendar {
        background: #ffffff !important;
        border: 1px solid #e5e7eb !important;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
        border-radius: 1.5rem !important;
        font-family: inherit !important;
    }
    .flatpickr-day.selected, .flatpickr-day.startRange, .flatpickr-day.endRange, .flatpickr-day.selected.inRange, .flatpickr-day.startRange.inRange, .flatpickr-day.endRange.inRange, .flatpickr-day.selected:focus, .flatpickr-day.startRange:focus, .flatpickr-day.endRange:focus, .flatpickr-day.selected:hover, .flatpickr-day.startRange:hover, .flatpickr-day.endRange:hover, .flatpickr-day.prevMonthDay.selected, .flatpickr-day.nextMonthDay.selected {
        background: #16a34a !important; /* green-600 */
        border-color: #16a34a !important;
        color: #ffffff !important;
    }
    .flatpickr-day.today {
        border-color: #16a34a !important;
    }
    .flatpickr-day.today:hover {
        background: #f0fdf4 !important;
        border-color: #16a34a !important;
        color: #16a34a !important;
    }
    .flatpickr-months .flatpickr-month {
        color: #1f2937 !important;
    }
    .flatpickr-current-month .numInputWrapper span.arrowUp:after {
        border-bottom-color: #1f2937 !important;
    }
    .flatpickr-current-month .numInputWrapper span.arrowDown:after {
        border-top-color: #1f2937 !important;
    }
    .flatpickr-months .flatpickr-prev-month, .flatpickr-months .flatpickr-next-month {
        color: #1f2937 !important;
        fill: #1f2937 !important;
    }
    .flatpickr-months .flatpickr-prev-month:hover, .flatpickr-months .flatpickr-next-month:hover {
        color: #16a34a !important;
    }
    .flatpickr-time input:focus {
        background: #f0fdf4 !important;
    }
</style>
<!-- Load Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<section id="about" class="py-24 bg-white relative overflow-hidden">
    <!-- Main Content Container with large horizontal gaps -->
    <div class="max-w-[1600px] mx-auto px-4 md:px-6 lg:px-8 relative z-10">

        <div class="text-center mb-16">
            <span class="text-green-600 font-bold uppercase tracking-[4px] text-sm">About Us</span>
            <h2 class="text-4xl md:text-5xl font-black text-zinc-900 mt-4 uppercase tracking-tight">Welcome To <span class="text-green-600">Laundry Singh</span></h2>
        </div>

            <!-- Professional About Us Section -->
        <div class="flex flex-col md:flex-row items-stretch overflow-hidden shadow-2xl rounded-[40px] bg-gradient-to-r from-slate-50 to-green-50 border border-green-100">
    
    <!-- Left: Image -->
    <div class="md:w-[45%] bg-white flex items-center justify-center">
        <img 
            src="{{ asset('images/about4.png') }}" 
            alt="About Laundry Singh" 
            class="w-full h-auto object-contain md:h-full md:object-cover"
        >
    </div>
    
    <!-- Right: Content -->
    <div class="md:w-[55%] p-4 md:p-12 lg:p-16 flex flex-col justify-center items-center text-center">

       <h3 class="text-xl md:text-xl lg:text-2xl font-bold mb-6"
    style="font-family: 'Poppins', sans-serif;">
    <span class="text-black">Delhi NCR's Trusted</span>
    <span class="text-green-600">Premium Laundry</span><br>
    <span class="text-black">& Dry Cleaning Service</span>
</h3>

        <p class="text-zinc-600 text-base md:text-lg leading-relaxed max-w-3xl mb-6"
            style="font-family: 'Poppins', sans-serif;">
            Laundry Singh provides premium laundry, dry cleaning, ironing, shoe cleaning, and home care services with convenient pickup and delivery. Using advanced cleaning technology and expert fabric care techniques, we ensure your garments remain fresh, clean, and well-maintained.
        </p>

        <!-- Highlights -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 w-full max-w-2xl">
            
            <div class="bg-white shadow-md rounded-2xl p-4 border border-green-100 flex items-center justify-center">
                <h4 class="font-semibold text-green-700 text-sm md:text-lg">
                    ✓ Global Standard Machines
                </h4>
            </div>

            <div class="bg-white shadow-md rounded-2xl p-4 border border-green-100 flex items-center justify-center">
                <h4 class="font-semibold text-green-700 text-sm md:text-lg">
                    ✓ German Cleaning Solutions
                </h4>
            </div>

            <div class="bg-white shadow-md rounded-2xl p-4 border border-green-100 flex items-center justify-center">
                <h4 class="font-semibold text-green-700 text-sm md:text-lg">
                    ✓ Express Service Available
                </h4>
            </div>

            <div class="bg-white shadow-md rounded-2xl p-4 border border-green-100 flex items-center justify-center">
                <h4 class="font-semibold text-green-700 text-sm md:text-lg">
                    ✓ Hygienic & Affordable
                </h4>
            </div>

        </div>

    </div>

</div>
 </div>



        <!-- NEW Delivery Services Section (Reference Image Inspired) -->
        <!-- <div class="mb-24 text-center">
            <h3 class="text-2xl md:text-3xl font-black text-green-700 mb-4 uppercase tracking-tight">
                Best Laundry & Dry Clean Service, Now With Free Home Delivery
            </h3>
            <div class="w-24 h-1 bg-green-600 mx-auto mb-8 rounded-full"></div>
            <p class="text-zinc-700 text-lg max-w-4xl mx-auto mb-16 font-semibold">
                LaundrySingh stores provide free home pickup and delivery at a time of your convenience. We also provide express delivery service.
            </p>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 md:gap-12 items-center bg-white p-6 md:p-12 rounded-[30px] md:rounded-[40px] shadow-xl border border-green-50"> -->
            <!-- Premium Laundry -->
            <!-- <div class="text-left space-y-4 md:space-y-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 md:w-14 md:h-14 bg-green-100 rounded-2xl flex items-center justify-center text-green-600 shadow-inner">
                        <i class="fas fa-tshirt text-xl md:text-2xl"></i>
                    </div>
                    <h4 class="text-lg md:text-xl font-black text-zinc-900 uppercase">Premium Laundry</h4>
                </div>
                <ul class="space-y-3 md:space-y-4 text-zinc-700 font-bold ml-2 md:ml-4 text-sm md:text-base">
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-green-500"></i> Global Standard Machines</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-green-500"></i> German Cleaning Solutions</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-green-500"></i> Anti-Bacterial Wash</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-green-500"></i> Premium Detergents</li>
                </ul>
            </div> -->

            <!-- Van Image -->
            <!-- <div class="flex justify-center group order-first lg:order-none mb-4 lg:mb-0">
                <img src="{{ asset('images/pickup.png') }}" alt="Laundry Delivery Van" class="w-full max-w-[280px] md:max-w-sm drop-shadow-[0_20px_50px_rgba(22,163,74,0.2)] group-hover:scale-105 transition-transform duration-500">
            </div> -->

            <!-- Dry Cleaning -->
            <!-- <div class="text-left space-y-4 md:space-y-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 md:w-14 md:h-14 bg-orange-100 rounded-2xl flex items-center justify-center text-orange-600 shadow-inner">
                        <i class="fas fa-star text-xl md:text-2xl"></i>
                    </div>
                    <h4 class="text-lg md:text-xl font-black text-zinc-900 uppercase">Dry Cleaning</h4>
                </div>
                <ul class="space-y-3 md:space-y-4 text-zinc-700 font-bold ml-2 md:ml-4 text-sm md:text-base">
                    <li class="flex items-center gap-3"><i class="fas fa-plus-circle text-orange-500"></i> Specialized Stain Removal</li>
                    <li class="flex items-center gap-3"><i class="fas fa-plus-circle text-orange-500"></i> Expert Fabric Care</li>
                    <li class="flex items-center gap-3"><i class="fas fa-plus-circle text-orange-500"></i> Delicate Material Handling</li>
                    <li class="flex items-center gap-3"><i class="fas fa-plus-circle text-orange-500"></i> Crisp Finish & Steam Iron</li>
                </ul>
            </div>
        </div>

            <p class="mt-16 text-zinc-600 text-base md:text-lg leading-relaxed max-w-5xl mx-auto font-medium border-t border-zinc-100 pt-10 px-4">
                From tactful packaging to sturdy storage compartments on delivery bikes and vans, even the smallest aspects of the delivery process are thoughtfully included. The entire process is systemized in a way that your clothes reach your doorstep with a perfectly clean, crisp and wrinkle-free finish.
            </p>
        -->

        <!-- Integrated Form Section (Preserved) -->
        <div class="max-w-4xl mx-auto mb-24 mt-8 bg-white p-8 md:p-12 rounded-[40px] shadow-4xl border-2 border-green-800">
            <div class="text-center mb-10">
                <h4 class="text-2xl font-black text-green-700 uppercase mb-2">Schedule Your Free Pickup</h4>
                <p class="text-zinc-600 font-bold">🎉 First Order Special – Premium Laundry at Just ₹99/Kg</p>
                

            </div>
            <form id="pickup-form-about" method="POST" action="{{ route('pickup.schedule') }}" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf
                <input type="text" name="name" value="" placeholder="Name*" required
                    class="w-full border-2 border-zinc-100 bg-zinc-50 rounded-xl px-5 py-4 text-zinc-900 font-bold focus:outline-none focus:border-green-600 focus:bg-white transition-all text-sm">
                
                <input type="tel" name="phone" value="" placeholder="Phone Number*" required
                    class="w-full border-2 border-zinc-100 bg-zinc-50 rounded-xl px-5 py-4 text-zinc-900 font-bold focus:outline-none focus:border-green-600 focus:bg-white transition-all text-sm">

                <input type="email" name="email" value="" placeholder="Email Address (Optional)"
                    class="w-full border-2 border-zinc-100 bg-zinc-50 rounded-xl px-5 py-4 text-zinc-900 font-bold focus:outline-none focus:border-green-600 focus:bg-white transition-all text-sm md:col-span-2">
                
                <input type="text" name="address" value="" placeholder="Address*" required
                    class="w-full border-2 border-zinc-100 bg-zinc-50 rounded-xl px-5 py-4 text-zinc-900 font-bold focus:outline-none focus:border-green-600 focus:bg-white transition-all text-sm md:col-span-2">
                
                <input type="text" name="pincode" value="" placeholder="Pin Code*" required
                    class="w-full border-2 border-zinc-100 bg-zinc-50 rounded-xl px-5 py-4 text-zinc-900 font-bold focus:outline-none focus:border-green-600 focus:bg-white transition-all text-sm">

                <div class="relative">
                    <input type="text" name="pickup_time" id="about_pickup_time" required readonly placeholder="Select Date & Time*"
                        class="w-full border-2 border-zinc-100 bg-zinc-50 rounded-xl px-5 py-4 text-zinc-900 font-bold focus:outline-none focus:border-green-600 focus:bg-white transition-all text-sm cursor-pointer">
                    <label for="about_pickup_time" class="absolute left-5 -top-2 px-1 bg-white text-[9px] font-bold text-green-600 uppercase tracking-wide">Pickup Date & Time*</label>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Select Services*</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach([
                            'Men’s Wear – Dry Cleaning',
                            'Women’s Wear – Dry Cleaning',
                            'Kid’s Wear – Dry Cleaning',
                            'Household & Blankets',
                            'Laundry Services',
                            'Shoes & Leather'
                        ] as $svc)
                        <label class="flex items-center gap-3 border-2 border-zinc-100 bg-zinc-50 rounded-xl p-3.5 cursor-pointer hover:border-green-600 hover:bg-white transition-all select-none">
                            <input type="checkbox" name="service[]" value="{{ $svc }}" class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500 cursor-pointer">
                            <span class="text-zinc-900 font-bold text-xs">{{ $svc }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <textarea name="special_instructions" placeholder="Special Instructions / Message (Optional)" rows="2"
                    class="w-full border-2 border-zinc-100 bg-zinc-50 rounded-xl px-5 py-4 text-zinc-900 font-bold focus:outline-none focus:border-green-600 focus:bg-white transition-all text-sm md:col-span-2"></textarea>
                
                <input type="hidden" name="payment_method" value="COD">
                
                <button type="submit" class="md:col-span-2 w-full bg-green-700 hover:bg-green-600 text-white font-black py-4 sm:py-5 px-6 sm:px-10 rounded-xl transition-all duration-300 shadow-lg shadow-green-200 uppercase tracking-widest text-sm sm:text-base">
                    Schedule Free Pickup Now
                </button>
                
            </form>
            <p class="mt-2 text-zinc-600 ">🚚 Free Pickup on Orders Above ₹350 • ₹100 Pickup Charge for Orders Below ₹350 (Up to 3 km from the Branch)</p>
        </div>

 

    @include('partials.cta')
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof flatpickr !== 'undefined') {
            flatpickr("#about_pickup_time", {
                enableTime: true,
                dateFormat: "Y-m-d h:i K",
                time_24hr: false,
                minDate: "today",
            });
        }

        const formAbout = document.getElementById('pickup-form-about');
        const isGuest = {{ Auth::check() ? 'false' : 'true' }};

        if (formAbout) {
            formAbout.addEventListener('submit', function(e) {
                e.preventDefault();
                const form = this;
                const btn = form.querySelector('button[type="submit"]');
                const originalText = btn.innerHTML;
                btn.disabled = true;
                btn.innerHTML = '<span>Processing...</span><i class="fas fa-spinner animate-spin ml-2"></i>';

                const formData = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    credentials: 'same-origin',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.status === 'success') {
                        if (data.redirect_url) {
                            window.location.href = data.redirect_url;
                            return;
                        }
                        // Clear form data
                        form.reset();
                        form.querySelectorAll('input').forEach(input => {
                            if (input.name !== '_token') input.value = '';
                        });
                        form.querySelectorAll('select').forEach(select => {
                            select.selectedIndex = 0;
                        });

                        const container = form.parentNode;
                        if (isGuest) {
                            container.innerHTML = `
                                <div class="text-center py-8">
                                    <div class="inline-flex items-center justify-center w-20 h-20 bg-green-50 rounded-full mb-6 text-green-600">
                                        <i class="fas fa-check-circle text-5xl"></i>
                                    </div>
                                    <h4 class="text-3xl font-black text-zinc-900 mb-2 uppercase tracking-tight">Booking Scheduled!</h4>
                                    <p class="text-base text-zinc-700 font-bold mb-8 px-4">
                                        ${data.message} <br>
                                        <span class="text-xs text-zinc-500 font-medium">To view your bookings and history, please Log In or Register.</span>
                                    </p>
                                    <div class="flex flex-col gap-3 items-center w-full px-6">
                                        <a href="/register" 
                                            class="bg-green-700 hover:bg-green-600 text-white font-black py-4 px-10 rounded-xl text-xs uppercase tracking-widest transition-all shadow-lg shadow-green-200 block text-center w-full max-w-xs">
                                            Register / Create Account
                                        </a>
                                        <a href="/login" 
                                            class="bg-blue-500 hover:bg-blue-600 text-white font-black py-4 px-10 rounded-xl text-xs uppercase tracking-widest transition-all shadow-lg shadow-blue-100 block text-center w-full max-w-xs">
                                            Log In
                                        </a>
                                        <button onclick="location.reload();" 
                                            class="text-zinc-400 hover:text-zinc-600 text-xs font-bold uppercase tracking-wider mt-2">
                                            Close Window
                                        </button>
                                    </div>
                                </div>
                            `;
                        } else {
                            container.innerHTML = `
                                <div class="text-center py-8">
                                    <div class="inline-flex items-center justify-center w-20 h-20 bg-green-50 rounded-full mb-6 text-green-600">
                                        <i class="fas fa-check-circle text-5xl"></i>
                                    </div>
                                    <h4 class="text-3xl font-black text-zinc-900 mb-2 uppercase tracking-tight">Thank You!</h4>
                                    <p class="text-base text-zinc-700 font-bold mb-8 px-4">
                                        ${data.message}
                                    </p>
                                    <div class="flex flex-col gap-3 items-center">
                                        <a href="/customer/orders" 
                                            class="bg-green-700 hover:bg-green-600 text-white font-black py-4 px-10 rounded-xl text-xs uppercase tracking-widest transition-all shadow-lg shadow-green-200 block text-center w-full max-w-xs">
                                            View My Bookings
                                        </a>
                                        <button onclick="location.reload();" 
                                            class="text-zinc-400 hover:text-zinc-600 text-xs font-bold uppercase tracking-wider mt-2">
                                            Done
                                        </button>
                                    </div>
                                </div>
                            `;
                        }
                    } else {
                        alert('Something went wrong. Please try again.');
                        btn.disabled = false;
                        btn.innerHTML = originalText;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                    btn.disabled = false;
                    btn.innerHTML = originalText;
                });
            });
        }
    });
</script>
