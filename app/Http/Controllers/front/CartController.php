<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Models\Cart;
// use App\Http\Models\Cart;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        return view('front.cart.index');
       }

       public function cart_store(Request $request)
       {


        Cart::add($request->id, $request->name, $request->price);
        return redirect()->back()->with('message','Item has been added to car');
       }
}
