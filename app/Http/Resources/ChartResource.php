<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChartResource extends JsonResource
{
    public function __construct($statistic)
    {
        $this->statistic = $statistic;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $statisctics = $this->statistic->getData();

        return [
            'typePayment' => $statisctics->type,
            'amount' => $statisctics->amount,
            'totalSales' => $statisctics->totalSales,
            'totalPriceElectricity' => $statisctics->totalPriceElectricity,
            'totalPriceWater' => $statisctics->totalPriceWater,
            'totalPriceInternet' => $statisctics->totalPriceInternet,
        ];
    }
}
