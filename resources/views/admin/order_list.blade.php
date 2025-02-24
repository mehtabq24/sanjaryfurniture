@include('admin.include.header')
<div class="crancy-table mg-top-30 orderlistData">
<div class="crancy-table__heading">
<h3 class="crancy-table__title mb-0">Recent Orders</h3>
<ul class="nav nav-tabs  crancy-dropdown__list" id="nav-tab" role="tablist">
<li class="nav-item dropdown ">
<a class="" data-bs-toggle="dropdown" href="add_order.php" role="button" aria-expanded="false">
<div class="crancy-table__status"><a href="{{ url('add_product') }}">Add Product</a> </div>
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
<div class="crancy-table-filter__single crancy-table-filter__trans-date">
<label for="crancy-table-filter__label">Transaction list Date</label>
<div class="crancy-table-filter__group">
<input type="text" id="dateInput" placeholder="Select date">
<span class="crancy-table-filter__icon"><img src="img/calendar-icon.svg"></span>
</div>
</div>

</div>

<div class="col-lg-3 col-md-6 col-12">
    <form class="crancy-header__form-inner" action="{{url('search-orders')}}" method="GET">
        @csrf
        <div class="crancy-table-filter__single crancy-table-filter__trans">
        <div class="crancy-header__form">
        <input name="query" type="text" placeholder="Search..." id="searcproductData11" required="">
        </div>
        </div>
        </div>

        <div class="col-lg-2 col-md-6 col-12">
            <div class="crancy-table-filter__single crancy-table-filter__trans">
                <div class="crancy-header__form">
                        <button type="submit" class="btn btn-primary">Search Product</button>
                </div>
            </div>
    </form>

    </div>


</div>
</div>
<table id="crancy-table__main" class="crancy-table__main crancy-table__main-v1">
<thead class="crancy-table__head">
<tr>
<th class="crancy-table__column-3 crancy-table__h3">Sr  No.</th>
<th class="crancy-table__column-3 crancy-table__h3">Invoice</th>
<th class="crancy-table__column-3 crancy-table__h3">Name</th>
<th class="crancy-table__column-1 crancy-table__h1">Email</th>
<th class="crancy-table__column-4 crancy-table__h4">Phone</th>
<th class="crancy-table__column-6 crancy-table__h6">Total</th>
<th class="crancy-table__column-7 crancy-table__h7">Payment Status</th>
<th class="crancy-table__column-7 crancy-table__h7">Delivery Status</th>
<th class="crancy-table__column-7 crancy-table__h7">Delivered</th>
<th class="crancy-table__column-7 crancy-table__h7">Action</th>
</tr>
</thead>
<tbody class="crancy-table__body searchproduct">
    @php
        $serialNumber = 1;
    @endphp

    @foreach($orderData as $key => $product)
    <tr>
        <td class="crancy-table__column-2 crancy-table__data-2">
            <h5 class="crancy-table__inner--title">{{ $serialNumber }}</h5></td>

        <td class="crancy-table__column-2 crancy-table__data-2">
            <h5 class="crancy-table__inner--title">{{$product->invoice_id}}</h5></td>

    <td class="crancy-table__column-2 crancy-table__data-2">
    <h5 class="crancy-table__inner--title">{{$product->user_name}}</h5></td>
    
    <td class="crancy-table__column-4 crancy-table__data-4">
    <h5 class="crancy-table__inner--title">{{ $product->user_email }}</h5>
    </td>
    <td class="crancy-table__column-3 crancy-table__data-3">
    <p class="crancy-table__text crancy-table__time">{{ $product->user_phone }}</p>
    </td>
    <td class="crancy-table__column-7 crancy-table__data-7">
    <div class="crancy-table__status">{{ $product->total}}</div>
    </td>

    <td class="crancy-table__column-7 crancy-table__data-7">
        <div class="crancy-table__status">{{ $product->delivey_status}}</div>
        </td>
        <td class="crancy-table__column-7 crancy-table__data-7">
            <div class="crancy-table__status">{{ $product->payment_status}}</div>
            </td>
        
        @if($product->delivey_status=='pending')
        <td class="crancy-table__column-6 crancy-table__data-6">
            <div class="crancy-chatbox__edit"><a href="{{ url('/delivered', $product->id) }}">Delivered</a></div>
            </td>
            @else
            <td class="crancy-table__column-7 crancy-table__data-7">
                <p class="crancy-table__text crancy-table__time">Delivered</p>
            </td>
        @endif    


        <td class="crancy-table__column-6 crancy-table__data-6">
            <div class="crancy-chatbox__edit"><a href="{{ url('delete_product', $product->id) }}">Delete</a></div>
            </td>
            <td class="crancy-table__column-6 crancy-table__data-6">
                <div class="crancy-chatbox__edit"><a href="{{ url('print_pdf', $product->id) }}">Print PDF</a></div>
                </td>
                <td class="crancy-table__column-6 crancy-table__data-6">
                    <div class="crancy-chatbox__edit"><a href="{{ url('send_email', $product->id) }}">Send Email</a></div>
                </td>
    </tr>
    @php $serialNumber++; @endphp

    @endforeach
    </tbody>
</table>
<div class="pagination justify-content-center mt-3">
    {{ $orderData->links() }}
</div>
</div>
</div>
</div>
</div>

</div>
</div>
@include('admin.include.footer')