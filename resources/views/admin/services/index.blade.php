@extends('layouts.admin')

@section('title', 'Manage Pricing & Services')
@section('page_title', 'Pricing & Services')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <!-- Left column: Add Service/Price -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 sticky top-28">
            <h4 class="font-bold text-md text-slate-800 uppercase tracking-tight mb-4 flex items-center gap-2">
                <i class="fas fa-plus-circle text-brand-red"></i>
                <span>Add Service / Price</span>
            </h4>
            
            <form action="{{ route('admin.services.store') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Service / Item Name*</label>
                    <input type="text" name="name" required placeholder="e.g. Kurta or Blanket S/D"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 font-semibold focus:outline-none focus:border-brand-red focus:ring-1 focus:ring-brand-red">
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Pricing Category*</label>
                    <select name="category" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 font-semibold focus:outline-none focus:border-brand-red focus:ring-1 focus:ring-brand-red cursor-pointer">
                        <option value="" disabled selected>Select Category*</option>
                        <option value="dry_cleaning_mens">Dry Cleaning - Men's</option>
                        <option value="dry_cleaning_womens">Dry Cleaning - Women's</option>
                        <option value="dry_cleaning_kids">Dry Cleaning - Kid's</option>
                        <option value="dry_cleaning_home">Dry Cleaning - Home</option>
                        <option value="dry_cleaning_shoes">Dry Cleaning - Shoes</option>
                        <option value="laundry_services">Laundry Services (Wash/Fold/Steam)</option>
                        <option value="steam_iron_mens">Steam Iron - Men's / General</option>
                        <option value="steam_iron_womens">Steam Iron - Women's</option>
                        <option value="steam_iron_kids">Steam Iron - Kid's</option>
                        <option value="special_saver_packages">Special Saver Packages</option>
                    </select>
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Price / Display Price*</label>
                    <input type="text" name="price" required placeholder="e.g. 130 or 275+ or 130/Kg"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 font-semibold focus:outline-none focus:border-brand-red focus:ring-1 focus:ring-brand-red">
                    <p class="text-[9px] text-slate-400 font-semibold mt-1.5 leading-relaxed">
                        <i class="fas fa-info-circle mr-1"></i> You can enter suffixes directly. E.g. <strong class="text-slate-500">"275+"</strong> for Coat, <strong class="text-slate-500">"130/Kg"</strong> for Wash, <strong class="text-slate-500">"300/375"</strong> for Blanket, or <strong class="text-slate-500">"Rs. 2000 | 10%"</strong> for Packages.
                    </p>
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Display Sort Order</label>
                    <input type="number" name="sort_order" placeholder="e.g. 1, 2, 3" value="0"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 font-semibold focus:outline-none focus:border-brand-red focus:ring-1 focus:ring-brand-red">
                </div>

                <button type="submit" class="w-full bg-brand-red hover:bg-brand-darkRed text-white font-bold py-3.5 px-4 rounded-xl text-xs uppercase tracking-wider transition-all flex items-center justify-center gap-1.5 shadow-md shadow-brand-red/20">
                    <i class="fas fa-plus"></i>
                    <span>Add Service Price</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Right column: Services Grouped list -->
    <div class="lg:col-span-2 space-y-8">
        
        @foreach($services as $categoryName => $items)
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 overflow-hidden">
            
            @php
                $catTitle = match($categoryName) {
                    'dry_cleaning_mens' => "Dry Cleaning - Men's",
                    'dry_cleaning_womens' => "Dry Cleaning - Women's",
                    'dry_cleaning_kids' => "Dry Cleaning - Kid's",
                    'dry_cleaning_home' => "Dry Cleaning - Home",
                    'dry_cleaning_shoes' => "Dry Cleaning - Shoes",
                    'laundry_services' => "Laundry Services",
                    'steam_iron_mens' => "Steam Iron - Men's / General",
                    'steam_iron_womens' => "Steam Iron - Women's",
                    'steam_iron_kids' => "Steam Iron - Kid's",
                    'special_saver_packages' => "Special Saver Packages",
                    default => ucfirst(str_replace('_', ' ', $categoryName))
                };
            @endphp
            <h4 class="font-bold text-sm text-slate-700 uppercase tracking-wider mb-4 border-b border-slate-100 pb-3">{{ $catTitle }}</h4>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-zinc-950 text-white font-bold uppercase tracking-wider">
                            <th class="py-3 px-4 w-[35%] rounded-l-2xl">Item Name</th>
                            <th class="py-3 px-4 w-[25%]">Display Price</th>
                            <th class="py-3 px-4 text-center w-[10%]">Sort Order</th>
                            <th class="py-3 px-4 text-center w-[10%]">Status</th>
                            <th class="py-3 px-4 text-center w-[20%] rounded-r-2xl">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-700 divide-y divide-slate-100 font-semibold">
                        @foreach($items as $service)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="py-3 px-4 font-bold text-slate-800">{{ $service->name }}</td>
                            <td class="py-3 px-4 text-brand-red font-black text-sm">Rs. {{ $service->price }}</td>
                            <td class="py-3 px-4 text-center text-slate-500 font-bold">{{ $service->sort_order }}</td>
                            <td class="py-3 px-4 text-center">
                                <span class="px-2 py-0.5 rounded-full text-[9px] font-black uppercase {{ $service->is_active ? 'bg-amber-50 text-amber-700 border border-amber-200' : 'bg-red-50 text-brand-red border border-red-100' }}">
                                    {{ $service->is_active ? 'Active' : 'Disabled' }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button onclick="openEditModal({{ json_encode($service) }})" class="bg-slate-50 hover:bg-slate-150 border border-slate-200 text-slate-600 font-bold px-2 py-1 rounded-lg transition-all">
                                        Edit
                                    </button>
                                    
                                    <form action="{{ route('admin.services.delete', $service->id) }}" method="POST" onsubmit="return confirm('Delete this pricing row?');" class="inline">
                                        @csrf
                                        <button type="submit" class="bg-red-50 hover:bg-red-100 border border-red-100 text-red-600 font-bold px-2 py-1 rounded-lg transition-all">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach

    </div>

</div>

<!-- Edit Service Modal -->
<div id="editServiceModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="closeEditModal()"></div>
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-[2.5rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-md border border-gray-100 p-8">
            <button onclick="closeEditModal()" class="absolute right-6 top-6 text-gray-400 hover:text-gray-600 transition-colors">
                <i class="fas fa-times text-lg"></i>
            </button>

            <h3 class="text-2xl font-black text-slate-800 uppercase tracking-tight mb-6" id="modal-title">
                Edit <span class="text-brand-red">Service / Price</span>
            </h3>

            <form id="editServiceForm" method="POST" action="" class="space-y-4">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Service / Item Name*</label>
                        <input type="text" id="edit_name" name="name" required
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 font-semibold focus:outline-none focus:border-brand-red focus:ring-1 focus:ring-brand-red">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Price Value / Display Price*</label>
                        <input type="text" id="edit_price" name="price" required
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 font-semibold focus:outline-none focus:border-brand-red focus:ring-1 focus:ring-brand-red">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Display Sort Order</label>
                        <input type="number" id="edit_sort_order" name="sort_order" placeholder="e.g. 1, 2, 3"
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 font-semibold focus:outline-none focus:border-brand-red focus:ring-1 focus:ring-brand-red">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-1">Display Status*</label>
                        <select id="edit_is_active" name="is_active" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-700 font-semibold focus:outline-none focus:border-brand-red focus:ring-1 focus:ring-brand-red cursor-pointer">
                            <option value="1">Active (Visible on Site)</option>
                            <option value="0">Disabled (Hidden on Site)</option>
                        </select>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-brand-red hover:bg-brand-darkRed text-white font-bold py-3.5 px-4 rounded-xl text-xs uppercase tracking-wider transition-all flex items-center justify-center gap-1.5 shadow-md shadow-brand-red/20">
                        <i class="fas fa-save"></i>
                        <span>Save Changes</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openEditModal(service) {
        const modal = document.getElementById('editServiceModal');
        const form = document.getElementById('editServiceForm');
        
        form.action = `/admin/services/${service.id}/update`;
        
        document.getElementById('edit_name').value = service.name;
        document.getElementById('edit_price').value = service.price;
        document.getElementById('edit_sort_order').value = service.sort_order || 0;
        document.getElementById('edit_is_active').value = service.is_active ? "1" : "0";
        
        modal.classList.remove('hidden');
    }

    function closeEditModal() {
        const modal = document.getElementById('editServiceModal');
        modal.classList.add('hidden');
    }
</script>
@endsection
