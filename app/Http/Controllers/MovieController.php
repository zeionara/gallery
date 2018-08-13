<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
	public function get(){
		$title = 'Movies';
		$movies = \DB::table('movies_test')->get();
		$current_page = session('current_page_'.$title, 1);
		return view('movies', ['movies' => $movies, 'current_page_'.$title => $current_page]);
	}
}
