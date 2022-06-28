@extends('backend.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="h2">{{ translate('Order Details') }}</h1>

        </div>
        <div class="card-header row gutters-5">
            <div class="col text-center text-md-left">
            </div>
            @php
                $status = $order->orderDetails->first();
                if ($status) {
                    $delivery_status = $status->delivery_status;
                } else {
                    $delivery_status = null;
                }

                $p_status = $order->orderDetails->first();
                //  if($p_status)
                //  {
                //   $payment_status =$p_status->payment_status;;
                //  }else {
                //   $payment_status = Null;
                //  }

                $w_status = $order->orderDetails->first();
                if ($w_status) {
                    $product_warranty = $p_status->warranty;
                } else {
                    $product_warranty = null;
                }

                // $delivery_status = $order->orderDetails->first()->delivery_status;

                //$payment_status = $order->orderDetails->first()->payment_status;
                // $product_warranty = $order->orderDetails->first()->warranty;

            @endphp
            <div class="col-md-3 ml-auto">
                <label for=update_payment_status"">{{ translate('Payment Status') }}</label>
                <select class="form-control aiz-selectpicker" data-minimum-results-for-search="Infinity"
                    id="update_payment_status">
                    <option value="paid" @if ($order->payment_status == 'paid') selected @endif>{{ translate('Paid') }}
                    </option>
                    <option value="unpaid" @if ($order->payment_status == 'unpaid') selected @endif>{{ translate('Unpaid') }}
                    </option>
                    <option value="unpaid" @if ($order->payment_status == 'partial') selected @endif>{{ translate('Partial') }}
                    </option>
                </select>
            </div>
            {{-- <div class="col-md-3 ml-auto">
                  <label for=update_delivery_status"">{{translate('Delivery Status')}}</label>
                  <select class="form-control aiz-selectpicker"  data-minimum-results-for-search="Infinity" id="update_delivery_status">
                      <option value="pending" @if ($delivery_status == 'pending') selected @endif>{{translate('Pending')}}</option>
                      <option value="confirmed" @if ($delivery_status == 'confirmed') selected @endif>{{translate('Confirmed')}}</option>
                      <option value="on_delivery" @if ($delivery_status == 'on_delivery') selected @endif>{{translate('On delivery')}}</option>
                      <option value="delivered" @if ($delivery_status == 'delivered') selected @endif>{{translate('Delivered')}}</option>
                  </select>
  			</div> --}}
        </div>
        <div class="card-body">
            @include('alerts.alerts')
            <div class="card-header row gutters-6">
                <div class="col text-center text-md-left">
                    @if (json_decode($order->shipping_address))
                        <address>
                            <strong class="text-main">
                                {{ json_decode($order->shipping_address)->name }}</strong><br>
                            {{ json_decode($order->shipping_address)->email }}<br>
                            {{ json_decode($order->shipping_address)->phone }}<br>
                            {{ json_decode($order->shipping_address)->address }},
                            {{ json_decode($order->shipping_address)->city }},
                            {{ json_decode($order->shipping_address)->postal_code }}<br>
                            {{ json_decode($order->shipping_address)->country }}

                        </address>
                    @endif

                    @if ($order->manual_payment && is_array(json_decode($order->manual_payment_data, true)))
                        <br>
                        <strong class="text-main">{{ translate('Payment Information') }}</strong><br>
                        {{ translate('Name') }}:
                        @if ($order->manual_payment_data)
                            {{ json_decode($order->manual_payment_data)->name }},
                        @endif
                        @if ($order->manual_payment_data)
                            {{ translate('Amount') }}:
                            {{ single_price(json_decode($order->manual_payment_data)->amount) }},
                            {{ translate('TRX ID') }}: {{ json_decode($order->manual_payment_data)->trx_id }}
                            <br>
                            <a href="{{ uploaded_asset(json_decode($order->manual_payment_data)->photo) }}"
                                target="_blank"><img
                                    src="{{ uploaded_asset(json_decode($order->manual_payment_data)->photo) }}"
                                    alt="" height="100"></a>
                        @endif
                    @endif

                </div>
                <div class="col-md-4 ml-auto">
                    <table>
                        <tbody>
                            <tr>
                                <td class="text-main text-bold">{{ translate('Order #') }}</td>
                                <td class="text-right text-info text-bold"> {{ $order->code }}</td>
                            </tr>
                            <tr>
                                <td class="text-main text-bold">{{ translate('Order Status') }}</td>
                                @php
                                    $status = $order->orderDetails;
                                    $array1 = [];
                                    $array2 = ['delivered'];
                                    foreach ($status as $key => $statuss) {
                                        $array1[] = $statuss->delivery_status;
                                    }
                                    $resultstusts = array_diff($array1, $array2);
                                @endphp

                                <td class="text-right">
                                    @if ($order->order_status == 'pending')
                                        <span class="badge badge-inline badge-info">{{ translate('Pending') }}</span>
                                        </span>
                                    @else
                                        <span
                                            class="badge badge-inline badge-success">{{ translate(ucfirst($order->order_status)) }}
                                    @endif


                                </td>
                            </tr>
                            <tr>
                                <td class="text-main text-bold">{{ translate('Order Date') }} </td>
                                <td class="text-right">{{ \Carbon\Carbon::parse($order->date)->format('j F Y, h:i A') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-main text-bold">{{ translate('Delivery Date') }} </td>
                                <td class="text-right">
                                    @if ($order->delivery_date != null)
                                        {{ \Carbon\Carbon::parse($order->delivery_date)->format('j F Y') }}
                                    @else
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-main text-bold">{{ translate('Total amount') }} </td>
                                <td class="text-right">
                                    {{ single_price($order->grand_total) }}
                                </td>
                            </tr>
                            <tr>
                                @if ($order->payment_status == 'partial')
                                    @php
                                        $adTotal = 0;
                                        foreach ($order->advancePayment as $ad) {
                                            $s = json_decode($ad->payment);
                                            $adTotal = $adTotal + $s->amount;
                                        }

                                    @endphp
                            <tr>
                                <td class="text-main text-bold">Total Paid </td>
                                <td class="text-right">
                                    {{ single_price($adTotal) }}

                                </td>
                                <hr>

                            </tr>
                            <tr>
                                <td class="text-main text-bold">Total Due</td>
                                <td class="text-right">
                                    {{ single_price($order->grand_total - $adTotal) }}

                                </td>

                            </tr>
                            @endif










                            <td class="text-main text-bold">{{ translate('Payment method') }}</td>
                            <td class="text-right">{{ ucfirst(str_replace('_', ' ', $order->payment_type)) }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <hr class="new-section-sm bord-no">
            <div class="row">
                <div class="col-lg-12 table-responsive">
                    <table class="table table-bordered invoice-summary">
                        <thead>
                            <tr class="bg-trans-dark">
                                <th class="min-col">#</th>
                                <th width="10%">{{ translate('Photo') }}</th>
                                <th width="10%">{{ translate('Saller') }}</th>
                                <th width="10%">{{ translate('Warehouse') }}</th>
                                <th width="10%">{{ translate('Stock_id') }}</th>
                                <th class="text-uppercase">{{ translate('Description') }}</th>
                                <th class="text-uppercase">{{ translate('Delivery Type') }}</th>
                                <th class="text-uppercase">{{ translate('Delivery status') }}</th>
                                <th class="min-col text-center text-uppercase">{{ translate('Qty') }}</th>
                                <th class="min-col text-center text-uppercase">{{ translate('Price') }}</th>
                                <th class="min-col text-right text-uppercase">{{ translate('Total') }}</th>
                                @if ($status == 'delivered')
                                    <th width="5%" class="text-uppercase">{{ translate('Product Received?') }}</th>
                                @endif
                                {{-- <th class="min-col text-center text-uppercase">{{ translate('Accounts')}}</th> --}}
                            </tr>
                        </thead>
                        <tbody id="singleupdate_delivery_status">
                            @foreach ($order->orderDetails as $key => $orderDetail)
                                @php
                                    $parts_warranty = json_decode($orderDetail->parts_warranty);

                                @endphp

                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if ($orderDetail->product != null)
                                            <a href="{{ route('product', $orderDetail->product->slug) }}"
                                                target="_blank"><img height="50"
                                                    src="{{ uploaded_asset($orderDetail->product->thumbnail_img) }}"></a>
                                        @else
                                            <strong>{{ translate('N/A') }}</strong>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($orderDetail->seller)
                                            <a
                                                href="{{ route('adminsellerview', $orderDetail->seller->id) }}">{{ $orderDetail->seller->name }}</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->warehouse)
                                        <a href="{{route('all_store_list',['warehouse'=>$order->warehouse_id])}}" class="ptintA">{{ $order->warehouse->store_name }}</a>
                                        @endif


                                    </td>
                                    <td>
                                        @if ($orderDetail->store_stock_id)
                                        <a href="{{route('warehousePurchaseItem',['warehouse'=>$order->warehouse_id,'purchase'=>$orderDetail->stock->purchase_id])}}">{{ $orderDetail->store_stock_id }}</a>
                                        @endif

                                    </td>

                                    <td style="text-align: left;"><span style="font-weight: bold;">Product Name: </span>
                                        @if ($orderDetail->product)
                                        <a href="{{route('products.all',['product'=>$orderDetail->product_id])}}" class="ptintA">{{ $orderDetail->product->name }}</a>
                                        @endif
                                        @if ($orderDetail->variation != null)
                                            ({{ $orderDetail->variation }})
                                        @endif <br>

                                        @if ($orderDetail->warranty != null)
                                            @php
                                                $dateToModify = '+' . $orderDetail->warranty . 'days';
                                                $expireDate = new \DateTime();
                                                $expireDate = $expireDate->modify($dateToModify);
                                                $order_expire_at = $expireDate->format('d-m-Y');
                                            @endphp

                                            <span style="font-weight: bold;">Product Warranty </span>Expire Date:
                                            {{ $order_expire_at }}<br>
                                        @endif
                                        @if ($orderDetail->parts_warranty != null)
                                            <span style="font-weight: bold;">Parts Warranty </span>Expire Date: <br>
                                            @foreach ($parts_warranty as $item)
                                                @php
                                                    $dateToModify = '+' . $item->warranty_days . 'days';
                                                    $expireDate = new \DateTime();
                                                    $expireDate = $expireDate->modify($dateToModify);
                                                    $order_expire_at = $expireDate->format('d-m-Y');
                                                @endphp

                                                {{ $item->parts_name }} -- {{ $order_expire_at }} <br>
                                            @endforeach
                                        @endif

                                    </td>
                                    {{-- <td>
                          @if ($orderDetail->shipping_type != null && $orderDetail->shipping_type == 'home_delivery')
                            {{ translate('Home Delivery') }}
                          @elseif ($orderDetail->shipping_type == 'pickup_point')

                            @if ($orderDetail->pickup_point != null)
                              {{ $orderDetail->pickup_point->getTranslation('name') }} ({{ translate('Pickup Point') }})
                            @else
                              {{ translate('Pickup Point') }}
                            @endif
                          @endif
                        </td> --}}
                                    <td>
                                        @if ($orderDetail->delivry_methods_title != null)
                                            {{ $orderDetail->delivry_methods_title }}
                                        @endif
                                    </td>
                                    <td>
                                        <select class="adminsingleproductupdate" id="">

                                            @if ($orderDetail->delivery_status == 'pending')
                                                <option
                                                    {{ $orderDetail->delivery_status == 'pending' ? 'selected' : '' }}
                                                    value="pending" disabled>Pending</option>

                                                <option
                                                    {{ $orderDetail->delivery_status == 'confirmed' ? 'selected' : '' }}
                                                    value="confirmed">Confirmed</option>
                                            @elseif ($orderDetail->delivery_status == 'confirmed')
                                                <option
                                                    {{ $orderDetail->delivery_status == 'confirmed' ? 'selected' : '' }}
                                                    value="confirmed" disabled>Confirmed</option>
                                            @elseif ($orderDetail->delivery_status == 'on_delivery')
                                                <option
                                                    {{ $orderDetail->delivery_status == 'on_delivery' ? 'selected' : '' }}
                                                    value="on_delivery" disabled>On Delivery</option>
                                            @elseif ($orderDetail->delivery_status == 'delivered')
                                                <option
                                                    {{ $orderDetail->delivery_status == 'delivered' ? 'selected' : '' }}
                                                    value="delivered" disabled>Delivered</option>
                                            @else
                                            @endif
                                            <option {{ $orderDetail->delivery_status == 'cancel' ? 'selected' : '' }}
                                                value="cancel">Cancel</option>


                                            {{-- <option value="pending" @if ($orderDetail->delivery_status == 'pending') selected @endif>
                                                {{ translate('Pending') }}</option>
                                            <option value="confirmed" @if ($orderDetail->delivery_status == 'confirmed') selected @endif>
                                                {{ translate('Confirmed') }}</option>
                                            <option value="on_delivery" @if ($orderDetail->delivery_status == 'on_delivery') selected @endif>
                                                {{ translate('On delivery') }}</option>
                                            <option value="delivered" @if ($orderDetail->delivery_status == 'delivered') selected @endif>
                                                {{ translate('Delivered') }}</option>
                                            <option value="cancel" @if ($orderDetail->delivery_status == 'cancel') selected @endif>
                                                {{ translate('Cancel') }}</option> --}}
                                        </select>
                                        <input type="hidden" class="orderid" value="{{ $orderDetail->id }}">
                                    </td>


                                    <td class="text-center">{{ $orderDetail->quantity }}</td>

                                    <td class="text-center">
                                        {{ single_price($orderDetail->price / $orderDetail->quantity + $orderDetail->commision / $orderDetail->quantity + $orderDetail->shipping_cost) }}
                                    </td>

                                    <td class="text-center">
                                        {{ single_price(($orderDetail->price / $orderDetail->quantity + $orderDetail->commision / $orderDetail->quantity + $orderDetail->shipping_cost) * $orderDetail->quantity) }}
                                    </td>

                                    @if ($status == 'delivered')
                                        <td class="text-center">
                                            @if ($orderDetail->received_status != null)
                                                @if ($orderDetail->received_status == 'Yes')
                                                    <p class="badge badge-inline badge-success">
                                                        {{ $orderDetail->received_status }}</p>
                                                @elseif($orderDetail->received_status == 'No')
                                                    <p class="badge badge-inline badge-danger">
                                                        {{ $orderDetail->received_status }}</p>
                                                @endif
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="clearfix float-right">
                <table class="table">
                    <tbody>
                        {{-- <tr>
        				<td>
        					<strong class="text-muted">{{translate('Sub Total')}} :</strong>
        				</td>
        				<td>
        					{{ single_price($order->orderDetails->sum('price') + $order->orderDetails->sum('commision') +$order->orderDetails->sum('shipping_cost')) }}
        				</td>
        			</tr> --}}
                        <tr>
                            <td>
                                <strong class="text-muted">{{ translate('Tax') }} :</strong>
                            </td>
                            <td>
                                {{ single_price($order->orderDetails->sum('tax')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong class="text-muted">{{ translate('Delivery Charge') }} :</strong>
                            </td>
                            <td>
                                {{ single_price($order->orderDetails->sum('delivry_methods_charge')) }}
                            </td>
                        </tr>
                        {{-- <tr>
        				<td>
        					<strong class="text-muted">{{translate('Shipping')}} :</strong>
        				</td>
        				<td>
        					{{ single_price($order->orderDetails->sum('shipping_cost')) }}
        				</td>
        			</tr> --}}
                        <tr>
                            <td>
                                <strong class="text-muted">{{ translate('Coupon') }} :</strong>
                            </td>
                            <td>
                                {{ single_price($order->coupon_discount) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong class="text-muted">{{ translate('TOTAL') }} :</strong>
                            </td>
                            <td class="text-muted h5" id="grand_total">
                                {{ single_price($order->grand_total) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-right no-print">
                    <a href="{{ route('customer.invoice.download', $order->id) }}" type="button"
                        class="btn btn-icon btn-light"><i class="las la-print"></i></a>
                </div>
            </div>

        </div>
    </div>

    {{-- Order Status Change Area Start --}}
    <div class="card">
        <div class="card-header">
            <h1>Order Status Area</h1>
        </div>
        <div class="card-body">
            <div class="card p-3">
                <form action="{{route('orderStatusChange',$order)}}" method="POST">
                    @csrf

                    <input type="hidden" id="itemTrueFalse" />
                    <div class="row">
                        <div class="col-12 col-md-4 m-auto">
                            @if ($order->order_status == 'pending' || $order->order_status == 'confirmed')
                            <div class="form-group withitem">
                                <label for="with_items"> <input type="checkbox" name="with_items" id="with_items"> With
                                    items?</label>
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    @if ($order->order_status == 'pending')
                                        <option {{ $order->order_status == 'confirmed' ? 'selected' : '' }}
                                            value="confirmed">Confirmed</option>
                                    @elseif ($order->order_status == 'confirmed')
                                        <option {{ $order->order_status == 'on_delivery' ? 'selected' : '' }}
                                            value="on_delivery">On delivery</option>
                                    @elseif ($order->order_status == 'on_delivery')
                                        <option {{ $order->order_status == 'delivered' ? 'selected' : '' }}
                                            value="delivered">Delivered</option>
                                    @endif
                                    <option {{ $order->order_status == 'cancel' ? 'selected' : '' }} value="cancel">
                                        Cancel</option>
                                </select>
                            </div>
                            @if ($order->order_status == 'confirmed')
                                <div class="form-group warehouseShowHide">
                                    <label for="warehouse">Select Warehouse/Store</label>
                                    <select name="warehouse" id="warehouse" class="form-control" data-url="{{route('warehouseStockCheck',$order)}}">
                                        <option value="" selected disabled>Select A Warehouse</option>
                                        @foreach ($warehouses as $warehouse)
                                            <option value="{{ $warehouse->id }}">{{ $warehouse->store_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('warehouse')
                                        <div class="text-danger">Please Select Warehouse</div>
                                    @enderror
                                </div>
                            @endif
                            <div class="form-group">
                                <input type="submit" class="btn btn-info">
                            </div>
                        </div>
                    </div>
                </form>
                <div id="stockShow"></div>

            </div>
        </div>
    </div>
    {{-- Order Status Change Area End --}}
    <div class="card">
        <div class="card-header">
            <h1>Delivery Man Area</h1>
        </div>
        <div class="card-body">
            <div class="card p-3">
                <form action="">
                    <div class="form-row">
                        <div class="col-md-6  offset-md-3">

                            <h5 class="text-danger assigndeliverymsg">Delivery Man Name:
                                {{ $order->deliveryman ? $order->deliveryman->name : '' }} </h5>
                            <label for="deliveryMen">Selected Delivery Man:</label>
                            <select class="form-control aiz-selectpicker" id="deliveryMen" data-live-search="true">
                                <option value=""> Select Deliveryman</option>
                                @foreach ($deliveryMans as $item)
                                    <option value="{{ $item->user_id }}"
                                        {{ $order->deliveryman_id == $item->id ? 'selected' : ' ' }}>{{ $item->name }}
                                        ({{ $item->area }})
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- By Mannaf --}}
    <script>
        $(document).on('click', '#with_items', function() {
            if ($(this).is(":checked")) {
                $("#itemTrueFalse").val(1);
            } else {
                $("#itemTrueFalse").val(0);
            }
        })

        $(document).on('change', '#status', function() {
            var status = $(this).val();
            if (status == 'on_delivery') {
                $('.warehouseShowHide').show();
            } else {
                $('.warehouseShowHide').hide();

            }


        })
        $(document).on('change', '#warehouse', function() {
            var warehouse_id = $(this).val();
            var url = $(this).attr('data-url');
            var with_items = $("#itemTrueFalse").val();
            var finalUrl = url + "?id=" + warehouse_id + "&with_items=" + with_items;
            $.ajax({
                url: finalUrl,
                method: 'GET',
                success: function(res) {
                    $("#stockShow").empty().html(res);
                }

            })
        })
    </script>
    {{-- By Mannaf --}}
    <script type="text/javascript">
        $('#update_payment_status').on('change', function() {
            var x = document.getElementById("update_payment_status").value;

            if (confirm('Are you sure you want Change')) {
                var order_id = {{ $order->id }};
                var status = $('#update_payment_status').val();
                $.post('{{ route('orders.update_payment_status') }}', {
                    _token: '{{ @csrf_token() }}',
                    order_id: order_id,
                    status: status
                }, function(data) {
                    AIZ.plugins.notify('success', '{{ translate('Payment status has been updated') }}');
                });
            } //confirm
        });

        // $('#update_delivery_status').on('change', function(){
        // if (confirm('Are you sure you want Change')) {
        //             var order_id = {{ $order->id }};
        //             var status = $('#update_delivery_status').val();
        //             $.post('{{ route('orders.update_delivery_status') }}', {_token:'{{ @csrf_token() }}',order_id:order_id,status:status}, function(data){

        //                 AIZ.plugins.notify('success', '{{ translate('Delivery status has been updated') }}');
        //             });
        //       }
        // });
    </script>
    <script>
        // $("#singleupdate_delivery_status").change(function(){
        //   alert("The text has been changed.");
        // });

        // var row = $(this).closest("tr");
        //     var id = parseFloat(row.find("#proid").val());
        //
        // $('.gg').on('change',function(){
        //   var d= $(this).val();
        //   var row = $(this).closest("tr");
        //   var orderDetailsId=parseFloat(row.find(".orderid").val());
        //   alert(orderDetailsId);
        // });
        $(".adminsingleproductupdate").on('change', function() {
            if (confirm('Are you sure you want Change')) {
                var status = $(this).val();
                var order_id = "{{ $order->id }}";

                var row = $(this).closest("tr");
                var orderDetailsId = parseFloat(row.find(".orderid").val());

                $.post('{{ route('adminorderstatuschange') }}', {
                        _token: '{{ @csrf_token() }}',
                        orderDetailsId: orderDetailsId,
                        orderId: order_id,
                        status: status
                    },
                    function(data) {
                        AIZ.plugins.notify('success',
                            '{{ translate('Delivery status has been updated') }}');
                        $("#grand_total").empty().html(data.grand_total + "৳")

                        location.reload();

                    });
            }

        });
    </script>
    <script>
        $("#deliveryMen").on('change', function() {
            var that = $(this);
            var url = "{{ route('assign_delivery_man') }}";
            var delManId = that.val()
            var OrderId = "{{ $order->id }}"


            $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    cache: false,
                    data: {
                        orderId: OrderId,
                        delManId: delManId
                    }

                })
                .done(function(data) {
                    if (data.success) {
                        $(".assigndeliverymsg").empty().text("Delivery Man Name:" + data.deliveryManName)
                        AIZ.plugins.notify('success', '{{ translate('Delivery Man Assign') }}');
                    }
                })
                .fail(function(e) {
                    alert("error");
                });



        })
    </script>
@endsection
