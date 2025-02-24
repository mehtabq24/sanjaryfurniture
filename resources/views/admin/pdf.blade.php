<table id="crancy-table__main" class="crancy-table__main crancy-table__main-v1">
    <thead class="crancy-table__head">
    <tr>
    <th class="crancy-table__column-3 crancy-table__h3">Name</th>
    <th class="crancy-table__column-3 crancy-table__h3">{{ $order->user_name }}</th>
    <th class="crancy-table__column-3 crancy-table__h3">Email</th>
    <th class="crancy-table__column-1 crancy-table__h1">{{ $order->user_email }}</th>
    <th class="crancy-table__column-4 crancy-table__h4">Phone</th>
    <th class="crancy-table__column-6 crancy-table__h6">{{ $order->user_phone }}</th>
    <th class="crancy-table__column-7 crancy-table__h7">Address</th>
    <th class="crancy-table__column-7 crancy-table__h7">{{ $order->user_address }}</th>
    <th class="crancy-table__column-7 crancy-table__h7">Total</th>
    <th class="crancy-table__column-7 crancy-table__h7">{{ $order->total }}</th>
    </tr>
    </thead>
</table>