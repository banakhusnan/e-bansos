<?php

namespace App\Http\Controllers;

use App\Models\DetailUser;
use App\Models\Registration;
use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;

class BantuanSosialController extends Controller
{
    public function informasiBantuan()
    {
        $dataUser = DetailUser::where('user_id', auth()->user()->id)->first();
        $registrationData = Registration::where('user_id', auth()->user()->id)->first();

        return view('public.informasi-bantuan', [
            'title' => 'Informasi Bantuan',
            'data' => $dataUser,
            'state' => $registrationData->bansos_state,
        ]);
    }

    public function pendaftaran()
    {
        $datailUser = DetailUser::where('user_id', auth()->user()->id)->first();
        $nameParts = explode(' ', auth()->user()->name);

        return view('public.pendaftaran', [
            'title' => 'Pendaftaran Bantuan Sosial',
            'data' => $datailUser,
            'name' => $nameParts,
        ]);
    }

    public function pendaftaranStore(Request $request)
    {
        $user = DetailUser::where('user_id', auth()->user()->id)
                ->whereNotNull(['nik' ,'address', 'date_of_birth', 'no_handphone', 'job'])->count();

        if($user === 0)
        {
            return redirect()->route('bansos.pendaftaran')->with('dangerToast', 'Data kamu belum lengkap, harap lengkapi terlebih dahulu');
        }

        Registration::where('user_id', auth()->user()->id)->update([
            'registration_state' => 1,
            'bansos_state' => 'process',
        ]);
        
        return redirect()->route('bansos.informasi-bantuan')->with('success', 'Berhasil mendaftar bantuan sosial, harap tunggu konfirmasi dari admin.');
    }
}
