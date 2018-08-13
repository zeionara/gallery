<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gallery</title>

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

            .m-b-md {
                margin-bottom: 30px;
	    }

	    .thin-text {
		font-size: 12px;
		margin-top: 30px;	
	    }

	    .thin-text > a {
		color: #939b9f;
		text-decoration: none;
		font-weight: 600;
	    }
	</style>

	<script>
		window.onload = function() {
			console.log(window.innerWidth);
			redirects = document.getElementsByClassName("redirect");
			for(var i = 0; i < redirects.length; i++)
			{
	   			redirects.item(i).setAttribute('href', redirects.item(i).getAttribute('href') + '?width=' + window.innerWidth);
   			}	   			//document.getElementById("tesst").setAttribute('href', '/movies?width=' + screen.width);
       		} 
        </script>	
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
                <div class="title m-b-md">
                    Gallery
                </div>

                <div class="links">
                    <a class='redirect' href="/movies">Movies</a>
                    <a class='redirect' href="/books">Books</a>
                    <a class='redirect' href="/music">Music</a>
		</div>

		<div class="thin-text">
		    <a href="mailto:zeionara@gmail.com">by zeionara</a>
		</div>
            </div>
        </div>
    </body>
</html>
