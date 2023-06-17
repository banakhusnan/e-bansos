<?php

namespace App\Enums;

enum TpyePaymentEnum:string {
    case Listrik = 'electricity';
    case Air = 'water';
    case Internet = 'internet';
}
?>