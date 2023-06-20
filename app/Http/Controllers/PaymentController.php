<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\WalletHistory;
use App\Http\Requests\ListrikRequest;

class PaymentController extends Controller
{
    public function pembayaranListrik(ListrikRequest $request)
    {
        $validatedData = $request->validated();

        $payment = Payment::where('price', $validatedData['nominal'])->first();
        $wallet = Wallet::where('user_id', auth()->user()->id)->first();

        if($wallet->balance < $validatedData['nominal']){
            return redirect()->route('dashboard')->with('dangerToast', 'Saldo kamu kurang untuk melakukan pembelian');
        }

        Transaction::create([
            'wallet_id' => $wallet->id,
            'payment_id' => $payment->id,
            'type' => 'electricity',
            'customer_id' => $validatedData['no_pelanggan'],
            'amount' => 1,
            'price' => $validatedData['nominal'],
            'pay' => 25000,
            'payment_method' => 'ebansos',
            'change' => 0,
        ]);

        $wallet->update([
            'balance' => $wallet->balance - $validatedData['nominal'],
        ]);
        
        WalletHistory::create([
            'wallet_id' => $wallet->id,
            'amount' => 1,
            'balance_old' => $wallet->balance,
            'balance_new' => $wallet->balance - $validatedData['nominal'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Berhasil melakukan pembayaran listrik.');
    }
}
