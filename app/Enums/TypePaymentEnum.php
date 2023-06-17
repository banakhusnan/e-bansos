<?php

namespace App\Enums;

enum TypePaymentEnum : string 
{
    case Listrik = 'electricity';
    case Air = 'water';
    case Internet = 'internet';
}
?>