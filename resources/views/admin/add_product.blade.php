@include('admin.include.header')
<div class="container">
    <div class="tab-pane fade show active" id="id1" role="tabpanel">
            <form action="{{ url('add_prod') }}" method="POST" enctype="multipart/form-data" id="productForm">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="crancy-ptabs__separate">
                        <div class="crancy-ptabs__form-main">
                            <div class="crancy__item-group">
                                <h4 class="crancy__item-group__title">Add Product</h4>
                                <div class="crancy__item-form--group">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label">Product Name</label>
                                                <input class="crancy__item-input @error('title') is-invalid @enderror" type="text"
                                                    placeholder="Enter Product Name" name="pro_name" value="{{ old('pro_name') }}">
                                                    @error('pro_name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label">Product Discount</label>
                                                <input class="crancy__item-input" placeholder="Enter Product Discount" value="{{ old('productDisc') }}" type="number" name="productDisc">
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
                                                    placeholder="Enter Product Price" name="productPrice" value="{{ old('productPrice') }}">
                                                    @error('productPrice')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label">Product Actual Price</label>
                                                <input class="crancy__item-input @error('title') is-invalid @enderror" type="number"
                                                    placeholder="Enter Product Actual Price" value="{{ old('productActualPrice') }}" name="productActualPrice">
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
                                                <select name="parent_cat" id="parent_cat">
                                                    <option value="">Select a parent category</option>
                                                    @foreach($parent_categories as $category)
                                                        <option value="{{ $category->categorySlug }}" data-parent_id="{{$category->id}}">{{ $category->categoryName }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-12">
                                            <div class="crancy-table-filter__single crancy-table-filter__location">
                                                <label class="crancy__item-label">Select Sub Category</label>
                                                <select name="sub_cat" id="sub_cat">
                                                    <option value="">Select a subcategory</option>
                                                </select>
                                        </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="crancy__item-form--group">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="crancy__item-form--group mg-top-form-20">

                                                <div class="form-group">
                                                    <label for="images">Upload Images:</label>
                                                    <input type="file" name="images[]" id="images" multiple accept="image/*" onchange="previewImages()">
                                                </div>
                                                <div id="imagePreview" class="d-flex flex-wrap"></div>
                                                    @error('images')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">    
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label">Descriptions</label>
                                                <textarea class="crancy__item-input textAreabox" name="product_desc" cols="30" rows="10">{{ old('product_desc') }}</textarea>
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
                <button class="crancy-btn crancy-color8__bg" type="submit">Add Product</button>
            </div>

        </form>
    </div>
</div>

<script>
    function previewImages() {
        var imagePreview = document.getElementById('imagePreview');
        imagePreview.innerHTML = ''; // Clear any previous previews
        var files = document.getElementById('images').files;

        Array.from(files).forEach(file => {
            if (file.type.startsWith('image/')) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'img-thumbnail m-2';
                    img.style.width = '150px';
                    img.style.height = '150px';
                    imagePreview.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        });
    }
</script>

@include('admin.include.footer')

