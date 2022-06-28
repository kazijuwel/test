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
<div class="col-md-12">
    <p>Income Invoice</p>
    <div class="card bg-grad-2 text-white ">
        <div class="card-header">Overview @isset($date)
            :
        @endisset{{$date }}</div>
        <div class="card-body">
            <table class="table table-bordered text-white">
                <tr>
                    <td>Total Order</td>
                    <td>Total Income</td>
                    <td>Purchase Amount</td>
                    <td>Order Amount</td>
                    <td>Vat</td>
                    <td>Coupon</td>
                    <td>Discount</td>
                    <td>Delivery Cost</td>
                    <td>Balance Amount</td>
                </tr>
                <tr>
                    <td>{{ $OrderItemsf->count() }}</td>
                    <td>Tk:{{ $OrderItemsf->sum('price')+ $OrderItemsf->sum('shipping_cost')+ $OrderItemsf->sum('tax')+$OrderItemsf->sum('commision')  }}</td>
                    <td>TK:{{ $OrderItemsf->sum('purchase_price') }}</td>
                    <td>TK:{{ $OrderItemsf->sum('commision') }}</td>
                    <td>Tk:{{ $OrderItemsf->sum('tax') }}</td>
                    <td>Tk:{{ $OrderItemsf->sum('coupon_amount') }}</td>
                    <td>Tk:{{ $OrderItemsf->sum('unit_price')-$OrderItemsf->sum('price') }}</td>
                    <td>Tk:{{ $OrderItemsf->sum('shipping_cost') }}</td>
                    <td>Tk:{{ $OrderItemsf->sum('price')- $OrderItemsf->sum('purchase_price') }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="card">
    <form class="" action="{{ route('balanceinvoice') }}" method="GET">
        @csrf
      <div class="card-header row gutters-5">
        <div class="col text-center text-md-left">
          <h5 class="mb-md-0 h6">{{ translate('All Income Sheet') }}</h5>
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
      <table class="table aiz-table mb-0 table-bordered">
          <thead>
              <tr>
                  <th>#</th>
                  <th>{{ translate('Order Code') }}</th>
                  <th>{{ translate('Order Date') }}</th>
                  <th data-breakpoints="md">{{ translate('Purchase Amount') }}</th>
                  <th data-breakpoints="md">{{ translate('Discount') }}</th>
                  <th data-breakpoints="md">{{ translate('Tax') }}</th>
                  <th data-breakpoints="md">{{ translate('Delivery Cost') }}</th>
                  <th data-breakpoints="md">{{ translate('Order Amount') }}</th>
                  <th data-breakpoints="md">{{ translate('Balance Amount') }}</th>
                  <th data-breakpoints="md">{{ translate('Total') }}</th>

                
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
                        Tk:{{ $orderitemp->price }}
                       </td>
                       <td>
                        {{ $orderitemp->unit_price - $orderitemp->price }}
                       </td>

                       <td>
                       Tk: {{ $orderitemp->tax}}
                       </td>
                       <td>
                       Tk: {{ $orderitemp->shipping_cost}}
                       </td>
                       <td>
                        Tk:{{ $orderitemp->commision}}
                       </td>
                       <td>
                       Tk: {{ $orderitemp->price - $orderitemp->purchase_price}}
                       </td>
                       <td>
                        Tk:{{ $orderitemp->price+$orderitemp->tax+$orderitemp->shipping_cost+$orderitemp->commision}}
                       </td>
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

