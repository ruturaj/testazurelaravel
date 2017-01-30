@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Consumer Details</div>

                <div class="panel-body">
                    <!-- You are logged in!
					<ul>
						<li>Dealers</li>
						<li>Consumers</li>
						<li>Orders</li>
						<li>Upload Data</li>
					</ul> -->
					<p><b><u> Consumer : </u></b></p>
					<!-- <p> {{ $consumer}} </p> -->
					Consumer ID : {{ $consumer->ConsumerID}} </br>
					Consumer Name : {{ $consumer->ConsumerName}} </br>
					Email : {{ $consumer->Email}} </br>
					Phone Number : {{ $consumer->PhoneNumber}} </br>
					Address : {{ $consumer->Address}} </br>
					City : {{ $consumer->City}} </br>
					State : {{ $consumer->State}} </br>
					Country : {{ $consumer->Country}} </br>
					Pincode : {{ $consumer->PinCode}} </br>
					<p></p>
					<p><b><u> Consumer Orders : </u></b></p>
					<table class="table results table-hover table-bordered">
						<thead>
							<tr><th>#</th><th>Order Number</th><th>Date</th><th>Order Value</th><th>Paint Type</th><th>Order Status</th></tr>
							<tr class="warning no-result"><td colspan="6"><i class="fa fa-warning"></i> No result</td></tr>
						</thead>
						<tbody>
							@foreach ($consumerorders as $order)
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
