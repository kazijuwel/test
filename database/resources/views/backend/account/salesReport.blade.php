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
<div class="col-md-6">
    <div class="card">
        <div class="card-header">Total Overview</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td>Total order</td>
                    <td>{{ $orders->count() }}</td>
                </tr>
                <tr>
                    <td>Sales price</td>
                    <td>
                        @php
                        $DeliveryPrice=0;
                        foreach ($orders as $key => $order) {
                            $DeliveryPrice=$DeliveryPrice+ $order->hasdelivery->sum('price');
                        }
                        
                        @endphp
                     
                     {{ $DeliveryPrice  }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="card">
      <form class="" action="" method="GET">
        <div class="card-header row gutters-5">
          <div class="col text-center text-md-left">
            <h5 class="mb-md-0 h6">{{ translate('Order Wise Sales Report') }}</h5>
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
					<th data-breakpoints="md">{{ translate('Customer') }}</th>
					<th data-breakpoints="md">{{ translate('Num. of Order Item') }}</th>
                    <th data-breakpoints="md">{{ translate('Num. of Order Delivery') }}</th>
                    
                   
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
						<td>
							<a href="{{ route('adminCustomerVeiw',$order->user->id) }}"> @if ($order->user != null)
									{{ $order->user->name }}
								@else
									Guest ({{ $order->guest_id }})
								@endif
							</a>
						</td> 
						<td class="text-center">
                            {{ count($order->orderDetails) }}
							<a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('all_orders.show', $order->id)}}" title="{{ translate('View') }}">
                                <i class="las la-eye"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            {{ count($order->hasdelivery) }}
							<a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('salesorder.show',$order->id)}}" title="{{ translate('View') }}">
                                <i class="las la-eye"></i>
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
