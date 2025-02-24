<!DOCTYPE html>
<html class="no-js" lang="en">
    @include('home.include.head')
<body>
    @include('home.include.header')	
    <main class="main">
        {{-- <div class="page-header mt-30 mb-50">
            <div class="container">
                <div class="archive-header">
                    <div class="row align-items-center">
                        <div class="col-xl-3">
                            <h1 class="mb-15">Snack</h1>
                            <div class="breadcrumb">
                                <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                                <span></span> Shop <span></span> Snack
                            </div>
                        </div>
                        <div class="col-xl-9 text-end d-none d-xl-block">
                            <ul class="tags-list">
                                <li class="hover-up">
                                    <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Cabbage</a>
                                </li>
                                <li class="hover-up active">
                                    <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Broccoli</a>
                                </li>
                                <li class="hover-up">
                                    <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Artichoke</a>
                                </li>
                                <li class="hover-up">
                                    <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Celery</a>
                                </li>
                                <li class="hover-up mr-0">
                                    <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Spinach</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="container mb-30">
            <div class="row flex-row-reverse">
                <div class="col-lg-4-5">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>We found <strong class="text-brand">{{ $searchCount }}</strong> items for you!</p>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Show:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">50</a></li>
                                        <li><a href="#">100</a></li>
                                        <li><a href="#">150</a></li>
                                        <li><a href="#">200</a></li>
                                        <li><a href="#">All</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">Featured</a></li>
                                        <li><a href="#">Price: Low to High</a></li>
                                        <li><a href="#">Price: High to Low</a></li>
                                        <li><a href="#">Release Date</a></li>
                                        <li><a href="#">Avg. Rating</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product-grid">
                        @foreach($searched_product as $key => $product)

                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ url('product', $product->productSlug) }}">
                                            <img class="default-img" src="{{ asset('storage/images/' . $product->frontImage) }}" alt="" />
                                            <img class="hover-img" src="{{ asset('storage/images/' . $product->frontImage) }}" alt="" />
                                        </a>
                                    </div>
                                    {{-- <div class="product-action-1">
                                        <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                    </div> --}}
                                    {{-- <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div> --}}
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        

                                        <a href="{{ url('categories', $product->productSubcategory) }} ">{{ str_replace(' ', ' ', ucwords(str_replace('-', ' ', $product->productSubcategory))); }}</a>
                                    </div>
                                    <h2><a href="{{ url('product', $product->productSlug) }}">{{$product->productName}}</a></h2>
                                    {{-- <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div> --}}
                                    {{-- <div>
                                        <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>
                                    </div> --}}
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>₹{{ $product->productPrice }}</span>
                                            <span class="old-price">₹{{ $product->productActualPrice }}</span>
                                        </div>
                                        <div class="add-cart">
                                            <a href="{{ url('product', $product->productSlug) }}"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end product card-->
                        @endforeach
                    </div>
                    <div class="pagination justify-content-center mt-3">
                        {{ $searched_product->links() }}
                    </div>

                    <section class="section-padding pb-5">
                        <div class="row">
                            @foreach($dealsProduct as $key => $deals_product)
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-cart-wrap style-2">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img">
                                            <a href="{{ url('product', $deals_product->productSlug) }}">
                                                <img src="{{ asset('storage/images/' . $deals_product->frontImage) }}" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="deals-countdown-wrap">
                                            <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"></div>
                                        </div>
                                        <div class="deals-content">
                                            <h2><a href="{{ url('product', $deals_product->productSlug) }}">{{$deals_product->productName}}</a></h2>
                                            <div>
                                                <span class="font-small text-muted"><a href="{{ $deals_product->productCategory }}">{{ str_replace(' ', ' ', ucwords(str_replace('-', ' ', $deals_product->productCategory))) }}</a></span>
                                            </div>
                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span>{{$deals_product->productActualPrice}}</span>
                                                    <span class="old-price">{{$deals_product->productPrice}}</span>
                                                </div>
                                                <div class="add-cart">
                                                    <a class="add" href="{{ url('product', $deals_product->productSlug) }}"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    <!--End Deals-->
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                    {{-- <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30">Category</h5>
                        <ul>
                            <li>
                                <a href="shop-grid-right.html">Milks & Dairies</a><span class="count">30</span>
                            </li>
                            <li>
                                <a href="shop-grid-right.html">Clothing</a><span class="count">35</span>
                            </li>
                            <li>
                                <a href="shop-grid-right.html">Pet Foods </a><span class="count">42</span>
                            </li>
                            <li>
                                <a href="shop-grid-right.html">Baking material</a><span class="count">68</span>
                            </li>
                            <li>
                                <a href="shop-grid-right.html">Fresh Fruit</a><span class="count">87</span>
                            </li>
                        </ul>
                    </div> --}}
                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar mt-70 mb-30 p-30 bg-grey border-radius-10">
                        <h5 class="section-title style-1 mb-30">New products</h5>
                        @foreach($recentlyProduct as $key => $recently_product)
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="{{ asset('storage/images/' . $recently_product->frontImage) }}" alt="" />
                            </div>
                            <div class="content pt-10">
                                <h6>
                                <a href="{{ url('product', $recently_product->productSlug) }}">{{$recently_product->productName}}</a>
                            </h6>
                                <p class="price mb-0 mt-5">₹{{$recently_product->productActualPrice}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('home.include.footer')
    @include('home.include.foot')