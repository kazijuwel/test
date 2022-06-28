<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Suppplier/Seller Name</th>
                <th>Shop Name</th>
                <th>Purchase Amount</th>
                <th>Paid Amount</th>
                <th>Due</th>
                <th>Total Products</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sellers as $supplier)
                <tr>

                    <td><a
                            href="{{ route('newPurchase', ['warehouse' => $warehouse, 'supplier' => $supplier]) }}">{{ $supplier->user ? $supplier->user->name : '' }}</a>
                    </td>
                    <td>{{$supplier->user->shop->name}}</td>
                    <td>{{$supplier->admin_to_pay}}</td>
                    <td>{{ $supplier->paid_amount }}</td>
                    <td>{{ $supplier->due() }}</td>
                    <td>{{ $supplier->total_products() }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
<div class="float-right">
    {{ $sellers->appends(['q' => $q])->links() }}
</div>
