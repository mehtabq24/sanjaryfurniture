@include('admin.include.header')
<div class="container">
    <div class="tab-pane fade show active" id="id1" role="tabpanel">
        <form action="{{ url('add_cat') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="crancy-ptabs__separate">
                        <div class="crancy-ptabs__form-main">
                            <div class="crancy__item-group">
                                <h4 class="crancy__item-group__title">Add Category</h4>
                                <div class="crancy__item-form--group">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            @if (session('message'))
                                            <div class="alert alert-success">
                                                {{ session('message') }}
                                            </div>
                                            @endif
                                            <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label">Category Name</label>
                                                <input class="crancy__item-input @error('title') is-invalid @enderror" type="text"
                                                    placeholder="Enter Category Name" value="{{ old('cat_name') }}" name="cat_name">
                                                    {{-- <span>@error('cat_name'){{ $message }}@enderror</span> --}}
                                                    @error('cat_name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label">Category Image</label>
                                                <input class="crancy__item-input" type="file" name="cat_image">
                                                    <span>@error('cat_image'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="crancy__item-form--group">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">    
                                            <div class="crancy__item-form--group mg-top-form-20">
                                            <label class="crancy__item-label">Descriptions</label>
                                            <textarea class="crancy__item-input textAreabox" name="cat_desc" cols="30" rows="10"></textarea>    
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="crancy-table-filter__single crancy-table-filter__location">
                                                <label for="crancy-table-filter__label">Select Category</label>
                                                <select name="parent_cat">
                                                    <option value="">Select a category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                                                    @endforeach
                                                    <option value="0">None</option>
                                                </select>
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
                <button class="crancy-btn crancy-color8__bg" type="submit">Add Category</button>
            </div>

        </form>
    </div>
</div>
@include('admin.include.footer')