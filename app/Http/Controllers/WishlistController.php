<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use Auth;
use DB;

class WishlistController extends Controller
{
            function index(){
                $user= Auth::user();
                   if($user!=null){
                   $wishlists=Wishlist::where('user_id','=',$user->id)->get();
                   $popularProducts  = Product::latest()->orderBy('visits','DESC')->limit(5)->get();
                     return view('frontend.wishlist',\compact('wishlists','popularProducts'))  ;
                   }else{
                    return redirect('/login')->with('status', 'Please Login first');

                   }


            }
            public function add(Request $request)
                {
                    // return $request->all();
                   $user= Auth::user();
                   if($user!=null){
                        $wishlist=Wishlist::where('product_id','=',$request->product_id)->where('user_id','=',$user->id)->first();
                        if($wishlist!=null){
                            return redirect()->back()->with('status', 'Wishlist already added');
                        }else{
                        $wishlist = new Wishlist;
                        $wishlist->user_id       = $user->id;
                        $wishlist->product_id    = $request->product_id;
                        $wishlist->product_title = $request->product_title;
                        $wishlist->product_image = $request->product_image;
                        $wishlist->save();
                        return redirect()->back()->with('status', 'Wishlist added successfully');
                        }
                   }else{
                    return redirect()->back()->with('status', 'Please Login first');

                   }
                    
                
                }
            public function delete($id)
            {
                Wishlist::destroy($id);
                return redirect()->back()->with('status', 'Wishlist deleted successfully');
            }
           
}
