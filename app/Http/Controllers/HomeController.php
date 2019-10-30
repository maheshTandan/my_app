<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
    	return view('home');
    }
    public function about()
    {
    	return view('about');
    }

    public function search(Request $request)
    {
    	$search  = addslashes($request->search);

    	$result = DB::select("SELECT *  FROM `result` WHERE `key_word` LIKE '%$search%' ORDER BY up_votes DESC LIMIT 0,10");

    	return view('search',['search'=>$search, 'result'=>$result]);	
    }
}