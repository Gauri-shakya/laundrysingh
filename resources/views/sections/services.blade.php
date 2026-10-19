<section id="services" class="py-20 bg-gray-50 font-sans">
    <div class="container mx-auto px-4">
        <!-- Heading -->
        <div class="text-center mb-10 md:mb-14">
            <span class="text-green-600 font-bold uppercase tracking-[2px] md:tracking-[4px] text-xs md:text-sm">
                Our Services
            </span>
            <h2 class="text-3xl md:text-5xl font-black text-zinc-900 mt-4 uppercase leading-tight">
                Complete Care for <span class="text-green-600">You & Your</span> Belongings
            </h2>
            <p class="mt-4 text-gray-600 text-base md:text-lg max-w-3xl mx-auto leading-relaxed px-4">
                From everyday laundry to delicate fabrics, LaundrySingh provides premium laundry, dry cleaning, and home care solutions with free pickup and delivery.
            </p>
        </div>

        @php
        $services = [
            [
                'title' => 'Dry Cleaning',
                'icon' => asset('images/drycleaning.png'),
                'desc' => 'Professional cleaning for all types of garments.',
                'detail' => 'Our professional dry cleaning service uses advanced solvents to remove tough stains while preserving the fabric quality and color of your clothes.'
            ],
            [
                'title' => 'Luxury Apparel',
                'icon' => asset('images/luxury-apparel.png'),
                'desc' => 'Premium care for designer and luxury garments.',
                'detail' => 'We specialize in the expert dry cleaning of luxury apparel, ensuring your designer garments, couture pieces, and high-end fabrics receive the utmost care.'
            ],
            [
                'title' => 'Premium Laundry',
                'icon' => asset('images/premium.png'),
                'desc' => 'High-quality wash and care for your regular wear.',
                'detail' => 'Experience the best laundry care with our premium washing process, ensuring your everyday clothes stay fresh, soft, and vibrant.'
            ],
            [
                'title' => 'Woolen Cleaning',
                'icon' => asset('images/woolen.png'),
                'desc' => 'Safe cleaning for sweaters, jackets and woolens.',
                'detail' => 'Our specialized woolen cleaning process ensures your delicate wool garments maintain their shape, softness, and durability without any damage.'
            ],
            [
                'title' => 'Steam Iron',
                'icon' => asset('images/steam-iron.png'),
                'desc' => 'Special care for ironing clothes.',
                'detail' => 'Get perfectly pressed clothes with our premium steam ironing service. We use advanced steam technology to remove wrinkles and refresh fabrics.'
            ],
            [
                'title' => 'Bag Cleaning',
                'icon' => asset('images/bagcleaning.png'), // Reusing related asset as bag specific might not exist
                'desc' => 'Deep cleaning and restoration for your bags.',
                'detail' => 'We provide professional cleaning and restoration for designer handbags and backpacks, ensuring they remain in pristine condition.'
            ],
            [
                'title' => 'Soft Toy Cleaning',
                'icon' => asset('images/soft-toy.png'),
                'desc' => 'Safe cleaning for kids favourite toys.',
                'detail' => 'Our professional soft toy dry cleaning service ensures your child’s plush companions remain fresh, hygienic, and safe to cuddle.'
            ]
        ];
        @endphp

        <!-- Services Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            @foreach($services as $service)

            <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden hover:border-green-500 hover:shadow-xl transition-all duration-300 flex flex-col h-full group">

                <!-- Image -->
                <div class="w-full h-[220px] bg-gray-100 overflow-hidden">
                    <img
                        src="{{ $service['icon'] }}"
                        alt="{{ $service['title'] }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>

                <!-- Content -->
                <div class="p-5 text-center flex flex-col flex-grow">

                    <h3 class="text-xl font-semibold text-green-700 mb-3">
                        {{ $service['title'] }}
                    </h3>

                    <p class="text-gray-600 text-sm leading-relaxed mb-5 flex-grow">
                        {{ $service['desc'] }}
                    </p>

                    <button
                        onclick="openServiceModal('{{ $service['title'] }}','{{ $service['detail'] }}')"
                        class="mt-auto text-sm font-semibold text-green-600 hover:text-black transition duration-300">
                        Explore →
                    </button>

                </div>

            </div>

            @endforeach

        </div>

    </div>
    @include('partials.cta')

</section>

<!-- Modal -->
<div
id="serviceModal"
class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50 p-4">

    <div class="bg-white rounded-2xl max-w-xl w-full p-8 relative">

        <button
            onclick="closeServiceModal()"
            class="absolute top-4 right-5 text-3xl font-bold text-black">

            &times;

        </button>

        <h3
            id="modalTitle"
            class="text-3xl font-bold text-green-700 mb-4">
        </h3>

        <p
            id="modalContent"
            class="text-gray-600 leading-8">
        </p>

    </div>

</div>



<script>

function openServiceModal(title, detail)
{
    document.getElementById('modalTitle').innerText = title;
    document.getElementById('modalContent').innerText = detail;

    document
        .getElementById('serviceModal')
        .classList
        .remove('hidden');

    document
        .getElementById('serviceModal')
        .classList
        .add('flex');
}

function closeServiceModal()
{
    document
        .getElementById('serviceModal')
        .classList
        .add('hidden');

    document
        .getElementById('serviceModal')
        .classList
        .remove('flex');
}

window.onclick = function(event)
{
    const modal = document.getElementById('serviceModal');

    if(event.target === modal)
    {
        closeServiceModal();
    }
}

</script>

    </div>
    
</section>

