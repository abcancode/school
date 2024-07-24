<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Logout(){
        Auth::logout();
        return Redirect()->route('login');
    }
}
