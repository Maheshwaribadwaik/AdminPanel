<?php

namespace App\Http\Controllers\front;
use App\Models\User;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
