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

<!-- Pickup Modal -->
<div id="pickupModal" class="fixed inset-0 z-[100] hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black/70 backdrop-blur-sm transition-opacity" onclick="closePickupModal()"></div>

    <div class="flex min-h-screen items-center justify-center p-4 sm:p-6">
        <div class="relative transform overflow-hidden rounded-[2.5rem] sm:rounded-[3rem] bg-white text-left shadow-2xl transition-all w-full max-w-lg border border-gray-100 flex flex-col max-h-[90vh]">
            <!-- Close Button -->
            <button onclick="closePickupModal()" class="absolute right-6 top-6 text-gray-400 hover:text-gray-600 transition-colors z-20 p-2 hover:bg-gray-100 rounded-full">
                <i class="fas fa-times text-xl"></i>
            </button>

            <!-- Modal Header -->
            <div class="bg-white px-6 pt-10 pb-4 sm:p-10 sm:pb-6 border-b border-gray-50 shrink-0">
                <div class="text-center">
                    <div class="inline-flex items-center justify-center w-12 h-12 sm:w-16 sm:h-16 bg-green-50 rounded-2xl mb-3 sm:mb-4">
                        <i class="fas fa-calendar-check text-xl sm:text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-black text-gray-900 uppercase tracking-tight leading-none" id="modal-title">
                        Schedule <span class="text-green-600">Pickup</span>
                    </h3>
                    <p class="mt-2 text-[10px] sm:text-sm text-gray-500 font-medium italic">
                        Book your laundry service in just a few clicks!
                    </p>
                </div>
            </div>

            <!-- Modal Body (Scrollable) -->
            <div class="overflow-y-auto p-6 sm:p-8 custom-scrollbar grow" id="modal-body-container">
                <form id="pickup-form-modal" method="POST" action="{{ route('pickup.schedule') }}" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @csrf
                    <input type="text" name="name" value="" placeholder="Name*" required
                        class="w-full border-2 border-zinc-100 bg-zinc-50 rounded-xl px-5 py-4 text-zinc-900 font-bold focus:outline-none focus:border-green-600 focus:bg-white transition-all text-sm">
                    
                    <input type="tel" name="phone" value="" placeholder="Phone Number*" required
                        class="w-full border-2 border-zinc-100 bg-zinc-50 rounded-xl px-5 py-4 text-zinc-900 font-bold focus:outline-none focus:border-green-600 focus:bg-white transition-all text-sm">

                    <input type="email" name="email" value="" placeholder="Email Address (Optional)"
                        class="w-full border-2 border-zinc-100 bg-zinc-50 rounded-xl px-5 py-4 text-zinc-900 font-bold focus:outline-none focus:border-green-600 focus:bg-white transition-all text-sm sm:col-span-2">
                    
                    <input type="text" name="address" value="" placeholder="Address*" required
                        class="w-full border-2 border-zinc-100 bg-zinc-50 rounded-xl px-5 py-4 text-zinc-900 font-bold focus:outline-none focus:border-green-600 focus:bg-white transition-all text-sm sm:col-span-2">
                    
                    <input type="text" name="pincode" value="" placeholder="Pin Code*" required
                        class="w-full border-2 border-zinc-100 bg-zinc-50 rounded-xl px-5 py-4 text-zinc-900 font-bold focus:outline-none focus:border-green-600 focus:bg-white transition-all text-sm">

                    <div class="relative">
                        <input type="text" name="pickup_time" id="pickup_time" required readonly placeholder="Select Date & Time*"
                            class="w-full border-2 border-zinc-100 bg-zinc-50 rounded-xl px-5 py-4 text-zinc-900 font-bold focus:outline-none focus:border-green-600 focus:bg-white transition-all text-sm cursor-pointer">
                        <label for="pickup_time" class="absolute left-5 -top-2 px-1 bg-white text-[9px] font-bold text-green-600 uppercase tracking-wide">Pickup Date & Time*</label>
                    </div>

                    <div class="sm:col-span-2">
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
                        class="w-full border-2 border-zinc-100 bg-zinc-50 rounded-xl px-5 py-4 text-zinc-900 font-bold focus:outline-none focus:border-green-600 focus:bg-white transition-all text-sm sm:col-span-2"></textarea>
                    
                    <div class="pt-4 pb-2 sm:col-span-2">
                        <button type="submit" class="group relative w-full bg-green-700 hover:bg-green-600 text-white font-black py-4 sm:py-5 px-6 sm:px-10 rounded-xl transition-all duration-300 shadow-xl shadow-green-200 uppercase tracking-widest text-sm sm:text-base flex items-center justify-center gap-3 active:scale-95">
                            <span>Book Now</span>
                            <i class="fas fa-arrow-right transition-transform group-hover:translate-x-1"></i>
                        </button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f9fafb;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #e5e7eb;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #d1d5db;
    }
</style>

<script>
    const isGuest = {{ Auth::check() ? 'false' : 'true' }};
    let originalModalBodyHTML = '';
    let modalSubmitted = false;

    function openPickupModal() {
        const modal = document.getElementById('pickupModal');
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closePickupModal() {
        const modal = document.getElementById('pickupModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
        
        if (modalSubmitted) {
            const bodyContainer = document.getElementById('modal-body-container');
            if (bodyContainer && originalModalBodyHTML) {
                bodyContainer.innerHTML = originalModalBodyHTML;
                bindModalFormEvents();
            }
            modalSubmitted = false;
        }
    }

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closePickupModal();
    });

    function bindModalFormEvents() {
        if (typeof flatpickr !== 'undefined') {
            flatpickr("#pickup_time", {
                enableTime: true,
                dateFormat: "Y-m-d h:i K",
                time_24hr: false,
                minDate: "today",
            });
        }
        const formModal = document.getElementById('pickup-form-modal');
        if (formModal) {
            formModal.addEventListener('submit', function(e) {
                e.preventDefault();
                const form = this;
                const btn = form.querySelector('button[type="submit"]');
                const originalText = btn.innerHTML;
                btn.disabled = true;
                btn.innerHTML = '<span>Processing...</span><i class="fas fa-spinner animate-spin"></i>';

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
                        modalSubmitted = true;
                        
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
                                        <button onclick="closePickupModal(); location.reload();" 
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
                                        <button onclick="closePickupModal(); location.reload();" 
                                            class="text-zinc-400 hover:text-zinc-600 text-xs font-bold uppercase tracking-wider mt-2">
                                            Close Window
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
                    alert('An error occurred. Please make sure database migrations are run and try again.');
                    btn.disabled = false;
                    btn.innerHTML = originalText;
                });
            });
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const bodyContainer = document.getElementById('modal-body-container');
        if (bodyContainer) {
            originalModalBodyHTML = bodyContainer.innerHTML;
        }
        bindModalFormEvents();
    });
</script>
