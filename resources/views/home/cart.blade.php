<!DOCTYPE html>
<html class="no-js" lang="en">
    @include('home.include.head')
<body>
    @include('home.include.header')	
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Shop
                    <span></span> Cart
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h1 class="heading-2 mb-10">Your Cart</h1>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">There are <span class="text-brand">{{ $cart_count }}</span> products in your cart</h6>
                        {{-- <h6 class="text-body"><a href="#" class="text-muted"><i class="fi-rs-trash mr-5"></i>Clear Cart</a></h6> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="table-responsive shopping-summery">
                        <table class="table table-wishlist">
                            <thead>
                                <tr class="main-heading">
                                    <th class="custome-checkbox start pl-30">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                                        <label class="form-check-label" for="exampleCheckbox11"></label>
                                    </th>
                                    <th scope="col" colspan="2">Product</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col" class="end">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($cartData && count($cartData) > 0)
                                    @foreach($cartData as $key => $product)
                                        <tr class="pt-30">
                                            <td class="custome-checkbox pl-30">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox{{ $key }}" value="">
                                                <label class="form-check-label" for="exampleCheckbox{{ $key }}"></label>
                                            </td>
                                            <td class="image product-thumbnail pt-40">
                                                <img src="{{ asset('storage/images/' . (is_object($product) ? $product->productImage : $product['productImage'])) }}" alt="" />
                                            </td>
                                            <td class="product-des product-name">
                                                <h6 class="mb-5">
                                                    <a class="product-name mb-10 text-heading" href="product/{{ is_object($product) ? $product->productSlug : $product['productSlug'] }}">
                                                        {{ is_object($product) ? $product->productName : $product['productName'] }}
                                                    </a>
                                                </h6>
                                            </td>
                                            <td class="price" data-title="Price">
                                                <h4 class="text-body">₹ {{ is_object($product) ? $product->productActualPrice : $product['productActualPrice'] }}</h4>
                                            </td>
                                            <td class="text-center detail-info" data-title="Stock">
                                                <div class="detail-extralink mr-15">
                                                    <div class="detail-qty border radius">
                                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                        <span class="qty-val">{{ is_object($product) ? $product->quantity : $product['quantity'] }}</span>
                                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="price" data-title="Subtotal">
                                                <h4 class="text-brand">₹ {{ (is_object($product) ? $product->quantity : $product['quantity']) * (is_object($product) ? $product->productActualPrice : $product['productActualPrice']) }}</h4>
                                            </td>
                                            <td class="action text-center" data-title="Remove">
                                                <a href="{{ Auth::check() ? url('/remove_cart', $product->id) : url('/remove_cart', $key) }}" class="text-body">
                                                    <i class="fi-rs-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center">Your cart is empty.</td>
                                    </tr>
                                @endif
                            </tbody>                            
                        </table>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="cart-action d-flex justify-content-between">
                        <a class="btn " href="{{ url('/') }}"><i class="fi-rs-arrow-left mr-10"></i>Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="border p-md-4 cart-totals ml-30">
                        <div class="table-responsive">
                            <table class="table no-border">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Subtotal</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">₹ {{ $totalSum }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="col" colspan="2">
                                            <div class="divider-2 mt-10 mb-10"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Shipping</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h5 class="text-heading text-end">Free</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="col" colspan="2">
                                            <div class="divider-2 mt-10 mb-10"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Total</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">₹ {{ $totalSum }}</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ url('proceed_checkout') }}" class="btn mb-20 w-100">Proceed To CheckOut<i class="fi-rs-sign-out ml-15"></i></a>
                    </div>
                </div>
            </div>            
        </div>
    </main>

    @include('home.include.footer')
    @include('home.include.foot')