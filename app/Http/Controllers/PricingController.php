<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class PricingController extends Controller
{
    /**
     * Display service list grouped by categories.
     */
    public function index()
    {
        $services = Service::orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get()
            ->groupBy('category');
            
        return view('admin.services.index', compact('services'));
    }

    /**
     * Store a new service/pricing.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'price' => 'required|string|max:50',
            'sort_order' => 'nullable|integer',
        ]);

        Service::create([
            'name' => $validated['name'],
            'category' => $validated['category'],
            'price' => $validated['price'],
            'is_active' => true,
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return back()->with('success', 'Service added successfully.');
    }

    /**
     * Update an existing service/price details.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:50',
            'is_active' => 'required|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $service->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'is_active' => $validated['is_active'],
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return back()->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the service.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return back()->with('success', 'Service removed successfully.');
    }
}
