<?php

namespace App\Models;

use App\Enums\TypePaymentEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'type' => TypePaymentEnum::class
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payments()
    {
        return $this->belongsTo(Payment::class);
    }
}
