<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        $entries = Entry::orderBy('created_at', 'desc')->orderBy('id', 'desc')->simplePaginate(3);
        return view('home.home')->with([ 'entries' => $entries ]);
    }
}
