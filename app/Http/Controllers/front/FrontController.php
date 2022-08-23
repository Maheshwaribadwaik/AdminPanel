<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
   public function index(){
    $products= Product::inRandomOrder()->take(4)->get();
    return view('front.index',compact('products'));
   }

  public function register(){

    return view('front.register');

  }
  public function store(Request $request){
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:6',
        'address' => 'required',

 ]);
    $user=new User();
    $user->name=$request->name;
$user->email=$request->email;
$user->password=bcrypt($request->password);
$user->address=$request->address;

$user->save();
// \
// User::create([
//     'name'  =>$request->name,
//     'email'  =>$request->email,
//    'password' =>bcrypt($request->password),
//    'address' =>$request->address,
// ]);

return redirect()->back()->with('msg',"User has been created successfully|");

  }


}
