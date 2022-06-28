@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       Belaobela Journal Entry Searching
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('searchjournalentry') }}">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                  <label for="inputCity">From</label>
                                  <input type="date" class="form-control" name="start">
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="inputState">End</label>
                                  <input type="date" class="form-control" name="end">
                                </div>
                                <input type="hidden" class="form-control" name="orderid">
                                <div class="form-group col-md-4">
                                  <label for="type">Account Type</label>
                                  <select class="form-control" id="" name="accounttype">
                                      {{-- <option value="allaccount">All Accounts</option> --}}
                                    @foreach ($chatofAccounts as $account )
                                    <option value="{{ $account->name}}">{{ $account->name }}</option>
                                    @endforeach

                                  </select>
                                </div>
                              </div>
                            <input type="submit" value="Search" class="btn btn-success mt-2">
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
