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
        Schema::create('other_tax_details', function (Blueprint $table) {
            $table->id();
            $table->integer('resident_id')->nullable();
            $table->string('year', 100)->nullable();
            $table->decimal('Property_tax',18,8)->default(0);
            $table->decimal('consolidated_tax',18,8)->default(0);
            $table->decimal('urban_dev_tax',18,8)->default(0);
            $table->decimal('education_tax',18,8)->default(0);
            $table->decimal('service_tax',18,8)->default(0);
            $table->decimal('water_tax',18,8)->default(0);
            $table->decimal('garbage_tax',18,8)->default(0);
            $table->decimal('rebate',18,8)->default(0);
            $table->decimal('surcharge_fee',18,8)->default(0);
            $table->decimal('advance_deposit',18,8)->default(0);
            $table->decimal('total',18,8)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_tax_details');
    }
};
