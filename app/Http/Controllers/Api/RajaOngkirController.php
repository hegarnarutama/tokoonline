<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RajaOngkirController extends Controller
{
    public static function provinsi()
    {
        $client = new Client();
        $response = $client->request('GET' ,'https://api.rajaongkir.com/starter/province', [
            'headers' => [
                'key' => env('RAJAONGKIR_API_KEY'),
            ],
        ]);

        $province = json_decode($response->getbody())->rajaongkir->results;

        return $province;
    }

    public function kota(Request $request)
    {
        $client = new Client();
        $response = $client->request('GET' ,'https://api.rajaongkir.com/starter/city', [
            'headers' => [
                'key' => env('RAJAONGKIR_API_KEY'),
            ],
            'query' => [
                'province' => $request->provinsi,
            ],
        ]);

        $city = json_decode($response->getbody())->rajaongkir->results;

        return $city;
    }

    public function ongkir(Request $request)
    {
        $client = new Client();
        $response = $client->request('POST', 'https://api.rajaongkir.com/starter/cost', [
            'headers' => [
                'key' => env('RAJAONGKIR_API_KEY'),
            ],
            'form_params' => [
                'origin' => "501",
                'destination' => $request->tujuan,
                'weight' => $request->berat,
                'courier' => $request->kurir
            ],
        ]);

        $ongkir = json_decode($response->getbody())->rajaongkir->results[0]->costs[0]->cost[0]->value;

        return $ongkir;
    }
}
