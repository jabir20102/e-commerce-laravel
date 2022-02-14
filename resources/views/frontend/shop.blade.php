@extends('frontend.master')
@push('style')	@endpush


@section('title', 'Home')
@section('main')
    <!--MAIN SLIDES-->
    <div class="wrap-main-slide">
        <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
            <div class="item-slide">
                <img src="assets/images/main-slider-1-1.jpg" alt="" class="img-slide">
                <div class="slide-info slide-1">
                    <h2 class="f-title">Kid Smart <b>Watches</b></h2>
                    <span class="subtitle">Compra todos tus productos Smart por internet.</span>
                    <p class="sale-info">Only price: <span class="price">$59.99</span></p>
                    <a href="#" class="btn-link">Shop Now</a>
                </div>
            </div>
            <div class="item-slide">
                <img src="assets/images/main-slider-1-2.jpg" alt="" class="img-slide">
                <div class="slide-info slide-2">
                    <h2 class="f-title">Extra 25% Off</h2>
                    <span class="f-subtitle">On online payments</span>
                    <p class="discount-code">Use Code: #FA6868</p>
                    <h4 class="s-title">Get Free</h4>
                    <p class="s-subtitle">TRansparent Bra Straps</p>
                </div>
            </div>
            <div class="item-slide">
                <img src="assets/images/main-slider-1-3.jpg" alt="" class="img-slide">
                <div class="slide-info slide-3">
                    <h2 class="f-title">Great Range of <b>Exclusive Furniture Packages</b></h2>
                    <span class="f-subtitle">Exclusive Furniture Packages to Suit every need.</span>
                    <p class="sale-info">Stating at: <b class="price">$225.00</b></p>
                    <a href="#" class="btn-link">Shop Now</a>
                </div>
            </div>
        </div>
    </div>

<div class="wrap-breadcrumb">
    <ul>
        <li class="item-link"><a href="{{url('/')}}" class="link">Home</a></li>
        <li class="item-link"><span>{{ 
            app('request')->input('category')!=""?
            app('request')->input('category'): "All Categories" }}</span></li>
    </ul>
</div>
<div class="row">


    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

        {{-- <div class="banner-shop">
            <a href="#" class="banner-link">
                <figure><img src="assets/images/shop-banner.jpg" alt=""></figure>
            </a>
        </div> --}}

        <div class="wrap-shop-control">

            <h1 class="shop-title">{{ 
                app('request')->has('search')?
               "'". app('request')->input('search')."' result": "Top Products" }}</h1>
            
{{-- 
            <div class="wrap-right">

                <div class="sort-item orderby ">
                    <select name="orderby" class="use-chosen" >
                        <option value="menu_order" selected="selected">Default sorting</option>
                        <option value="popularity">Sort by popularity</option>
                        <option value="rating">Sort by average rating</option>
                        <option value="date">Sort by newness</option>
                        <option value="price">Sort by price: low to high</option>
                        <option value="price-desc">Sort by price: high to low</option>
                    </select>
                </div>

                <div class="sort-item product-per-page">
                    <select name="post-per-page" class="use-chosen" >
                        <option value="12" selected="selected">12 per page</option>
                        <option value="16">16 per page</option>
                        <option value="18">18 per page</option>
                        <option value="21">21 per page</option>
                        <option value="24">24 per page</option>
                        <option value="30">30 per page</option>
                        <option value="32">32 per page</option>
                    </select>
                </div>

                <div class="change-display-mode">
                    <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                    <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                </div>

            </div> --}}

        </div><!--end wrap shop control-->

        <div class="row">

            <ul class="product-list grid-products equal-container">
                @foreach ($products as $product)
                <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                    <div class="product product-style-3 equal-elem ">
                        <div class="product-thumnail">
                            <a href="{{url('/product')}}/{{$product->id}}/{{strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $product->title)))}}"" title="{{$product->title}}">
                                <figure><img src="{{$product->images[0]->path}}" alt="{{$product->title}}"></figure>
                            {{-- <figure><img src="{{url('images')}}/{{$product->images[0]->path}}" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure> --}}
                            </a>
                        </div>
                        <div class="product-info">
                            <a href="{{url('/product')}}/{{$product->id}}/{{strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $product->title)))}}" class="product-name">
                                <span>
                                    @php
                                    $search=app('request')->input('search');
                                     echo  str_replace($search,"<mark>".$search."</mark>",$product->title);
                                    @endphp
                                    
                                    </span></a>
                                    <div class="short-desc">
                                        {{$product->shortDescription}}
                                    </div>
                            <div class="wrap-price"><span class="product-price">${{$product->price}}</span></div>
                            <form id="cart_form{{$product->id}}" action="{{route('cart.add')}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="hidden" name="product_title" value="{{$product->title}}">
                                <input type="hidden" name="price" value="{{$product->price}}">
                                <input type="hidden" name="product-quatity" value="1">
                                <input type="hidden" name="product_image" value="{{$product->images[0]->path}}">
                            <a href="javascript:{}" onclick="document.getElementById('cart_form{{$product->id}}').submit();" class="btn add-to-cart">Add To Cart</a>
                            </form>
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>

        </div>
        

        <div class="wrap-pagination-info">
            {{ $products->appends(request()->input())->links('vendor.pagination.custom') }}
            <p class="result-count">Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }} results</p>
        </div>
    </div><!--end main products area-->

    @include('frontend.category')
   
</div><!--end row-->

@endsection