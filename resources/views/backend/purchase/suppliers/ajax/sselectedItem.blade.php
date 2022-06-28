<tr>

    <td><a class="text-danger deleteItem" href="{{route('deleteTempItem',['item'=>$temp_item->id,'warehouse'=>$warehouse->id,'supplier'=>$supplier->id])}}"><i class="las la-trash"></i></a></td>
    <td id="id{{$temp_item->id}}"><small>{{ $temp_item->product->name }}</small></td>

    <td  class="quantity">
            {{ $temp_item->quantity }}
        </td>

    <td  class="p_price">
            {{ $temp_item->purchase_price }}

    </td>

    <td class="s_price">
            {{ $temp_item->sale_price }}

    </td>
    <td class="t_price">{{ $temp_item->total_price }}</td>
</tr>
