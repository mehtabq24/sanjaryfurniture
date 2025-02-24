<!DOCTYPE html>
<html class="no-js" lang="en">
    @include('home.include.head')
<body>
    @include('home.include.header')
    <main class="main">
        {{-- @include('home.include.banner')
        @include('home.include.category_banner') --}}
        @include('home.include.best_seller_products')
        @include('home.include.daily_best_sells')
        @include('home.include.deals_of_the_day')
    </main>        
    @include('home.include.footer')
    @include('home.include.foot')
