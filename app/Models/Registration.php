<?php

namespace App\Models;

use App\Enums\BansosStateEnum;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registration extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'bansos_state' => BansosStateEnum::class
    ];
}
