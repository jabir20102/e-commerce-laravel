@extends('frontend.master')

@section('main')

<div class="wrap-breadcrumb">
    <ul>
        <li class="item-link"><a href="#" class="link">home</a></li>
        <li class="item-link"><span>detail</span></li>
    </ul>
</div>

<div class="row">

<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

<div class="wrap-product-detail">
    <div class="detail-media">
        <div class="product-gallery">
            <ul class="slides">
             @foreach ($product->images as $image)

            <li data-thumb="{{url('images')}}/{{$image->path}}">
                <img src="{{url('images')}}/{{$image->path}}" alt="product thumbnail" />
            </li>
            @endforeach  

            </ul>
        </div>
    </div>
    <div class="detail-info">
        <div class="product-rating">
            @php
            
                $count=count($product->comments);
                $sum=0;
                $avg=0;
                if($count!=0){
                        
              foreach ($product->comments as $comment) {
                  $sum+=$comment->rating;
              }
               $avg=ceil($sum/$count);
            }
            @endphp
            @for ($i = 0; $i < $avg; $i++)
            <i class="fa fa-star" aria-hidden="true"></i>                
            @endfor
            
            <a href="#" class="count-review">({{$count}} review)</a>
        </div>
            <form id="cart_form" action="{{route('cart.add')}}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="hidden" name="product_title" value="{{$product->title}}">
                <input type="hidden" name="product_image" value="{{$product->images[0]->path}}">
        <h2 class="product-name">{{$product->title}}</h2>
        <div class="short-desc">
            <ul>
                <li>7,9-inch LED-backlit, 130Gb</li>
                <li>Dual-core A7 with quad-core graphics</li>
                <li>FaceTime HD Camera 7.0 MP Photos</li>
            </ul>
        </div>
        <div class="wrap-social">
            <a class="link-socail" href="#"><img src="assets/images/social-list.png" alt=""></a>
        </div>
        
        <div class="wrap-price"><span class="product-price">${{$product->price}}</span></div>
        <input type="hidden" name="price" value="{{$product->price}}">
        <div class="stock-info in-stock">
            <p class="availability">Availability: <b>In Stock</b></p>
        </div>
        <div class="quantity">
            <span>Quantity:</span>
            <div class="quantity-input">
                <input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" >
                
                <a class="btn btn-reduce" href="#"></a>
                <a class="btn btn-increase" href="#"></a>
            </div>
        </div>
        <div class="wrap-butons"> 
            <a href="javascript:{}" onclick="document.getElementById('cart_form').submit();" class="btn add-to-cart">Add to Cart</a>
        </form>
            <div class="wrap-btn">
                <a href="#" class="btn btn-compare">Add Compare</a>
                <form id="wishlist_form" action="{{route('wishlist.add')}}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="hidden" name="product_title" value="{{$product->title}}">
                <input type="hidden" name="product_price" value="{{$product->price}}">
                <input type="hidden" name="product_image" value="{{$product->images[0]->path}}">
                {{-- <input type="submit" class="btn btn-wishlist" value="Add to Wishlist"> --}}
                <a class="btn btn-wishlist" href="javascript:{}" onclick="document.getElementById('wishlist_form').submit();">Add to Wishlist</a>
                </form>
            </div>
        </div>
    </div>
    <div class="advance-info">
        <div class="tab-control normal">
            <a href="#description" class="tab-control-item active">description</a>
            <a href="#add_infomation" class="tab-control-item">Addtional Infomation</a>
            <a href="#review" class="tab-control-item">Reviews</a>
        </div>
        <div class="tab-contents">
            <div class="tab-content-item active" id="description">
                {!! $product->description !!}
            </div>
            <div class="tab-content-item " id="add_infomation">
                {{$product->image}}
            </div>
            <div class="tab-content-item " id="review">
                
                <div class="wrap-review-form">
                    
                    <div id="comments">
                        <h2 class="woocommerce-Reviews-title">{{count($product->comments)}} reviews for <span>{{$product->title}}</span></h2>
                        <ol class="commentlist">
                           @foreach ($product->comments as $comment)
                           <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                            <div id="comment-20" class="comment_container"> 
                                <img alt="" src="{{asset('assets/images/author-avata.jpg')}}" height="80" width="80">
                                <div class="comment-text">
                                   
                                    @for ($i = 0; $i < $comment->rating; $i++)
                                    <i class="fa fa-star" aria-hidden="true"></i>                
                                    @endfor
                                    <p class="meta"> 
                                        <strong class="woocommerce-review__author">{{$comment->name}}</strong> 
                                        <span class="woocommerce-review__dash">–</span>
                                        <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >{{$comment->created_at}}</time>
                                    </p>
                                    <div class="description">
                                        <p>{{$comment->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                           @endforeach
                        </ol>
                    </div><!-- #comments -->

                    <div id="review_form_wrapper">
                        <div id="review_form">
                            <div id="respond" class="comment-respond"> 

                                <form action="{{route('comment.add',['product_id'=>$product->id])}}" method="post" id="commentform" class="comment-form" novalidate="">
                                    @csrf
                                    <p class="comment-notes">
                                        <span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
                                    </p>
                                    <div class="comment-form-rating">
                                        <span>Your rating</span>
                                        <p class="stars">
                                            
                                            <label for="rated-1"></label>
                                            <input type="radio" id="rated-1" name="rating" value="1">
                                            <label for="rated-2"></label>
                                            <input type="radio" id="rated-2" name="rating" value="2">
                                            <label for="rated-3"></label>
                                            <input type="radio" id="rated-3" name="rating" value="3">
                                            <label for="rated-4"></label>
                                            <input type="radio" id="rated-4" name="rating" value="4">
                                            <label for="rated-5"></label>
                                            <input type="radio" id="rated-5" name="rating" value="5" checked="checked">
                                        </p>
                                    </div>
                                    <p class="comment-form-author">
                                        <label for="author">Name <span class="required">*</span></label> 
                                        <input id="author" name="name" type="text" value="">
                                    </p>
                                    <p class="comment-form-email">
                                        <label for="email">Email <span class="required">*</span></label> 
                                        <input id="email" name="email" type="email" value="" >
                                    </p>
                                    <p class="comment-form-comment">
                                        <label for="comment">Your review <span class="required">*</span>
                                        </label>
                                        <textarea id="comment" name="comment" cols="45" rows="8"></textarea>
                                    </p>
                                    <p class="form-submit">
                                        <input  type="submit" id="submit" class="submit" value="Submit">
                                    </p>
                                </form>

                            </div><!-- .comment-respond-->
                        </div><!-- #review_form -->
                    </div><!-- #review_form_wrapper -->

                </div>
            </div>
        </div>
    </div>
</div>
</div><!--end main products area-->
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
    
<div class="widget mercado-widget widget-product">
    <h2 class="widget-title">Popular Products</h2>
    <div class="widget-content">
        <ul class="products">
            @foreach ($popularProducts as $product)
                
            
            <li class="product-item">
                <div class="product product-widget-style">
                    <div class="thumbnnail">
                        <a href="{{url('/product')}}/{{$product->id}}/{{strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $product->title)))}}" class="product-name">
                                
                            <figure><img src="{{url('images')}}/{{$product->images[0]->path}}" alt=""></figure>
                        </a>
                    </div>
                    <div class="product-info">
                        <a href="#" class="product-name"><span>{{$product->title}}</span></a>
                        <div class="wrap-price"><span class="product-price">${{$product->price}}</span></div>
                    </div>
                </div>
            </li>
            @endforeach

        </ul>
    </div>
</div>
<div class="widget widget-our-services ">
    <div class="widget-content">
        <ul class="our-services">

            <li class="service">
                <a class="link-to-service" href="#">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                    <div class="right-content">
                        <b class="title">Free Shipping</b>
                        <span class="subtitle">On Oder Over $99</span>
                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                    </div>
                </a>
            </li>

            <li class="service">
                <a class="link-to-service" href="#">
                    <i class="fa fa-gift" aria-hidden="true"></i>
                    <div class="right-content">
                        <b class="title">Special Offer</b>
                        <span class="subtitle">Get a gift!</span>
                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                    </div>
                </a>
            </li>

            <li class="service">
                <a class="link-to-service" href="#">
                    <i class="fa fa-reply" aria-hidden="true"></i>
                    <div class="right-content">
                        <b class="title">Order Return</b>
                        <span class="subtitle">Return within 7 days</span>
                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div><!-- Categories widget-->


</div><!--end sitebar-->
	<div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="wrap-show-advance-info-box style-1 box-in-site">
				<h3 class="title-box">Related Products</h3>
				<div class="wrap-products">
					<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
                        @foreach ($relatedProducts as $product)                          
                        
                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{url('/product')}}/{{$product->id}}/{{strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $product->title)))}}" class="product-name">
                                    
                                        <figure><img src="{{url('images')}}/{{$product->images[0]->path}}" alt=""></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item new-label">new</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="{{url('/product')}}/{{$product->id}}/{{strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $product->title)))}}" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="{{url('/product')}}/{{$product->id}}/{{strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $product->title)))}}" class="product-name"><span>{{$product->title}}</span></a>
                                    <div class="wrap-price"><span class="product-price">${{$product->price}}</span></div>
                                </div>
                            </div>
                        @endforeach


					</div>
				</div><!--End wrap-products-->
			</div>
		</div>

</div><!--end row-->

@endsection