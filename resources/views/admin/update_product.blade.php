@include('admin.include.header')
<div class="container">
    <div class="tab-pane fade show active" id="id1" role="tabpanel">
        <form action="{{ url('update_product_page', $products->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                                            <div class="alert alert-success text-center">
                                                {{ session('success') }}
                                            </div>
                                            @endif
                    <div class="crancy-ptabs__separate">
                        <div class="crancy-ptabs__form-main">
                            <div class="crancy__item-group">
                                <h4 class="crancy__item-group__title">Update Product</h4>
                                <div class="crancy__item-form--group">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label">Product Name</label>
                                                <input class="crancy__item-input @error('title') is-invalid @enderror" type="text"
                                                name="pro_name" value="{{ $products->productName }}">
                                                    @error('pro_name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label">Product Discount</label>
                                                <input class="crancy__item-input" value="{{ $products->productDisc }}" required type="number" name="productDisc">
                                                @error('productDisc')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="crancy__item-form--group">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label">Product Price</label>
                                                <input class="crancy__item-input @error('title') is-invalid @enderror" type="number"
                                                    name="productPrice" value="{{ $products->productPrice }}" required>
                                                    @error('productPrice')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label">Product Actual Price</label>
                                                <input class="crancy__item-input @error('title') is-invalid @enderror" type="number"
                                                value="{{ $products->productActualPrice }}" required name="productActualPrice">
                                                    @error('productActualPrice')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="crancy__item-form--group">
                                    <div class="row mt-3">
                                        <div class="col-lg-6 col-12">
                                            <div class="crancy-table-filter__single crancy-table-filter__location">
                                                {{-- <label for="crancy-table-filter__label">Select Category</label> --}}
                                                <label class="crancy__item-label">Select Parent Category</label>
                                                <select id="parent_cat" name="parent_cat">
                                                    <option value="">Select a category</option>
                                                    @foreach ($parentcategories as $category)
                                                        <option data-parent_id="{{$category->id}}" value="{{ $category->categorySlug }}" 
                                                            @if ($category->categorySlug == $products->productCategory) selected @endif>
                                                            {{ $category->categoryName }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                

                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-12">
                                            <div class="crancy-table-filter__single crancy-table-filter__location">
                                                <label class="crancy__item-label">Select Sub Category</label>
                                                <select name="sub_cat" id="sub_cat" required>
                                                    <option value="{{ $products->productSubcategory }}" selected>{{ $products->productSubcategory }}</option>
                                                </select>
                                        </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="crancy__item-form--group">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            {{-- <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label">Product Image</label>
                                                <input class="crancy__item-input @error('title') is-invalid @enderror" type="file" name="product_image">
                                                    @error('product_image')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                            </div><br>
                                            <img style="width: 150px;position: absolute;" src="{{ asset('images/' . $products->productImage) }}" alt="Image description">
                                         --}}
                                            <div class="form-group">
                                                <label for="product_images">Product Images</label>
                                                <input type="file" name="product_images[]" id="product_images" multiple class="form-control">
                                                @if($errors->has('product_images'))
                                                    <span class="text-danger">{{ $errors->first('product_images') }}</span>
                                                @endif
                                            </div>
                                            <br>
                                            <div class="row">
                                            @foreach($getProduct_image as $image)
                                            <div class="col-sm-3">
                                            <div class="form-group">
                                                <img src="{{ asset('storage/images/' . ($image->path ?? 'default.jpg')) }}"
                                                    alt="{{ $image->path }}" class="product-image" style="width: 100px; height: 100px;">


                                                <label>
                                                    <input type="radio" name="front_image" value="{{ $image->id }}" {{ $image->is_front ? 'checked' : '' }}>
                                                    Set as Front Image
                                                </label>
                                            </div>
                                        </div>
                                            @endforeach
                                        </div>
                                    </div>
                                        <div class="col-lg-6 col-12">    
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label">Descriptions</label>
                                                <textarea class="crancy__item-input textAreabox" name="product_desc" cols="30" rows="10" required>{{ $products->productDescription }}</textarea>
                                                @error('product_desc')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror    
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="crancy__item-button--group crancy__item-button--group--fix crancy__ptabs-bottom">
                <button class="crancy-btn crancy-color8__bg" type="submit">Update Product</button>
            </div>

        </form>
    </div>
</div>
@include('admin.include.footer')
