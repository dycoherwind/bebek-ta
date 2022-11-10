<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RajaOngkirController extends Controller
{
    public static function semuaProvinsi()
    {
        $client = new Client();
        $response = $client->request('GET' ,'https://api.rajaongkir.com/starter/province', [
            'headers' => [
                'key' => env('RAJAONGKIR_KEY'),
            ],
        ]);

        $province = json_decode($response->getbody())->rajaongkir->results;

        return $province;
    }

    public static function kotaProvinsi(Request $request)
    {
        $client = new Client();
        $response = $client->request('GET' ,'https://api.rajaongkir.com/starter/city', [
            'headers' => [
                'key' => env('RAJAONGKIR_KEY'),
            ],
            'query' => [
                'province' => $request->province,
            ],
        ]);

        $city = json_decode($response->getbody())->rajaongkir->results;

        return $city;
    }
}
