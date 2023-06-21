<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Resources\DetailTransactionResource;

class TransactionAdminController extends Controller
{
    public function index()
    {
        $data = Transaction::with('users')->latest()->get();
        
        return view('admin.transaksi', [
            'title' => 'Transaksi',
            'data' => $data,
        ]);
    }

    public function getTransaction($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        return new DetailTransactionResource($transaction);
    }
}
