
@extends('backend.layouts.app')
@section('content')
<div class="card">
    <div class="bg-white shadow rounded overflow-hidden">
        <div class="px-4 pt-0 pb-4 cover"
            style="background-image: url('../../public/images/sellerbg.jpg'); background-size: cover; background-repeat: no-repeat;background-position: center center;">
            <div class="media align-items-end profile-head" style=" transform: translateY(5rem);">
                <div class="profile mr-3"><img
                        src="{{ asset("public/images/userprofile.png") }}"
                        alt="..." width="130" class="rounded mb-2 img-thumbnail"><a
                        href="javascript:void(0)"
                        class="btn w3-deep-orange btn-sm btn-block"></a>
                </div>
                <div class="media-body mb-5 text-white">
                    <h4 class="mt-0 mb-0"></h4>
                    <h5 class="mb-0 text-capitalize">
                        <strong style="color:black">Name:{{ $seller->user->name }}</strong></i>
                    </h5>
                    <h5 class=" mb-4 mt-0 text-capitalize">
                        <strong style="color:black">Email: {{ $seller->user->email }}
                        </strong></i>
                    </h5>
                    
                </div>
                
            </div>
        </div>
        <a href="{{route('sellers.edit', encrypt($seller->id))}}" class="float-right mr-2">Edit</a>
        <div class="bg-light p-4 d-flex justify-content-end text-center mt-5">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Total Products</h5>
                  <p class="card-text">{{ $sellerProduct }}</p>
                  <a href="{{ route('adminsellerProduct',$seller->user->id) }}" class="">View All</a>
                </div>
              </div>

              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Total Orders</h5>
                  <p class="card-text">{{ $totalorder }}</p>
                </div>
              </div>

              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Total Sold Amount</h5>
                  <p class="card-text">{{ $soldAmount }}</p>
                </div>
              </div>

              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Paid By Admin</h5>
                  <p class="card-text">{{ $paidByAdmin }}</p>
                </div>
              </div>
        </div>
       
        <div class="px-4 py-3">
            <p>Profile</p>
            <div class="" id="">
                <div class="" id="home" role="" aria-labelledby="home-tab">
                    <div class="p-4 rounded shadow-sm bg-light">
                        <table class="table">
                            <thead>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Name:</td>
                                <td>{{ $seller->user->name }}</td>
                              </tr>
                              <tr>
                                <td>Profession:</td>
                                <td>{{ $seller->user->profession }}</td>
                              </tr>
                              <tr>
                                <td>Birth Date:</td>
                                <td>{{ $seller->user->birth_date }}</td>
                              </tr>
                              <tr>
                                <td>Phone:</td>
                                <td>{{ $seller->user->phone }}</td>
                              </tr>
                              <tr>
                                <td>Postal Code:</td>
                                <td>{{ $seller->user->postal_code }}</td>
                              </tr>
                              <tr>
                                <td>City:</td>
                                <td>{{ $seller->user->city }}</td>
                             </tr>
                              <tr>
                                <td>Country:</td>
                                <td>{{ $seller->user->country }}</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
                <br>
                <p>Orders</p>
                <div class="p-4 rounded shadow-sm bg-light">
                    <table class="table table-hover table-bordered table-striped table-sm" style="white-space: nowrap">
                      <thead>
                        <tr >
                          <th scope="col">S.I</th>
                          <th scope="col">Num of Products</th>
                          <th scope="col">Seller</th>
                          <th scope="col">Purchase Amount</th>
                          <th scope="col">Delivery Cost</th>
                          <th scope="col">Delivery Status</th>
                          <th scope="col">Payment Status</th>
                          <th scope="col">Refund</th>
                          <th scope="col">Option</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($orderId as $order) 
                         <tr>
                          <td>
                             {{ $loop->index+1 }}
                          </td>
                          <td class="text-center">
                              {{ count($order->orderDetails) }}
                          </td>
                         
                          <td>                         
                               @php
                              $seller = ' ';
                                  foreach ($order->orderDetails as $key => $orderDetail) {
                                      $seller = $orderDetail->seller_id;
                                      }
  
                                  @endphp
  
                                  <a href="#" onclick="show_seller_profile('{{ $orderDetail->seller_id }}');">
                                      Profile
                                    
                                  </a>                                                                         
                          </td>
                          <td class="text-center">
                              {{single_price($order->orderDetails->sum('purchase_price'))}}
                              
                          </td>
                          <td>
                              {{single_price($order->orderDetails->sum('delivry_methods_charge'))}}
                          </td>
                          <td>
                              @php
                              $status = $order->orderDetails->first()->delivery_status;
                              @endphp
                              
                              {{ translate(ucfirst(str_replace('_', ' ', $status))) }}
                          </td>
                          <td>
                              @if ($order->payment_status == 'paid')
                                  <span class="badge badge-inline badge-success">{{translate('Paid')}}</span>
                              @else
                                  <span class="badge badge-inline badge-danger">{{translate('Unpaid')}}</span>
                              @endif
                          </td>
                         
                              <td>
                                  @if (count($order->refund_requests) > 0)
                                      {{ count($order->refund_requests) }} {{ translate('Refund') }}
                                  @else
                                      {{ translate('No Refund') }}
                                  @endif
                              </td>
                       
                          <td class="text-right">
                                  <div class="btn-group btn-group-xs w3-hover-shadow">
                      
                                    <a class="btn btn-primary btn-xs" href="{{route('all_orders.show', encrypt($order->id))}}" target="_blank">
                                      <i class="las la-eye"></i>
                                    </a>
                                    
                    
                                    <div class="btn-group " role="group">
                                      <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          
                                      </button>
                                      <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 25px, 0px);">
                    
                                        <a href="{{ route('customer.invoice.download', $order->id) }}"><button type="button" class="dropdown-item"><i class="las la-download"></i> Invoice </button></a>
                    
                                        <a href="{{ route('purchase_requisition.download', $order->id) }}"><button type="button" class="dropdown-item"><i class="las la-download"></i> Purchase Req</button></a>
  
                                        <a href="{{ route('purchase_order.download', $order->id) }}"><button type="button" class="dropdown-item"><i class="las la-download"></i> Purchase Order</button></a>
  
                                        {{-- <a href="{{route('orders.destroy', $order->id)}}"><button type="button" class="dropdown-item confirm-delete"><i class="las la-trash"></i> Delete</button></a> --}}
                                                   
                                      </div>
                                    </div>
                    
                    
                                  </div>
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                    </table>
                    <div class="aiz-pagination">
                      {{ $orderId->appends(request()->input())->links() }}
                  </div>
                </div>


            </div>

        </div>

    </div>
</div>
@endsection
        