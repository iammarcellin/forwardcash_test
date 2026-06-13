<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display',
    ];

    protected $casts = [
        'display' => 'boolean',
    ];

    public function paymentMethodCountries()
    {
        return $this->hasMany(PaymentMethodCountry::class);
    }
}
