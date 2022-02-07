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
        $products=Product::where('category','like','%'.$category.'%')
        ->where('offer','0')
        ->where('title', 'like', '%' . $search . '%')
        ->paginate(6);
        
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
    public function contactUs(){
        $email="pakcricket131@gmail.com";
        // Mail::to($email)->send(new Subscribe($email));
        // return new JsonResponse(
        //     [
        //         'success' => true, 
        //         'message' => "Thank you for subscribing to our email, please check your inbox"
        //     ], 
        //     200
        // );
        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];
       
        \Mail::to('softwareengg.courses4u@gmail.com')->send(new \App\Mail\Test($details));
       
        // return view('frontend.contactUS');
        
    }


    
}
