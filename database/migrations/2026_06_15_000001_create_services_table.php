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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category'); // e.g., dry_cleaning_mens, dry_cleaning_womens, dry_cleaning_home, dry_cleaning_shoes, laundry_services, steam_iron_services, special_saver_packages
            $table->string('price'); // e.g., "130", "275+", "300/375", "10%", "130/Kg"
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
