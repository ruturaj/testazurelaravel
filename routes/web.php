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
	/*$dbcon = "Nothing";
	if(DB::connection()->getDatabaseName())
   {
     $dbcon = "connected successfully to database ".DB::connection()->getDatabaseName();
   }
   $dealers = App\Dealer::all();
   return $dealers;
   return phpinfo();*/
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/dealers', 'HomeController@dealers');
Route::get('/dealers/{dealerid}', 'HomeController@dealerinfo');
Route::get('/consumers', 'HomeController@consumers');
Route::get('/consumers/{consumerid}', 'HomeController@consumerinfo');
Route::get('/orders', 'HomeController@orders');
Route::get('/orders/{orderid}', 'HomeController@orderinfo');
Route::get('/uploadfile', 'HomeController@uploadfile');
Route::post('/uploadfile', 'HomeController@showfileupload');
