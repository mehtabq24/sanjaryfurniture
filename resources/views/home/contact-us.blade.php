<!DOCTYPE html>
<html class="no-js" lang="en">
    @include('home.include.head')
<body class="single-product">
    @include('home.include.header')	
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> <a href="shop-grid-right.html">About Us</a> <span></span>
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="product-detail accordion-detail">
                        <div class="product-info">
                            <div class="tab-style3">
                                
                                <div class="tab-content shop_info_tab entry-main-content">
                                    <div class="tab-pane fade show active" id="Reviews">
                                        <!--comment form-->
                                        <div class="comment-form">
                                            <h4 class="mb-15">Add Contact Info</h4>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <form class="form-contact comment_form" action="javascript:void(0)" id="commentForm">
                                                        <div class="row">
                                                            
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="name" id="name" type="text" placeholder="Name" />
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="email" id="email" type="email" placeholder="Email" />
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="website" id="website" type="text" placeholder="Website" />
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Message"></textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="button button-contactForm">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="">
                                                        <p>
                                                            Founded in 2024, D-ELite is your go-to destination for 100% genuine leather products and eco-friendly vegan accessories, all meticulously crafted to perfection.
                                                        </p>
                                                        <hr class="wp-block-separator is-style-dots"/>
            
                                                        <p> Immerse yourself in the pride of superior craftsmanship with our thoughtfully made items—each proudly hailing from India. Our products do more than just promise quality; they tell compelling stories of innovation and tradition, ensuring every piece exudes a unique and authentic character.
                                                        </p>
                                                        <hr class="wp-block-separator is-style-dots"/>
            
                                                        <p>
                                                            As a committed leather goods manufacturer, we continuously embrace innovation in our dynamic collections. Our cutting-edge designs harmoniously combine style and comfort, empowering you to choose accessories that reflect a lifestyle of sophistication, functionality, and visionary flair. With D-ELite, you elevate not just your fashion sense but your entire everyday experience.
                                                        </p>
                                                        <hr class="wp-block-separator is-style-dots"/>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('home.include.footer')
    @include('home.include.foot')
