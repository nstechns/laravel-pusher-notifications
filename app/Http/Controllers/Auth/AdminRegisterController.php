<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;

class AdminRegisterController extends Controller
{
	use RegistersUsers;
	protected $redirectTo = 'admin';
    public function __construct()
	{
		//$this->middleware("guest:admin", ['except' => ['logout']]);
	}

	 protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }


	public function showRegistrationForm()
    {
        return view('auth.admin-register');
    }

    public function guard()
    {
        return Auth::guard('admin');
    }

     protected function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


}
