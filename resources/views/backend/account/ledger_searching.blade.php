@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      <h3>Ledger</h3>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('createledger') }}">
                            <div class="form-row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="inputEmail4">Select Chart Of Account</label>
                                    <select class="form-select form-control" aria-label="Default select example" name="chart_account">
                                        <option value="" selected>Select Chart of Account</option>
                                        @foreach ($chartofAccounts as $account)
                                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                    <label for="inputEmail4">From</label>
                                    <input type="date" class="form-control" name="start">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                    <label for="inputEmail4">To</label>
                                    <input type="date" class="form-control" name="end">
                                     </div>
                                </div>
                                <div class="form-row">
                                    <div class="mt-3">
                                        <input type="submit" value="Create" class="btn btn-success">
                                    </div>
                                </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
