@php
    use App\Models\Service;
    
    // Fetch all active services ordered by sort_order
    $allServices = Service::where('is_active', true)->orderBy('sort_order', 'asc')->orderBy('id', 'asc')->get();

    // Group items for Men's Wear (dry_cleaning_mens and steam_iron_mens)
    $mensDC = $allServices->where('category', 'dry_cleaning_mens');
    $mensSI = $allServices->where('category', 'steam_iron_mens');
    
    $mensWear = [];
    foreach ($mensDC as $item) {
        $siItem = $mensSI->first(fn($x) => strtolower(trim($x->name)) === strtolower(trim($item->name)));
        $mensWear[] = [
            'name' => $item->name,
            'dc' => $item->price,
            'si' => $siItem ? $siItem->price : '-'
        ];
    }
    // Handle steam iron items not in dry cleaning
    foreach ($mensSI as $item) {
        $exists = false;
        foreach ($mensWear as $mw) {
            if (strtolower(trim($mw['name'])) === strtolower(trim($item->name))) {
                $exists = true;
                break;
            }
        }
        if (!$exists) {
            $mensWear[] = [
                'name' => $item->name,
                'dc' => '-',
                'si' => $item->price
            ];
        }
    }

    // Group items for Women's Wear (dry_cleaning_womens and steam_iron_womens)
    $womensDC = $allServices->where('category', 'dry_cleaning_womens');
    $womensSI = $allServices->where('category', 'steam_iron_womens');
    
    $womensWear = [];
    foreach ($womensDC as $item) {
        $siItem = $womensSI->first(fn($x) => strtolower(trim($x->name)) === strtolower(trim($item->name)));
        $womensWear[] = [
            'name' => $item->name,
            'dc' => $item->price,
            'si' => $siItem ? $siItem->price : '-'
        ];
    }
    foreach ($womensSI as $item) {
        $exists = false;
        foreach ($womensWear as $ww) {
            if (strtolower(trim($ww['name'])) === strtolower(trim($item->name))) {
                $exists = true;
                break;
            }
        }
        if (!$exists) {
            $womensWear[] = [
                'name' => $item->name,
                'dc' => '-',
                'si' => $item->price
            ];
        }
    }

    // Group items for Kids Wear (dry_cleaning_kids and steam_iron_kids)
    $kidsDC = $allServices->where('category', 'dry_cleaning_kids');
    $kidsSI = $allServices->where('category', 'steam_iron_kids');
    
    $kidsWear = [];
    foreach ($kidsDC as $item) {
        $siItem = $kidsSI->first(fn($x) => strtolower(trim($x->name)) === strtolower(trim($item->name)));
        $kidsWear[] = [
            'name' => $item->name,
            'dc' => $item->price,
            'si' => $siItem ? $siItem->price : '-'
        ];
    }
    foreach ($kidsSI as $item) {
        $exists = false;
        foreach ($kidsWear as $kw) {
            if (strtolower(trim($kw['name'])) === strtolower(trim($item->name))) {
                $exists = true;
                break;
            }
        }
        if (!$exists) {
            $kidsWear[] = [
                'name' => $item->name,
                'dc' => '-',
                'si' => $item->price
            ];
        }
    }

    // Household & Blankets (dry_cleaning_home)
    $household = [];
    foreach ($allServices->where('category', 'dry_cleaning_home') as $item) {
        $household[] = [
            'name' => $item->name,
            'price' => $item->price
        ];
    }

    // Laundry Services (laundry_services)
    $laundryServices = [];
    foreach ($allServices->where('category', 'laundry_services') as $item) {
        $laundryServices[] = [
            'name' => $item->name,
            'price' => $item->price
        ];
    }

    // Shoes & Leather (dry_cleaning_shoes)
    $shoesAndLeather = [];
    foreach ($allServices->where('category', 'dry_cleaning_shoes') as $item) {
        $shoesAndLeather[] = [
            'name' => $item->name,
            'price' => $item->price
        ];
    }
@endphp

<section id="pricing" class="py-24 bg-gradient-to-br from-[#EAF2ED] to-[#F5FAF7] font-sans overflow-hidden">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-20">
           <h2 class="text-3xl md:text-5xl font-black text-zinc-900 mt-3 uppercase tracking-tight font-poppins">
  Affordable <span class="text-green-600">Dry Cleaning & Laundry</span> Prices
