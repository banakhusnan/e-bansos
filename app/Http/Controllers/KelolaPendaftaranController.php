<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\WalletHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Helper\PersetujuanPendaftaranHelper;
use App\Http\Resources\DetailPendaftaranResource;
use App\Http\Controllers\KelolaPendaftaranController;

class KelolaPendaftaranController extends Controller
{
    public function index()
    {
        $users = User::role('public')->with(['registrations', 'detail_users'])->latest()->get();

        return view('admin.kelola-pendaftaran', [
            'title' => "Data Pendaftaran",
            'users' => $users,
        ]);
    }

    public function getPendaftaran($id)
    {
        $data = User::role('public')->where('id', $id)->with(['registrations', 'detail_users'])->first();
        return new DetailPendaftaranResource($data);
    }

    public function persetujuanPendaftaran(Request $request)
    {
        try{
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'status' => 'required|in:success,fail'
            ]);
    
            if ($validator->fails()) {
                return PersetujuanPendaftaranHelper::response_json(false, 'Data yang kamu masukan salah', $validator->errors(), 401);
            }

            $validated = $validator->validated();

            // Update registration
            Registration::where('user_id', $request->id)->update([
                'bansos_state' => $validated['status'],
                'approval_date' => \Carbon\Carbon::now(),
            ]);

            // Add balance in wallet
            $wallet = Wallet::where('user_id', $request->id)->first();

            // Add Wallet History
            $balanceNew = $wallet->balance + 600000;
            WalletHistory::create([
                'wallet_id' => $wallet->id,
                'amount' => 1,
                'balance_old' => $wallet->balance,
                'balance_new' => $balanceNew,
            ]);

            $wallet->update(['balance' => 600000]);

            DB::commit();
            return PersetujuanPendaftaranHelper::response_json(false, 'Berhasil Menyetujui', route('pendaftaran-admin.index'), 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::debug($e->getMessage());
            return PersetujuanPendaftaranHelper::response_json(false, 'Ada Masalah', $e->getMessage(), 500);
        }
    }
}
