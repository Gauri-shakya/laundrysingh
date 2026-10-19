<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Download or view order invoice.
     */
    public function download(Order $order)
    {
        $order->load('items', 'deliveryBoy');

        if (class_exists(\Barryvdh\DomPDF\Facade\Pdf::class)) {
            try {
                $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('invoices.pdf', compact('order'));
                return $pdf->download('invoice-' . $order->order_id . '.pdf');
            } catch (\Exception $e) {
                // Fall back if dompdf rendering fails
            }
        }

        // Fallback to printable screen
        return view('invoices.printable', compact('order'));
    }
}
