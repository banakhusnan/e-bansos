<?php

namespace App\Http\Controllers;

use App\Models\DetailUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\DetailUserResource;

class KelolaPenggunaController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('admin.kelola-pengguna', [
            'title' => 'Kelola Pengguna',
            'users' => $users,
        ]);
    }

    // Get Pengguna to pass in ajax
    public function getPengguna($id)
    {
        $user = DetailUser::with('users')->where('user_id', $id)->first();

        return new DetailUserResource($user);
    }
}
