@extends('backend.layouts.app')

@section('content')
@php
    $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
@endphp
<div class="card">
      <form class="" action="" method="GET">
        <div class="card-header row gutters-5">
          <div class="col text-center text-md-left">
            <h5 class="mb-md-0 h6">{{ translate('Activity Logs') }}</h5>
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
                    <th>{{ translate('Order Item Name') }}</th>
                    <th>{{ translate('Updated By') }}</th>
                    <th>{{ translate('Description') }}</th>
                    <th>{{ translate('Update At')}}</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $order)
                    <tr>
                        <td>
                            {{ ($key+1) + ($orders->currentPage() - 1)*$orders->perPage() }}
                        </td>
                        <td>
                            <a href="{{ route('all_orders.show',$order->loggable_id) }}">{{ $order->order->code }}</a>
                        </td>
                        <td>
                            @php
                            $pro=$order->orderDetails;
                            if($pro)
                            {
                                $product= $pro->product->name;
                            }else{
                                $product=Null;
                            }

                            @endphp
                            {{$product }}
                        </td>

                        <td>
                           <a href="{{ route('adminCustomerVeiw',$order->user->id)}}" > {{ $order->user->name }}</a>
                            {{-- @if($order->editedby)
                            <a href="{{ route('editedbydeteils',$order->editedby->id) }}">{{ $order->editedby->name }}</a>
                            @endif --}}
                        </td>
                        <td>
                            {{ $order->description }}

                        </td>
                        <td>{{\Carbon\Carbon::parse($order->created_at)->format('l j F Y, h:i A')}}</td>
                        <td class="">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('editedbyorder.show',$order->id)}}" title="{{ translate('View') }}">
                                <i class="las la-eye"></i>
                            </a>
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

    </script>
@endsection

{{-- @extends('backend.layouts.app')

@section('content')
@php
    $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
@endphp
<div class="card">
      <form class="" action="" method="GET">
        <div class="card-header row gutters-5">
          <div class="col text-center text-md-left">
            <h5 class="mb-md-0 h6">{{ translate('Activity Logs') }}</h5>
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
                    <th>{{ translate('Number Of Order') }}</th>
                    <th>{{ translate('Updated By') }}</th>
                    <th>{{ translate('Update At ')}}</th>
                    <th>{{ translate('Action')}}</th>
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
                        <td>
                            {{ $order->orderDetails->count() }}
                        </td>
                        <td>
                            @if($order->editedby)
                            <a href="{{ route('editedbydeteils',$order->editedby->id) }}">{{ $order->editedby->name }}</a>
                            @endif
                        </td>
                        <td>{{\Carbon\Carbon::parse($order->updated_at)->format('l j F Y, h:i A')}}</td>
                        <td class="">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('editedbyorder.show',$order->id)}}" title="{{ translate('View') }}">
                                <i class="las la-eye"></i>
                            </a>
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

    </script>
@endsection --}}


