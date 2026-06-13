<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'beneficiary_id',
        'amount_sent',
        'amount_received',
        'currency_id_from',
        'currency_id_to',
        'transaction_status_id',
        'is_received',
        'payment_method_country_id',
    ];

    protected $casts = [
        'amount_sent' => 'decimal:2',
        'amount_received' => 'decimal:2',
        'is_received' => 'boolean',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class, 'beneficiary_id');
    }

    public function currencyFrom()
    {
        return $this->belongsTo(Currency::class, 'currency_id_from');
    }

    public function currencyTo()
    {
        return $this->belongsTo(Currency::class, 'currency_id_to');
    }

    public function transactionStatus()
    {
        return $this->belongsTo(TransactionStatus::class);
    }

    public function paymentMethodCountry()
    {
        return $this->belongsTo(PaymentMethodCountry::class);
    }
}
