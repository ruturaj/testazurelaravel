@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
					<ul>
						<li><a href="{{url ('/dealers') }}" >Dealers </a></li>
						<li><a href="{{url ('/consumers') }}" >Consumers</a></li>
						<li><a href="{{url ('/orders') }}" >Orders</a></li>
						<li><a href="{{url ('/uploadfile') }}" >Upload Data</a></li>
					</ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
