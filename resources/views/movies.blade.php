<!doctype html>
<?php 
$title='Movies';

$current_page_variable_name='current_page_'.$title;
$page_capacity = Config::get('constants.page_capacity');

if (isset($_GET['page'])){
	${$current_page_variable_name} = $_GET['page'];
	session([$current_page_variable_name => ${$current_page_variable_name}]);
}	

if (${$current_page_variable_name} > ceil(count($movies) / $page_capacity)){
	${$current_page_variable_name} = ceil(count($movies) / $page_capacity);
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
		    @foreach ($movies as $key => $movie)
			@if (($key < ${$current_page_variable_name} * $page_capacity) and 
			     ($key >= (${$current_page_variable_name} - 1) * $page_capacity))
			    <div class='movie-container'>
				<div class='poster' style='background-image:url("{{$movie->poster}}")'></div>
				<div class='rating' title='{{$movie->rating}}/10' style='background-image:url("/ratings/{{$movie->rating}}.jpg");'></div>
			    </div>
			@endif
		    @endforeach

		    <div class='thin-text' style="width:100%; display:block; float:right;">
		        @if (ceil(count($movies) / $page_capacity) > ${$current_page_variable_name})
		            <a href='/movies?page={{${$current_page_variable_name} + 1}}'>next</a>
		        @endif
		        @if (${$current_page_variable_name} > 1)
		            <a href='/movies?page={{${$current_page_variable_name} - 1}}'>prev</a>
		        @endif
		    </div>

	        </div>
	    </div>
	</div>
    </body>
</html>
