<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Http\Resources\GetSaldoResource;

class PublicController extends Controller
{
    public function index()
    {
        return view('public.dashboard', [
            'title' => 'Dashboard',
        ]);
    }

    public function getSaldo()
    {
        $wallet = Wallet::where('user_id', auth()->user()->id)->first();
        return new GetSaldoResource($wallet);
    }
}
