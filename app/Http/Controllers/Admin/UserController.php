<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){

        $users = User::latest()->paginate(2);

        return view('admin.user.view', compact('users'));
    }

    public function create(){

        return view ('admin.user.create');
    }

    public function store(Request $request){

        $validateData = $request->validate([

            "name" => "required|string|max:255",
            "email" => "required|email|string|max:255|unique:users",
            "password" => "required|string|min:8",
            "role_as" => "required|integer"

        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_as = $request->role_as;

        $user->save();

        return redirect('admin/user/view')->with('message','User Created');

    }

    public function destroy(User $user){

      User::findOrFail($user->id)->delete();

      return redirect('admin/user/view')->with('message','User Deleted');
    }

    public function edit(User $user){

       $users = User::findOrFail($user->id);

       return view('admin.user.edit',compact('users'));
    }

    public function update(User $user, Request $request){


        $validateData = $request->validate([

            "name" => "required|string|max:255",
            "password" => "required|string|min:8",
            "role_as" => "required|integer"

        ]);

        User::where('id',$user->id)->update([

            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role_as" => $request->role_as
        ]);

        return redirect('admin/user/view')->with('message', 'Updated Successfully');




    }
}
