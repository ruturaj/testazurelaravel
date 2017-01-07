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
						<li>Dealers</li>
						<li>Consumers</li>
						<li>Orders</li>
						<li>Upload Data</li>
					</ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
