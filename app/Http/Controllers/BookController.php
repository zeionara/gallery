<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
	public function get(){
		$title = 'Books';
		$view = 'books';

		$items = \DB::table($view)->get();
		$current_page = session('current_page_'.$title, 1);
		return view($view, ['items' => $items, 'current_page_'.$title => $current_page]);
	}
}
