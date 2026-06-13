<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname');
            $table->string('lastname');
            $table->unsignedBigInteger('language_id')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->string('customer_id')->unique();
            $table->unsignedBigInteger('user_status_id')->nullable();
            $table->string('pseudo')->nullable();
            $table->string('phone')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->date('date_of_birth')->nullable();

            $table->dropColumn('name');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['language_id']);
            $table->dropForeign(['role_id']);
            $table->dropForeign(['user_status_id']);
            $table->dropColumn([
                'firstname',
                'lastname',
                'language_id',
                'role_id',
                'customer_id',
                'user_status_id',
                'pseudo',
                'phone',
                'address_1',
                'address_2',
                'city',
                'postcode',
                'date_of_birth',
            ]);

            $table->string('name');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
        });
    }
};
