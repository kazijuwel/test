@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card" style="width: 90%;">
                    <div class="card-header">
                        <h5 class="text-secondary">Balance Sheet Account</h5>

                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('managechartofaccouts') }}">Back</a>
                        </div>
                    </div>
                    <div class="card-body">

                        <form method="post" action="{{ route('storebalancesheetnewaccount') }}">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" class="form-control" name="name" required>
                              <input type="hidden" class="form-control" name="report_type" value="balance_sheet">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Code</label>
                                <input type="text" class="form-control" name="code" required>

                            <div class="form-group">
                              <label for="exampleInputPassword1">Group of Balance Sheet</label>
                              <select class="form-control" name="account_type" required>
                                  @foreach ($coaType->parentBalancesheetGroups() as $item)
                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Starting Balance</label>
                                <input type="number" class="form-control" name="starting_balance" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Debit or Credit</label>
                                <select class="form-control" name="balance_type" required>
                                    <option value="debit">Debit</option>
                                    <option value="credit">credit</option>
                                </select>
                              </div>
                            <button type="submit" class="btn btn-success">create</button>
                            {{-- <button type="button" class="btn btn-primary">create and another</button> --}}
                          </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')

@endsection
