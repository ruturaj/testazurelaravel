<?php

use App\Dealer;

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
	$dbcon = "Nothing";
	if(DB::connection()->getDatabaseName())
   {
     $dbcon = "connected successfully to database ".DB::connection()->getDatabaseName();
   }
   $dealers = App\Dealer::all();
   return $dealers;
    //return view('welcome');
});
