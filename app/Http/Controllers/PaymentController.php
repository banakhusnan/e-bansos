<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\WalletHistory;
use App\Http\Requests\AirRequest;
use App\Http\Requests\ListrikRequest;

class PaymentController extends Controller
{
    public function pembayaranListrik(ListrikRequest $request)
    {
        $validatedData = $request->validated();

        $payment = Payment::where('price', $validatedData['nominalListrik'])->first();
        $wallet = Wallet::where('user_id', auth()->user()->id)->first();

        if($wallet->balance < $validatedData['nominalListrik']){
            return redirect()->route('dashboard')->with('dangerToast', 'Saldo kamu kurang untuk melakukan pembelian');
        }

        Transaction::create([
            'user_id' => auth()->user()->id,
            'payment_id' => $payment->id,
            'type' => 'electricity',
            'customer_id' => $validatedData['no_pelanggan'],
            'amount' => 1,
            'price' => $validatedData['nominalListrik'],
            'pay' => $wallet->balance,
            'payment_method' => 'ebansos',
            'change' => $wallet->balance - $validatedData['nominalListrik'],
        ]);

        $wallet->update([
            'balance' => $wallet->balance - $validatedData['nominalListrik'],
        ]);
        
        WalletHistory::create([
            'wallet_id' => $wallet->id,
            'amount' => 1,
            'balance_old' => $wallet->balance,
            'balance_new' => $wallet->balance - $validatedData['nominalListrik'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Berhasil melakukan pembayaran listrik.');
    }

    public function pembayaranAir(AirRequest $request)
    {
        $validatedData = $request->validated();

        $payment = Payment::where('price', $validatedData['nominalWater'])->first();
        $wallet = Wallet::where('user_id', auth()->user()->id)->first();

        if($wallet->balance < $validatedData['nominalWater']){
            return redirect()->route('dashboard')->with('dangerToast', 'Saldo kamu kurang untuk melakukan pembelian');
        }

        Transaction::create([
            'user_id' => auth()->user()->id,
            'payment_id' => $payment->id,
            'type' => 'water',
            'customer_id' => $validatedData['no_pelanggan'],
            'amount' => 1,
            'price' => $validatedData['nominalWater'],
            'pay' => $wallet->balance,
            'payment_method' => 'ebansos',
            'change' => $wallet->balance - $validatedData['nominalWater'],
        ]);

        $wallet->update([
            'balance' => $wallet->balance - $validatedData['nominalWater'],
        ]);
        
        WalletHistory::create([
            'wallet_id' => $wallet->id,
            'amount' => 1,
            'balance_old' => $wallet->balance,
            'balance_new' => $wallet->balance - $validatedData['nominalWater'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Berhasil melakukan pembayaran listrik.');
    }
}
