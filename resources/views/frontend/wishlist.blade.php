@extends('frontend.master')

@section('main')
<div class="wrap-breadcrumb">
    <ul>
        <li class="item-link"><a href="{{url('/')}}" class="link">Home</a></li>
        <li class="item-link"><span>Wishlist</span></li>
    </ul>
</div>
<div class=" main-content-area">

    <div class="wrap-iten-in-cart">
        <h3 class="box-title">Products Name</h3>

        <div class="table-responsive">
            <table class="table activitites">
                <thead>
                    <tr>
                        <th scope="col" class="text-uppercase header">item</th>
                        <th scope="col" class="text-uppercase">Title</th>
                        <th scope="col" class="text-uppercase">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($wishlists)>0)           
            
           
            
                    @foreach ($wishlists as $cart)
                    <tr>
                        <td>
                            <figure><img width="50" src="{{$cart->product_image}}" alt="No Image Found"></figure>   
                        {{-- <figure><img width="50" src="{{url('images')}}/{{$cart->product_image}}" alt="No Image Found"></figure>    --}}
                        </td>
                        <td>
                            <div class="product-name">
                            <a href="{{url('/product')}}/{{$cart->product_id}}/{{strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $cart->product_title)))}}" title="{{$cart->product_title}}">
                                {{$cart->product_title}}</a>     
                        </div>
                        </td>
                       <td class="font-weight-bold">
                            <a class="btn btn-danger btn-sm" href="{{route('whishlist.delete',['id'=>$cart->id])}}">
                                &times;
                            </a>
                           
                    </tr>
                    @endforeach
            @else
            <p>No Item found in wishlist</p>

            @endif
                </tbody>
            </table>
        </div>

    </div>


    <div class="wrap-show-advance-info-box style-1 box-in-site">
        <h3 class="title-box">Most Viewed Products</h3>
        <div class="wrap-products">
            <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="true" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
                @foreach ($popularProducts as $product)
                    
               
                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                            <figure><img src="{{$product->images[0]->path}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                        </a>
                        <div class="group-flash">
                            <span class="flash-item new-label">new</span>
                        </div>
                        <div class="wrap-btn">
                            <a href="#" class="function-link">quick view</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="{{url('/product')}}/{{$cart->product_id}}/{{strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $cart->product_title)))}}" title="{{$cart->product_title}}">
                            {{$cart->product_title}}</a>
                        <div class="wrap-price"><span class="product-price">${{$product->price}}</span></div>
                    </div>
                </div>
                @endforeach

                
            </div>
        </div><!--End wrap-products-->
    </div>

</div><!--end main content area-->
@endsection