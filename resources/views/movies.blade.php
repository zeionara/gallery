<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Movies</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .up-text {
                margin-top: 10px;
	    }

	    .movie-container {
		float: left;
		width: 200px;
		margin-left: 20px;
		font-weight: 600;
		font-size: 10px;
	    }

	    .poster {
		width: 200px;
		height: 350px;
		background-color:red;
		background-size:cover; 
	    }

	    .thin-text {
		font-size: 16px;
		margin-top: 30px;
		margin-bottom: 30px;	
	    }

	    .thin-text > a {
		color: #939b9f;
		text-decoration: none;
		font-weight: 600;
	    }

	    .rating {
		width: 100px;
		height: 100px;
		margin-left: 50px;
		background-size: cover;
        </style>
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
                    Movies
		</div>

		<div class='thin-text'>
		    <a href='/'>back</a>
		</div>
		
	    <?php 
		
		/*Class Movie {
			public $title;
			public $type;
		}

		$beguiled = new Movie();
		$beguiled->title = 'Beguiled';
		$beguiled->rating = 7;

		$movies = array($beguiled)*/
		if (isset($_GET['page'])){
			$current_page = $_GET['page'];
			session(['current_page' => $current_page]);
		}

		
		$page_capacity = 3;

		if ($current_page > ceil(count($movies) / $page_capacity)){
			$current_page = 1;
		}

	   
	    ?>
	    <div>
	    @foreach ($movies as $key => $movie)
	    	@if (($key < $current_page * $page_capacity) and ($key >= ($current_page - 1) * $page_capacity))
		<div class='movie-container'>
			<div class='poster' style='background-image:url("{{$movie->poster}}")'>
			</div>
			<div class='rating' title='{{$movie->rating}}/10' style='background-image:url("/ratings/{{$movie->rating}}.jpg");'>
			</div>
			<!--<p>{{$movie->title}}</p>
			<p>{{$movie->rating}}</p>!-->
		</div>
		@endif
		@endforeach
		
		<div class='thin-text' style="width:100%; display:block; float:right;">
		@if (ceil(count($movies) / $page_capacity) > $current_page)
		<a href='/movies?page={{$current_page + 1}}'>next</a>
		@endif
		@if ($current_page > 1)
		<a href='/movies?page={{$current_page - 1}}'>prev</a>
		@endif
		</div>
		
	    </div>
	    </div>
        </div>
    </body>
</html>
