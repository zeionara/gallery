<!doctype html>
<?php 
$title='Movies';




if (isset($_GET['width'])){
	session(['page_size' => floor($_GET['width'] / 200)]);

}

$page_size = session('page_size', -10);
if ($page_size < 0){
	$page_capacity = Config::get('constants.page_capacity_thin');
} else {
	$page_capacity = floor($page_size / 1.5);
}




$current_page_variable_name='current_page_'.$title;

if (isset($_GET['page'])){
	${$current_page_variable_name} = $_GET['page'];
	session([$current_page_variable_name => ${$current_page_variable_name}]);
}	

if (${$current_page_variable_name} > ceil(count($items) / $page_capacity)){
	${$current_page_variable_name} = ceil(count($items) / $page_capacity);
}


?>
<html lang="{{ app()->getLocale() }}">
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{$title}}</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href={{asset('css/general.css')}}>

    </head>
    <body>
	<div class="flex-center position-ref full-height">

	   @if (Route::has('login'))
		<div class="top-right links">
		    @auth
			<a href="{{ url('/home') }}">Home</a>
		    @else
			<a href="{{ route('login') }}">Login</a>
			<a href="{{ route('register') }}">Register</a>
		    @endauth
		</div>
	    @endif

	    <div class="content">
		<div class="title up-text">
		    {{$title}}
		</div>

		<div class='thin-text'>
		    <a href='/'>back</a>
		</div>

		<div>
		    @foreach ($items as $key => $item)
			@if (($key < ${$current_page_variable_name} * $page_capacity) and 
			     ($key >= (${$current_page_variable_name} - 1) * $page_capacity))
			    <div class='art-item-container thin-container'>
				<div class='poster rectangled-poster' style='background-image:url("{{$item->poster}}")'></div>
				<div class='rating normal-rating' title='{{$item->rating}}/10' style='background-image:url("/ratings/{{$item->rating}}.jpg");'></div>
			    </div>
			@endif
		    @endforeach

		    <div class='thin-text' style="width:100%; display:block; float:right;"> 
		        @if (${$current_page_variable_name} > 1)
		            <a href='/movies?page={{${$current_page_variable_name} - 1}}'>prev</a>
		        @endif
		    	@if (ceil(count($items) / $page_capacity) > ${$current_page_variable_name})
		            <a href='/movies?page={{${$current_page_variable_name} + 1}}'>next</a>
		        @endif
		    </div>

	        </div>
	    </div>
	</div>
    </body>
</html>
