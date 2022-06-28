@extends('backend.layouts.app')

@section('content')
@php
    $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
@endphp
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card">
      <form class="" action="" method="GET">
        <div class="card-header row gutters-5">
          <div class="col text-center text-md-left">
            <h5 class="mb-md-0 h6">{{ translate('All Orders') }}</h5>
          </div>
          <div class="col-lg-3">
            <div class="form-group mb-0 p-2">
                <select class="custom-select js-example-disabled-results" name="seller" >
                    <option value="">Seller</option>
                    @foreach($sellers as $seller)
                    <option value="{{ $seller->user->id }}">{{ $seller->user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
          <div class="col-lg-2">
            <div class="form-group mb-0">
                <select class="custom-select" name="status">
                    <option value="">Delivery Status</option>
                    <option value="pending">Panding</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="on_delivery">On Delivery</option>
                    <option value="delivered">Delivered</option>
                    <option value="paid">Paid</option>
                    <option value="unpaid">UnPaid</option>
                </select>
            </div>
        </div>
          <div class="col-lg-2">
              <div class="form-group mb-0">
                  <input type="text" class="aiz-date-range form-control" value="{{ $date }}" name="date" placeholder="{{ translate('Filter by date') }}" data-format="DD-MM-Y" data-separator=" to " data-advanced-range="true" autocomplete="off">
              </div>
          </div>
          <div class="col-lg-2">
            <div class="form-group mb-0">
              <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type Order code & hit Enter') }}">
            </div>
          </div>
          <div class="col-auto">
            <div class="form-group mb-0">
              <button type="submit" class="btn btn-primary">{{ translate('Filter') }}</button>
            </div>
          </div>
        </div>
    </form>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ translate('Order Code') }}</th>
                    <th>{{ translate('Order Date') }}</th>
                    <th data-breakpoints="md">{{ translate('Num. of Products') }}</th>
                    <th data-breakpoints="md">{{ translate('Customer') }}</th>
                    <th data-breakpoints="md">{{ translate('Purchase Amount') }}</th>
                    <th data-breakpoints="md">{{ translate('Delivery Cost') }}</th>
                    <th data-breakpoints="md">{{ translate('Delivery Status') }}</th>
                    <th data-breakpoints="md">{{ translate('Payment Status') }}</th>
                    @if ($refund_request_addon != null && $refund_request_addon->activated == 1)
                        <th>{{ translate('Refund') }}</th>
                    @endif
                    <th class="text-right" width="15%">{{translate('options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $order)
                    <tr>
                        <td>
                            {{ ($key+1) + ($orders->currentPage() - 1)*$orders->perPage() }}
                        </td>
                        <td>
                            {{ $order->code }}
                        </td>
                        <td>{{\Carbon\Carbon::parse($order->created_at)->format('l j F Y, h:i A')}}</td>
                        <td class="text-center">
                            {{ count($order->orderDetails) }}
                        </td>
                        
                        <td>


                        <a href="{{ route('adminCustomerVeiw',$order->user->id) }}"> @if ($order->user != null)
                                {{ $order->user->name }}
                            @else
                                Guest ({{ $order->guest_id }})
                            @endif
                        </a>
                        </td>
                        <td class="text-center">
                            {{single_price($order->orderDetails->sum('purchase_price'))}}
                            
                        </td>
                        <td>
                            {{single_price($order->orderDetails->sum('delivry_methods_charge'))}}
                        </td>
                        <!-- <td>
                            {{ single_price($order->grand_total) }}
                        </td> -->
                        <td>
                            @php
                            $orderDetails = $order->orderDetails->first();
                            
                            if($orderDetails)
                            {
                                $status=$orderDetails->delivery_status;
                            }
                            else{
                                $status= Null;
                            }
                            
                            
                            @endphp
                            
                            {{ translate(ucfirst($status)) }} 
                        </td>
                        <td>
                            @if ($order->payment_status == 'paid')
                                <span class="badge badge-inline badge-success">{{translate('Paid')}}</span>
                            @else
                                <span class="badge badge-inline badge-danger">{{translate('Unpaid')}}</span>
                            @endif
                        </td>
                        @if ($refund_request_addon != null && $refund_request_addon->activated == 1)
                            <td>
                                @if (count($order->refund_requests) > 0)
                                    {{ count($order->refund_requests) }} {{ translate('Refund') }}
                                @else
                                    {{ translate('No Refund') }}
                                @endif
                            </td>
                        @endif
                        <td class="text-right">
                            {{-- <!-- <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('test_report_pdf', $order->id)}}" title="{{ translate('Test Report') }}">
                               <i class="las la-download"></i>
                            </a> --> --}}
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('all_orders.show',$order->id)}}" title="{{ translate('View') }}">
                                <i class="las la-eye"></i>
                            </a>
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{ route('customer.invoice.download', $order->id) }}" title="{{ translate('Download Invoice') }}">
                                <i class="las la-download"></i>
                            </a> 
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{ route('purchase_requisition.download', $order->id) }}" title="{{ translate('Download Purchase Requisition') }}">
                                <i class="las la-download"></i>
                            </a>
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{ route('orderidshowAdmin', $order->id) }}" title="{{ translate('Download Purchase Order') }}">
                                <i class="las la-download"></i>
                            </a>
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" data-toggle="modal"  id="orderidButton" data-attr="{{ route('orderidshowAdmin', $order->id) }}">
                                <i class="las la-edit"></i>
                            </a>
                            {{-- <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('orders.destroy', $order->id)}}" title="{{ translate('Delete') }}">
                                <i class="las la-trash"></i>
                            </a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="aiz-pagination">
            {{ $orders->appends(request()->input())->links() }}
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="orderModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Order Id</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('changeOrderIdAdmin')}}" method="post">
            @csrf
            <label>OrderId</label>
            <input type="text" class="form-control" id="code" name="code">
            <input type="hidden" name="orderid" id="orderidsf">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  <!--End Model-->
@endsection

@section('modal')
    @include('modals.delete_modal')

    <div class="modal fade" id="profile_modal">
        <div class="modal-dialog">
            <div class="modal-content" id="profile-modal-content">

            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
    var $disabledResults = $(".js-example-disabled-results");
    $disabledResults.select2();

        function show_seller_profile(id){         
            $.post('{{ route('sellers.profile_modal_v2') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
                $('#profile_modal #profile-modal-content').html(data);
                $('#profile_modal').modal('show', {backdrop: 'static'});
            });
        }
//model
        $(document).on('click', '#orderidButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                // beforeSend: function() {
                //     $('#loader').show();
                // },
                // return the result
                success: function(result) {
                    $('#orderModel').modal("show");
                    $('#code').val(result.code);
                    $('#orderidsf').val(result.id);


                    
                },
                // complete: function() {
                //     $('#loader').hide();
                // },
                // error: function(jqXHR, testStatus, error) {
                //     console.log(error);
                //     alert("Page " + href + " cannot open. Error:" + error);
                //     $('#loader').hide();
                // },
                timeout: 8000
            })
        });

    </script>
@endsection
