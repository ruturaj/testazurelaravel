@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Consumers</div>

                <div class="panel-body">
					<!-- search box for filtering -->
					<div class="form-group pull-right">
						<input type="text" class="search form-control" placeholder="What you looking for?">
					</div>
					<span class="counter pull-right"></span>

					<!-- actual results -->
					<table class="table results table-hover table-bordered">
					<thead>
						<tr><th>#</th><th>Consumer name</th><th>Email</th><th>Phone number</th><th>Address</th></tr>
						<tr class="warning no-result"><td colspan="5"><i class="fa fa-warning"></i> No result</td></tr>
					</thead>
					<tbody>
					@foreach ($consumerlist as $consumer)
						<tr class='clickable-row' data-href="{{ url('/consumers/'.$consumer->Id)}}">
							<th scope="row">{{ $loop->iteration }}</th><td>{{ $consumer->ConsumerName }}</td><td> {{ $consumer->Email }}</td>
							<td>{{ $consumer->PhoneNumber }} </td><td>{{ $consumer->Address }}</td>
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
    $('.counter').text(jobCount + ' Consumers');

  if(jobCount == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
		  });
});
</script>
@endsection
