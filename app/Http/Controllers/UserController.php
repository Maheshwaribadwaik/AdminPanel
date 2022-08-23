<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\user;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   public function index(){
    $user =User::all();
    return view('admin.users.index',compact('user'));

   }
   public function show($id){
    $orders=Order::with('user','products')->find($id);
    return view('admin.users.details',compact('orders'));
   }

   public function profile(){
    $user = Auth::user();
    return view('admin.profile',compact('user'));
   }

public function profile_store(Request $request){
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'password' => 'nullable',



    ]);


$id = Auth::user()->id;
$user =User::find($id);
$user->name=$request->name;
$user->email=$request->email;
$user->password=bcrypt($request->password);
$user->save();

return redirect()->route('users.index')->with('message','Added Succesfully');
}



}
