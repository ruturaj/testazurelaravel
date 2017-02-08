<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dealer;
use App\Consumer;
use App\Order;
use App\OrderItem;
use App\Exterior;
use App\Interior;
use App\Shade;
use DB;

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
	 
	public function headertable()
	{
		$consumer = DB::table('consumers')->count();
		$dealers = DB::table('dealers')->count();
		$orders = DB::table('orders')->count();
		$completed = DB::table('orders')->where('status', '=', 'Closed')->count();
		$open = DB::table('orders')->where('status', '=', 'Open')->count();
		//$machines = DB::table('consumers')->count();
		return ['consumercount' => $consumer, 'dealercount' => $dealers,'ordercount' => $orders,'completed' => $completed,'open' => $open];
		
	}	
    public function index()
    {
        return view('home');
    }
	
	public function dealers()
    {
        return view('dealers', ['dealerlist' => Dealer::all(), 'countdata' => $this->headertable()]);
    }
	
	public function dealerinfo($dealerid)
    {
		$dealer = Dealer::find($dealerid);
		$dealerorders = Order::where('dealerID', '=', $dealerid)->get();
        return view('dealerinfo', ['dealer' => $dealer, 'dealerorders' => $dealerorders, 'countdata' => $this->headertable()]);
    }
	
	public function consumers()
    {
        return view('consumers', ['consumerlist' => Consumer::all(), 'countdata' => $this->headertable()]);
    }
	
	public function consumerinfo($consumerid)
    {
		$consumer = Consumer::find($consumerid);
		$consumerorders = Order::where('consumerID', '=', $consumerid)->get();
        return view('consumerinfo', ['consumer' => $consumer, 'consumerorders' => $consumerorders, 'countdata' => $this->headertable()]);
    }
	
	public function orders()
    {
        return view('orders', ['orderlist' => Order::all(), 'countdata' => $this->headertable()]);
    }
	
	public function orderinfo($orderid)
    {
		$order = Order::find($orderid);
		$orderitems = OrderItem::where('orderId', '=', $orderid)->get();
		$consumer = Consumer::where('id', '=', $order->ConsumerID)->get();
		/*if(count($consumer) == 1)
		{
			$consumer = $consumer[0];
		}*/
		$dealer = Dealer::where('id', "=", $order->DealerID)->get();
        return view('orderinfo', ['order' => $order, 'items' => $orderitems, 'consumer' => $consumer, 'dealer' => $dealer, 'countdata' => $this->headertable()]);
    }
	
	public function uploadfile()
	{
		return view('uploadfile', ['countdata' => $this->headertable()]);
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
			  
		  } else if ($request->input('tabletype') == 'Shaded') {
				$data[] = array('shadeID'=>$rd[0], 'shadeName'=>$rd[1], 'base_Type'=>$rd[2], 'magenta'=>$rd[3], 'int_red'=>$rd[4], 'f_yell'=>$rd[5], 'f_blk'=>$rd[6], 'ht_yell'=>$rd[7], 'ht_ro'=>$rd[8], 'f_yo'=>$rd[9], 'ext_red'=>$rd[10], 'f_ro'=>$rd[11], 'f_red'=>$rd[12], 'f_grn'=>$rd[13], 'f_blue'=>$rd[14], 'f_vio'=>$rd[15], 'ht_wht'=>$rd[16], 'ht_blue'=>$rd[17], 'orange'=>$rd[18], 'misc'=>$rd[19], 'Deleted' => 0);
		  }
		  else if ($request->input('tabletype') == 'DealerMachines') {}
		  
	  }
	  
	  if ($request->input('tabletype') == 'Exterior') { Exterior::insert($data);} 
		  else if ($request->input('tabletype') == 'Interior') { Interior::insert($data);}
		  else if ($request->input('tabletype') == 'Shaded') { Shade::insert($data);}
		  else if ($request->input('tabletype') == 'DealerMachines') {/*DealerMachine::insert($data);*/}
	  
	  //Exterior::insert($data);
	  return $data;
    }
}
