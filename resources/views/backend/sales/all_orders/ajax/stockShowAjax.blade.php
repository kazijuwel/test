<table class="table table-xs table-bordered">
    <tr>
        <th>Product Name</th>
        <th>Current Stock</th>
        <th>Require Stock</th>
        <th>Status</th>
    </tr>
    @foreach ($order_items as $item)
        <tr>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->product->warehouseWiseStock($warehouse->id) }}</td>
            <td>{{ $item->quantity }}</td>
            <td>
                @if ($item->product->warehouseWiseStock($warehouse->id) < $item->quantity)
                    <span class="text-danger">Out Of Stock</span>
                @else
                    <span class="text-success">In Stocked</span>
                @endif
            </td>
        </tr>
    @endforeach

</table>
