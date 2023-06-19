<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\User;
use App\Models\DetailUser;
use App\Models\Registration;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $user = User::where('id', auth()->user()->id)->with('detail_users', 'registrations')->first();
        $nameParts = explode(' ', auth()->user()->name);

        return view('public.pendaftaran', [
            'title' => 'Pendaftaran Bantuan Sosial',
            'registration_state' => $user->registrations->registration_state,
            'data' => $user->detail_users,
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
            'registration_date' => Carbon::now(),
        ]);

        // Add user id in wallet
        Wallet::create([
            'user_id' => auth()->user()->id,
            'balance' => 0,
        ]);

        return redirect()->route('bansos.informasi-bantuan')->with('success', 'Berhasil mendaftar bantuan sosial, harap tunggu konfirmasi dari admin.');
    }
}
