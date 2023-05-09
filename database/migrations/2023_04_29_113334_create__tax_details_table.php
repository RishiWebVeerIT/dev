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
        Schema::create('tax_details', function (Blueprint $table) {
            $table->id();
            $table->integer('resident_id')->nullable();
            $table->string('plot_area', 100)->nullable();
            $table->string('property_type', 100)->nullable();
            $table->string('uses_factor', 100)->nullable();
            $table->string('floor', 100)->nullable();
            $table->string('construction_type', 100)->nullable();
            $table->string('constructed_area', 100)->nullable();
            $table->decimal('rate',18,8)->default(0);
            $table->decimal('value',18,8)->default(0);
            $table->decimal('dicount',18,8)->default(0);
            $table->decimal('taxable_property',18,8)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_details');
    }
};
