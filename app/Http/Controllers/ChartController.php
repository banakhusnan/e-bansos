<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\Registration;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Resources\ChartResource;

class ChartController extends Controller
{
    public function showDashboard()
    {
        $donutChart = $this->donutChart();
        $areaChart = $this->areaChart();
        $totalUsers = $this->getUsers();
        $totalRegistered = $this->getRegistration();
        $totalTransaction = $this->getTransaction();

        return new ChartResource($donutChart, $areaChart, $totalUsers, $totalRegistered, $totalTransaction);
    }

    protected function areaChart()
    {
        $bansosFund = Registration::sum('bansos_fund');
        $approvedTotal = Registration::whereNotNull('approval_date')->count();

        $months = [
            'January', 'February', 'March', 'April',
            'May', 'June', 'July', 'August',
            'September', 'October', 'November', 'December'
        ];
        $monthlyTotals = [0];
        foreach ($months as $i => $month) {
            $monthlyTotals[$i+1] = Registration::whereMonth('approval_date', date('m', strtotime($month)))->count();
        }

        return response()->json([
            'monthlyTotals' => $monthlyTotals,
            'totalBansosFund' => $bansosFund,
            'approvedTotal' => $approvedTotal,
        ]);
    }

    protected function donutChart()
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

    protected function getUsers()
    {
        $role = Role::where('name', '<>', 'admin')->first();
        $user = User::role($role)->count();

        return $user;
    }

    protected function getRegistration()
    {
        return Registration::whereNotNull('registration_date')->count();
    }

    protected function getTransaction()
    {
        return Transaction::all()->count();
    }
}
