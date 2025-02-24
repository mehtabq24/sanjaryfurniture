        <!-- ==================== Start Header ==================== -->
        <header class="header-area header-style-1 header-height-2">
            <div class="mobile-promotion">
                <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
            </div>
            <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
                <div class="container">
                    <div class="header-wrap">
                        <div class="logo logo-width-1">
                            <a href="{{ url('/') }}"><img src="home/assets/imgs/theme/logo.jpg" alt="logo" /></a>
                        </div>
                        <div class="header-right">
                            <form action="{{url('search')}}" method="GET">
                            {{-- <form action="javascript:void(0)" method="GET"> --}}
                                @csrf
                                <div class="search-style-2">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <input type="text" style="height: 55px;" name="search_input" placeholder="Search for items..." />
                                            </div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-info" type="submit">Search</button>
                                            </div>
                                        </div>
                                </div>
                            </form>
                            <div class="header-action-right">
                                <div class="header-action-2">
                                    @if (Route::has('login'))
                                        @auth
                                            <div class="header-action-icon-2">
                                                <a href="javascript:void(0)">
                                                    <img class="svgInject" alt="Nest" src="{{ asset('home/assets/imgs/theme/icons/icon-user.svg') }}" />
                                                </a>
                                                <a href="javascript:void(0)"><span class="label ml-0">Account</span></a>
                                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('profile.show') }}"><i class="fi fi-rs-user mr-10"></i>My Account</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('orderdetail') }}">
                                                                <i class="fi fi-rs-label mr-10"></i>My Order
                                                            </a>

                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)"><i class="fi fi-rs-heart mr-10"></i>My Wishlist</a>
                                                        </li>
                                                        <li>
                                                            <form method="POST" action="{{ route('logout') }}">
                                                                @csrf
                                                                <a href="{{ route('logout') }}"
                                                                onclick="event.preventDefault();
                                                                            this.closest('form').submit();">
                                                                    <i class="fi fi-rs-sign-out mr-10"></i>Sign out
                                                                </a>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @else
                                                <div class="header-action-icon-2">
                                                    <a href="{{ route('login') }}"><span class="label ml-0">Login</span></a>
                                                </div>
                                                <div class="header-action-icon-2">
                                                    <a href="{{ route('register') }}"><span class="label">Register</span></a>
                                                </div>
                                            @endauth
                                    @endif

                                    <a href="javascript:void(0)">
                                        <img alt="Nest" src="home/assets/imgs/theme/icons/icon-heart.svg" />
                                        {{-- <span class="pro-count blue">2</span> --}}
                                    </a>
                                    <div class="header-action-icon-2">
                                        <a class="mini-cart-icon" href="/cart">
                                            <img alt="Nest" src="home/assets/imgs/theme/icons/icon-cart.svg" />
                                            {{-- <span class="pro-count blue">2</span> --}}
                                        </a>
                                        <a href="/cart"><span class="lable">Cart</span></a>
                                        {{-- <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                            <ul>
                                                <li>
                                                    <div class="shopping-cart-img">
                                                        <a href="shop-product-right.html"><img alt="Nest" src="home/assets/imgs/shop/thumbnail-3.jpg" /></a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4><a href="home/shop-product-right.html">Daisy Casual Bag</a></h4>
                                                        <h4><span>1 × </span>$800.00</h4>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="shopping-cart-img">
                                                        <a href="javascript:void(0)"><img alt="Nest" src="home/assets/imgs/shop/thumbnail-2.jpg" /></a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4><a href="javascript:void(0)">Corduroy Shirts</a></h4>
                                                        <h4><span>1 × </span>$3200.00</h4>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="shopping-cart-footer">
                                                <div class="shopping-cart-total">
                                                    <h4>Total <span>$4000.00</span></h4>
                                                </div>
                                                <div class="shopping-cart-button">
                                                    <a href="shop-cart.html" class="outline">View cart</a>
                                                    <a href="shop-checkout.html">Checkout</a>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-bottom-bg-color sticky-bar">
                <div class="container">
                    <div class="header-wrap header-space-between position-relative">
                        <div class="logo logo-width-1 d-block d-lg-none">
                            <a href="{{ url('/') }}">
                                <img src="home/assets/imgs/theme/logo.jpg" class="mobile_logo" alt="logo" /></a>
                        </div>
                        <div class="header-nav d-none d-lg-flex">
                            <div class="main-categori-wrap d-none d-lg-block">
                                <a class="categories-button-active" href="#">
                                    <span class="fi-rs-apps"></span> <span class="et">Browse</span> All Categories
                                    <i class="fi-rs-angle-down"></i>
                                </a>
                                <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                                    <div class="d-flex categori-dropdown-inner">
                                        <ul>

                                            @foreach($getsubCategory_header as $subcategory)
                                            <li>
                                                <a class="menu-title" href="{{ url('categories', $subcategory->categorySlug) }}">{{ $subcategory->categoryName }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <ul class="end">
                                            @foreach($getsubCategory_header as $subcategory)
                                            <li>
                                                <a class="menu-title" href="{{ url('categories', $subcategory->categorySlug) }}">{{ $subcategory->categoryName }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="more_slide_open" style="display: none">
                                        <div class="d-flex categori-dropdown-inner">
                                            <ul>
                                                @foreach($getsubCategory_header as $subcategory)
                                                <li>
                                                    <a class="menu-title" href="{{ url('categories', $subcategory->categorySlug) }}">{{ $subcategory->categoryName }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <ul class="end">
                                                @foreach($getsubCategory_header as $subcategory)
                                                <li>
                                                    <a class="menu-title" href="{{ url('categories', $subcategory->categorySlug) }}">{{ $subcategory->categoryName }}</a>
                                                </li>
                                                @endforeach
                                                </ul>
                                        </div>
                                    </div>
                                    <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show more...</span></div>
                                </div>
                            </div>
                            <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                                <nav>
                                    <ul>
                                        <li><a class="active" href="{{ url('/') }}"> Home </a></li>
                                      
                                        @foreach($getparentCategory_header as $parentCategory)
                                        <li class="position-static">
                                            {{-- <a href="{{ url('category', $parentCategory->categorySlug) }}">{{ $parentCategory->categoryName }}<i class="fi-rs-angle-down"></i></a> --}}
                                            <a href="javascript:void(0)">{{ $parentCategory->categoryName }}<i class="fi-rs-angle-down"></i></a>
                                            <ul class="mega-menu">
                                                @foreach($parentCategory->subcategories as $subcategory)
                                                    <li class="sub-mega-menu sub-mega-menu-width-22">
                                                        <a class="menu-title" href="{{ url('categories', $subcategory->categorySlug) }}">{{ $subcategory->categoryName }}</a>
                                                        <ul>
                                                            @foreach($subcategory->products as $product)
                                                                <li><a href="{{ url('product', $product->productSlug) }}">{{ $product->productName }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                        <li><a href="about">About Us</a> </li>
                                        <li> <a href="contact">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        
                        <div class="hotline d-none d-lg-flex">
                           <div class="mobile-social-icon">
                            <h6>Follow Us</h6>
                            <a href="javascript:void(0)"><img src="home/assets/imgs/theme/icons/icon-facebook-white.svg" alt=""></a>
                            <a href="javascript:void(0)"><img src="home/assets/imgs/theme/icons/icon-twitter-white.svg" alt=""></a>
                            <a href="javascript:void(0)"><img src="home/assets/imgs/theme/icons/icon-instagram-white.svg" alt=""></a>
                            <a href="javascript:void(0)"><img src="home/assets/imgs/theme/icons/icon-pinterest-white.svg" alt=""></a>
                            <a href="javascript:void(0)"><img src="home/assets/imgs/theme/icons/icon-youtube-white.svg" alt=""></a>
                        </div>
                        </div>
                        <div class="header-action-icon-2 d-block d-lg-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                        <div class="header-action-right d-block d-lg-none">
                            <div class="header-action-2">
                                <div class="header-action-icon-2">
                                    <a href="javascript:void(0)">
                                        <img alt="Nest" src="home/assets/imgs/theme/icons/icon-heart.svg" />
                                    </a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="javascript:void(0)">
                                        <img alt="Nest" src="home/assets/imgs/theme/icons/icon-cart.svg" />
                                        {{-- <span class="pro-count white">2</span> --}}
                                    </a>
                                    {{-- <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul>
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="javascript:void(0)"><img alt="Nest" src="home/assets/imgs/shop/thumbnail-3.jpg" /></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="javascript:void(0)">Plain Striola Shirts</a></h4>
                                                    <h3><span>1 × </span>$800.00</h3>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="shop-product-right.html"><img alt="Nest" src="home/assets/imgs/shop/thumbnail-4.jpg" /></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>
                                                    <h3><span>1 × </span>$3500.00</h3>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total <span>$383.00</span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="shop-cart.html">View cart</a>
                                                <a href="shop-checkout.html">Checkout</a>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
         <div class="mobile-header-active mobile-header-wrapper-style">
            <div class="mobile-header-wrapper-inner">
                <div class="mobile-header-top">
                    <div class="mobile-header-logo">
                        <a href="{{ url('/') }}"><img src="home/assets/imgs/theme/logo.jpg" alt="logo" /></a>
                    </div>
                    <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                        <button class="close-style search-close">
                            <i class="icon-top"></i>
                            <i class="icon-bottom"></i>
                        </button>
                    </div>
                </div>
                <div class="mobile-header-content-area">
                    {{-- <div class="mobile-search search-style-3 mobile-header-border">
                
                            <input type="text" placeholder="Search for items…" />
                            <button type="submit"><i class="fi-rs-search"></i></button>
                    </div> --}}
                    <div class="mobile-menu-wrap mobile-header-border">
                        <!-- mobile menu start -->
                        <nav>
                            <ul class="mobile-menu font-heading">
                                {{-- <li class="menu-item-has-children">
                                    <a href="{{ url('/') }}">Home</a>
                                </li> --}}
                                <li><a class="active" href="{{ url('/') }}"> Home </a></li>

                                @foreach($getparentCategory_header as $parentCategory)
                                <li class="menu-item-has-children">
                                    {{-- <a href="{{ url('category', $parentCategory->categorySlug) }}">{{ $parentCategory->categoryName }}</a> --}}
                                    <a href="javascript:void(0)">{{ $parentCategory->categoryName }}</a>
                                    <ul class="dropdown">
                                        @foreach($parentCategory->subcategories as $subcategory)
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="{{ url('categories', $subcategory->categorySlug) }}">{{ $subcategory->categoryName }}</a>
                                                <ul>
                                                    @foreach($subcategory->products as $product)
                                                        <li><a href="{{ url('product', $product->productSlug) }}">{{ $product->productName }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                            <li><a href="about">About Us</a> </li>
                            <li> <a href="contact">Contact Us</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu end -->
                    </div>
                    <div class="mobile-header-info-wrap">
                        <div class="single-mobile-header-info">
                            <a href="#0"><i class="fi-rs-marker"></i> Our location </a>
                        </div>
                        <div class="single-mobile-header-info">
                            <a href="#0"><i class="fi-rs-user"></i>Log In / Sign Up </a>
                        </div>
                        <div class="single-mobile-header-info">
                            <a href="#"><i class="fi-rs-headphones"></i>(+01) - 2345 - 6789 </a>
                        </div>
                    </div>
                    <div class="mobile-social-icon mb-50">
                        <h6 class="mb-15">Follow Us</h6>
                        <a href="javascript:void(0)"><img src="home/assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                        <a href="javascript:void(0)"><img src="home/assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                        <a href="javascript:void(0)"><img src="home/assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                        <a href="javascript:void(0)"><img src="home/assets/imgs/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                        <a href="javascript:void(0)"><img src="home/assets/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
                    </div>
                    <div class="site-copyright">Copyright 2024 © D-Elite. All rights reserved. Powered by D-Elite.</div>
                </div>
            </div>
        </div>
        <!-- ==================== End header ==================== -->

            <!-- Modal -->
    <div class="modal fade custom-modal" id="onloadModal" tabindex="-1" aria-labelledby="onloadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="deal" style="background-image: url('home/assets/imgs/banner/popup-1.png')">
                        <div class="deal-top">
                            <h6 class="mb-10 text-brand-2">Deal of the Day</h6>
                        </div>
                        <div class="deal-content detail-info">
                            <h4 class="product-title"><a href="shop-product-right.html" class="text-heading">Organic fruit for your family's health</a></h4>
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand">$38</span>
                                    <span>
                                        <span class="save-price font-md color3 ml-15">26% Off</span>
                                        <span class="old-price font-md ml-15">$52</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="deal-bottom">
                            <p class="mb-20">Hurry Up! Offer End In:</p>
                            <div class="deals-countdown pl-5" data-countdown="2025/03/25 00:00:00">
                                <span class="countdown-section"><span class="countdown-amount hover-up">03</span><span class="countdown-period"> days </span></span><span class="countdown-section"><span class="countdown-amount hover-up">02</span><span class="countdown-period"> hours </span></span><span class="countdown-section"><span class="countdown-amount hover-up">43</span><span class="countdown-period"> mins </span></span><span class="countdown-section"><span class="countdown-amount hover-up">29</span><span class="countdown-period"> sec </span></span>
                            </div>
                            <div class="product-detail-rating">
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (32 rates)</span>
                                </div>
                            </div>
                            <a href="shop-grid-right.html" class="btn hover-up">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick view -->

    <div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body" id="quickViewContent">
                    <!-- Dynamic content will be loaded here -->
                </div>
            </div>
        </div>
    </div>
    