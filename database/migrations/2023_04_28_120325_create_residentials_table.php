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
        Schema::create('residentials', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable();;
            $table->string('middlename')->nullable();;
            $table->string('lastname')->nullable();;
            $table->string('email')->unique();
            $table->string('aadhar_no')->unique();
            $table->string('old_property_id')->unique();
            $table->string('new_property_id')->unique();
            $table->string('mobile_no')->default(0);
            $table->string('address')->nullable();
            $table->string('created_by')->nullable();
            $table->string('modified_by')->nullable();
            $table->boolean('status')->default(0)->comment('0 = Active, 1 = Inactive');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residentials');
    }
};
