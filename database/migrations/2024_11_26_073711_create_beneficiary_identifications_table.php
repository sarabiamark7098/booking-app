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
        Schema::create('beneficiary_identifications', function (Blueprint $table) {
            $table->id("beneficiary_document_id");
            $table->unsignedBigInteger('beneficiary_id')->nullable();
            $table->enum("document_type", ['Identification Card', 'Facial Identification'])->nullable();
            $table->string('identification_document')->nullable();
            $table->timestamps();

            $table->foreign('beneficiary_document_id')->references('beneficiary_id')->on('beneficiary_datas')->cascadeOnDelete('set null')->cascadeOnUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiary_identifications');
    }
};
