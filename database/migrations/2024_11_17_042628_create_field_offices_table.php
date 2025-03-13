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
            $table->id();
            $table->string('office_name');
            $table->string('office_description')->nullable();
            $table->string('office_acronym')->unique();
            $table->foreignId('parent_id')->nullable()->constrained('field_offices')->onDelete('cascade'); // Self-referencing FK
            $table->foreignId('province_id')->nullable()->constrained('provinces')->onDelete('set null');
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
