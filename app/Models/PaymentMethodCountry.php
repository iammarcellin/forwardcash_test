<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethodCountry extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_method_id',
        'country_id',
        'value',
        'display',
    ];

    protected $casts = [
        'value' => 'decimal:2',
        'display' => 'boolean',
    ];

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
