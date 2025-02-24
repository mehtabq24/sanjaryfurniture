<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer('*', function ($view) {
            $getparentCategory_header = DB::table('parent_categories')
            ->select('id', 'categoryName', 'categorySlug')
            ->where('status', 'active')
            ->where('parentCategory', 0)
            ->orderBy('id', 'desc')
            ->get();
                foreach ($getparentCategory_header as $parent_category) {
                    // Fetch subcategories for each parent category
                    $parent_category->subcategories = DB::table('parent_categories')
                        ->select('id', 'categoryName', 'categorySlug')
                        ->where('parentCategory', $parent_category->id)
                        ->where('status', 'active')
                        ->orderBy('id', 'desc')
                        ->get();
        
                    // Fetch products for each subcategory
                    foreach ($parent_category->subcategories as $subcategory) {
                            $subcategory->products = DB::table('products')
                            ->select('id', 'productSlug', 'productName')
                            ->where('productSubcategory', $subcategory->categorySlug)
                            ->where('productStatus', 'active')
                            ->orderBy('id', 'desc')
                            ->get();
                    }
                }
            $view->with('getparentCategory_header', $getparentCategory_header);
        });

        View::composer('*', function ($view) {
            $getsubCategory_header = DB::table('parent_categories')
            ->select('id', 'categoryName', 'categorySlug')
            ->where('status', 'active')
            ->where('parentCategory', '>', 0) // Fetching subcategories
            ->orderBy('id', 'desc')
            ->get();
            $view->with('getsubCategory_header', $getsubCategory_header);
        });
    }
}
