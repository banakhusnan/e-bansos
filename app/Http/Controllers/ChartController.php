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
        $paymentType = Payment::groupBy('type')->select('type')->get()->toArray(); 
        foreach ($paymentType as $payment) {
            array_push($types, $payment['type']);
        }

        return response()->json($types);
    }
}
