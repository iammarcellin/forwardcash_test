<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_code',
        'country_name',
        'prefix',
        'send_from',
        'send_to',
        'transfer_fee',
        'display',
    ];

    protected $casts = [
        'send_from' => 'boolean',
        'send_to' => 'boolean',
        'display' => 'boolean',
        'transfer_fee' => 'decimal:2',
    ];

    public function currencies()
    {
        return $this->hasMany(Currency::class);
    }

    public function paymentMethodCountries()
    {
        return $this->hasMany(PaymentMethodCountry::class);
    }
}
