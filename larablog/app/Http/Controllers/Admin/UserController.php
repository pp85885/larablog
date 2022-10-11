<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        $user_list      =       User::all();
        return view('admin.user.index', compact('user_list'));
    }

    function edit($user_id){
        $user_info      =       User::find($user_id);
        return view('admin.user.edit', compact('user_info'));
    }
    function update($id, Request $request){
        $user  =    User::find($id);
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required'
          ]);
        $user->name       =   $request['name'];
        $user->email      =   $request['email'];
        $user->role_as    =   $request['role'];

        $user->update();
        return redirect('admin/users')->with('message','User Data Udpated successfully');    
    }
}
