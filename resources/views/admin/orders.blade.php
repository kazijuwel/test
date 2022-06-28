@extends('admin.layouts.adminMaster')

@push('css')

    <script src="{{ asset('select2/dist/css/select2.min.css') }}"></script>
    <style>
        span.select2-selection.select2-selection--single {
            border: none;
        }

        span.select2-selection__arrow {
            display: none;
        }

    </style>
@endpush

@section('content')
    <section class="content">

        <br>
        @include('alerts.alerts')
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="card">
                <div class="card-header">
                    <h3>All Orders</h3>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" style="white-space: nowrap">
                            <tr>
                                <th>SL</th>
                                <th>Action</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Company Name</th>
                                <th>Total Price</th>
                                <th>TB Price</th>
                                <th>Company Price</th>
                                <th>Order Status</th>
                                <th>Payment Status</th>
                            </tr>
                            @forelse ($orders as $order)
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="btn-group">
                                            @if ($order->payment_status != 'paid')
                                                <a onclick="return confirm('Are you sure? you want to Pending This Order?')" href="{{ route('admin.ordersStatusUpdate', ['order' => $order->id, 'type' => 'pending']) }}"
                                                    class="btn btn-danger btn-xs">Pending</a>
                                                <a onclick="return confirm('Are you sure? you want to complete This Order?')" href="{{ route('admin.ordersStatusUpdate', ['order' => $order->id, 'type' => 'completed']) }}"
                                                    class="btn btn-warning btn-xs">Completed</a>
                                            @endif

                                            <a  href="{{ route('admin.ordersStatusUpdate', ['order' => $order->id, 'type' => 'details']) }}"
                                                class="btn btn-success btn-xs">Details</a>
                                        </div>
                                    </td>
                                    
                                    <td>{{ $order->company ? $order->company->company_code : 'Customer' }}</td>
                                    <td>{{ $order->user->email  }}</td>
                                    <td>{{ $order->company ? $order->company->title : null }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->final_price }}</td>
                                    <td>{{ $order->company_commission_in_amount }} ({{ $order->company_commission_in_percent }}%)</td>
                                    <td>{{ $order->order_status }}</td>
                                    <td>{{ $order->payment_status }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No Order Found</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
@endsection


@push('js')


    <script src="{{ asset('select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $('select').select2();
        // $('#datetimepicker').datetimepicker({
        //     format: 'yyyy-mm-dd hh:ii'
        // });
        $('.js-data-example-ajax').select2({
            ajax: {
                url: 'https://api.github.com/search/repositories',
                dataType: 'json'
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });
    </script>


@endpush
