<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index()
    {
        $movies_animation = Movies::where('genre_id', 4)->latest()->take(6)->get();
        $movies_thrillers = Movies::where('genre_id', 1)->get();
        $movies_soon = Movies::where('genre_id', 5)->get();
        
        return view('welcome',compact('movies_animation','movies_thrillers','movies_soon'));
    }


}
