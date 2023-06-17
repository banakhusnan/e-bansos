<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function statistics()
    {
        // take payment type
        $types = [];
        $paymentType = Payment::groupBy('type')->pluck('type')->toArray(); 
        foreach ($paymentType as $payment) {
            array_push($types, $payment->name);
        }

        return response()->json($types);
    }
}
