<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletHistory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function wallets()
    {
        return $this->belongsTo(Wallet::class, 'wallet_id');
    }
}
