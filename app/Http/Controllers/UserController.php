<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\user;

use Illuminate\Http\Request;

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
}
