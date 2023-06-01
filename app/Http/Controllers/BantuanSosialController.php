<?php

namespace App\Http\Controllers;

use App\Models\DetailUser;
use Illuminate\Http\Request;

class BantuanSosialController extends Controller
{
    public function informasiBantuan()
    {
        $dataUser = DetailUser::where('user_id', auth()->user()->id)->first();

        return view('public.informasi-bantuan', [
            'title' => 'Informasi Bantuan',
            'data' => $dataUser,
        ]);
    }

    public function pendaftaran()
    {
        $datalUser = DetailUser::where('user_id', auth()->user()->id)->first();
        $nameParts = explode(' ', auth()->user()->name);

        return view('public.pendaftaran', [
            'title' => 'Pendaftaran Bantuan Sosial',
            'data' => $datalUser,
            'name' => $nameParts,
        ]);
    }
}
