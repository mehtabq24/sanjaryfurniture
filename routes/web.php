<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/about', function () {
    return view('home.about-us');
});

Route::get('/contact', function () {
    return view('home.contact-us');
});

route::get('/', [HomeController::class, 'index']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



// Email Verification Routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard'); // Redirect to the dashboard after verification
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');



route::get('redirect', [HomeController::class, 'redirect'])->middleware('auth', 'verified');

route::get('/view_category', [AdminController::class, 'view_category']);

route::get('/view_category_list', [AdminController::class, 'view_category_list']);

Route::post('/add_cat', [AdminController::class, 'addParentcategory']);

Route::get('/update_category/{id}', [AdminController::class, 'showUpdatecategoryForm']);

Route::post('/update_category_page/{id}', [AdminController::class, 'updateParentcategory']);

Route::get('/delete_category/{id}/', [AdminController::class, 'deleteParentcategory']);


Route::get('/product', [AdminController::class, 'productList']);
Route::get('/add_product', [AdminController::class, 'showAddproductForm']);
Route::post('/add_prod', [AdminController::class, 'addProduct']);
Route::get('/update_product/{id}', [AdminController::class, 'showUpdateproductForm'])->name('products.edit');
Route::put('/update_product_page/{id}', [AdminController::class, 'updateProduct']);
Route::get('/delete_product/{id}/', [AdminController::class, 'deleteProduct']);
Route::get('/get-subcategories/{parentId}', [AdminController::class, 'getSubcategories']);

Route::get('/order', [AdminController::class, 'orderList']);

Route::get('/delivered/{id}', [AdminController::class, 'deliveredStatus']);

Route::get('/print_pdf/{id}', [AdminController::class, 'print_PDF']);

Route::get('/send_email/{id}', [AdminController::class, 'send_email']);

Route::post('/send_user_email/{id}', [AdminController::class, 'send_user_email']);

// Route::get('/search', [AdminController::class, 'searchData']);

// Route::get('/search-orders', [AdminController::class, 'searchData']);

Route::get('/search-orders', [AdminController::class, 'search'])->name('search.orders');

// product details page 
Route::get('/product/{slug}/', [HomeController::class, 'productDetails']);

Route::get('/category/{slug}/', [HomeController::class, 'parentcategoryDetails']);

Route::get('/categories/{slug}/', [HomeController::class, 'subcategoryDetails']);

Route::post('/add_cart/{productslug}/', [HomeController::class, 'addproductCart']);

Route::get('/cart', [HomeController::class, 'showproductCart']);

Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);

Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);

Route::get('/proceed_checkout', [HomeController::class, 'proceed_to_checkout']);

Route::post('/add_checkout', [HomeController::class, 'add_checkout_detail']);

Route::get('/orderdetail', [HomeController::class, 'orderDetails_show']);

Route::get('/search', [HomeController::class, 'searchProduct']);

Route::get('/product/quick-view/{id}', [HomeController::class, 'quickView']);
