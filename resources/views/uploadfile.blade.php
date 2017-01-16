@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    
					<?php
					 echo Form::open(array('url' => '/uploadfile','files'=>'true'));
					 echo Form::select('tabletype', ['Interior' => 'Interor', 'Exterior' => 'Exterior', 
									'Shaded' => 'Shaded', 'DealerMachines' => 'Dealer Machines'], null, ['placeholder' => 'Pick a table to upload...']);
					 echo 'Select the file to upload.';
					 echo Form::file('image');
					 echo Form::submit('Upload File');
					 echo Form::close();
				  ?>
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
