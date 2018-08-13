<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
	public function get(){
		//$movies = \App\Movie::all();
		$movies = \DB::table('movies_test')->get();
		$current_page = session('current_page', 1);
		return view('movies', ['movies' => $movies, 'current_page' => $current_page]);
	}
}
