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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('store_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('sale_type'); //unit, bulk, both
            $table->string('bulk_type')->nullable();
            $table->unsignedMediumInteger('qty_of_unit_available')->default(0);
            $table->unsignedMediumInteger('qty_of_unit_sold')->default(0);
            $table->unsignedMediumInteger('qty_per_bulk')->default(0);
            $table->unsignedMediumInteger('qty_of_bulk_available')->default(0);
            $table->unsignedMediumInteger('qty_of_bulk_sold')->default(0);
            $table->decimal('cost_price_per_unit')->default(0.00);
            $table->decimal('bid_price_per_unit')->default(0.00);
            $table->decimal('last_price_per_unit')->default(0.00);
            $table->decimal('cost_price_per_bulk')->default(0.00);
            $table->decimal('bid_price_per_bulk')->default(0.00);
            $table->decimal('last_price_per_bulk')->default(0.00);
            $table->decimal('amount_earned')->default(0.00);
            $table->decimal('profit_earned')->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
