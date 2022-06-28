<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>SuppplierName</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Purchase Amount</th>
                <th>Paid Amount</th>
                <th>Due</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
                <tr>

                    <td><a
                            href="{{ route('supplier.newPurchase', ['warehouse' => $warehouse, 'supplier' => $supplier]) }}">{{ $supplier->name }} </a>
                    </td>
                    <td>{{$supplier->name}}</td>
                    <td>{{$supplier->mobile}}</td>
                    <td>{{$supplier->admin_to_pay}}</td>
                    <td>{{ $supplier->paid_amount }}</td>
                    <td>{{ $supplier->due() }}</td>
                    <td>{{$supplier->address}}</td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
<div class="float-right">
    {{ $suppliers->appends(['q' => $q])->links() }}
</div>
