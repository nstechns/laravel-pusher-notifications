<?php

namespace App\Http\Controllers;
use App\User;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function profile($user_id){
        $user = User::find($user_id);
        return view('profile',compact('user'));
    }
}
