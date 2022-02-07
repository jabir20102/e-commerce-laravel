<!--header-->
<header id="header" class="header header-style-1">
    <div class="container-fluid">
        <div class="row">
            <div class="topbar-menu-area">
                <div class="container">
                    <div class="topbar-menu left-menu">
                        <ul>
                            <li class="menu-item" >
                                <a title="Hotline: (+123) 456 789" href="#" ><span class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
                            </li>
                        </ul>
                    </div>
                    <div class="topbar-menu right-menu">
                        <ul>
                            
                                <li class="menu-item lang-menu menu-item-has-children parent">
                                <a title="English" href="#"><span class="img label-before"><img src="{{asset('assets/images/lang-en.png')}}" alt="lang-en"></span>English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="submenu lang" >
                                    <li class="menu-item" ><a title="hungary" href="#"><span class="img label-before"><img src="{{asset('assets/images/lang-hun.png')}}" alt="lang-hun"></span>Hungary</a></li>
                                    <li class="menu-item" ><a title="german" href="#"><span class="img label-before"><img src="{{asset('assets/images/lang-ger.png')}}" alt="lang-ger" ></span>German</a></li>
                                </ul>
                            </li>
                            {{-- <li class="menu-item menu-item-has-children parent" >
                                <a title="Dollar (USD)" href="#">Dollar (USD)<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="submenu curency" >
                                    <li class="menu-item" >
                                        <a title="Pound (GBP)" href="#">Pound (GBP)</a>
                                    </li>
                                    
                                </ul>
                            </li> --}}
                            
                            @guest
                            @if (Route::has('login'))
                                <li class="menu-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="menu-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            
                            @else
                            
                            <li class="menu-item lang-menu menu-item-has-children parent">
                                <a id="navbarDropdown" title="Name" href="#">{{ Auth::user()->name }}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                
                                <ul class="submenu lang" >
                                    <li class="menu-item" >
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    </li>
                                    
                                    
                                </ul>
                            </li>
                        @endguest
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="mid-section main-info-area">

                    <div class="wrap-logo-top left-section">
                        <a href="{{url('/')}}" class="link-to-home"><img src="{{asset('assets/images/logo-top-1.png')}}" alt="mercado"></a>
                    </div>

                    <div class="wrap-search center-section">
                        <div class="wrap-search-form">
                            <form action="{{url('/')}}" id="form-search-top" name="form-search-top">
                                <input type="text" name="search" value="" placeholder="Search here...">
                                <button form="form-search-top" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                <div class="wrap-list-cate">
                                    <select style="width: 120px"  name="category" class="form-select" aria-label="Default select example">
                                        <option style="text-align:left" value="">All Categories</option>
                                        <option style="text-align:left" value="mobiles">Mobiles</option>
                                        <option style="text-align:left" value="laptops">Laptop</option>
                                        <option style="text-align:left" value="lcds">LCDs</option>
                                      </select>
                                    {{-- <input type="hidden" name="product-cate" value="0" id="product-cate">
                                    <a href="#" class="link-control">All Category</a>
                                    <ul class="list-cate">
                                        <li class="level-0">All Category</li>
                                        <li class="level-1">-Electronics</li>
                                        <li class="level-2">Batteries & Chargens</li>
                                        <li class="level-2">Headphone & Headsets</li>
                                        <li class="level-2">Mp3 Player & Acessories</li>
                                        <li class="level-1">-Smartphone & Table</li>
                                        <li class="level-2">Batteries & Chargens</li>
                                        <li class="level-2">Mp3 Player & Headphones</li>
                                        <li class="level-2">Table & Accessories</li>
                                        <li class="level-1">-Electronics</li>
                                        <li class="level-2">Batteries & Chargens</li>
                                        <li class="level-2">Headphone & Headsets</li>
                                        <li class="level-2">Mp3 Player & Acessories</li>
                                        <li class="level-1">-Smartphone & Table</li>
                                        <li class="level-2">Batteries & Chargens</li>
                                        <li class="level-2">Mp3 Player & Headphones</li>
                                        <li class="level-2">Table & Accessories</li>
                                    </ul> --}}
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="wrap-icon right-section">
                        <div class="wrap-icon-section wishlist">
                            <a href="{{route('wishlist')}}" class="link-direction">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                                <div class="left-info">
                                    <span class="index">
                                        {{
                                            Auth::user()?
                                                App\Models\Wishlist::where('user_id','=',Auth::user()->id)->get()->count()."  Items"
                                                : "0 Items"
                                        }}</span>
                                    <span class="title">Wishlist</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section minicart">
                            <a href="{{route('cart')}}" class="link-direction">
                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                <div class="left-info">
                                    <span class="index">
                                        {{
                                            Auth::user()?
                                                App\Models\Cart::where('user_id','=',Auth::user()->id)->get()->count()."  Items"
                                                : "0 Items"
                                        }}</span>
                                    <span class="title">CART</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section show-up-after-1024">
                            <a href="#" class="mobile-navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="nav-section header-sticky">
                <div class="header-nav-section">
                    <div class="container">
                        <ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info" >
                            <li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="{{route('hotSale')}}" class="link-term">Hot Sale items</a><span class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="#" class="link-term">Top new items</a><span class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="#" class="link-term">Top Selling</a><span class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="#" class="link-term">Top rated items</a><span class="nav-label hot-label">hot</span></li>
                        </ul>
                    </div>
                </div>

                <div class="primary-nav-section">
                    <div class="container">
                        <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
                            <li class="menu-item home-icon">
                                <a href="{{url('/')}}" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
                            </li>
                            <li class="menu-item">
                                <a href="about-us.html" class="link-term mercado-item-title">About Us</a>
                            </li>
                            
                            <li class="menu-item">
                                <a href="{{route('cart')}}" class="link-term mercado-item-title">Cart</a>
                            </li>
                            
                            <li class="menu-item">
                                <a href="{{route('contactUs')}}" class="link-term mercado-item-title">Contact Us</a>
                            </li>																	
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @if(session('success'))
        
        <div class="alert alert-success alert-dismissible mt=10">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success! </strong> {{ session('success') }}
          </div>

        @endif
        @if(session('warning'))
        
        <div class="alert alert-warning alert-dismissible mt=10">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Warning! </strong> {{ session('warning') }}
          </div>

        @endif
        @if(session('danger'))
        
        <div class="alert alert-danger alert-dismissible mt=10">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Danger!  </strong> {{ session('danger') }}
          </div>

        @endif
        @if(session('status'))
        
        <div class="alert alert-danger alert-dismissible mt=10">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Danger!  </strong> {{ session('status') }}
          </div>

        @endif
        

    </div>
   
</header>