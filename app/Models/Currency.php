<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'currency_symbol',
        'currency_name',
        'country_id',
        'limit_transfer',
    ];

    protected $casts = [
        'limit_transfer' => 'decimal:2',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function exchangeRatesFrom()
    {
        return $this->hasMany(ExchangeRate::class, 'currency_id_from');
    }

    public function exchangeRatesTo()
    {
        return $this->hasMany(ExchangeRate::class, 'currency_id_to');
    }

    public function transactionsSent()
    {
        return $this->hasMany(Transaction::class, 'currency_id_from');
    }

    public function transactionsReceived()
    {
        return $this->hasMany(Transaction::class, 'currency_id_to');
    }
}
