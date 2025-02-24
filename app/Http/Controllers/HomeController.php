<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function index()
    {

        $featuredProduct = DB::table('products')
            ->leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->where('product_images.is_front', true); // Get only the front image
            })
            ->select(
                'products.id',
                'products.productName',
                'products.productCategory',
                'products.productSubcategory',
                'products.productPrice',
                'products.productActualPrice',
                'products.productDisc',
                'products.productStatus',
                'products.productSlug',
                'product_images.path as frontImage' // Include front image path
            )
            ->where('products.productStatus', 'active')
            ->orderBy('products.id', 'asc')
            ->paginate(10); // Change 5 to the number of items per page

        // return view('admin.product_list', ['productsData' => $products]);

        //     $featuredProduct = DB::table('products')
        //         ->select('id', 'productImage', 'productName', 'productCategory', 'productSubcategory', 'productPrice', 'productActualPrice', 'productDisc', 'productStatus', 'productSlug')
        //         ->where('productStatus', 'active')
        //         ->orderBy('id', 'desc')
        //         ->get();

        $dealsProduct = DB::table('products')
            ->leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->where('product_images.is_front', true); // Get only the front image
            })
            ->select(
                'products.id',
                'products.productName',
                'products.productCategory',
                'products.productSubcategory',
                'products.productPrice',
                'products.productActualPrice',
                'products.productDisc',
                'products.productStatus',
                'products.productSlug',
                'product_images.path as frontImage' // Include front image path
            )
            ->where('products.productStatus', 'active')
            ->orderBy('products.id', 'desc')
            ->paginate(10); // Change 5 to the number of items per page

        // $topsellingProduct = DB::table('products')
        //     ->select('id', 'productImage', 'productName', 'productCategory', 'productSubcategory', 'productPrice', 'productActualPrice', 'productDisc', 'productStatus', 'productSlug')
        //     ->where('productStatus', 'active')
        //     ->orderBy('id', 'desc')
        //     ->limit(3)
        //     ->get();

        $topsellingProduct = DB::table('products')
            ->leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->where('product_images.is_front', true); // Get only the front image
            })
            ->select(
                'products.id',
                'products.productName',
                'products.productCategory',
                'products.productSubcategory',
                'products.productPrice',
                'products.productActualPrice',
                'products.productDisc',
                'products.productStatus',
                'products.productSlug',
                'product_images.path as frontImage' // Include front image path
            )
            ->where('products.productStatus', 'active')
            ->orderBy('products.id', 'asc')
            ->paginate(10); // Change 5 to the number of items per page

        $trendingProduct = DB::table('products')
            ->leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->where('product_images.is_front', true); // Get only the front image
            })
            ->select(
                'products.id',
                'products.productName',
                'products.productCategory',
                'products.productSubcategory',
                'products.productPrice',
                'products.productActualPrice',
                'products.productDisc',
                'products.productStatus',
                'products.productSlug',
                'product_images.path as frontImage' // Include front image path
            )
            ->where('products.productStatus', 'active')
            ->orderBy('products.id', 'desc')
            ->paginate(10); // Change 5 to the number of items per page

        $recentlyProduct = DB::table('products')
            ->leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->where('product_images.is_front', true); // Get only the front image
            })
            ->select(
                'products.id',
                'products.productName',
                'products.productCategory',
                'products.productSubcategory',
                'products.productPrice',
                'products.productActualPrice',
                'products.productDisc',
                'products.productStatus',
                'products.productSlug',
                'product_images.path as frontImage' // Include front image path
            )
            ->where('products.productStatus', 'active')
            ->orderBy('products.id', 'desc')
            ->paginate(10); // Change 5 to the number of items per page

        $topratedProduct = DB::table('products')
            ->leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->where('product_images.is_front', true); // Get only the front image
            })
            ->select(
                'products.id',
                'products.productName',
                'products.productCategory',
                'products.productSubcategory',
                'products.productPrice',
                'products.productActualPrice',
                'products.productDisc',
                'products.productStatus',
                'products.productSlug',
                'product_images.path as frontImage' // Include front image path
            )
            ->where('products.productStatus', 'active')
            ->orderBy('products.id', 'desc')
            ->paginate(10); // Change 5 to the number of items per page


        $getparentCategory = DB::table('parent_categories')
            ->select('id', 'categoryName', 'categorySlug')
            ->where('status', 'active')
            ->where('parentCategory', 0)
            ->orderBy('id', 'desc')
            ->get();
        // Fetch products for each parent category
        foreach ($getparentCategory as $category) {
            $category->products = DB::table('products')
                ->leftJoin('product_images', function ($join) {
                    $join->on('products.id', '=', 'product_images.product_id')
                        ->where('product_images.is_front', true); // Get only the front image
                })->where('productCategory', 'LIKE', '%' . $category->categorySlug . '%')
                ->where('productStatus', 'active')
                ->select('products.*', 'product_images.path as frontImage') // Replace 'image_path' with the correct name
                ->orderBy('id', 'desc')
                ->get();
        }
        $getparentCategory_header = DB::table('parent_categories')
            ->select('id', 'categoryName', 'categorySlug')
            ->where('status', 'active')
            ->where('parentCategory', 0)
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();

        foreach ($getparentCategory_header as $parent_category) {
            // Fetch subcategories for each parent category
            $parent_category->subcategories = DB::table('parent_categories')
                ->select('id', 'categoryName', 'categorySlug')
                ->where('parentCategory', $parent_category->id)
                ->where('status', 'active')
                ->orderBy('id', 'desc')
                ->limit(10)
                ->get();

            // Fetch products for each subcategory
            foreach ($parent_category->subcategories as $subcategory) {
                $subcategory->products = DB::table('products')
                    ->select('id', 'productSlug', 'productName')
                    ->where('productSubcategory', $subcategory->categorySlug)
                    ->where('productStatus', 'active')
                    ->orderBy('id', 'desc')
                    ->limit(10)
                    ->get();
            }
        }
        return view('home.userpage', [
            'getparentCategory' => $getparentCategory,
            'featuredProduct' => $featuredProduct,
            'dealsProduct' => $dealsProduct,
            'topsellingProduct' => $topsellingProduct,
            'trendingProduct' => $trendingProduct,
            'recentlyProduct' => $recentlyProduct,
            'topratedProduct' => $topratedProduct,
        ]);
    }
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        $productCount = DB::table('products')->count();
        $orderCount = DB::table('order_details')->count();
        $users = DB::table('users')->count();
        $totalRevenue = DB::table('order_details')->sum('total');
        $deliveredOrdersCount = DB::table('order_details')
            ->where('delivey_status', 'delivered') // Adjust 'delivered' to your actual status value
            ->count();
        $payment_status = DB::table('order_details')
            ->where('payment_status', 'delivered') // Adjust 'delivered' to your actual status value
            ->count();

        if ($usertype == '1') {
            // return view('admin.home', ['totalCount' => $$productCount]);
            return view('admin.home', [
                'productCount' => $productCount,
                'orderCount' => $orderCount,
                'users' => $users,
                'totalRevenue' => $totalRevenue,
                'deliveredOrdersCount' => $deliveredOrdersCount,
                'payment_status' => $payment_status,
            ]);
        } else {

            $featuredProduct = DB::table('products')
                ->select('id', 'productImage', 'productName', 'productCategory', 'productSubcategory', 'productPrice', 'productActualPrice', 'productDisc', 'productStatus', 'productSlug')
                ->where('productStatus', 'active')
                ->orderBy('id', 'desc')
                ->get();

            $dealsProduct = DB::table('products')
                ->select('id', 'productImage', 'productName', 'productCategory', 'productSubcategory', 'productPrice', 'productActualPrice', 'productDisc', 'productStatus', 'productSlug')
                ->where('productStatus', 'active')
                ->orderBy('id', 'desc')
                ->limit(4)
                ->get();

            $topsellingProduct = DB::table('products')
                ->select('id', 'productImage', 'productName', 'productCategory', 'productSubcategory', 'productPrice', 'productActualPrice', 'productDisc', 'productStatus', 'productSlug')
                ->where('productStatus', 'active')
                ->orderBy('id', 'desc')
                ->limit(3)
                ->get();

            $trendingProduct = DB::table('products')
                ->select('id', 'productImage', 'productName', 'productCategory', 'productSubcategory', 'productPrice', 'productActualPrice', 'productDisc', 'productStatus', 'productSlug')
                ->where('productStatus', 'active')
                ->orderBy('id', 'asc')
                ->limit(3)
                ->get();

            $recentlyProduct = DB::table('products')
                ->select('id', 'productImage', 'productName', 'productCategory', 'productSubcategory', 'productPrice', 'productActualPrice', 'productDisc', 'productStatus', 'productSlug')
                ->where('productStatus', 'active')
                ->orderBy('id', 'desc')
                ->limit(3)
                ->get();

            $topratedProduct = DB::table('products')
                ->select('id', 'productImage', 'productName', 'productCategory', 'productSubcategory', 'productPrice', 'productActualPrice', 'productDisc', 'productStatus', 'productSlug')
                ->where('productStatus', 'active')
                ->orderBy('id', 'asc')
                ->limit(3)
                ->get();


            $getparentCategory = DB::table('parent_categories')
                ->select('id', 'categoryName', 'categorySlug')
                ->where('status', 'active')
                ->where('parentCategory', 0)
                ->orderBy('id', 'desc')
                ->get();
            // Fetch products for each parent category
            foreach ($getparentCategory as $category) {
                $category->products = DB::table('products')
                    ->where('productCategory', 'LIKE', '%' . $category->categorySlug . '%')
                    ->where('productStatus', 'active')
                    ->orderBy('id', 'desc')
                    ->get();
            }

            $getparentCategory_header = DB::table('parent_categories')
                ->select('id', 'categoryName', 'categorySlug')
                ->where('status', 'active')
                ->where('parentCategory', 0)
                ->orderBy('id', 'desc')
                ->limit(10)
                ->get();

            foreach ($getparentCategory_header as $parent_category) {
                // Fetch subcategories for each parent category
                $parent_category->subcategories = DB::table('parent_categories')
                    ->select('id', 'categoryName', 'categorySlug')
                    ->where('parentCategory', $parent_category->id)
                    ->where('status', 'active')
                    ->orderBy('id', 'desc')
                    ->limit(10)
                    ->get();

                // Fetch products for each subcategory
                foreach ($parent_category->subcategories as $subcategory) {
                    $subcategory->products = DB::table('products')
                        ->select('id', 'productSlug', 'productName')
                        ->where('productSubcategory', $subcategory->categorySlug)
                        ->where('productStatus', 'active')
                        ->orderBy('id', 'desc')
                        ->limit(10)
                        ->get();
                }
            }
            return view('home.userpage', [
                'getparentCategory' => $getparentCategory,
                'featuredProduct' => $featuredProduct,
                'dealsProduct' => $dealsProduct,
                'topsellingProduct' => $topsellingProduct,
                'trendingProduct' => $trendingProduct,
                'recentlyProduct' => $recentlyProduct,
                'topratedProduct' => $topratedProduct,
            ]);
        }
    }

    public function productDetails(string $slug)
    {
        $product = DB::table('products')
            ->select('id', 'productImage', 'productName', 'productCategory', 'productSubcategory', 'productPrice', 'productActualPrice', 'productDisc', 'productStatus', 'productSlug', 'productDescription')
            ->where('productSlug', $slug)
            ->first(); // Retrieve the first matching record
        $product_id = $product->id;
        $productSubcategory = $product->productSubcategory;

        $getProduct_image = DB::table('product_images')
            ->select('id', 'product_id', 'path', 'is_front')
            ->where('product_id', $product_id)
            ->get();


        $getRelated_product = DB::table('products')
            ->leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->where('product_images.is_front', true); // Get only the front image
            })
            ->select(
                'products.id',
                'products.productName',
                'products.productCategory',
                'products.productSubcategory',
                'products.productPrice',
                'products.productActualPrice',
                'products.productDisc',
                'products.productStatus',
                'products.productSlug',
                'product_images.path as frontImage' // Include front image path
            )
            ->where('productSubcategory', $productSubcategory)
            ->where('products.productStatus', 'active')
            ->orderBy('products.id', 'asc')
            ->paginate(10); // Change 5 to the number of items per page

        // $getRelated_product = DB::table('products')
        //     ->leftJoin('product_images', function ($join) {
        //         $join->on('products.id', '=', 'product_images.product_id')
        //             ->where('product_images.is_front', true); // Get only the front image
        //     })->select(
        //         'id',
        //         'productName',
        //         'productCategory',
        //         'productSubcategory',
        //         'productPrice',
        //         'productActualPrice',
        //         'productDisc',
        //         'productStatus',
        //         'productSlug',
        //         'productDescription',
        //         'product_images.path as frontImage'
        //     )
        //     ->where('productSubcategory', $productSubcategory)
        //     ->get();

        return view('home.product_details', [
            'productData' => $product,
            'getProduct_image' => $getProduct_image,
            'getRelated_products' => $getRelated_product
        ]);
    }

    public function addproductCart(Request $req, string $productslug)
    {


        $product = DB::table('products')
            ->leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->where('product_images.is_front', true); // Get only the front image
            })
            ->select(
                'products.id',
                'products.productName',
                'products.productCode',
                'products.productCategory',
                'products.productSubcategory',
                'products.productPrice',
                'products.productActualPrice',
                'products.productDisc',
                'products.productStatus',
                'products.productSlug',
                'product_images.path as frontImage' // Include front image path
            )->where('productSlug', $productslug)
            ->first();

        // dd($product);
        // $product = DB::table('products')
        //     ->select('id', 'productImage', 'productName', 'productCategory', 'productSubcategory', 'productPrice', 'productActualPrice', 'productDisc', 'productCode')
        //     ->where('productSlug', $productslug)
        //     ->first();








        $total = $product->productPrice * $req->quantity;

        if (Auth::check()) {
            // Logged-in user
            $user = Auth::user();
            $addProductCart = DB::table('carts')->insertOrIgnore([
                'user_name' => $user->name,
                'user_email' => $user->email,
                'user_phone' => $user->phone,
                'productCode' => $product->productCode,
                'productName' => $product->productName,
                'productSlug' => $product->productSlug,
                'productCategory' => $product->productCategory,
                'productSubcategory' => $product->productSubcategory,
                'productImage' => $product->frontImage,
                'quantity' => $req->quantity,
                'productPrice' => $product->productPrice,
                'productActualPrice' => $product->productActualPrice,
                'total' => $total,
                'productDisc' => $product->productDisc,
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if ($addProductCart) {
                return redirect('cart');
            }
        } else {
            // Guest user - use session
            $cart = session()->get('guest_cart', []);
            // Add new product to the cart
            $cart[] = [
                'user_name' => $req->name,
                'user_email' => $req->email,
                'user_phone' => $req->phone,
                'productCode' => $product->productCode,
                'productName' => $product->productName,
                'productSlug' => $product->productSlug,
                'productCategory' => $product->productCategory,
                'productSubcategory' => $product->productSubcategory,
                'productImage' => $product->frontImage,
                'quantity' => $req->quantity,
                'productPrice' => $product->productPrice,
                'productActualPrice' => $product->productActualPrice,
                'total' => $total,
                'productDisc' => $product->productDisc,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            // Save the cart to the session
            session()->put('guest_cart', $cart);
            return redirect('cart');
        }
    }

    // public function showproductCart(){
    //     if(Auth::id()){
    //         $user_id=Auth::user()->id;        

    //         $cart = DB::table('carts')
    //         ->select('id', 'user_name', 'user_email', 'user_phone', 'productImage', 'productName', 'productCategory', 'productSubcategory',
    //         'quantity', 'total', 'productDisc', 'productPrice', 'productActualPrice','productCode')
    //         ->where('user_id', $user_id)
    //         ->get(); // Retrieve the first matching record

    //         $totalSum = DB::table('carts')
    //         ->where('user_id', $user_id)
    //         ->sum(DB::raw('quantity * productPrice'));
    //     }else{

    //     }

    //     return view('home.cart', ['cartData' => $cart, 'totalSum' => $totalSum]);
    // }

    public function showproductCart()
    {
        if (Auth::check()) {
            // Logged-in user
            $user_id = Auth::user()->id;
            $totalCount = 0;
            // Fetch cart items from the database for the logged-in user
            $cart = DB::table('carts')
                ->select(
                    'id',
                    'user_name',
                    'user_email',
                    'user_phone',
                    'productImage',
                    'productName',
                    'productSlug',
                    'productCategory',
                    'productSubcategory',
                    'quantity',
                    'total',
                    'productDisc',
                    'productPrice',
                    'productActualPrice',
                    'productCode'
                )
                ->where('user_id', $user_id)
                ->get();

            // Calculate the total sum for logged-in user
            $totalSum = DB::table('carts')
                ->where('user_id', $user_id)
                ->sum(DB::raw('quantity * productActualPrice'));
            $cart_count = DB::table('carts')->count();
        } else {
            // Guest user - fetch cart from session
            $cart = session()->get('guest_cart', []);
            $cart_count = array_sum(array_column($cart, 'quantity')); // Sum up the quantities of items in the cart

            // Calculate the total sum for the guest cart
            $totalSum = collect($cart)->sum(function ($item) {
                return $item['quantity'] * $item['productActualPrice'];
            });
        }
        // Pass the cart data and total sum to the view
        return view('home.cart', ['cartData' => $cart, 'totalSum' => $totalSum, 'cart_count' => $cart_count]);
    }


    public function remove_cart(string $id)
    {
        if (Auth::check()) {
            // Logged-in user: Remove from database
            $deletecart = DB::table('carts')->where('id', $id)->delete(); // Delete a single cart item by ID

            if ($deletecart) {
                return redirect()->back()->with('success', 'Product removed from cart successfully');
            } else {
                return redirect()->back()->with('error', 'Failed to remove product from cart');
            }
        } else {
            // Guest user: Remove from session cart
            $cart = session()->get('guest_cart', []);

            // Check if the item with the provided key exists
            if (isset($cart[$id])) {
                unset($cart[$id]); // Remove the item from the cart using its array index
                session()->put('guest_cart', $cart); // Update the session
                return redirect()->back()->with('success', 'Product removed from cart successfully');
            } else {
                return redirect()->back()->with('error', 'Failed to remove product from cart');
            }
        }
    }
    // public function proceed_to_checkout(){
    //     if(Auth::id()){            
    //         $user_id=Auth::user()->id;           
    //         $cart = DB::table('carts')
    //         ->select('id', 'user_name', 'user_email', 'user_phone', 'productImage', 'productName', 'productCategory', 'productSubcategory',
    //         'quantity', 'total', 'productDisc', 'productPrice', 'productActualPrice','productCode')
    //         ->where('user_id', $user_id)
    //         ->get(); // Retrieve the first matching record

    //         $totalSum = DB::table('carts')
    //         ->where('user_id', $user_id)
    //         ->sum(DB::raw('quantity * productPrice'));

    //         $userDetails = $cart->isNotEmpty() ? $cart->first() : null;
    //     }
    //     return view('home.checkout', ['userDetails' => $userDetails, 'cartData' => $cart, 'totalSum' => $totalSum]);
    // }

    public function proceed_to_checkout()
    {
        if (Auth::check()) {
            // Logged-in user: Fetch cart from the database
            $user_id = Auth::id();
            $cart = DB::table('carts')
                ->select(
                    'id',
                    'user_name',
                    'user_email',
                    'user_phone',
                    'productImage',
                    'productName',
                    'productCategory',
                    'productSubcategory',
                    'quantity',
                    'total',
                    'productDisc',
                    'productPrice',
                    'productActualPrice',
                    'productCode'
                )
                ->where('user_id', $user_id)
                ->get(); // Retrieve all cart items for logged-in user

            $totalSum = DB::table('carts')
                ->where('user_id', $user_id)
                ->sum(DB::raw('quantity * productActualPrice'));
            $cart_count = DB::table('carts')->count();
            $userDetails = $cart->isNotEmpty() ? $cart->first() : null;
        } else {
            // Guest user: Fetch cart from session
            $cart = session()->get('guest_cart', []);
            $cart_count = array_sum(array_column($cart, 'quantity')); // Sum up the quantities of items in the cart

            // Calculate total sum for guest cart
            $totalSum = collect($cart)->sum(function ($item) {
                return $item['quantity'] * $item['productActualPrice'];
            });
            // Extract the guest user details from the session
            $userDetails = session()->get('guest_user', null);
        }
        return view('home.checkout', [
            'userDetails' => $userDetails,
            'cartData' => $cart,
            'totalSum' => $totalSum,
            'cart_count' => $cart_count
        ]);
    }

    public function add_checkout_detail(Request $req)
    {
        // Perform form validation
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'phone' => 'required',
        ]);

        // Determine if user is logged in or a guest
        $user_id = auth()->check() ? auth()->user()->id : null;

        // Fetch cart items based on whether the user is logged in or a guest
        if ($user_id) {
            // Fetch cart items for logged-in user
            $cart = DB::table('carts')
                ->select(
                    'id',
                    'user_name',
                    'user_email',
                    'user_phone',
                    'productImage',
                    'productName',
                    'productCategory',
                    'productSubcategory',
                    'quantity',
                    'total',
                    'productDisc',
                    'productPrice',
                    'productActualPrice',
                    'productCode',
                    'user_id'
                )
                ->where('user_id', $user_id)
                ->get();
            // Calculate total sum for logged-in user
            $totalSum = DB::table('carts')
                ->where('user_id', $user_id)
                ->sum(DB::raw('quantity * productPrice'));
        } else {
            // For guest users, use session or cookies to fetch cart items
            $cart = session()->get('guest_cart', []); // Example of using session for guest users
            $totalSum = array_reduce($cart, function ($sum, $item) {
                return $sum + ($item['quantity'] * $item['productPrice']);
            }, 0);
        }

        // Generate invoice ID
        $invoiceId = 'INV-' . strtoupper(Str::random(10));

        // Insert cart items into order_products table
        foreach ($cart as $item) {
            // Check if $item is an object or an array
            $productCode = is_array($item) ? $item['productCode'] : $item->productCode;
            $productName = is_array($item) ? $item['productName'] : $item->productName;
            $productCategory = is_array($item) ? $item['productCategory'] : $item->productCategory;
            $productSubcategory = is_array($item) ? $item['productSubcategory'] : $item->productSubcategory;
            $productImage = is_array($item) ? $item['productImage'] : $item->productImage;
            $quantity = is_array($item) ? $item['quantity'] : $item->quantity;
            $productPrice = is_array($item) ? $item['productPrice'] : $item->productPrice;
            $productActualPrice = is_array($item) ? $item['productActualPrice'] : $item->productActualPrice;
            $productDisc = is_array($item) ? $item['productDisc'] : $item->productDisc;

            DB::table('order_products')->insertOrIgnore([
                'invoice_id' => $invoiceId,
                'productCode' => $productCode,
                'productName' => $productName,
                'productCategory' => $productCategory,
                'productSubcategory' => $productSubcategory,
                'productImage' => $productImage,
                'quantity' => $quantity,
                'productPrice' => $productPrice,
                'productActualPrice' => $productActualPrice,
                'productDisc' => $productDisc,
                'user_id' => $user_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Insert order details into order_details table
        DB::table('order_details')->insertOrIgnore([
            'invoice_id' => $invoiceId,
            'user_name' => $req->name,
            'user_email' => $req->email,
            'user_phone' => $req->phone,
            'user_address' => $req->address,
            'user_city' => $req->city,
            'user_state' => $req->state,
            'user_country' => 'India',
            'user_pincode' => $req->zipcode,
            'user_id' => $user_id,
            'total' => $totalSum,
            'delivey_status' => 'pending',
            'payment_status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Update user's table with the new address information (for logged-in users)
        if ($user_id) {
            DB::table('users')->where('id', $user_id)->update([
                'address' => $req->address,
                'address2' => $req->address2,
                'city' => $req->city,
                'pincode' => $req->zipcode,
                'state' => $req->state,
                'updated_at' => now(),
            ]);
            // Clear the cart for logged-in user
            DB::table('carts')->where('user_id', $user_id)->delete();
        } else {
            // Clear the session cart for guest users
            session()->forget('guest_cart');
        }

        return redirect()->back()->with('success_message', 'We received your order. We will contact you very soon!');
    }



    public function orderDetails_show()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $user_data = DB::table('users')
                ->select('id', 'name', 'email', 'phone', 'address', 'address2', 'city', 'pincode', 'state', 'country')
                ->where('id', $user_id)
                ->first(); // Retrieve the first matching record

            $order_detail = DB::table('order_details')
                ->select('id', 'invoice_id', 'updated_at', 'delivey_status', 'total')
                ->where('user_id', $user_id)
                ->get(); // Retrieve the first matching record

            return view('home.my_account_details', [
                'orderDetails' => $order_detail,
                'user_details' => $user_data
            ]);
        }
        return redirect()->route('login'); // Redirect to login if not authenticated
    }

    public function searchProduct(Request $req)
    {

        $searchTerm = $req->input('search_input');

        $products = DB::table('products')
            ->leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->where('product_images.is_front', true); // Get only the front image
            })
            ->select(
                'products.id',
                'products.productName',
                'products.productCode',
                'products.productCategory',
                'products.productSubcategory',
                'products.productPrice',
                'products.productActualPrice',
                'products.productDisc',
                'products.productStatus',
                'products.productSlug',
                'product_images.path as frontImage' // Include front image path
            )->where('productName', 'LIKE', '%' . $searchTerm . '%')
            ->paginate(10);


        // $products = DB::table('products')
        //     ->where('productName', 'LIKE', '%' . $searchTerm . '%')
        // ->orWhere('user_phone', 'LIKE', '%' . $searchTerm . '%')
        // ->orWhere('user_name', 'LIKE', '%' . $searchTerm . '%')

        $dealsProduct = DB::table('products')
            ->leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->where('product_images.is_front', true); // Get only the front image
            })
            ->select(
                'products.id',
                'products.productName',
                'products.productCode',
                'products.productCategory',
                'products.productSubcategory',
                'products.productPrice',
                'products.productActualPrice',
                'products.productDisc',
                'products.productStatus',
                'products.productSlug',
                'product_images.path as frontImage' // Include front image path
            )->where('productStatus', 'active')
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();

        $recentlyProduct = DB::table('products')
            ->leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->where('product_images.is_front', true); // Get only the front image
            })
            ->select(
                'products.id',
                'products.productName',
                'products.productCode',
                'products.productCategory',
                'products.productSubcategory',
                'products.productPrice',
                'products.productActualPrice',
                'products.productDisc',
                'products.productStatus',
                'products.productSlug',
                'product_images.path as frontImage' // Include front image path
            )->where('productStatus', 'active')
            ->orderBy('id', 'asc')
            ->limit(3)
            ->get();

        $searchCount = DB::table('products')
            ->where('productName', 'LIKE', '%' . $searchTerm . '%')
            ->count();

        return view('home.searchpage', ['searched_product' => $products, 'dealsProduct' => $dealsProduct, 'recentlyProduct' => $recentlyProduct, 'searchCount' => $searchCount]);
        // return view('home.searchpage', ['orderData' => $orders]);
    }
    public function parentcategoryDetails(string $slug)
    {
        $products = DB::table('products')
            ->where('productCategory', 'LIKE', '%' . $slug . '%')
            ->paginate(10);

        $dealsProduct = DB::table('products')
            ->select('id', 'productImage', 'productName', 'productCategory', 'productSubcategory', 'productPrice', 'productActualPrice', 'productDisc', 'productStatus', 'productSlug')
            ->where('productStatus', 'active')
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();

        $recentlyProduct = DB::table('products')
            ->select('id', 'productImage', 'productName', 'productCategory', 'productSubcategory', 'productPrice', 'productActualPrice', 'productDisc', 'productStatus', 'productSlug')
            ->where('productStatus', 'active')
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        $getparentCategory = DB::table('parent_categories')
            ->select('id', 'categoryName', 'categorySlug')
            ->where('status', 'active')
            ->where('parentCategory', 0)
            ->orderBy('id', 'desc')
            ->get();
        // Fetch products for each parent category
        foreach ($getparentCategory as $category) {
            $category->products = DB::table('products')
                ->where('productCategory', 'LIKE', '%' . $category->categorySlug . '%')
                ->where('productStatus', 'active')
                ->orderBy('id', 'desc')
                ->get();
        }
        return view('home.parent_category', [
            'searched_product' => $products,
            'dealsProduct' => $dealsProduct,
            'recentlyProduct' => $recentlyProduct,
            'getparentCategory' => $getparentCategory
        ]);
    }
    public function subcategoryDetails(string $slug)
    {

        $products = DB::table('products')
            ->leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->where('product_images.is_front', true); // Get only the front image
            })
            ->select(
                'products.id',
                'products.productName',
                'products.productCode',
                'products.productCategory',
                'products.productSubcategory',
                'products.productPrice',
                'products.productActualPrice',
                'products.productDisc',
                'products.productStatus',
                'products.productSlug',
                'product_images.path as frontImage' // Include front image path
            )->where('productSubcategory', 'LIKE', '%' . $slug . '%')
            ->paginate(10);
        // ->where('productSlug', $productslug)

        // dd($products);
        // $products = DB::table('products')
        //     ->leftJoin('product_images', function ($join) {
        //         $join->on('products.id', '=', 'product_images.product_id')
        //             ->where('product_images.is_front', true); // Get only the front image
        //     })->where('productSubcategory', 'LIKE', '%' . $slug . '%')
        //     // ->orWhere('user_phone', 'LIKE', '%' . $searchTerm . '%')
        //     // ->orWhere('user_name', 'LIKE', '%' . $searchTerm . '%')
        //     ->paginate(10);
        // // dd($products);

        $dealsProduct = DB::table('products')
            ->leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->where('product_images.is_front', true); // Get only the front image
            })
            ->select(
                'products.id',
                'products.productName',
                'products.productCode',
                'products.productCategory',
                'products.productSubcategory',
                'products.productPrice',
                'products.productActualPrice',
                'products.productDisc',
                'products.productStatus',
                'products.productSlug',
                'product_images.path as frontImage'
            )
            ->where('productStatus', 'active')
            ->orderBy('id', 'asc')
            ->limit(4)
            ->get();

        $recentlyProduct = DB::table('products')
            ->leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->where('product_images.is_front', true); // Get only the front image
            })
            ->select(
                'products.id',
                'products.productName',
                'products.productCode',
                'products.productCategory',
                'products.productSubcategory',
                'products.productPrice',
                'products.productActualPrice',
                'products.productDisc',
                'products.productStatus',
                'products.productSlug',
                'product_images.path as frontImage'
            )
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();
        return view('home.subcategory', ['searched_product' => $products, 'dealsProduct' => $dealsProduct, 'recentlyProduct' => $recentlyProduct]);
    }

    //quick view modal of product

    public function quickView($id)
    {
        $product = DB::table('products')
            ->select('id', 'productImage', 'productName', 'productCategory', 'productSubcategory', 'productPrice', 'productActualPrice', 'productDisc', 'productStatus', 'productSlug', 'productDescription')
            ->where('id', $id)
            ->first(); // Retrieve the first matching record
        return view('home.include.quick-view', ['product' => $product]);
    }
}
