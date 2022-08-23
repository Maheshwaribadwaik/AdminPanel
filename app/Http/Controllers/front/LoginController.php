<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('front.login');
    }
    public function store(Request $request){
        $rules= [
            'email'=> 'required|email',
            'password'=>'required',

        ];
        $request->validate($rules);
        $data=request(['email','password']);
        if(!auth()->attempt($data)) {
    return back()->with(["msg","Wrong details please try again"]);

        }
        return redirect()->route('profile.index');


    }
    public function logout(){
        auth()->logout();
        redirect()->route('user.login')->with('msg','you have logged out successfully');
    }

    // public function profile(){
    //     return view('front.profile.index');
    // }

}
