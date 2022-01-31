<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Auth;

class CartController extends Controller
{
    function index(){
        $user= Auth::user();
           if($user!=null){
           $carts=Cart::where('user_id','=',$user->id)->get();
             return view('frontend.cart',\compact('carts'))  ;
           }else{
            return redirect()->back()->with('status', 'Please Login first');

           }


    }
    public function add(Request $request)
        {
            // return $request->all();
           $user= Auth::user();
           if($user!=null){
                $cart=Cart::where('product_id','=',$request->product_id)->where('user_id','=',$user->id)->first();
                if($cart!=null){
                    return redirect()->back()->with('status', 'Cart item already added');
                }else{
                $cart = new Cart;
                $cart->user_id       = $user->id;
                $cart->product_id    = $request->product_id;
                $cart->price         = $request->price;
                $cart->quantity      = $request["product-quatity"];
                $cart->product_title = $request->product_title;
                $cart->product_image = $request->product_image;
                $cart->save();
                return redirect()->back()->with('status', 'Cart added successfully');
                }
           }else{
            return redirect()->back()->with('status', 'Please Login first');

           }
            
        
        }
    public function delete($id)
    {
        Cart::destroy($id);
        return redirect()->back()->with('status', 'Cart Item deleted successfully');
    }
}
