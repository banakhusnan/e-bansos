<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Resources\ChartResource;

class ChartController extends Controller
{
    public function showDashboard()
    {
        $statistics = $this->statistics();

        return new ChartResource($statistics);
    }

    protected function statistics()
    {
        $transaction = Transaction::all();

        // Total Data per-type
        $amounts[] = $this->getData($transaction, 'amount', 'sum', 'electricity');
        $amounts[] = $this->getData($transaction, 'amount', 'sum', 'water');
        $amounts[] = $this->getData($transaction, 'amount', 'sum', 'internet');
        $totalSales = $this->getData($transaction, 'user_id', 'pluck');

        // Payment Type
        $paymentsType = Transaction::groupBy('type')->pluck('type');

        // Total Price
        $totalPriceElectricity = $this->getData($transaction, 'price', 'sum', 'electricity');
        $totalPriceWater = $this->getData($transaction, 'price', 'sum', 'water');
        $totalPriceInternet = $this->getData($transaction, 'price', 'sum', 'internet');

        return response()->json([
            'type' => $paymentsType,
            'amount' => $amounts,
            'totalSales' => $totalSales,
            'totalPriceElectricity' => $totalPriceElectricity,
            'totalPriceWater' => $totalPriceWater,
            'totalPriceInternet' => $totalPriceInternet,
        ]);
    }

    protected function getData($data, $col, $act = null, $type = null)
    {
        // Jika aksi adalah sum (+)
        if (!empty($act) && $act === 'sum') {
            $filteredTransactions = $data->filter(function ($item) use($type) {
                return $item->type->value === $type;
            });

            // Jika kolom (amount)
            if($col === 'amount'){
                return $filteredTransactions->sum($col);
            } 
            // Jika kolom (price)
            elseif ($col === 'price') {
                return $filteredTransactions->sum($col);
            }
        }

        // Jika aksi (pluck) atau mengambil salah satu kolom
        if (!empty($act) && $act === 'pluck') {
            // Kolom user_id
            if ($col === 'user_id') {
                // Hitung kolom user
                // Hitung kolom user
                return count($data->pluck($col)->countBy()->toArray());
            }
        }
    }
}
