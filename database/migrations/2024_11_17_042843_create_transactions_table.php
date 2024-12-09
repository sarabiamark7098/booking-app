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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id("transaction_id");
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('beneficiary_id')->nullable();
            $table->unsignedBigInteger('relation_id')->nullable();
            $table->enum('status_client', ['Pending', 'For Interview', 'Serving', 'Served', 'Declined'])->default('Pending')->nullable();
            $table->datetime('date_scheduled')->nullable();
            $table->datetime('date_accomplished')->nullable();
            $table->timestamps();

            $table->foreign('client_id')
                ->references('beneficiary_id')
                ->on('beneficiary_datas')
                ->cascadeOnDelete('set null')
                ->cascadeOnUpdate('cascade');

            $table->foreign('beneficiary_id')
                ->references('beneficiary_id')
                ->on('beneficiary_datas')
                ->cascadeOnDelete('set null')
                ->cascadeOnUpdate('cascade');

            $table->foreign('relation_id')
                ->references('relation_id')
                ->on('relations')
                ->cascadeOnDelete('set null')
                ->cascadeOnUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
