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
        Schema::create('beneficiary_datas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('firstName')->nullable();
            $table->string('middleName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('extensionName')->nullable();
            $table->enum('sex', ['Male', 'Female'])->nullable();
            $table->enum('civilStatus', ['Single', 'Married', 'Common-law', 'Separated', 'Widow/Widowed'])->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->string('occupation')->nullable();
            $table->float('salary')->nullable();
            $table->string('contactNumber')->unique()->min(11)->max(11);
            $table->enum('status', ['Registered Online', 'Encoded Offline', 'Imported Data'])->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete('set null')->cascadeOnUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiary_datas');
    }
};
