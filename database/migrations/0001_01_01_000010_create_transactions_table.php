<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('beneficiary_id')->constrained('beneficiaries')->cascadeOnDelete();
            $table->decimal('amount_sent', 18, 2);
            $table->decimal('amount_received', 18, 2);
            $table->foreignId('currency_id_from')->constrained('currencies')->cascadeOnDelete();
            $table->foreignId('currency_id_to')->constrained('currencies')->cascadeOnDelete();
            $table->foreignId('transaction_status_id')->constrained('transaction_statuses')->cascadeOnDelete();
            $table->boolean('is_received')->default(false);
            $table->foreignId('payment_method_country_id')->constrained('payment_method_countries')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
