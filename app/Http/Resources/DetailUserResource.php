<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $name = explode(' ', $this->users->name);

        return [
            'name' => $this->users->name,
            'role' => $this->users->getRoleNames()[0],
            'alamat' => $this->alamat,
            'namaAwal' => $name[0],
            'namaAkhir' => implode(' ' ,array_slice($name, 1, count($name))),
            'email' => $this->users->email,
            'alamat' => $this->alamat,
            'job' => $this->job,
            'nik' => $this->nik,
            'date_of_birth' => $this->date_of_birth,
            'no_handphone' => $this->no_handphone,
        ];
    }
}
