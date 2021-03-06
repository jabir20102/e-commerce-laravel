@extends('frontend.master')

@section('title', 'HOT SALE ITEMS')
@section('main')

<!--Latest Products-->
<div class="wrap-show-advance-info-box style-1">
    <h3 class="title-box">Hot Sales Products</h3>
    <div class="wrap-top-banner">
        <a href="#" class="link-banner banner-effect-2">
            <figure><img src="assets/images/digital-electronic-banner.jpg" width="1170" height="240" alt=""></figure>
        </a>
    </div>

    <div class="wrap-products">
        <div class="wrap-product-tab tab-style-1">						
            <div class="tab-contents">
                <div class="tab-content-item active" id="digital_1a">
                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                        {{-- @if ($products.length()>0) --}}
                            
                        
                        @foreach ($products as $product)
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{url('/product')}}/{{$product->id}}/{{strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $product->title)))}}" title="{{$product->title}}">
                                    <figure><img src="{{$product->images[0]->path}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                {{-- <figure><img src="{{url('images')}}/{{$product->images[0]->path}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure> --}}
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">HOT SALE</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>{{$product->title}}</span></a>
                                <div class="short-desc">
                                    {{$product->shortDescription}}
                                </div>
                                <div class="wrap-price"><span class="product-price">${{$product->price}}</span></div>
                                <del><p class="product-price">${{$product->offerPrice}}</p></del>
                            </div>
                        </div>
                        @endforeach                        
                        {{-- @else
                            <p>No Products foun</p>
                        @endif --}}
                       
                    </div>
                </div>							
            </div>
        </div>
    </div>

</div>    
@endsection