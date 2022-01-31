@extends('frontend.master')

@section('main')
<div class="wrap-breadcrumb">
    <ul>
        <li class="item-link"><a href="{{url('/')}}" class="link">Home</a></li>
        <li class="item-link"><span>wishlist</span></li>
    </ul>
</div>
<div class=" main-content-area">

    <div class="wrap-iten-in-cart">
        <h3 class="box-title">Wishlist</h3>
        <ul class="products-cart">
            @if (count($wishlists)>0)
                
            
            @foreach ($wishlists as $wishlist)
            <li class="pr-cart-item">
                <div class="product-image">
                    <figure><img src="{{url('images')}}/{{$wishlist->product_image}}" alt="No Image Found"></figure>
                </div>
                <div class="product-name">
                    <a href="{{url('/product')}}/{{$wishlist->product_id}}/{{strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $wishlist->product_title)))}}" title="{{$wishlist->product_title}}">
                        {{$wishlist->product_title}}</a>             
                    {{-- <a class="link-to-product" href="#">Radiant-360 R6 Wireless Omnidirectional Speaker [White]</a> --}}
                </div>
                {{-- <div class="price-field produtc-price"><p class="price">${{$wishlist->product_price}}</p></div> --}}
               
                <div class="delete">
                    <a href="{{route('whishlist.delete',['id'=>$wishlist->id])}}">
                        <i  class="fa fa-times-circle" ></i>
                    </a>
                </div>
            </li>	  
            @endforeach
            @else
            	<p>No Items found in your wishlist</p>	
            @endif    									
        
        </ul>
    </div>



</div><!--end main content area-->
@endsection