<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('country_code')->unique();
            $table->string('country_name');
            $table->string('prefix')->nullable();
            $table->boolean('send_from')->default(false);
            $table->boolean('send_to')->default(false);
            $table->decimal('transfer_fee', 15, 2)->default(0);
            $table->boolean('display')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
