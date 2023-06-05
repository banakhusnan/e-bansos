<?php 

namespace App\Helper;

use App\Models\User;
use App\Models\DetailUser;

class UpdateUserHelper {
    public static function update($query)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $user->update([
            'name' => $query['name'], 
            'email' => $query['email'],
        ]);

        DetailUser::where('user_id', $user->id)->update([
            'no_handphone' => $query['no_handphone'],
            'date_of_birth' => $query['date_of_birth'],
            'address' => $query['address'],
            'nik' => $query['nik'],
            'job' => $query['job'],
        ]);
    }
}
?>