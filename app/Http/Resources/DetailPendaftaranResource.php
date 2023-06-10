<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailPendaftaranResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $name = explode(' ', $this->name);

        return [
            'alamat' => $this->detail_users->address,
            'namaAwal' => $name[0],
            'namaAkhir' => implode(' ' ,array_slice($name, 1, count($name))),
            'email' => $this->email,
            'job' => $this->detail_users->job,
            'nik' => $this->detail_users->nik,
            'date_of_birth' => $this->detail_users->date_of_birth,
            'no_handphone' => $this->detail_users->no_handphone,
        ];
    }
}
