<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genre;
use App\Models\Movies;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{
    public function index(){

        return view('admin.movie.index');
    }

    public function create(){

        $genres = Genre::all();
        $languages = Language::all();
        return view('admin.movie.create',compact('genres','languages'));
    }

    public function store(Request $request){

       $validatedData = $request->validate([

        "name" => "required|max:255",
        "image" => "required|mimes:png,jpg",
        "language_id" => "required",
        "genre_id" => "required",
        "price" => "required|max:255",
        "status" => "nullable"

       ]);



       //saving image into a folder
       if($request->hasFile('image')){

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/movies', $filename);
            //$validatedData['image'] = 'uploads/movies'.$filename;

       }

       $movie = new Movies();

       $movie->name = $request->name;
       $movie->image = 'uploads/movies/'.$filename;
       $movie->language_id = $request->language_id;
       $movie->genre_id = $request->genre_id;
       $movie->price = $request->price;
       $movie->status = $request->status == true ? '0' : '1';

       $movie->save();

       return redirect('/admin/movie/view')->with('message','New move Added');



    }

    public function edit(int $id){

        $movies = Movies::findOrFail($id);
        $genres = Genre::all();
        $languages = Language::all();

        return view('admin.movie.edit', compact('movies','genres','languages'));
    }

    public function update(Request $request, Movies $movies){

        $validatedData = $request->validate([

            "name" => "required|max:255",
            "image" => "nullable|mimes:png,jpg",
            "language_id" => "required",
            "genre_id" => "required",
            "price" => "required|max:255",
            "status" => "nullable"

           ]);

           if($request->hasFile('image')){

                $destination = $movies->image;

                if(File::exists($destination)){

                    File::delete($destination);
                }


            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/movies', $filename);
            $validatedData['image']= 'uploads/movies/'.$filename;



           }

           $movies = Movies::where('id',$movies->id)->update([

            'name' => $request->name,
            'image' => $validatedData['image'] ?? $movies->image,
            'language_id' => $request->language_id,
            'genre_id' => $request->genre_id,
            'price' => $request->price,
            'status'=> $request->status == true ? '1' : '0',

           ]);

           return redirect('admin/movie/view')->with('message','Movie Updated Successfully');





    }
}
