<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dealer;
use App\Consumer;
use App\Order;
use App\Exterior;
use App\Interior;
use App\Shade;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
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
	  
	  $fileD = fopen($destinationPath.'/'.$file->getClientOriginalName(),"r");
	  $column=fgetcsv($fileD);
      while(!feof($fileD)){
         $rowData[]=fgetcsv($fileD);
      }
	  $data = array();
	  foreach ($rowData as $rd) {
		  
		  if ($request->input('tabletype') == 'Exterior') {
				$reference = Exterior::where('baseID', $rd[0])->first();
				if($reference === null ) {
					$data[] = array('baseID'=>$rd[0], 'base1Value'=>$rd[1], 'base2Value'=>$rd[2], 'base3Value'=>$rd[3], 'base4Value'=>$rd[4],
						'wpl'=>$rd[5], 'antifungal'=>$rd[6], 'monsoon'=>$rd[7], 'dirt'=>$rd[8], 'efflorescene'=>$rd[9], 'hiding'=>$rd[10], 
						'gloss'=>$rd[11], 'coverage'=>$rd[12], 'sp_ltr'=>$rd[13], 'base_Type'=>$rd[14], 'brand'=>$rd[15], 'sb_Brand'=>$rd[16],
						'base'=>$rd[17], 'Deleted' => 0);
				}
				/*$data = ['baseID'=>$rd[0], 'base1Value'=>$rd[1], 'base2Value'=>$rd[2], 'base3Value'=>$rd[3], 'base4Value'=>$rd[4],
						'wpl'=>$rd[5], 'antifungal'=>$rd[6], 'monsoon'=>$rd[7], 'dirt'=>$rd[8], 'efflorescene'=>$rd[9], 'hiding'=>$rd[10], 
						'gloss'=>$rd[11], 'coverage'=>$rd[12], 'sp_ltr'=>$rd[13], 'base_Type'=>$rd[14], 'brand'=>$rd[15], 'sb_Brand'=>$rd[16],
						'base'=>$rd[17], 'Deleted' => 0];		
				*/	
				//$insertion = Exterior::updateOrCreate(['baseID'=>$rd[0]], $data);
				/*$reference = Exterior::firstOrCreate(['baseID'=>$rd[0], 'Deleted' => 0]);
				$reference->fill(['base1Value'=>$rd[1], 'base2Value'=>$rd[2], 'base3Value'=>$rd[3], 'base4Value'=>$rd[4],
						'wpl'=>$rd[5], 'antifungal'=>$rd[6], 'monsoon'=>$rd[7], 'dirt'=>$rd[8], 'efflorescene'=>$rd[9], 'hiding'=>$rd[10], 
						'gloss'=>$rd[11], 'coverage'=>$rd[12], 'sp_ltr'=>$rd[13], 'base_Type'=>$rd[14], 'brand'=>$rd[15], 'sb_Brand'=>$rd[16],
						'base'=>$rd[17], 'Deleted' => 0]);
				$reference->save();
				*/
		  } else if ($request->input('tabletype') == 'Interior') {
				$data[] = array('baseID'=>$rd[0], 'base1'=>$rd[1], 'base2'=>$rd[2], 'base3'=>$rd[3], 'base4'=>$rd[4],
						'wpl'=>$rd[5], 'hiding'=>$rd[6], 'whiteness'=>$rd[7], 'wetscrub'=>$rd[8], 'gloss'=>$rd[9], 'stain'=>$rd[10], 
						'coverage'=>$rd[11], 'sp_ltr'=>$rd[12], 'base_Type'=>$rd[13], 'sp_use'=>$rd[14], 'brand'=>$rd[15], 'sub_Brand'=>$rd[16],
						'base'=>$rd[17], 'Deleted' => 0);
			  
		  }
		  else if ($request->input('tabletype') == 'Shaded') {}
		  else if ($request->input('tabletype') == 'DealerMachines') {}
		  
	  }
	  
	  if ($request->input('tabletype') == 'Exterior') { Exterior::insert($data);} 
		  else if ($request->input('tabletype') == 'Interior') { /*Interior::insert($data);*/}
		  else if ($request->input('tabletype') == 'Shaded') {/*Shade::insert($data);*/}
		  else if ($request->input('tabletype') == 'DealerMachines') {/*DealerMachine::insert($data);*/}
	  
	  //Exterior::insert($data);
	  return $data;
    }
}
