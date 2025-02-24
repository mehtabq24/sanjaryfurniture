<!DOCTYPE html>
<html class="no-js" lang="en">
    @include('home.include.head')
<body>
    @include('home.include.header')

    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
		<br>
        
        @if(session()->has('success_message'))
        
        <div class="alert alert-success">
            {{session()->get('success_message')}}
        </div>
    
        @endif


        <div class="container ">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h1 class="heading-2 mb-10">Checkout</h1>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">There are <span class="text-brand">{{ $cart_count }}</span> products in your cart</h6>
                    </div>
                </div>
            </div>
				<br>
            <div class="row">
                <div class="col-lg-7">
                    <div class="row mb-50">
                        <div class="col-lg-6 mb-sm-15 mb-lg-0 mb-md-3">
                            <div class="toggle_info">
                                <span><i class="fi-rs-user mr-10"></i><span class="text-muted font-lg">Already have an account? <br> </span> <a href="#loginform" data-bs-toggle="collapse" class="collapsed font-lg" aria-expanded="false">Click here to login</a></span>
                            </div>
                            <div class="panel-collapse collapse login_form" id="loginform">
                                <div class="panel-body">
                                    <p class="mb-30 font-sm">If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h4 class="mb-30">Billing Details</h4>
                        <form action="{{ url('add_checkout') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input type="text" name="name" value="{{ $userDetails ? $userDetails->user_name : old('name') }}" placeholder="Name *">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text" name="email" value="{{ $userDetails ? $userDetails->user_email : old('email') }}" placeholder="Email *">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input type="text" name="address"  placeholder="Address *">
                                    @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text" name="address2" placeholder="Address line2">
                                </div>
                            </div>
                            <div class="row shipping_calculator">
                                <div class="form-group col-lg-6">
                                    <div class="custom_select">
                                        <select class="form-control select-active" name="state">
                                            <option value="">Select a state...</option>
                                            <option value="maharashtra">Maharashtra</option>
                                            <option value="kolkata">Kolkata</option>
                                            <option value="delhi">Delhi</option>
                                            <option value="gujarat">Gujarat</option>
                                        </select>
                                        @error('state')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text" name="city" placeholder="City / Town *">
                                    @error('city')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input type="text" name="zipcode" placeholder="Postcode / ZIP *">
                                    @error('zipcode')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text" name="phone" value="{{ $userDetails ? $userDetails->user_phone : old('phone') }}" placeholder="Phone *">
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-30">
                                <textarea rows="5" placeholder="Additional information" name="user_message"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="createaccount">
                                        <label class="form-check-label label_info" data-bs-toggle="collapse" href="#collapsePassword" data-target="#collapsePassword" aria-controls="collapsePassword" for="createaccount"><span>Create an account?</span></label>
                                    </div>
                                </div>
                            </div>
                            <div id="collapsePassword" class="form-group create-account collapse in">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="password" placeholder="Password" name="password">
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="border p-40 cart-totals ml-30 mb-50">
                            <div class="d-flex align-items-end justify-content-between mb-30">
                                <h4>Your Order</h4>
                                <h6 class="text-muted">Subtotal</h6>
                            </div>
                            <div class="divider-2 mb-30"></div>
                            <div class="table-responsive order_table checkout">
                                <table class="table no-border">
                                    <tbody>
                                        @if(!empty($cartData))
                                            @foreach($cartData as $product)
                                            <tr>
                                                <td class="image product-thumbnail">
                                                    <img src="{{ asset('storage/images/' . (is_object($product) ? $product->productImage : $product['productImage'])) }}" alt="{{ is_object($product) ? $product->productName : $product['productName'] }}" />
                                                </td>
                                                <td>
                                                    <h6 class="w-160 mb-5">
                                                        <a href="product/{{ is_object($product) ? $product->productSlug : $product['productSlug'] }}" class="text-heading">{{ is_object($product) ? $product->productName : $product['productName'] }}</a>
                                                    </h6>
                                                </td>
                                                <td>
                                                    <h6 class="text-muted pl-20 pr-20">x {{ is_object($product) ? $product->quantity : $product['quantity'] }}</h6>
                                                </td>
                                                <td>
                                                    <h4 class="text-brand">₹ {{ is_object($product) ? $product->productPrice : $product['productActualPrice'] }}</h4>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td><h4 class="text-brand">Total</h4></td>
                                                <td><h4 class="text-brand">₹ {{ $totalSum }}</h4></td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="4"><h4 class="text-brand">Your cart is empty</h4></td>
                                            </tr>
                                        @endif
                                    </tbody>                                    
                                </table>
                            </div>
                        </div>
                        <div class="payment ml-30">
                            <h4 class="mb-30">Payment</h4>
                            <div class="payment_option">
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios4" checked="">
                                    <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
                                </div>
                            </div>
                            <div class="payment-logo d-flex">
                                <img class="mr-15" src="assets/imgs/theme/icons/payment-paypal.svg" alt="">
                                <img class="mr-15" src="assets/imgs/theme/icons/payment-visa.svg" alt="">
                                <img class="mr-15" src="assets/imgs/theme/icons/payment-master.svg" alt="">
                                <img src="assets/imgs/theme/icons/payment-zapper.svg" alt="">
                            </div>
                            <button class="btn btn-fill-out mt-30" type="submit">Place an Order</button>
                            {{-- <input type="submit" class="btn btn-fill-out btn-block mt-30">Place an Order<i class="fi-rs-sign-out ml-15"></i> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @include('home.include.footer')
    @include('home.include.foot')