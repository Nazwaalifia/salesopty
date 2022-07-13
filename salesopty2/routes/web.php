<?php

use App\Http\Controllers\API\IndexController;
use App\Http\Controllers\SalesViewController;
use App\Http\Controllers\DashboardViewController;
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

Route::get('/home', function(){
   return view('home');
});

Route::get('/index-sales',[SalesViewController::class,'index'])->name('index-sales');
Route::get('/inputsales',[SalesViewController::class,'create'])->name('inputsales');
Route::post('/simpan-data',[SalesViewController::class,'store'])->name('simpan-data');

Route::get('/home',[DashboardViewController::class,'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});
