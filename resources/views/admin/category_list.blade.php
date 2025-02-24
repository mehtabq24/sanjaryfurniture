@include('admin.include.header')
<div class="crancy-table mg-top-30 orderlistData">
<div class="crancy-table__heading">
<h3 class="crancy-table__title mb-0">Recent Activity</h3>
<ul class="nav nav-tabs  crancy-dropdown__list" id="nav-tab" role="tablist">
<li class="nav-item dropdown ">
<a class="" data-bs-toggle="dropdown" href="add_order.php" role="button" aria-expanded="false">
<div class="crancy-table__status"><a href="{{ url('view_category') }}">Add Category</a> </div>
</a>
</li>
</ul>
</div>
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="table_1" role="tabpanel" aria-labelledby="table_1">

<div class="crancy-table-filter mg-btm-20">
<div class="row">
<div class="col-lg-3 col-md-6 col-12">

<div class="crancy-table-filter__single crancy-table-filter__location">
<label for="crancy-table-filter__label">Location</label>
<select name="company_name" id="company">
<option value="company" selected="selected">State or
Province</option>
<option>New York</option>
<option>Sydney</option>
<option>Dhaka</option>
<option>Victoria</option>
</select>
</div>

</div>
<div class="col-lg-3 col-md-6 col-12">

<div class="crancy-table-filter__single crancy-table-filter__amount">
<label for="crancy-table-filter__label">Amount Spent</label>
<select name="company_name" id="company">
<option value="company" selected="selected">> $1,000
</option>
<option>> $2,000</option>
<option>> $3,000</option>
<option>> $4,000</option>
<option>> $5,000</option>
</select>
</div>

</div>
<div class="col-lg-3 col-md-6 col-12">

<div class="crancy-table-filter__single crancy-table-filter__trans-date">
<label for="crancy-table-filter__label">Transaction list
Date</label>
<div class="crancy-table-filter__group">
<input type="text" id="dateInput" placeholder="Select date">
<span class="crancy-table-filter__icon"><img src="{{ asset('admin/img/calendar-icon.svg')}}"></span>
</div>
</div>

</div>
<div class="col-lg-3 col-md-6 col-12">

<div class="crancy-table-filter__single crancy-table-filter__trans">

<div class="crancy-header__form">
<form class="crancy-header__form-inner" action="#">
<input name="s" type="text" placeholder="Search..." id="searcproductData">
</form>
</div>



</div>

</div>
</div>
</div>

<table id="crancy-table__main" class="crancy-table__main crancy-table__main-v1">
<thead class="crancy-table__head">
<tr>
<th class="crancy-table__column-3 crancy-table__h3">Image</th>
<th class="crancy-table__column-1 crancy-table__h1">Category</th>
<th class="crancy-table__column-6 crancy-table__h6">Date</th>
<th class="crancy-table__column-7 crancy-table__h7">Status</th>
<th class="crancy-table__column-8 crancy-table__h8">Edit</th>
<th class="crancy-table__column-8 crancy-table__h8">Delete</th>
</tr>
</thead>
<tbody class="crancy-table__body searchproduct">
    @foreach($categoryData as $key => $category)
    <tr>
    <td class="crancy-table__column-1 crancy-table__data-1">
    <div class="crancy-ptabs__sauthor-img crancy-ptabs__pthumb">
    <img style="width: 150px;" src="{{ asset('images/' . $category->categoryImage) }}" alt="Image description">
    </div>
    </td>
    <td class="crancy-table__column-2 crancy-table__data-2">
    <h5 class="crancy-table__inner--title">{{$category->categoryName}}</h5></td>
    
    <td class="crancy-table__column-3 crancy-table__data-3">
    <p class="crancy-table__text crancy-table__time">{{ $category->created_at }}</p>
    </td>
    <td class="crancy-table__column-7 crancy-table__data-7">
    <div class="crancy-table__status">{{ $category->status}}</div>
    </td>
    <td class="crancy-table__column-6 crancy-table__data-6">
    <div class="crancy-chatbox__edit"><a href="{{ url('update_category', $category->id) }}"><img src="admin/img/edit-icon2.svg"></a></div>
    </td>
    <td class="crancy-table__column-6 crancy-table__data-6">
        <div class="crancy-chatbox__edit"><a onclick="return confirm('Are You Sure You Want To Delete This')" href="{{ url('delete_category', $category->id) }}">Delete</a></div>
    </td>
    </tr>
    @endforeach
    </tbody>
</table>

{{-- {{ $categoryData->links() }} --}}


<div class="pagination justify-content-center mt-3">
    {{ $categoryData->links() }}
</div>

</div>
</div>
</div>
</div>

</div>
</div>
@include('admin.include.footer')