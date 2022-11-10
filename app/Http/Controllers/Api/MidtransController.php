<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public static function config($pesanan_id, $harga, $user)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $user = json_decode($user);
        
        $params = array(
            'transaction_details' => array(
                'order_id' => $pesanan_id,
                'gross_amount' => $harga,
            ),
            'customer_details' => array(
                'first_name' => $user->nama,
                'email' => $user->email,
                'phone' => $user->hp,
            ),
        );
        
        return $snapToken = \Midtrans\Snap::getSnapToken($params);
    }

    public function handler(Request $request)
    {
        # code...
    }
}
