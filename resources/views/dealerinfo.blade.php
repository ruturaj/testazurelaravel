@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dealer Details
					<!-- search box for filtering -->
					<div class="form-group pull-right">
						<input type="text" class="search form-control" placeholder="What you looking for?">
					</div>
					<span class="counter pull-right"></span>
				</div>

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

<script>

$(document).ready(function() {

$(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });	
	
	
  $(".search").keyup(function () {
    var searchTerm = $(".search").val();
    var listItem = $('.results tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
  });
    
  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','false');
  });

  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','true');
  });

  var jobCount = $('.results tbody tr[visible="true"]').length;
    $('.counter').text(jobCount + ' Orders');

  if(jobCount == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
		  });
});
</script>
@endsection
