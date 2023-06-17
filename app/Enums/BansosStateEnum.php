<?php

namespace App\Enums;

enum BansosStateEnum:string {
    case Proses = 'process';
    case Gagal = 'fail';
    case Berhasil = 'success';
    case BelumTerdaftar = 'unregistered';
}
?>