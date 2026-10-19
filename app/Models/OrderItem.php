<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'item_name',
        'quantity',
        'size',
        'service_selected',
        'price_per_item',
        'total_item_price',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'price_per_item' => 'decimal:2',
        'total_item_price' => 'decimal:2',
    ];

    /**
     * Relationship: The order this item belongs to.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
