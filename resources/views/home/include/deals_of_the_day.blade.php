<section class="section-padding pb-5">
    <div class="container">
        <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
            <h3 class="">Deals Of The Day</h3>
            <a class="show-all" href="shop-grid-right.html">
                All Deals
                <i class="fi-rs-angle-right"></i>
            </a>
        </div>
        <div class="row">
            @foreach($dealsProduct as $key => $deals_product)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                    <div class="product-img-action-wrap">
                        <div class="product-img">

                            {{-- <img src="{{ asset('storage/images/' . ($featued_product->frontImage  ?? 'default.jpg')) }}"
                            alt="{{ $featued_product->productName }}" class="default-img">
                       <img src="{{ asset('storage/images/' . ($featued_product->frontImage ?? 'default.jpg')) }}"
                            alt="{{ $featued_product->productName }}" class="hover-img"> --}}

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
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
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
    </div>
</section>
<section class="section-padding mb-30">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                <h4 class="section-title style-1 mb-30 animated animated">Top Selling</h4>
                <div class="product-list-small animated animated">
                    @foreach($topsellingProduct as $key => $topselling_product)
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="shop-product-right.html">
                                <img src="{{ asset('storage/images/' . $topselling_product->frontImage) }}" alt="" />
                        </figure>
                        <div class="col-md-8 mb-0">                            
                            <h6>
                                <a href="{{ url('product', $topselling_product->productSlug) }}">{{$topselling_product->productName}}</a>
                            </h6>
                            <div class="product-price">
                                <span>{{$topselling_product->productActualPrice}}</span>
                                <span class="old-price">{{$topselling_product->productPrice}}</span>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                <h4 class="section-title style-1 mb-30 animated animated">Trending Products</h4>
                <div class="product-list-small animated animated">
                    @foreach($trendingProduct as $key => $trending_product)
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="shop-product-right.html">
                                <img src="{{ asset('storage/images/' . $trending_product->frontImage) }}" alt="" />
                        </figure>
                        <div class="col-md-8 mb-0">                            
                            <h6>
                                <a href="{{ url('product', $trending_product->productSlug) }}">{{$trending_product->productName}}</a>
                            </h6>
                            <div class="product-price">
                                <span>{{$trending_product->productActualPrice}}</span>
                                <span class="old-price">{{$trending_product->productPrice}}</span>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                <div class="product-list-small animated animated">
                    @foreach($recentlyProduct as $key => $recently_product)
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="">
                                <img src="{{ asset('storage/images/' . $recently_product->frontImage) }}" alt="" />
                        </figure>
                        <div class="col-md-8 mb-0">                            
                            <h6>
                                <a href="{{ url('product', $recently_product->productSlug) }}">{{$recently_product->productName}}</a>
                            </h6>
                            <div class="product-price">
                                <span>{{$recently_product->productActualPrice}}</span>
                                <span class="old-price">{{$recently_product->productPrice}}</span>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                <h4 class="section-title style-1 mb-30 animated animated">Top Rated</h4>
                <div class="product-list-small animated animated">
                    @foreach($topratedProduct as $key => $toprated_product)
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{ url('product', $toprated_product->productSlug) }}">
                                <img src="{{ asset('storage/images/' . $toprated_product->frontImage) }}" alt="" />
                        </figure>
                        <div class="col-md-8 mb-0">                            
                            <h6>
                                <a href="{{ url('product', $toprated_product->productSlug) }}">{{$toprated_product->productName}}</a>
                            </h6>
                            <div class="product-price">
                                <span>{{$toprated_product->productActualPrice}}</span>
                                <span class="old-price">{{$toprated_product->productPrice}}</span>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>