<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailTransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => User::where('id', $this->user_id)->pluck('name')[0],
            'customerId' => $this->customer_id,
            'type' => $this->type->name,
            'timeRelative' => $this->created_at->diffForHumans(),
            'amount' => $this->amount,
            'datePurchase' => $this->created_at->format('d M, Y'),
            'price' => $this->price,
            'change' => $this->change,
            'pay' => $this->pay,
            'paymentMethod' => $this->payment_method
        ];
    }
}
