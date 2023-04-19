<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("gamswitch")->group( function ()
{
    Route::get("balance-enquiry", function()
    {
        $url = "https://api.gamswitchgm.com/api/balance/gswlive";
        $key = env("GAMSWITCH_HASHKEY");
        $balance = "balance";
        $nonce = random_int(1000, 91919191);
        $timestamp = (new DateTime(null, new DateTimeZone('Africa/Accra')))->getTimestamp();
        $cardNumber = "5061829900001279";
        $signature = $key . $balance . $nonce . $timestamp . $cardNumber;
        $signature = hash("sha512", $signature);

        $response = \Illuminate\Support\Facades\Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Nonce' => $nonce,
            'Timestamp' => $timestamp,
            'Signature' => $signature
        ])->withToken(env("GAMSWITCH_ACCESS_TOKEN"))->post($url, [
            'Amount' => '0',
            'AccountType' => 'Current',
        ]);

        dd($response->json());
    });

    Route::get('airtime', function ()
    {
        $url = "https://api.gamswitchgm.com/api/airtime/gswlive";
        $amount = 5;
        $phone = "2202920233";
        $type = "africell";
        $key = env("GAMSWITCH_HASHKEY");
        $balance = "airtime";
        $nonce = random_int(10000, 91919191);
        $timestamp = (new DateTime(null, new DateTimeZone('Africa/Accra')))->getTimestamp();
        $cardNumber = env("GAMSWITCH_CARDNUMBER");
        $signature = $key . $balance . $type . $nonce . $timestamp . $phone;
        $signature = hash("sha512", $signature);

        $response = \Illuminate\Support\Facades\Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Nonce' => $nonce,
            'Timestamp' => $timestamp,
            'Signature' => $signature
        ])->withToken(env("GAMSWITCH_ACCESS_TOKEN"))->post($url, [
            'Type' => $type,
            "PhoneNumber" => $phone,
            "Amount" => $amount * 100,
        ]);

        dd($response->json(), $nonce);
    });
});

