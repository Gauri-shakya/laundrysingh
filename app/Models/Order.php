<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'customer_name',
        'customer_phone',
        'customer_email',
        'customer_address',
        'customer_pincode',
        'service_type',
        'user_id',
        'delivery_boy_id',
        'status',
        'number_of_clothes',
        'total_amount',
        'tax_amount',
        'grand_total',
        'special_instructions',
        'pickup_date',
        'delivery_date',
        'payment_method',
        'payment_status',
        'razorpay_order_id',
        'transaction_id',
        'payment_date',
    ];

    protected $casts = [
        'pickup_date' => 'datetime',
        'delivery_date' => 'datetime',
        'payment_date' => 'datetime',
        'total_amount' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'grand_total' => 'decimal:2',
        'number_of_clothes' => 'integer',
    ];

    /**
     * Relationship: The delivery boy assigned to this order.
     */
    public function deliveryBoy()
    {
        return $this->belongsTo(User::class, 'delivery_boy_id');
    }

    /**
     * Relationship: The collected clothing items.
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Relationship: The customer user who placed this order.
     */
    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relationship: The user who owns this order.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
