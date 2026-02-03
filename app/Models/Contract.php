<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'user_id', 'car_id', 'contract_number', 'cccd', 'phone',
        'buyer_address', 'store_address', 'deposit_amount',
<<<<<<< HEAD
        'deposit_image', 'status', 'signed_at',
        'inspection_date', 'handover_date'
=======
        'deposit_image', 'status', 'signed_at'
>>>>>>> ae3eca91d202169d17a06e35ad479d823d1102e2
    ];

    protected $casts = [
        'signed_at' => 'datetime',
        'deposit_amount' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
