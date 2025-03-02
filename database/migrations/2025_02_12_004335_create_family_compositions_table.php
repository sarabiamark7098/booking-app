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
        Schema::create('family_compositions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beneficiary_id');
            $table->string('fullName');
            $table->tinyInteger('age');
            $table->unsignedBigInteger('relation_id');
            $table->string('family_occupation');
            $table->string('family_salary');
            $table->timestamps();

            $table->foreign('beneficiary_id')->references('id')->on('beneficiary_datas')->cascadeOnDelete('set null')->cascadeOnUpdate('cascade');
            $table->foreign('relation_id')->references('id')->on('relations')->cascadeOnDelete('set null')->cascadeOnUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_compositions');
    }
};
