<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public static function config($harga, $user)
    {     
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'Mid-server-gy7heC4iDoJy79NpC2yD-NLO';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = TRUE;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = false;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = false;

        $user = json_decode($user);
        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $harga,
            ),
            'customer_details' => array(
                'first_name' => $user->nama,
                'email' => $user->email,
                'phone' => $user->phone,
            ),
        );
        
       return $snapToken = \Midtrans\Snap::getSnapToken($params);
    }
}
