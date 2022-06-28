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
                    <td>Total Delivery Item</td>
                    <td>{{ $OrderItemsf->count() }}</td>
                </tr>
                <tr>
                    <td>price</td>
                    <td>{{ $OrderItemsf->sum('price') }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="card">
    <form class="" action="{{ route('salesreportorderitemwise') }}" method="GET">
        @csrf
      <div class="card-header row gutters-5">
        <div class="col text-center text-md-left">
          <h5 class="mb-md-0 h6">{{ translate('Order Item Wise Sales Reports') }}</h5>
        </div>
        <div class="col-lg-2">
            <div class="form-group mb-0"> 
                <input type="text" class="aiz-date-range form-control" value="{{ $date }}" name="date" placeholder="{{ translate('Filter by date') }}" data-format="DD-MM-Y" data-separator=" to " data-advanced-range="true" autocomplete="off">
            </div>
        </div>
        <div class="col-auto">
          <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary">{{ translate('Search') }}</button>
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
                  <th data-breakpoints="md">{{ translate('Num. of Quentity') }}</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($OrderItemsf as $key => $orderitemp)
                  <tr>
                      <td>
                        {{ ($key+1) + ($OrderItemsf->currentPage() - 1)*$OrderItemsf->perPage() }}
                      </td>
                      <td>
                          @php 
                          $orderCode= $orderitemp->order;
                          if($orderCode)
                          {
                          $code=  $orderCode->code;
                          }
                          else{
                              $code=null;
                          }
                          @endphp
                          {{ $code }}
                         
                      </td>
                      <td>{{\Carbon\Carbon::parse($orderitemp->created_at)->format('l j F Y, h:i A')}}</td>
                      <td>
                          @php
                            $userName=$orderitemp->order;
                            if($userName)
                            {
                                $name=$userName->user->name;
                            }else {
                                $name=Null;
                            }
                          @endphp
                        {{ $name }}
                       
                       </td>
                       <td>
                        {{ $orderitemp->quantity }}
                       
                       </td>
                      {{-- <td>
                          <a href="{{ route('adminCustomerVeiw',$order->user->id) }}"> @if ($order->user != null)
                                  {{ $order->user->name }}
                              @else
                                  Guest ({{ $order->guest_id }})
                              @endif
                          </a>
                      </td>  --}}
                      {{-- <td class="text-center">
                          {{ count($order->orderDetails) }}
                          <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('all_orders.show', encrypt($order->id))}}" title="{{ translate('View') }}">
                              <i class="las la-eye"></i>
                          </a>
                      </td>
                      <td class="text-center">
                          {{ count($order->hasdelivery) }}
                          <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('salesorder.show',$order->id)}}" title="{{ translate('View') }}">
                              <i class="las la-eye"></i>
                      </td>          --}}
                  </tr>
              @endforeach
          </tbody>
      </table>
      <div class="aiz-pagination">
        {{ $OrderItemsf->appends(request()->input())->links() }}
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

