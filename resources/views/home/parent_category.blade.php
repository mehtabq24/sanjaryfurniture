<!DOCTYPE html>
<html class="no-js" lang="en">
    @include('home.include.head')
<body>
    @include('home.include.header')	
    <main class="main">
        <div class="container mb-30 mt-30">
            <div class="row flex-row-reverse">
                <div class="col-lg-4-5">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>We found <strong class="text-brand">29</strong> items for you!</p>
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
                                        <a href="shop-product-right.html">
                                            <img class="default-img" src="{{ asset('images/' . $product->productImage) }}" alt="" />
                                            <img class="hover-img" src="{{ asset('images/' . $product->productImage) }}" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop-grid-right.html">Snack</a>
                                    </div>
                                    <h2><a href="shop-product-right.html">{{$product->productName}}</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div>
                                        <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>${{ $product->productPrice }}</span>
                                            <span class="old-price">${{ $product->productActualPrice }}</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
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

                    <section class="product-tabs section-padding position-relative">
                        <div class="container text-center">
                            <h3 style="padding-bottom: 16px;">Best Seller Products</h3>
                            <div class="section-title style-2 wow animate__animated animate__fadeIn">
                                <ul class="nav nav-tabs links" id="myTab" role="tablist">
                                    @foreach($getparentCategory as $key => $getparent_cat)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link @if($loop->first) active @endif" id="nav-tab-{{ $key }}" data-bs-toggle="tab" data-bs-target="#tab-{{ $key }}" type="button" role="tab" aria-controls="tab-{{ $key }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                            {{ $getparent_cat->categoryName }}
                                        </button>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!--End nav-tabs-->
                            
                            <div class="tab-content" id="myTabContent">
                                @foreach($getparentCategory as $key => $getparent_cat)
                                <div class="tab-pane fade @if($loop->first) show active @endif" id="tab-{{ $loop->index }}" role="tabpanel" aria-labelledby="nav-tab-{{ $loop->index }}">
                                    <div class="row product-grid-4">
                                        @foreach($getparent_cat->products as $product)
                                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="{{ url('product', $product->productSlug) }}">
                                                            <img class="default-img" src="{{ asset('images/' . $product->productImage) }}" alt="{{ $product->productName }}" />
                                                            <img class="hover-img" src="{{ asset('images/' . $product->productImage) }}" alt="{{ $product->productName }}" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Add To Wishlist" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">Hot</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="{{ url('category', $product->productCategory) }}">{{ $product->productCategory }}</a>
                                                    </div>
                                                    <h2><a href="{{ url('product', $product->productSlug) }}">{{ $product->productName }}</a></h2>
                                                    <div>
                                                        <span class="font-small text-muted"><a href="{{ url('categories', $product->productSubcategory) }}">{{ $product->productSubcategory }}</a></span>
                                                    </div>
                                                    <div class="product-card-bottom">
                                                        <div class="product-price">
                                                            <span>{{ $product->productActualPrice }}</span>
                                                            <span class="old-price">{{ $product->productPrice }}</span>
                                                        </div>
                                                        <div class="add-cart">
                                                            <a class="add" href="{{ url('product', $product->productSlug) }}"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!--end product card-->
                                    </div>
                                    <!--End product-grid-4-->
                                </div>
                                @endforeach
                            </div>
                            <!--End tab-content-->                    
                        </div>
                    </section>
                    

                    <section class="section-padding pb-5">
                        <div class="section-title">
                            <h3 class="">Deals Of The Day</h3>
                            <a class="show-all" href="shop-grid-right.html">
                                All Deals
                                <i class="fi-rs-angle-right"></i>
                            </a>
                        </div>
                        <div class="row">
                            @foreach($dealsProduct as $key => $deals_product)
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-cart-wrap style-2">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img">
                                            <a href="shop-product-right.html">
                                                <img src="{{ asset('images/' . $deals_product->productImage) }}" alt="" />
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
                                                <span class="font-small text-muted"><a href="{{ $deals_product->productCategory }}">{{ $deals_product->productCategory }}</a></span>
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
                    <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30">Categories</h5>
                        <ul>
                            @foreach($getparentCategory as $key => $getparent_cat)
                            <li>
                                <a href="{{ url('category', $getparent_cat->categorySlug) }}">{{ $getparent_cat->categoryName }}</a><span class="count">30</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                        <h5 class="section-title style-1 mb-30">New products</h5>
                        @foreach($recentlyProduct as $key => $recently_product)
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="{{ asset('images/' . $recently_product->productImage) }}" alt="" />
                            </div>
                            <div class="content pt-10">
                                <h6>
                                <a href="{{ url('product', $recently_product->productSlug) }}">{{$recently_product->productName}}</a>
                            </h6>
                                <p class="price mb-0 mt-5">${{$recently_product->productActualPrice}}</p>
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