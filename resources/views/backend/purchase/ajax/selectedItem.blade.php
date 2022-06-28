<tr>
    <td><input type="checkbox" class="tempCheckedUncecked" id="id-{{ $tempProduct->product_id }}"
            {{ isset($tempProduct->product->tempProducts) && $tempProduct->product->hasTemp($warehouse->id) ? 'checked' : '' }}
            data-unselect-url="{{ route('unselectTempProduct', ['product' => $tempProduct->product_id, 'warehouse' => $warehouse, 'supplier' => $supplier]) }}">
    </td>
    <td><small>{{ $tempProduct->product->name }}</small></td>

    <td><input class="quantity_change" data-url="{{route('updateTempItem',['type'=>'quantity','item'=>$tempProduct->id,'warehouse'=>$warehouse,'supplier'=>$supplier])}}" type="number" step="any" min="1" id="quantity" required name="quantity" value="{{ $tempProduct->quantity }}"></td>


    <td>
        <input class="price_change" data-url="{{route('updateTempItem',['type'=>'price','item'=>$tempProduct->id,'warehouse'=>$warehouse,'supplier'=>$supplier])}}" type="number" step="any" min="1" required name="purchase_price" id="purchase_price" value="{{ $tempProduct->purchase_price }}">

    </td>

    <td>
        <input class="sale_price"
            data-url="{{ route('updateTempItem', ['type' => 'sale_price', 'item' => $tempProduct->id, 'warehouse' => $warehouse, 'supplier' => $supplier]) }}"
             type="number" step="any" min="1" id="sale_price" required name="sale_price"
            value="{{ $tempProduct->sale_price}}">

    </td>
    <td class="total_item_price">{{ $warehouse->total_price }}</td>
</tr>
