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
        Schema::create('beneficiary_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->unsignedBigInteger('beneficiary_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('municipality_id')->nullable();
            $table->unsignedBigInteger('barangay_id')->nullable();
            $table->string('street')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->timestamps();

            $table->foreign('transaction_id')->references('id')->on('transactions')->cascadeOnDelete('set null')->cascadeOnUpdate('cascade');
            $table->foreign('beneficiary_id')->references('id')->on('beneficiary_datas')->cascadeOnDelete('set null')->cascadeOnUpdate('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->cascadeOnDelete('set null')->cascadeOnUpdate('cascade');
            $table->foreign('province_id')->references('id')->on('provinces')->cascadeOnDelete('set null')->cascadeOnUpdate('cascade');
            $table->foreign('municipality_id')->references('id')->on('municipalities')->cascadeOnDelete('set null')->cascadeOnUpdate('cascade');
            $table->foreign('barangay_id')->references('id')->on('barangays')->cascadeOnDelete('set null')->cascadeOnUpdate('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->cascadeOnDelete('set null')->cascadeOnUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiary_addresses');
    }
};
