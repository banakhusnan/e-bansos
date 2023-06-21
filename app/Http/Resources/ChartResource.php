<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChartResource extends JsonResource
{
    public function __construct($donutChart, $areaChart, $totalUsers, $totalRegistered, $totalTransaction)
    {
        $this->donutChart = $donutChart;
        $this->areaChart = $areaChart;
        $this->totalUsers = $totalUsers;
        $this->totalRegistered = $totalRegistered;
        $this->totalTransaction = $totalTransaction;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $donut = $this->donutChart->getData();
        $area = $this->areaChart->getData();

        return [
            'donut' => [
                'typePayment' => $donut->type,
                'amount' => $donut->amount,
                'totalSales' => $donut->totalSales,
                'totalPriceElectricity' => $donut->totalPriceElectricity,
                'totalPriceWater' => $donut->totalPriceWater,
                'totalPriceInternet' => $donut->totalPriceInternet,
            ],

            'area' => [
                'monthlyTotals' => $area->monthlyTotals,
                'totalBansosFund' => $area->totalBansosFund,
                'approvedTotal' => $area->approvedTotal,
            ],
            'totalUsers' => $this->totalUsers,
            'totalRegistered' => $this->totalRegistered,
            'totalTransaction' => $this->totalTransaction,
        ];
    }
}
