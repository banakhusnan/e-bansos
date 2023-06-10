<?php 

namespace App\Helper;

use App\Models\User;
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
        ]);

        return $user;
    }
}
?>