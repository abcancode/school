<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView(){
        //$allData = User::all();
        $data['allData'] = User::all();
        return view('backend.user.view_user', $data);
    }

    public function UserCreate(){
        return view('backend.user.create_user');
    }

    public function UserSave(Request $request){
        $validatedData = $request->validate([
        'email' => 'required|unique:users',
        'name' => 'required',
        ]);        

        $data = new User();
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => 'New User Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.view')->with($notification);
    }
}
