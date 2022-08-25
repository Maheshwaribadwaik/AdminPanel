<?php

namespace App\Http\Controllers\front;
use App\Models\User;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function profile(){
     $id = auth()->user()->id;
     $user = User::find($id);
     $order = Order::where('user_id',$id)->get();
     return view('front.profile.index',compact(['user','order']));


}
public function show($id){
    $order = Order::find($id);
    return view('front.profile.details',compact('order'));
}
public function edit($id){
    $user = User::find($id);
     return view('front.profile.edit',compact('user'));
}
public function update(Request $request){
    $id = Auth::User()->id;
    $user = User::find($id);
    $user->name=$request->name;
    $user->email=$request->email;
    $user->password= bcrypt($request->password);
    $user->address=$request->address;
    $user->update();
    return redirect()->route('profile.index')->with('msg','Update successfully');

}

}


