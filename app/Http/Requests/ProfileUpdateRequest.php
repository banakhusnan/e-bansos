<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => ['string', 'max:255'],
            'lastName' => ['string', 'max:255'],
            'email' => ['email', 'max:255'],
            'no_handphone' => ['numeric', 'min:10'],
            'date_of_birth' => ['date'],
            'address' => ['string'],
            'nik' => ['required', 'min:16','max:16'],
            'job' => ['required']
        ];
    }
}
