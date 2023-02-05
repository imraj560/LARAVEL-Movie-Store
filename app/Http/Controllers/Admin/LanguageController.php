<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function index(){
       // $languages = Language::all();
        $languages = Language::latest()->paginate(2);
        return view('admin.language.view',compact('languages'));
    }

    public function create(){

        return view('admin.language.create');
    }

    public function store(Request $request){

       $validated = $request->validate([

        'name' => 'required|max:255',
        'status' => 'nullable|'

       ]);

       $language = new Language();

       $language->name = $request->name;
       $language->status = $request->status == true ? '0' : '1';

       $language->save();

       return redirect('/admin/language/view')->with('message','Language has been Added');


    }

    public function destroy(Language $language){

        Language::findOrFail($language->id)->delete();

        return redirect("/admin/language/view")->with('message','Language Deleted');
    }
}
