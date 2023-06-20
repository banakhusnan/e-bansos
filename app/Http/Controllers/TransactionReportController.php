<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Resources\DetailTransactionResource;

class TransactionReportController extends Controller
{
    public function index()
    {
        $data = Transaction::latest()->where('user_id', auth()->user()->id)->get();

        return view('public.laporan-transaksi', [
            'title' => 'Laporan Transaksi',
            'data' => $data
        ]);
    }

    public function getDataTransaction($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        return new DetailTransactionResource($transaction);
    }
}
