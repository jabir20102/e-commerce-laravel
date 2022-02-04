<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;


class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $category=$request->category;
        $search=$request->search;
        $products=Product::where('category','like','%'.$category.'%')
        ->where('offer','0')->where('title', 'like', '%' . $search . '%')->paginate(6);
        
         $data=compact('products');
         return view('frontend.shop')->with($data);
    }
    public function hotSale(){
        $products=Product::where('offer','1')->get();
        
        $data=compact('products');
        return view('frontend.hotsales')->with($data);
    }
    public function viewProduct($id){
        $product=Product::where('id',$id)->first();
        $product->increment('visits',1);
        $popularProducts  = Product::latest()->orderBy('visits','DESC')->limit(5)->get();
        $relatedProducts  = Product::latest()->orderBy('visits','DESC')->where('category',$product->category)->limit(5)->get();

        $data=compact('product','popularProducts','relatedProducts');
        return view('frontend.details')->with($data);
    }
    public function contactUs(){
        // $product=Product::where('id',$id)->first();
        
        // $data=compact('product');
        return view('frontend.contactUS');//->with($data);
    }


    
}
