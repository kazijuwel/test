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
                    <h3>Order Details</h3>
                    @if ($order->company)
                        <a href="{{ route('admin.companyDetails', $order->company_id) }}"><span
                                class="badge badge-success">{{ $order->company->company_code }}</span></a>

                    @endif
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-center">Flight Details</h5>
                                    <div class="row">
                                        <div class="col-12">
                                            <b>Airline Name: </b> {{ $order->schedule->airline->Airline }}
                                        </div>
                                        <div class="col-md-6">
                                            <b>From:</b> {{ $order->schedule->airport->name }}
                                        </div>
                                        <div class="col-md-6">
                                            <b>To:</b> {{ $order->schedule->airport2->name }}
                                        </div>
                                        <div class="col-md-6">
                                            <b>Flight Time:</b> {{ $order->schedule->start }}
                                        </div>
                                        <div class="col-md-6">
                                            <b>Landing Time:</b> {{ $order->schedule->end }}
                                        </div>
                                        <div class="col-md-12">
                                            <b>Price: </b> ${{ $order->price }}
                                        </div>
                                        <div class="col-md-12">
                                            <b>Payment Status:</b> <span
                                                class="badge badge-success">{{ $order->payment_status }}</span>
                                        </div>
                                        <div class="col-md-12">
                                            <b>Order Status:</b> <span
                                                class="badge badge-success">{{ $order->order_status }}</span>
                                        </div>
                                        <div class="col-md-12">
                                            <b>Customer Details: </b> Name: {{ $order->user->name }}, Email:
                                            {{ $order->user->email }}, Phone: {{ $order->user->mobile }}
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-center">Passenger Details ({{ count($order->passenger) }})</h5>

                                    @forelse ($order->passenger as $op)
                                        <p>
                                            <b>Name:
                                            </b>{{ $op->first_name . ' ' . $op->middle_name . ' ' . $op->last_name }} ,
                                            <b>Gender: </b> {{ $op->gender }} , <b>DOB: </b> {{ $op->dob }}
                                        </p>

                                    @empty

                                    @endforelse
                                </div>
                            </div>
                        </div>
                        @if (count($order->payment) <= 0)
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-dark">Pay Now</div>
                                <div class="card-body">
                                    <form
                                        action="{{ route('company.payNow', ['company' => $company->id, 'order' => $order->id]) }}"
                                        method="POST">
                                        @csrf
                                        {{-- <input type="hidden" name="order_id" value="{{ $order->id }}"> --}}
                                        <div class="form-group">
                                            <label for="price">Total Price</label>
                                            <input type="number" name="price" class="form-control" readonly
                                                value="{{ $order->final_price }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="payment_type">Total Price</label>
                                            <select name="payment_type" id="payment_type" class="form-control">
                                                <option value="bkash">Bkash</option>
                                                <option value="cash">Cash</option>
                                                <option value="nagad">Nagad</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="details">Details With Transection ID</label>
                                            <textarea name="details" id="details" cols="30" rows="3"
                                                class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Pay Now" class="btn btn-info">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-dark">Payment History</div>
                                <div class="card-body">
                                    @foreach ($order->payment as $op)
                                    <p><b>Payment ID</b> {{ $op->id }}</p>
                                    <p><b>Payment Type</b> {{ $op->payment_type }}</p>
                                    <p><b>Paid Ammount</b> {{ $op->paid_amount }}</p>
                                    <p><b>Payment Status</b> {{ $op->payment_status }}</p>
                                    <p>Details</b> {{ $op->details }}</p>
                                    @endforeach
                                
                                </div>
                            </div>
                        </div>
                    @endif
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
