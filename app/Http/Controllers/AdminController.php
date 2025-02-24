<?php

namespace App\Http\Controllers;

// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    //

    public function view_category_list()
    {
        $category = DB::table('parent_categories')
            ->select('id', 'categoryName', 'categoryImage', 'status', 'created_at')
            ->where('status', 'active')
            ->orderBy('categoryName', 'desc')
            ->paginate(5);
        return view('admin.category_list', ['categoryData' => $category]);
    }

    public function view_category()
    {

        $category = DB::table('parent_categories')
            ->select('id', 'categoryName', 'categorySlug')
            ->where('status', 'active')
            ->where('parentCategory', 0)
            ->get();
        return view('admin.category', ['categories' => $category]);
    }

    public function addParentcategory(Request $req)
    {

        // Perform form validation
        $req->validate([
            'cat_name' => 'required',
            // 'cat_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // Add webp here
            // 'cat_desc' => 'required',
            'parent_cat' => 'required',
        ]);

        // Generate dynamic codes and slug
        $productCode = Str::random(10); // Generates a random string of length 10 for product code
        $categoryCode = Str::random(8); // Generates a random string of length 8 for category code
        $categorySlug = Str::slug($req->cat_name, '-'); // Generates slug from category name

        // Handle file upload
        if ($req->hasFile('cat_image')) {
            $image = $req->file('cat_image');
            $imageName = time() . '.' . $image->extension(); // Generate a unique filename
            $image->move(public_path('images'), $imageName); // Move the uploaded file to a directory
        } else {
            $imageName = "";
        }
        $parentCategory = DB::table('parent_categories')->insertOrIgnore([
            'productCode' => $productCode,
            'cateoryCode' => $categoryCode,
            'categorySlug' => $categorySlug,
            'categoryName' => $req->cat_name,
            'parentCategory' => $req->parent_cat,
            'categoryDescription' => $req->cat_desc,
            'categoryImage' => $imageName,
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        if ($parentCategory) {
            return redirect()->back()->with('message', 'Category Added Successfully');
        }
    }
    public function deleteParentcategory(string $id)
    {
        $deleteParentcat = DB::table('parent_categories')->where('id', $id)->delete(); // Delete a single category
        if ($deleteParentcat) {
            return redirect()->back()->with('success', 'Category deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete category');
        }
    }

    public function showUpdatecategoryForm(string $id)
    {

        $parentcategory = DB::table('parent_categories')
            ->select('id', 'categoryName', 'categorySlug')
            ->get();

        $category = DB::table('parent_categories')
            ->select('id', 'categoryName', 'categoryDescription', 'parentCategory', 'categoryImage', 'categorySlug')
            ->find($id);
        return view('admin.update_category', [
            'parentcategories' => $parentcategory, // Here we renamed the variable to avoid confusion
            'categories' => $category
        ]);
    }

    public function updateParentcategory(Request $request, $id)
    {
        // Validate form fields including the uploaded file
        $request->validate([
            'cat_name' => 'required',
            'cat_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // Add webp here
            'cat_desc' => 'required',
        ]);
        // Find the category by ID
        $category = DB::table('parent_categories')->find($id);
        if (!$category) {
            // Handle if the category is not found
            return redirect()->back()->with('error', 'Category not found');
        }
        // Handle file upload if a new image is provided
        if ($request->hasFile('cat_image')) {
            $image = $request->file('cat_image');
            $imageName = time() . '.' . $image->extension(); // Generate a unique filename
            $image->move(public_path('images'), $imageName); // Move the uploaded file to a directory

            // Delete the old image if it exists and it's not a directory
            if ($category->categoryImage && !is_dir(public_path('images/' . $category->categoryImage))) {
                unlink(public_path('images/' . $category->categoryImage));
            }
            // Update the category image field
            $category->categoryImage = $imageName;
        } else {
            $imageName = $category->categoryImage;
        }
        // Update category name and description
        $category->categoryName = $request->cat_name;
        $category->categoryDescription = $request->cat_desc;
        // Save the updated category data
        DB::table('parent_categories')->where('id', $id)->update([
            'categoryName' => $category->categoryName,
            'categoryDescription' => $category->categoryDescription,
            'categoryImage' => $imageName,
            'updated_at' => now()
        ]);
        return redirect()->back()->with('success', 'Category updated successfully');
    }

    // product section 

    // public function productList()
    // {
    //     $products = DB::table('products')
    //         ->select('id', 'productImage', 'productName', 'productCategory', 'productDisc', 'productStatus')
    //         ->where('productStatus', 'active')
    //         ->orderBy('id', 'desc')
    //         ->paginate(5); // Change 10 to the number of items per page
    //     return view('admin.product_list', ['productsData' => $products]);
    // }

    public function productList()
    {
        $products = DB::table('products')
            ->leftJoin('product_images', function ($join) {
                $join->on('products.id', '=', 'product_images.product_id')
                    ->where('product_images.is_front', true); // Get only the front image
            })
            ->select(
                'products.id',
                'products.productName',
                'products.productCategory',
                'products.productDisc',
                'products.productStatus',
                'product_images.path as frontImage' // Include front image path
            )
            ->where('products.productStatus', 'active')
            ->orderBy('products.id', 'desc')
            ->paginate(10); // Change 5 to the number of items per page

        return view('admin.product_list', ['productsData' => $products]);
    }


    public function orderList()
    {
        $orders = DB::table('order_details')
            ->select('id', 'invoice_id', 'user_name', 'user_email', 'user_phone', 'total', 'delivey_status', 'payment_status')
            ->orderBy('id', 'desc')
            ->paginate(5); // Change 10 to the number of items per page
        return view('admin.order_list', ['orderData' => $orders]);
    }

    public function showAddproductForm()
    {
        $category = DB::table('parent_categories')
            ->select('id', 'categoryName', 'categorySlug')
            ->where('status', 'active')
            ->where('parentCategory', 0)
            ->get();
        return view('admin.add_product', ['parent_categories' => $category]);
    }

    public function addProduct(Request $req)
    {
        // Validate request
        $req->validate([
            'pro_name' => 'required',
            'productDisc' => 'required',
            'productPrice' => 'required|numeric',
            'productActualPrice' => 'required|numeric',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'product_desc' => 'required',
            'parent_cat' => 'required',
            'sub_cat' => 'required',
        ]);

        // Generate product code and slug
        $productCode = Str::random(10);
        $productSlug = Str::slug($req->pro_name, '-');

        // Insert product data
        $productId = DB::table('products')->insertGetId([
            'productCode' => $productCode,
            'productName' => $req->pro_name,
            'productCategory' => $req->parent_cat,
            'productSubcategory' => $req->sub_cat,
            'productDescription' => $req->product_desc,
            'productSlug' => $productSlug,
            'productStatus' => 'active',
            'productPrice' => $req->productPrice,
            'productActualPrice' => $req->productActualPrice,
            'updated_by' => auth()->user()->name ?? 'system',
            'productDisc' => $req->productDisc,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($productId && $req->hasFile('images')) {
            foreach ($req->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $destinationPath = storage_path('app/public/images');

                try {
                    $image->move($destinationPath, $imageName);

                    DB::table('product_images')->insert([
                        'product_id' => $productId,
                        'product_code' => $productCode,
                        'path' => $imageName,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                } catch (\Exception $e) {
                    Log::error("Failed to upload or save image: " . $e->getMessage());
                }
            }
        }

        return $productId
            ? redirect()->route('products.edit', ['id' => $productId])
            ->with('success', 'Product added successfully and redirected to update page.')
            : redirect()->back()->with('error', 'Failed to add product.');
    }

    public function getSubcategories($parentId)
    {
        $subcategories = DB::table('parent_categories')
            ->where('parentCategory', $parentId)
            ->get();
        return response()->json($subcategories);
    }

    public function showUpdateproductForm(string $id)
    {

        $parentcategory = DB::table('parent_categories')
            ->select('id', 'categoryName', 'categorySlug')
            ->where('parentCategory', 0)
            ->get();
        $products = DB::table('products')
            ->select('id', 'productName', 'productCategory', 'productSubcategory', 'productDescription', 'productImage', 'productPrice', 'productActualPrice', 'productDisc')
            ->find($id);

        $getProduct_image = DB::table('product_images')
            ->select('id', 'product_id', 'path', 'is_front')
            ->where('product_id', $id)
            ->get();

        // $getProduct_front_image = DB::table('product_images')
        //     ->select('id', 'product_id', 'path', 'is_front')
        //     ->where('product_id', $id)
        //     ->get();

        return view('admin.update_product', [
            'parentcategories' => $parentcategory, // Here we renamed the variable to avoid confusion
            'products' => $products,
            'getProduct_image' => $getProduct_image
        ]);
    }

    public function updateProduct(Request $req, $id)
    {
        $req->validate([
            'pro_name' => 'required',
            'productDisc' => 'required',
            'productPrice' => 'required|numeric',
            'productActualPrice' => 'required|numeric',
            'product_images.*' => 'mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'product_desc' => 'required',
            'parent_cat' => 'required',
            'sub_cat' => 'required',
            'front_image' => 'nullable|exists:product_images,id',
        ]);

        // Handle multiple file uploads
        $imageNames = [];
        if ($req->hasFile('product_images')) {
            foreach ($req->file('product_images') as $image) {
                $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                $destinationPath = storage_path('app/public/images'); // Save in storage
                $image->move($destinationPath, $imageName);
                $imageNames[] = $imageName;
            }

            // Batch insert images into the database
            $imagesData = array_map(function ($imageName) use ($id) {
                return [
                    'product_id' => $id,
                    'product_code' => $imageName,
                    'path' => $imageName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }, $imageNames);

            DB::table('product_images')->insert($imagesData);
        }

        // Update front image if specified
        if ($req->has('front_image')) {
            DB::table('product_images')
                ->where('product_id', $id)
                ->update(['is_front' => false]); // Reset all front images

            DB::table('product_images')
                ->where('id', $req->front_image)
                ->where('product_id', $id)
                ->update(['is_front' => true]); // Set the new front image
        }

        // Prepare update data
        $updateData = [
            'productName' => $req->pro_name,
            'productCategory' => $req->parent_cat,
            'productSubcategory' => $req->sub_cat,
            'productDescription' => $req->product_desc,
            'productSlug' => Str::slug($req->pro_name, '-'),
            'updated_at' => now(),
            'productPrice' => $req->productPrice,
            'productActualPrice' => $req->productActualPrice,
            'updated_by' => auth()->user()->name ?? 'system',
            'productDisc' => $req->productDisc,
        ];

        DB::table('products')->where('id', $id)->update($updateData);
        return redirect()->back()->with('success', 'Product updated successfully.');
    }


    // public function updateProduct(Request $req, $id)
    // {
    //     // Initialize $imageName
    //     $imageName = null;
    //     // Perform form validation
    //     $req->validate([
    //         'pro_name' => 'required',
    //         'productDisc' => 'required',
    //         'productPrice' => 'required|numeric',
    //         'productActualPrice' => 'required|numeric',
    //         'product_images.*' => 'mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // Validate each image
    //         'product_desc' => 'required',
    //         'parent_cat' => 'required',
    //         'sub_cat' => 'required',
    //     ]);
    //     // Handle multiple file upload
    //     $imageNames = [];
    //     if ($req->hasFile('product_images')) {
    //         foreach ($req->file('product_images') as $image) {
    //             $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
    //             $destinationPath = public_path('images');
    //             if ($image->move($destinationPath, $imageName)) {
    //                 // Store each uploaded image's name
    //                 $imageNames[] = $imageName;
    //                 Log::info("Image uploaded successfully: $imageName");
    //             } else {
    //                 Log::error("Failed to upload image: $imageName");
    //             }
    //         }
    //     }
    //     foreach ($imageNames as $imageName) {
    //         DB::table('product_images')->insert([
    //             'product_id' => $id,
    //             'product_code' => $imageName,
    //             'path' => $imageName,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    //     }
    //     if ($req->has('front_image')) {
    //         // Reset all images to not be the front image
    //         DB::table('product_images')
    //             ->where('product_id', $id)
    //             ->update(['is_front' => false]);
    //         // Set the selected image as the front image
    //         DB::table('product_images')
    //             ->where('id', $req->front_image)
    //             ->update(['is_front' => true]);
    //     }
    //     // Update data in the database
    //     $updateData = [
    //         'productName' => $req->pro_name,
    //         'productCategory' => $req->parent_cat,
    //         'productSubcategory' => $req->sub_cat,
    //         'productDescription' => $req->product_desc,
    //         'productSlug' => Str::slug($req->pro_name, '-'),
    //         'updated_at' => now(),
    //         'productPrice' => $req->productPrice,
    //         'productActualPrice' => $req->productActualPrice,
    //         'updated_by' => 'mehtab',
    //         'productDisc' => $req->productDisc,
    //     ];
    //     // Only update productImage if a new image was uploaded
    //     if ($imageName) {
    //         $updateData['productImage'] = $imageName;
    //     }
    //     $updateProduct = DB::table('products')
    //         ->where('id', $id)
    //         ->update($updateData);
    //     if ($updateProduct) {
    //         Log::info("Product updated successfully: $id");
    //         // return redirect()->route('product');
    //         return redirect()->back()->with('success', 'Product Update successfully');
    //     } else {
    //         Log::error("Failed to update product: $id");
    //     }
    // }
    public function deleteProduct(string $id)
    {
        $deleteproducts = DB::table('products')->where('id', $id)->delete(); // Delete a single category
        if ($deleteproducts) {
            return redirect()->back()->with('success', 'Product Deleted successfully');
        } else {
            return redirect()->route('category')->with('error', 'Failed to delete category');
        }
    }
    public function deliveredStatus($id)
    {
        DB::table('order_details')
            ->where('id', $id)
            ->update(['delivey_status' => 'delivered', 'payment_status' => 'paid']);
        return redirect()->back()->with('success', ' Delivered');
    }
    public function print_PDF($id)
    {
        $order = DB::table('order_details')
            ->select('id', 'invoice_id', 'user_name', 'user_email', 'user_phone', 'user_address', 'user_city', 'user_state', 'user_country', 'total', 'delivey_status', 'payment_status')
            ->where('id', $id)
            ->first(); // Retrieve the first matching record
        $pdf = Pdf::loadView('admin.pdf', ['order' => $order]);
        return Response::make($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="order_details.pdf"',
        ]);
    }

    public function send_email($id)
    {
        $send_email = DB::table('order_details')
            ->select('id', 'invoice_id', 'user_name', 'user_email', 'user_phone', 'user_address', 'user_city', 'user_state', 'user_country', 'total', 'delivey_status', 'payment_status')
            ->where('id', $id)
            ->first(); // Retrieve the first matching record
        return view('admin.add_send_email', ['emailData' => $send_email]);
    }

    // public function send_user_email(Request $req, $id){

    //     $send_email = DB::table('order_details')
    //     ->select('id', 'invoice_id', 'user_name', 'user_email', 'user_phone', 'user_address', 'user_city', 'user_state', 'user_country', 'total', 'delivey_status', 'payment_status')
    //     ->where('id', $id)
    //     ->first(); // Retrieve the first matching record
    //     $details = [
    //         'greeting' => $req->greeting,
    //         'firstline' => $req->firstline,
    //         'email_button' => $req->email_button,
    //         'email_url' => $req->email_url,
    //         'email_body' => $req->email_body,
    //     ];
    //      Notification::send($send_email, new SendEmailNotification($details));
    // }

    public function send_user_email(Request $req, $id)
    {
        $send_email = DB::table('order_details')
            ->select('user_email')
            ->where('id', $id)
            ->first(); // Retrieve the first matching record

        if (!$send_email) {
            return redirect()->back()->with('error', 'Order not found');
        }

        $details = [
            'greeting' => $req->greeting,
            'firstline' => $req->firstline,
            'email_button' => $req->email_button,
            'email_url' => $req->email_url,
            'email_body' => $req->email_body,
        ];

        // Use Notification::route to send an email notification
        Notification::route('mail', $send_email->user_email)
            ->notify(new SendEmailNotification($details));

        return redirect()->back()->with('success', 'Email sent successfully');
    }
    // public function searchData(Request $req){
    //     $req->validate([
    //         'query' => 'required',
    //      ]);

    //      $searchTerm = $req->query;

    //         $results = DB::table('order_details')
    //         ->select('user_email')
    //         ->where('user_email', 'LIKE', '%' . $searchTerm . '%')
    //         ->orWhere('user_phone', 'LIKE', '%' . $searchTerm . '%')
    //         ->orWhere('user_name', 'LIKE', '%' . $searchTerm . '%')
    //         ->get();
    //         // return view('admin.product_list', ['searchData' => $results]);
    //         dd($results);
    // }

    public function search(Request $request)
    {
        $searchTerm = $request->input('query');
        $orders = DB::table('order_details')
            ->where('user_email', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('user_phone', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('user_name', 'LIKE', '%' . $searchTerm . '%')
            ->paginate(5);
        return view('admin.order_list', ['orderData' => $orders]);
    }
}
