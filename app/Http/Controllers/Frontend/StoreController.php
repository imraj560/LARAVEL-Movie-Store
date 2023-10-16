<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Movies;

class StoreController extends Controller
{
    public function index(){

        return view('frontend.store.view');
    }

    public function product_view(int $id){

        $movies = Movies::where('id',$id)->first();

        return view('frontend.product.index',compact('movies'));
    }
}
