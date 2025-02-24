<!DOCTYPE html>
<html class="no-js" lang="en">
    @include('home.include.head')
<body>
    @include('home.include.header')	
    <main class="main">
        <div class="page-header mt-30 mb-50">
           
        </div>
        <div class="container mb-30">
            <div class="row flex-row-reverse">
                <div class="col-lg-4-5">
                    {{-- <div class="shop-product-fillter">
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
                    </div> --}}
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
                                        <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                    </div> --}}
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Most Popular</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    {{-- <div class="product-category">
                                        <a href="shop-grid-right.html">Snack</a>
                                    </div> --}}
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
                                            <span>₹{{ $product->productActualPrice }}</span>
                                            <span class="old-price">₹{{ $product->productPrice }}</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="{{ url('product', $product->productSlug) }}"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
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

                    {{-- <section class="section-padding pb-5">
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
                                                <span class="font-small text-muted"><a href="{{ $deals_product->productCategory }}">{{ $deals_product->productCategory }}</a></span>
                                            </div>
                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span>₹{{$deals_product->productActualPrice}}</span>
                                                    <span class="old-price">₹{{$deals_product->productPrice}}</span>
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
                    </section> --}}
                    <!--End Deals-->
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar">

                    <div class="container mt-5">
                        <h3 class="text-center mb-4">Explore Categories</h3>
                    
                        <div class="accordion custom-accordion" id="categoryAccordion">
                            @foreach($getparentCategory_header as $parentCategory)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $parentCategory->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $parentCategory->id }}" aria-expanded="false" aria-controls="collapse{{ $parentCategory->id }}">
                                             {{ $parentCategory->categoryName }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $parentCategory->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $parentCategory->id }}" data-bs-parent="#categoryAccordion">
                                        <div class="accordion-body">
                                            <ul class="subcategory-list">
                                                @foreach($parentCategory->subcategories as $subcategory)
                                                    <li class="subcategory" data-name="{{ $subcategory->categorySlug }}" data-bs-toggle="collapse" data-bs-target="#subcat{{ $subcategory->id }}">
                                                             {{ $subcategory->categoryName }}
                                                        <ul class="collapse product-list" id="subcat{{ $subcategory->id }}">
                                                            @foreach($subcategory->products as $product)
                                                                <li><a href="{{ url('product', $product->productSlug) }}">{{ $product->productName }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30">Categories</h5>
                        <ul>
                            @foreach($getparentCategory_header as $parentCategory)
                            <li>
                                <a href="{{ url('category', $parentCategory->categorySlug) }}">{{ $parentCategory->categoryName }}</a><span class="count">30</span>
                            </li>
                            @endforeach --}}
                            
                            {{-- @foreach($getparentCategory_header as $parentCategory)
                                <li class="menu-item-has-children">
                                    <a href="{{ url('category', $parentCategory->categorySlug) }}">{{ $parentCategory->categoryName }}</a>
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
                            @endforeach --}}

                        {{-- </ul>
                    </div> --}}

                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
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
                                <p class="price mb-0 mt-5">₹ {{$recently_product->productActualPrice}}</p>
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