<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');//->except(['signin','signin_post']);
    }

    function addProduct()
    {
        return view('admin.addProduct');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $products=Product::latest()->get();
     return view('admin.products',\compact('products'));   
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo '<pre>';
    //   return  $request->all();
        $product = new Product;
        $product->title = $request->title;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->visits = 1;
        $product->offerPrice = $request->offerPrice;
        $product->description = $request->description;
        $product->shortDescription = $request->shortDescription;
        ($request->offer)?$product->offer='1': $product->offer='0';
        $product->save();
        return redirect('/admin/products')->with('status', 'Product added successfully');
       
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
     $product=Product::where('id','=',$id)->first();
     return view('admin.editProduct',\compact('product')); 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::where('id','=',$id)->first();
        $product->title = $request->title;
        $product->price = $request->price;
        $product->offerPrice = $request->offerPrice;
        ($request->offer)?$product->offer='1': $product->offer='0';
        $product->shortDescription = $request->shortDescription;
        $product->description = $request->description;
        $product->save();
        return redirect('/admin/products')->with('status', 'Product updated successfully');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function productDelete($id)
    {
        Product::destroy($id);
        return redirect('/admin/products')->with('status', 'Product deleted successfully');
    }
}
