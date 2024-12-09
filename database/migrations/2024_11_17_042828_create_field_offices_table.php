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
        Schema::create('field_offices', function (Blueprint $table) {
            $table->id("field_office_id");
            $table->string('office_name')->nullable();
            $table->string('office_description')->nullable();
            $table->string('office_acronym')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('field_offices');
    }
};
