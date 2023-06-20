<?php 

namespace App\Helper;

use App\Models\User;
use App\Models\Wallet;
use App\Models\DetailUser;
use App\Models\Registration;
use Illuminate\Support\Facades\Hash;

class CreateUserHelper{
    public static function create($data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        DetailUser::create([
            'user_id' => $user->id,
        ]);

        Registration::create([
            'user_id' => $user->id,
            'bansos_state' => 'unregistered',
        ]);

        // Add user id in wallet
        Wallet::create([
            'user_id' => $user->id,
            'balance' => 0,
        ]);

        return $user;
    }
}
?>