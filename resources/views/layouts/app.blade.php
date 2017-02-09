<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My Paint</title>

    <!-- Styles -->
    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="http://localhost:8080/testpidmobsql/public/css/app.css" rel="stylesheet">
	
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        My Paint
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
						<li><a href="{{ url('/consumers') }}" class="navactive">Consumers</a></li>
						<li><a href="{{ url('/dealers') }}">Dealers</a></li>
						<li><a href="{{ url('/uploadfile') }}">Configuration</a></li>
						<li><a href="{{ url('/orders') }}">Orders</a></li>
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
		
		<section class="content-header">
   <div class="row" style="">
     
    <div class="col-md-9 col-md-offset-1" style="background: #fff;height: 64px;    padding-right: 0; padding-left: 0;">
       @if(isset($countdata)) 
 			<div class="" style="text-align: center;">
 				<div class="col-md-2" style="padding-left: 0;
    padding-right: 0;">
 					<a type="submit" href="{{ url('/consumers') }}" class="btn" style="height:64px;">
 					<p style="font-family:open sans;color: #000;font-weight: bold;font-size: 11px;margin-bottom: 0;">Total Customers</p>
					 <p style="font-family:open sans;color: #00baff;;font-size:24px;float: left;">
					 
					 </a>
 				</div>
 				<div class="col-md-2" style="">
 					<a type="submit" href="{{ url('/dealers') }}" class="btn" style="height:64px;">  
					<p style="font-family:open sans;color: #000;font-weight: bold;font-size: 11px;margin-bottom: 0;">Total Dealers</p>
					<p style="font-family:open sans;color: #00baff;;font-size:24px;float: left;">
					
					</a>
 				</div>
 				<div class="col-md-2" style="">
 					<a type="submit" href="{{ url('/orders') }}" class="btn" style="height:64px;"> 
					<p style="font-family:open sans;color: #000;font-weight: bold;font-size: 11px;margin-bottom: 0;">Total Orders</p>
					<p style="font-family:open sans;color: #00baff;;font-size:24px;float: left;">
					
					</a>
 				</div>
 				<div class="col-md-2" style="">
 					<a type="submit" class="btn" style="height:64px;">
					<p style="font-family:open sans;color: #000;font-weight: bold;font-size: 11px;margin-bottom: 0;">Total Machines</p>
					<p style="font-family:open sans;color: #00baff;;font-size:24px;float: left;">
					
					</a>
 				</div>
 				<div class="col-md-2" style="">
				 
 					<a type="submit" class="btn" style="height:64px;">
					<p style="font-family:open sans;color: #000;font-weight: bold;font-size: 11px;margin-bottom: 0;">Total Orders Completed</p>
					<p style="font-family:open sans;color: #00baff;;font-size:24px;float: left;">
					
 					</a>
 				</div>
 				<div class="col-md-2">
 					<a type="submit" class="btn" style="height:64px;"> 
					<p style="font-family:open sans;color: #000;font-weight: bold;font-size: 11px;margin-bottom: 0;">Total Orders Open</p>
					<p style="font-family:open sans;color: #00baff;;font-size:24px;float: left;">
					
					</a>
 				</div>
 			</div>
			@endif
 
   </div>
 </div>

</section>
		
		<!--
		<ul class="topnav" id="myTopnav">
		  <li><a href="{{ url('/consumers') }}" class="navactive">Consumers</a></li>
		  <li><a href="{{ url('/dealers') }}">Dealers</a></li>
		  <li><a href="{{ url('/uploadfile') }}">Configuration</a></li>
		  <li><a href="{{ url('/orders') }}">Orders</a></li>
		</ul>		
		-->
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="http://localhost:8080/testpidmobsql/public/js/app.js"></script>
</body>
</html>
