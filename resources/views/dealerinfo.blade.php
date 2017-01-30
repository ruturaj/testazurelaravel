@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dealer Details</div>

                <div class="panel-body">
                    					
					<p><b><u> Dealer : </u></b></p>
					<!-- <p> {{ $dealer}} </p> -->
					Dealer ID : {{ $dealer->DealerID}} </br>
					Dealer Name : {{ $dealer->DealerName}} </br>
					Email : {{ $dealer->Email}} </br>
					Phone Number : {{ $dealer->PhoneNumber}} </br>
					Address : {{ $dealer->Address}} </br>
					City : {{ $dealer->City}} </br>
					State : {{ $dealer->State}} </br>
					Country : {{ $dealer->Country}} </br>
					Pincode : {{ $dealer->PinCode}} </br>
					<p></p>
					<p><b><u> Dealer Orders : </u></b></p>
					<table class="table results table-hover table-bordered">
						<thead>
							<tr><th>#</th><th>Order Number</th><th>Date</th><th>Order Value</th><th>Paint Type</th><th>Order Status</th></tr>
							<tr class="warning no-result"><td colspan="6"><i class="fa fa-warning"></i> No result</td></tr>
						</thead>
						<tbody>
							@foreach ($dealerorders as $order)
								<tr class='clickable-row' data-href="{{ url('/orders/'.$order->Id)}}">
									<th scope="row">{{ $loop->iteration }}</th><td>{{ $order->ReferencedOrderId }}</td><td> {{ $order->CreatedAt }}</td>
									<td>{{ $order->TotalOrderValue }} </td><td>{{ $order->PaintType }}</td><td>{{ $order->Status }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
