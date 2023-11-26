<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin(){
    	return view('admin.auth.login');
    } 
    public function postLogin(AdminRequest $request){

    	$remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            return redirect() -> route('dashboard');
        }
        return redirect()->back()->with(['error' => 'something error']);
    }
}
