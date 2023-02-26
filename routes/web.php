<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/weather', function () {
    $location  = 'London';

    $apiKey = 'd10c5a8c4583b01a4cfbcdf9fe4a81e5';

    $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$location}&appid={$apiKey}&units=metric");
    
    dump($response->json());

    return view('weather', [
        'currentWeather' => $response->json(),
    ]);
});
