<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\Subscribe;
use Illuminate\Http\JsonResponse;
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
        $search=strtolower($request->search);
        $minPrice=$request->minPrice;
        $maxPrice=$request->maxPrice;

        $query = Product::orderBy('created_at','desc');
        if($request->search){
            // This will only execute if you received any keyword
            $query = $query->where('title','like','%'.$search.'%');
        }
        if($request->category){
            // This will only execute if you received any keyword
            $query = $query->where('category','like','%'.$category.'%');
        }
        if($request->minPrice && $request->maxPrice){
            // This will only execute if you received any price
            // Make you you validated the min and max price properly
            $query = $query->where('price','>=',$request->minPrice);
            $query = $query->where('price','<=',$request->maxPrice);
        }
        $products = $query->where("offer",0);
        $products = $query->paginate(2);

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
        $popularProducts  = Product::orderBy('visits','DESC')->limit(5)->get();
        $relatedProducts  = Product::orderBy('visits','DESC')->where('category',$product->category)->limit(5)->get();

        $data=compact('product','popularProducts','relatedProducts');
        return view('frontend.details')->with($data);
    }
    
    public function contactUs(Request $request){
       
         $details = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ];
       
        \Mail::to('softwareengg.courses4u@gmail.com')->send(new \App\Mail\Test($details));   
        return redirect()->back()->with('success', 'Thank you!  Your Message sent successfully');
    }


    
}
