<style>
.img-circle {
    border-radius: 50%;
    border: 3px solid #e4e6e7;
}
.profile-user-img {
    border: 3px solid #adb5bd;
    margin: 0 auto;
    padding: 3px;
    width: 100px;
}

</style>

    @extends('backend.layouts.app')
    @section('content')
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{ asset('public/images/userprofile.png') }}"
                         alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center">{{ $customerDetails->name }}</h3>

                  <p class="text-muted text-center">{{ $customerDetails->email }}</p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Orders</b> <a class="float-right">{{ $customerDetails->orders->count() }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Balance</b> <a class="float-right">{{ $customerDetails->	balance }}</a>
                      </li>
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- About Me Box -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Address</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">


                  <p class="text-muted">
                    {{ $customerDetails->address }}
                  </p>

                  <hr>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                <h5>Profile</h5>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <!-- Post -->
                      <table class="table">
                        <thead>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Name:</td>
                            <td>{{ $customerDetails->name }}</td>
                          </tr>
                          <tr>
                            <td>Profession:</td>
                            <td>{{ $customerDetails->profession }}</td>
                          </tr>
                          <tr>
                            <td>Birth Date:</td>
                            <td>{{ $customerDetails->birth_date }}</td>
                          </tr>
                          <tr>
                            <td>Phone:</td>
                            <td>{{ $customerDetails->phone }}</td>
                          </tr>
                          <tr>
                            <td>Postal Code:</td>
                            <td>{{ $customerDetails->postal_code }}</td>
                          </tr>
                          <tr>
                            <td>City:</td>
                            <td>{{ $customerDetails->city }}</td>
                          </tr>
                          <tr>
                            <td>Country:</td>
                            <td>{{ $customerDetails->country }}</td>
                          </tr>
                        </tbody>
                      </table>

                      <!-- /.post -->
                    </div>

                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
          </div>
          <div class="row">
              <div class="col-md-12">
                <p>Orders</p>
                <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped table-sm" style="white-space: nowrap">
                    <thead>
                      <tr >
                        <th scope="col">S.I</th>
                        <th scope="col">Date</th>
                        <th scope="col">Invoice No</th>
                        <th scope="col">Num of Products</th>
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
                        <td>
                            {{\Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}
                        </td>
                        <td>
                            {{ $order->code }}
                         </td>
                        <td class="text-center">
                            {{ count($order->orderDetails) }}
                        </td>

                        {{-- <td>
                             @php
                             $seller = ' ';
                                foreach ($order->orderDetails as $key => $orderDetail) {
                                    $seller = $orderDetail->seller_id;
                                    }

                                @endphp

                                <a href="#" onclick="show_seller_profile('{{ $orderDetail->seller_id }}');">
                                  @php
                                  $sallerName=$orderDetail->seller;
                                  if($sallerName)
                                  {
                                    $nameSeller= $sallerName->name;
                                  }
                                  else{
                                    $nameSeller=Null;
                                  }


                                  @endphp
                                  {{$nameSeller}}

                                </a>
                        </td> --}}
                        <td class="text-center">
                            {{single_price($order->orderDetails->sum('purchase_price'))}}

                        </td>
                        <td>
                            {{single_price($order->orderDetails->sum('delivry_methods_charge'))}}
                        </td>
                        <td>
                            @php
                            $delvery= $order->orderDetails->first();
                            if($delvery)
                            {
                              $status = $delvery->delivery_status;
                            }
                            else{
                              $status=Null;
                            }

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

                                  <a class="btn btn-primary btn-xs" href="{{route('all_orders.show', $order->id)}}" target="_blank">
                                    <i class="las la-eye"></i>
                                  </a>


                                  <div class="btn-group " role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 25px, 0px);">

                                      <a href="{{ route('customer.invoice.download', $order->id) }}"><button type="button" class="dropdown-item"><i class="las la-download"></i> Invoice </button></a>

                                      <a href="{{ route('purchase_requisition.download', $order->id) }}"><button type="button" class="dropdown-item"><i class="las la-download"></i> Purchase Req</button></a>

                                      <a href="{{ route('purchase_order.download', $order->id) }}"><button type="button" class="dropdown-item"><i class="las la-download"></i> Purchase Order</button></a>

                                      <a href="{{route('orders.destroy', $order->id)}}"><button type="button" class="dropdown-item confirm-delete"><i class="las la-trash"></i> Delete</button></a>

                                    </div>
                                  </div>


                                </div>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                  </table>
                </div>
                  <div class="aiz-pagination">
                    {{ $orderId->appends(request()->input())->links() }}
                </div>
              </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
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
