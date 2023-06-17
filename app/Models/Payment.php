<?php

namespace App\Models;

use App\Enums\TypePaymentEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'type' => TypePaymentEnum::class,
    ];
}
