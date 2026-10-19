<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique(); // Unique Order ID, e.g. LS-10001
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->text('customer_address');
            $table->string('customer_pincode');
            $table->string('service_type'); // Initial service selected (e.g. Dry Cleaning)
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('delivery_boy_id')->nullable()->constrained('users')->onDelete('set null');
            
            // Workflow statuses:
            // 1. Pickup Requested, 2. Pickup Assigned, 3. Clothes Collected, 4. Sent for Processing, 
            // 5. Washing, 6. Drying, 7. Ironing, 8. Packing, 9. Out for Delivery, 10. Delivered
            $table->string('status')->default('Pickup Requested'); 
            
            $table->integer('number_of_clothes')->default(0);
            $table->decimal('total_amount', 10, 2)->default(0.00);
            $table->decimal('tax_amount', 10, 2)->default(0.00);
            $table->decimal('grand_total', 10, 2)->default(0.00);
            
            // Payment columns
            $table->string('payment_method')->default('COD'); // UPI, Online, COD
            $table->string('payment_status')->default('Pending'); // Pending, Paid, Failed, Refunded
            $table->string('razorpay_order_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->timestamp('payment_date')->nullable();
            
            $table->text('special_instructions')->nullable();
            $table->timestamp('pickup_date')->nullable();
            $table->timestamp('delivery_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
