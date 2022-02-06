<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;


class ApiController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $category=$request->category;
        $search=$request->search;
        // echo "<pre>";
        return  $products=Product::where('category','like','%'.$category.'%')
        ->where('offer','0')->where('title', 'like', '%' . $search . '%')
        ->paginate(6);
        
        $data=compact('products');
        //  return view('frontend.shop')->with($data);
    }
}
