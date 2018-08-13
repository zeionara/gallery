<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/movies', 'MovieController@get'); /*function() {
    Class Movie {
    	public $title;
	public $rating;
    }

    $raw = new Movie();
    $raw->title = 'Raw';
    $raw->rating = 9;

    $movies = /*Movie:all();//array($raw);

    return view('movies', ['movies' => $movies]);
});*/

Route::get('/books', function() {
    return view('books');
});

Route::get('/music', function() {
    return view('music');
});
