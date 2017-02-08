@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">OrderInfo</div>

                <div class="panel-body">
				   <!-- Invoice begins from here --->
				   <!-- <p> {{ $order}} </p> -->
				   <!--
				   
				   <p> Order Id : {{ $order->ReferencedOrderId}} </br></p> 
				   
				   @foreach ($items as $item)
					   <p> Item no. {{ $item->ItemNo}} </br>
					   Product Id : {{ $item->ProductId}} </br>
					   Quantity in Kgs : {{ $item->QuantityinKgs}} </br>
					   Quantity in Litres : {{ $item->QuantityinLtrs}} </br> </p>
				   @endforeach
				   
				   <p><b>Consumer :</b> </br>
				   
				   @foreach ($consumer as $con)
						{{ $con->ConsumerName}} </br>
				   @endforeach 
				   
				   <!-- {{ $consumer}} -->
				   
				   <!-- <p><b>Dealer : </b> </br>
				   
				   @foreach ($dealer as $del)
						{{ $del->DealerName}} </br> 
				   @endforeach -->
				   
	<div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Order # {{ $order->ReferencedOrderId}}</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">				
					<address>
						<strong>Dealer:</strong> 
							{{ $dealer[0]->DealerName}}
					</address>
				
    				<address>
    				<strong>Billed To:</strong><br>
						{{ $consumer[0]->ConsumerName}} <br>
    					<!--John Smith<br>
    					1234 Main<br>
    					Apt. 4B<br>
    					Springfield, ST 54321  -->
						{{ $consumer[0]->Address}} <br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
					<br>
        			<strong>Shipped To:</strong><br>
						{{ $consumer[0]->ConsumerName}} <br>
    					<!--Jane Smith<br>
    					1234 Main<br>
    					Apt. 4B<br>
    					Springfield, ST 54321 -->
						{{ $consumer[0]->Address}} <br>
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					Visa ending {{ $order->CardNumber}}<br>
							{{ $consumer[0]->Email}}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
						{{ $order->CreatedAt}}
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
									<td><strong>Product</strong></td>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Quantity in Liters</strong></td>
        							<td class="text-center"><strong>Quantity in KG</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
								@foreach ($items as $item) 
    							<tr>
    								<td>Product Id.: {{ $item->ProductId}}</td>
									<td>Item No.: {{ $item->ItemNo}}</td>
    								<td class="text-center"> {{ $item->QuantityinLtrs}}</td>
    								<td class="text-center">{{ $item->QuantityinKgs}}</td>
    								<td class="text-right">{{ $item->price}}</td>
    							</tr>    							
								@endforeach
								<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
									<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">{{ $order->OrderValue}}</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
									<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Packing Cost</strong></td>
    								<td class="no-line text-right">{{ $order->PackingCost}}</td>
    							</tr>
								<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
									<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Delivery Cost</strong></td>
    								<td class="no-line text-right">{{ $order->DeliveryAmount}}</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
									<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">{{ $order->TotalOrderValue}}</td>
    							</tr></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
				<!--- Invoice ends here -->	
					
					
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
