@extends('backend.layouts.app')
@section('style')
@endsection
@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary d-flex justify-content-between">
                        <span>
                            Payments Of Supplier/Seller : {{ $supplier->user->name }}
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-5 m-auto">
                        @include('alerts.alerts')
                        <div class="card">
                            <div class="card-header">Add Payment</div>
                            <div class="card-body">
                                <form action="{{route('storeSupplierPayment',['supplier'=>$supplier])}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="paid_amount">Paid Amount ({{$supplier->due()}})</label>
                                        <input type="number" id="paid_amount" name="paid_amount" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="payment_method">Paid Method</label>
                                        <input type="text" id="payment_method" name="payment_method"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="date" id="date" name="date"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="note">Note</label>
                                        <textarea name="note" id="note" class="form-control" cols="30" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success" value="Pay">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-secondary">Payment History</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderd table-sm text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Transaction Id</th>
                                        <th>Previous Due</th>
                                        <th>Paid Amont</th>
                                        <th>Current Due</th>
                                        <th>Payment Method</th>
                                        <th>Note</th>
                                        <th>Date</th>
                                        <th>Paid By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($payment_history as $history)
                                    <tr>
                                        <td>{{$history->transaction_id}}</td>
                                        <td>{{$history->previous_due}}</td>
                                        <td>{{$history->moved_balance}}</td>
                                        <td>{{$history->current_due}}</td>
                                        <td>{{$history->payment_method}}</td>
                                        <td>{{$history->note}}</td>
                                        <td>{{$history->date}}</td>
                                        <td>{{$history->addedBy->name}}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center h4">No Payment History Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{$payment_history->render()}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
@endsection
