<div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
        <div class="detail-gallery">
            <!-- Product images -->
            <div class="product-image-slider">
                {{-- @foreach($product->images as $image)
                    <figure class="border-radius-10">
                        <img src="{{ asset('storage/'.$image->path) }}" alt="product image" />
                    </figure>
                @endforeach --}}
                <figure class="border-radius-10">
                    <img src="{{ asset('images/' . $product->productImage) }}" alt="{{ $product->productName }}" />
                    {{-- <img src="{{ asset('storage/'.$image->path) }}" alt="product image" /> --}}
                </figure>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="detail-info pr-30 pl-30">
            <h3 class="title-detail">{{ $product->productName }}</h3>
            <div class="product-price">
                <span class="current-price text-brand">${{ $product->productActualPrice }}</span>
                @if($product->productPrice)
                    <span class="old-price">${{ $product->productPrice }}</span>
                @endif
            </div>
            <div class="detail-extralink mb-30">
                <button class="button button-add-to-cart" data-id="{{ $product->id }}">
                    <i class="fi-rs-shopping-cart"></i>Add to cart
                </button>
            </div>
        </div>
    </div>
</div>
