<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    public function index(){

        $genres = Genre::latest()->paginate(5);
        return view('admin.genre.index',compact('genres'));
    }

    public function create(){

        return view('admin.genre.create');
    }

    public function store(Request $request){

       $validated = $request->validate([

            'name' => 'required|max:255',
            'status' => 'nullable'

       ]);


       $genre = new Genre();

       $genre->name = $request->name;
       $genre->status = $request->status == true ? '0':'1';

       $genre->save();

        //Genre::create($request->all());

       return redirect('/admin/genre/view')->with('message','Genre Created');

    }

    public function destroy(Genre $genre){

       Genre::findOrFail($genre->id)->delete();

       return redirect('/admin/genre/view')->with('message','Genre Removed');
    }



}
