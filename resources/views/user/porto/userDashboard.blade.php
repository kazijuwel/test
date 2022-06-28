@extends('user.porto.layouts.userLayoutMaster')
@push('css')
    <style>
        .list-group-item.active {
            z-index: 2;
            font-weight: 700;
            background-color: transparent;
            color: black;
        }

        .list-group-item {
            border: none;
            color: black;
            padding: 2px;
        }
        .list-group-item a{
            list-style: none !important;
            text-decoration: none !important;
            color: black;
        }

    </style>
@endpush

@section('content')
    <div class="container p-4">
        <div class="row">
            <div class="col-md-3">
                <aside class="sidebar mt-2">
                    <h5 class="font-weight-bold">Dashboards</h5>
                    <ul class="nav nav-list flex-column">
                        <li class="nav-item"><a class="nav-link text-dark active"
                                href="{{ route('user.dashboard') }}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{  route('user.myOrder')  }}">My Orders</a></li>
                        <li class="nav-item"><a class="nav-link "
                                href="{{  route('user.editProfile')  }}">Edit Profile</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ route('user.editPassword') }}">Change Password</a></li>

                        <li class="nav-item"><a class="nav-link"
                                href="{{ route('welcome.myBooking') }}">My Booking</a></li>

                        <li class="nav-item"><a class="nav-link"
                                href="#">Logout</a></li>
                    </ul>
                </aside>
                {{-- <ul class="list-group">
                    <li class="list-group-item active"> <a href="{{ route('user.dashboard') }}"><i class="icon-home"></i> Dashboard</a>
                        </li>
                    <li class="list-group-item"><a href="{{ route('user.myOrder') }}"> <i class="fas fa-angle-right"></i> My Order</a></li>
                    <li class="list-group-item"><a href="{{ route('user.editProfile') }}"> <i class="fas fa-angle-right"></i> Edit Profile</a></li>
                    <li class="list-group-item"><a href="{{ route('user.editPassword') }}"> <i class="fas fa-angle-right"></i> Change Password</a></li>
                    <li class="list-group-item"><a href="#"> <i class="fas fa-angle-right"></i> Logout</a></li>
                </ul> --}}
            </div>
            <div class="col-md-9">
                <h3>My Dashboard</h3>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h4>MY PROFILE DETAILS</h4> <a href="{{ route('user.editProfile') }}"
                                class="card-edit">Edit</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong style="color: gray;">Name : </strong>{{ $user->name }}</p>
                                <p><strong style="color: gray;">Email : </strong>{{ $user->email }}</p>
                                <p><strong style="color: gray;">Phone : </strong>{{ $user->mobile }}</p>
                                <p><strong style="color: gray;">Profile : </strong>
                                    @if ($user->active)
                                    <span class="badge badge-success">Active</span>
                                    @else
                                    <span class="badge badge-danger">Not Active</span>
                                    @endif
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4>MY RECENT ORDERS</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Placed On</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                @forelse ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }}</td>
                                    <td>{{ count($order->passenger) }}</td>
                                    <td>{{ $order->price * count($order->passenger) }}</td>
                                    <td>
                                        <b>Order:</b> {{ $order->order_status }}<br>
                                        <b>Payment:</b> {{ $order->payment_status }}
                                    </td>
                                    <td style="text-align: center;">
                                        <a  class="btn btn-sm btn-info"
                                            href="{{ route('user.myOrderDetails',['order'=>$order->id]) }}"
                                            style="text-decoration: none;">Details</a>
                                        <br>
                                        @if ($order->payment_status != 'paid')
                                        <a class="" style="text-decoration: none;"
                                        href=" ">Pay now</a>
                                        @endif

                                    </td>
                                </tr>
                                @empty

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

@push('js')
{{-- <script>
    var route= "{{route('deleteimage'['id'=>"+response.name+"])}}";
    var oncli= return confirm('Are you sure want to delete this image?');

    var html = '<div class="col-lg-2  portfolio-item filter-app"><a href="'+route+'" onclick="'+oncli+'"><i class="fa fa-times"></i></a><div class="portfolio-wrap"><div class="w3-display-container"><img src="{{ route('imagecache',['template'=>'pnilg''filename' => $gallery->file_name ]) }}" style="width: 100px;height:100px" alt=""> </div><div class="portfolio-links"><a href="{{ route('imagecache', [ 'template'=>'pnilg','filename' => $gallery->file_name ]) }}"data-gallery="portfolioGallery" class="portfolio-lightbox"><i class="bx bx-plus"></i></a></div> </div></div>';
</script> --}}
@endpush
