<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    function index($user){
        return $carts=Cart::where('user_id',$user)->get();
  }
  public function add(Request $request)
      {
         if($request->user_id!=null){
               $cart=Cart::where('product_id',$request->product_id)->where('user_id',$request->user_id)->first();
              if($cart!=null){
                return response()
                ->json(['message' => 'Item already exists in cart'], 200);
              }else{
              $cart = new Cart;
              $cart->user_id       = $request->user_id;
              $cart->product_id    = $request->product_id;
              $cart->price         = $request->price;
              $cart->quantity      = $request->quantity;
              $cart->product_title = $request->product_title;
              $cart->product_image = $request->product_image;
              $cart->save();
              return 'Cart added successfully';
              }
         }else{
             return response()
            ->json(['message' => 'Login First'], 401);
         }
      }
  public function delete($id)
  {
      Cart::destroy($id);
      return response()
            ->json(['message' => 'Item deted from cart successfully'], 200);
  }
}
