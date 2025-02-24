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
                                                            <img class="default-img" src="{{ asset('storage/images/' . $product->frontImage) }}" alt="{{ $product->productName }}" />
                                                            <img class="hover-img" src="{{ asset('storage/images/' . $product->frontImage) }}" alt="{{ $product->productName }}" />
                                                        </a>
                                                    </div>
                                                    {{-- <div class="product-action-1">
                                                        <a aria-label="Add To Wishlist" class="action-btn" href="javascript:void(0)"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Quick view" class="action-btn" data-id="{{ $product->id }}" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                            <i class="fi-rs-eye"></i>
                                                        </a>
                                                        
                                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                    </div> --}}
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