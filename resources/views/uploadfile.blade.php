@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
				<ul class="tab">
				  <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Interior')" id="defaultOpen">Interior</a></li>
				  <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Exterior')">Exterior</a></li>
				  <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Shade')">Shade</a></li>
				  <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Multiplier Factor')">Multiplier Factor</a></li>
				  <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Colorant Price')">Colorant Price</a></li>
				</ul>

				<div id="Interior" class="tabcontent">
				  <p>Upload Interior Data</p>
				</div>

				<div id="Exterior" class="tabcontent">
				  <p>Upload Exterior Data</p>
				</div>

				<div id="Shade" class="tabcontent">
				  <p>Upload Shade Data</p>
				</div>

				<div id="Multiplier Factor" class="tabcontent">
				  <p>Upload Multiplier Factor Data</p>
				</div>

				<div id="Colorant Price" class="tabcontent">
				  <p>Upload Colorant Price Data</p>
				</div>

                <div class="panel-body">
                    
					<?php
					 echo Form::open(array('url' => '/uploadfile','files'=>'true'));
					 echo Form::select('tabletype', ['Interior' => 'Interior', 'Exterior' => 'Exterior', 
									'Shaded' => 'Shaded', 'DealerMachines' => 'Dealer Machines'], null, ['placeholder' => 'Pick a table to upload...']);
					 echo 'Select the file to upload.';
					 echo Form::file('image');
					 echo '<p>';
					 echo Form::submit('Upload File');
					 echo Form::close();
					?>
					
                </div>
            </div>
        </div>
    </div>
</div>

<script>
	function openTab(evt, tabName) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(tabName).style.display = "block";
		evt.currentTarget.className += " active";
	}
</script>

@endsection