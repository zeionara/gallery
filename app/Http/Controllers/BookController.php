<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
	public function get(){
		$title = 'Books';
		$books = \DB::table('books')->get();
		$current_page = session('current_page_'.$title, 1);
		return view('books', ['books' => $books, 'current_page_'.$title => $current_page]);
	}
}
