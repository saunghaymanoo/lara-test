<?php

use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/about',function(){
    return view('about');
})->name('about');
Route::get('/contact',function(){
    return view('contact');
})->name('contact');
Route::get('/products',function(){
    $products = Http::get('https://fakestoreapi.com/products')->object();
    return $products[5];
});
Route::get("/products/price-max/{amount}",function($amount){
    $products = Http::get('https://fakestoreapi.com/products')->object();
    return collect($products)->where("price","<",$amount);
});
Route::get("/products/price-between/{min}/and/{max}",function($min,$max){
    $products = Http::get('https://fakestoreapi.com/products')->object();
    return collect($products)->whereBetween("price",[$min,$max]);
});
Route::get("/products/price-in/{num1}/and/{num2}",fn($num1,$num2)=>collect(Http::get('https://fakestoreapi.com/products')->object())->whereIn("price",[$num1,$num2]));
Route::get("/exchange-from/{amount}/{fromCurrency}/to/mmk",function($amount,$fromCurrency){
    $rates = Http::get('http://forex.cbm.gov.mm/api/latest')->object()->rates;
    $rateToFloat = str_replace(",","",$rates->{strtoupper($fromCurrency)});
    return $rateToFloat*$amount;
});
Route::post("/exchange-to-mmk",[TestController::class,'exchangeFromMMK'])->name('exchange-to-mmk');
Route::view("/exchange","exchange")->name('exchange');
Route::post("/exchange-rate",[ExchangeController::class,'exchange']);
