<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dealer;
use App\Consumer;
use App\Order;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
	
	public function dealers()
    {
        return view('dealers', ['dealerlist' => Dealer::all()]);
    }
	
	public function dealerinfo($dealerid)
    {
        return view('dealerinfo');
    }
	
	public function consumers()
    {
        return view('consumers', ['consumerlist' => Consumer::all()]);
    }
	
	public function consumerinfo($consumerid)
    {
        return view('consumerinfo');
    }
	
	public function orders()
    {
        return view('orders', ['orderlist' => Order::all()]);
    }
	
	public function orderinfo($orderid)
    {
        return view('orderinfo');
    }
	
	public function uploadfile()
	{
		return view('uploadfile');
	}
	
	// create new function for show uploaded page
    public function showfileupload(Request $request){
      $file = $request -> file('image');
      // show the file name
      echo 'File Name : '.$file->getClientOriginalName();
      echo '<br>';

      // show file extensions
      echo 'File Extensions : '.$file->getClientOriginalExtension();
      echo '<br>';

      // show file path
      echo 'File Path : '.$file->getRealPath();
      echo '<br>';

      // show file size
      echo 'File Size : '.$file->getSize();
      echo '<br>';

      // show file mime type
      echo 'File Mime Type : '.$file->getMimeType();
      echo '<br>';

      // move uploaded File
      $destinationPath = 'uploads';
      $file->move($destinationPath,$file->getClientOriginalName());
    }
}
