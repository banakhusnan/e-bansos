<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Http\Resources\DetailPendaftaranResource;

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
}