</h2>
            <p class="mt-4 text-zinc-900 text-sm md:text-base max-w-2xl mx-auto leading-relaxed">
                Simple, transparent pricing with no hidden charges. Premium quality care for all your garments.
            </p>
        </div>

        <!-- Compact Responsive Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-16 mt-8">
            
            <!-- CARD 1: Men's Services -->
            <div class="relative bg-gradient-to-br from-[#E2F1FC] via-[#F1F7FC] to-[#E2F1FC] rounded-[2rem] pt-14 pb-6 px-4 md:px-6 shadow-md border border-[#D9E6EF] flex flex-col justify-between transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <!-- Circular Category Image Badge -->
                <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-md border-2 border-white overflow-hidden">
                    <img src="{{ asset('images/drycleaning.png') }}" class="w-full h-full object-cover" alt="Men's Wear">
                </div>
                
                <!-- Card Table -->
                <div class="w-full bg-transparent rounded-2xl shadow-sm border border-[#E3EDF5] overflow-hidden">
                    <table class="w-full text-left border-collapse table-fixed">
                        <thead>
                            <tr class="bg-[#7F649B] text-white text-xs md:text-[13px] font-semibold uppercase tracking-wider font-poppins">
                                <th class="py-3 px-4 w-[50%]">Men's Wear</th>
                                <th class="py-3 px-2 text-center w-[25%] text-[10px] md:text-[11px]">Dry Clean</th>
                                <th class="py-3 px-4 text-right w-[25%] text-[10px] md:text-[11px]">Steam Iron</th>
                            </tr>
                        </thead>
                        <tbody class="text-[13px] md:text-[14px] text-black font-medium font-poppins">
                            @foreach($mensWear as $index => $item)
                            <tr class="border-b border-transparent {{ $loop->iteration % 2 == 0 ? 'bg-white' : 'bg-transparent' }}">
                                <td class="py-3 px-4 font-semibold text-black">{{ $item['name'] }}</td>
                                <td class="py-3 px-2 text-center font-bold text-black">{{ $item['dc'] }}</td>
                                <td class="py-3 px-4 text-right font-bold text-black">{{ $item['si'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- CARD 2: Women's Services -->
            <div class="relative bg-gradient-to-br from-[#E2F1FC] via-[#F1F7FC] to-[#E2F1FC] rounded-[2rem] pt-14 pb-6 px-4 md:px-6 shadow-md border border-[#D9E6EF] flex flex-col justify-between transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <!-- Circular Category Image Badge -->
                <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-md border-2 border-white overflow-hidden">
                    <img src="{{ asset('images/laundry-girl.png') }}" class="w-full h-full object-cover" alt="Women's Wear">
                </div>
                
                <!-- Card Table -->
                <div class="w-full bg-transparent rounded-2xl shadow-sm border border-[#E3EDF5] overflow-hidden">
                    <table class="w-full text-left border-collapse table-fixed">
                        <thead>
                            <tr class="bg-[#7F649B] text-white text-xs md:text-[13px] font-semibold uppercase tracking-wider font-poppins">
                                <th class="py-3 px-4 w-[50%]">Women's Wear</th>
                                <th class="py-3 px-2 text-center w-[25%] text-[10px] md:text-[11px]">Dry Clean</th>
                                <th class="py-3 px-4 text-right w-[25%] text-[10px] md:text-[11px]">Steam Iron</th>
                            </tr>
                        </thead>
                        <tbody class="text-[13px] md:text-[14px] text-black font-medium font-poppins">
                            @foreach($womensWear as $index => $item)
                            <tr class="border-b border-transparent {{ $loop->iteration % 2 == 0 ? 'bg-white' : 'bg-transparent' }}">
                                <td class="py-3 px-4 font-semibold text-black">{{ $item['name'] }}</td>
                                <td class="py-3 px-2 text-center font-bold text-black">{{ $item['dc'] }}</td>
                                <td class="py-3 px-4 text-right font-bold text-black">{{ $item['si'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- CARD 3: Kid's Wear -->
            <div class="relative bg-gradient-to-br from-[#E2F1FC] via-[#F1F7FC] to-[#E2F1FC] rounded-[2rem] pt-14 pb-6 px-4 md:px-6 shadow-md border border-[#D9E6EF] flex flex-col justify-between transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <!-- Circular Category Image Badge -->
                <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-md border-2 border-white overflow-hidden">
                    <img src="{{ asset('images/soft-toy.png') }}" class="w-full h-full object-cover" alt="Kid's Wear">
                </div>
                
                <!-- Card Table -->
                <div class="w-full bg-transparent rounded-2xl shadow-sm border border-[#E3EDF5] overflow-hidden">
                    <table class="w-full text-left border-collapse table-fixed">
                        <thead>
                            <tr class="bg-[#7F649B] text-white text-xs md:text-[13px] font-semibold uppercase tracking-wider font-poppins">
                                <th class="py-3 px-4 w-[50%]">Kid's Wear</th>
                                <th class="py-3 px-2 text-center w-[25%] text-[10px] md:text-[11px]">Dry Clean</th>
                                <th class="py-3 px-4 text-right w-[25%] text-[10px] md:text-[11px]">Steam Iron</th>
                            </tr>
                        </thead>
                        <tbody class="text-[13px] md:text-[14px] text-black font-medium font-poppins">
                            @foreach($kidsWear as $index => $item)
                            <tr class="border-b border-transparent {{ $loop->iteration % 2 == 0 ? 'bg-white' : 'bg-transparent' }}">
                                <td class="py-3 px-4 font-semibold text-black">{{ $item['name'] }}</td>
                                <td class="py-3 px-2 text-center font-bold text-black">{{ $item['dc'] }}</td>
                                <td class="py-3 px-4 text-right font-bold text-black">{{ $item['si'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- CARD 4: Household & Blankets -->
            <div class="relative bg-gradient-to-br from-[#E2F1FC] via-[#F1F7FC] to-[#E2F1FC] rounded-[2rem] pt-14 pb-6 px-4 md:px-6 shadow-md border border-[#D9E6EF] flex flex-col justify-between transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <!-- Circular Category Image Badge -->
                <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-md border-2 border-white overflow-hidden">
                    <img src="{{ asset('images/curtain.png') }}" class="w-full h-full object-cover" alt="Household Items">
                </div>
                
                <!-- Card Table -->
                <div class="w-full bg-transparent rounded-2xl shadow-sm border border-[#E3EDF5] overflow-hidden">
                    <table class="w-full text-left border-collapse table-fixed">
                        <thead>
                            <tr class="bg-[#7F649B] text-white text-xs md:text-[13px] font-semibold uppercase tracking-wider font-poppins">
                                <th class="py-3 px-4 w-[65%]">Household & Blankets</th>
                                <th class="py-3 px-4 text-right w-[35%] text-[10px] md:text-[11px]">Price (Rs)</th>
                            </tr>
                        </thead>
                        <tbody class="text-[13px] md:text-[14px] text-black font-medium font-poppins">
                            @foreach($household as $index => $service)
                            <tr class="border-b border-transparent {{ $loop->iteration % 2 == 0 ? 'bg-white' : 'bg-transparent' }}">
                                <td class="py-3 px-4 font-semibold text-black">{{ $service['name'] }}</td>
                                <td class="py-3 px-4 text-right font-bold text-black">{{ $service['price'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- CARD 5: Laundry Services -->
            <div class="relative bg-gradient-to-br from-[#E2F1FC] via-[#F1F7FC] to-[#E2F1FC] rounded-[2rem] pt-14 pb-6 px-4 md:px-6 shadow-md border border-[#D9E6EF] flex flex-col justify-between transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <!-- Circular Category Image Badge -->
                <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-md border-2 border-white overflow-hidden">
                    <img src="{{ asset('images/wash-cycle.png') }}" class="w-full h-full object-cover" alt="Laundry Services">
                </div>
                
                <!-- Card Table -->
                <div class="w-full bg-transparent rounded-2xl shadow-sm border border-[#E3EDF5] overflow-hidden">
                    <table class="w-full text-left border-collapse table-fixed">
                        <thead>
                            <tr class="bg-[#7F649B] text-white text-xs md:text-[13px] font-semibold uppercase tracking-wider font-poppins">
                                <th class="py-3 px-4 w-[65%]">Laundry Services</th>
                                <th class="py-3 px-4 text-right w-[35%] text-[10px] md:text-[11px]">Price</th>
                            </tr>
                        </thead>
                        <tbody class="text-[13px] md:text-[14px] text-black font-medium font-poppins">
                            @foreach($laundryServices as $index => $service)
                            <tr class="border-b border-transparent {{ $loop->iteration % 2 == 0 ? 'bg-white' : 'bg-transparent' }}">
                                <td class="py-3 px-4 font-semibold text-black">{{ $service['name'] }}</td>
                                <td class="py-3 px-4 text-right font-bold text-black">{{ $service['price'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- CARD 6: Shoes & Leather -->
            <div class="relative bg-gradient-to-br from-[#E2F1FC] via-[#F1F7FC] to-[#E2F1FC] rounded-[2rem] pt-14 pb-6 px-4 md:px-6 shadow-md border border-[#D9E6EF] flex flex-col justify-between transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <!-- Circular Category Image Badge -->
                <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-md border-2 border-white overflow-hidden">
                    <img src="{{ asset('images/shoes.png') }}" class="w-full h-full object-cover" alt="Shoes & Leather">
                </div>
                
                <!-- Card Table -->
                <div class="w-full bg-transparent rounded-2xl shadow-sm border border-[#E3EDF5] overflow-hidden">
                    <table class="w-full text-left border-collapse table-fixed">
                        <thead>
                            <tr class="bg-[#7F649B] text-white text-xs md:text-[13px] font-semibold uppercase tracking-wider font-poppins">
                                <th class="py-3 px-4 w-[65%]">Shoes & Leather</th>
                                <th class="py-3 px-4 text-right w-[35%] text-[10px] md:text-[11px]">Price (Rs)</th>
                            </tr>
                        </thead>
                        <tbody class="text-[13px] md:text-[14px] text-black font-medium font-poppins">
                            @foreach($shoesAndLeather as $index => $service)
                            <tr class="border-b border-transparent {{ $loop->iteration % 2 == 0 ? 'bg-white' : 'bg-transparent' }}">
                                <td class="py-3 px-4 font-semibold text-black">{{ $service['name'] }}</td>
                                <td class="py-3 px-4 text-right font-bold text-black">{{ $service['price'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        {{-- Special Saver Packages Row (Centered)
        <div class="flex justify-center mt-16">
            <div class="relative bg-gradient-to-br from-[#E2F1FC] via-[#F1F7FC] to-[#E2F1FC] rounded-[2rem] pt-14 pb-6 px-4 md:px-6 shadow-md border border-[#D9E6EF] max-w-lg w-full transition-all duration-300 hover:shadow-xl">
                <!-- Circular Category Image Badge -->
                <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-md border-2 border-white overflow-hidden">
                    <img src="{{ asset('images/premium.png') }}" class="w-full h-full object-cover" alt="Saver Packages">
                </div>
                
                <!-- Card Table -->
                <div class="w-full bg-transparent rounded-2xl shadow-sm border border-[#E3EDF5] overflow-hidden">
                    <table class="w-full text-left border-collapse table-fixed">
                        <thead>
                            <tr class="bg-[#7F649B] text-white text-xs md:text-[13px] font-semibold uppercase tracking-wider font-poppins">
                                <th class="py-3 px-4 w-[40%]">Packages</th>
                                <th class="py-3 px-2 text-center w-[35%] text-[10px] md:text-[11px]">Recharge</th>
                                <th class="py-3 px-4 text-right w-[25%] text-[10px] md:text-[11px]">Discount</th>
                            </tr>
                        </thead>
                        <tbody class="text-[13px] md:text-[14px] text-black font-medium font-poppins">
                            @foreach($packages as $index => $package)
                            <tr class="border-b border-transparent {{ $loop->iteration % 2 == 0 ? 'bg-white' : 'bg-transparent' }}">
                                <td class="py-3 px-4 font-semibold text-black">{{ $package['name'] }}</td>
                                <td class="py-3 px-2 text-center font-bold text-black">{{ $package['cost'] }}</td>
                                <td class="py-3 px-4 text-right font-bold text-black">{{ $package['discount'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Small Saver Info -->
                <div class="text-center mt-3 text-[11px] text-black font-semibold italic">
                    Recharge in advance for flat discounts. No expiry date!
                </div>
            </div>
        </div>
        --}}

        <!-- Call To Action Section -->
        <div class="mt-16 text-center">
            @include('partials.cta')
        </div>
    </div>
</section>

