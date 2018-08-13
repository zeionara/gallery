<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MusicController extends Controller
{
	public function get(){
		$title = 'Music';
		$music = \DB::table('music')->get();
		$current_page = session('current_page_'.$title, 1);
		return view('music', ['music' => $music, 'current_page_'.$title => $current_page]);
	}
}
