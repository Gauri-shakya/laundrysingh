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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->string('item_name'); // e.g. Shirt, Jeans, Blanket S
            $table->integer('quantity')->default(1);
            $table->string('size')->nullable(); // e.g., Single, Double, L, M, or empty
            $table->string('service_selected'); // e.g. Dry Cleaning, Wash & Fold, Steam Iron
            $table->decimal('price_per_item', 10, 2)->default(0.00);
            $table->decimal('total_item_price', 10, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
