<?php 

namespace App\Helper;

class PersetujuanPendaftaranHelper
{
    public static function response_json($status, $message, $data, $code){
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}
?>