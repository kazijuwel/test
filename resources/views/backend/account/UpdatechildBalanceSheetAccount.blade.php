@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card" style="width: 90%;">
                    <div class="card-header">
                        <h5 class="text-secondary">Balance Sheet Account Edit</h5>
                    </div>
                    <div class="card-body">

                        <form method="post" action="{{ route('updatebalancesheetnewaccount') }}">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" class="form-control" name="name" value="{{ $chartOfid->name }}">
                              <input type="hidden" class="form-control" name="chartofId" value="{{ $chartOfid->id }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Code</label>
                                <input type="text" class="form-control" name="code" value="{{ $chartOfid->code }}">
                                <input type="hidden" class="form-control" name="report_type" value="balance_sheet">
                              </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Group of Balance Sheet</label>
                              <select class="form-control" name="account_type" required>
                                  @foreach ($coaType->parentBalancesheetGroup() as $item)
                                  <option value="{{ $item->id }}" {{ ( $item->id == $chartOfid->coa_type_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Starting Balance</label>
                                <input type="number" class="form-control" name="starting_balance" value="{{ $chartOfid->starting_balance }}">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Debit or Credit</label>
                                <select class="form-control" name="balance_type" required>
                                    @if($chartOfid->balance_type == "debit")
                                    <option value="debit" selected>Debit</option>
                                    <option value="credit">credit</option>
                                    @else
                                    <option value="debit">Debit</option>
                                    <option value="credit" selected>credit</option>
                                    @endif
                                </select>
                              </div>
                            <button type="submit" class="btn btn-success">Update</button>
                            <a type="button" href="{{ route('deleteBalaceSheetAccounts',$chartOfid->id) }}" class="btn btn-danger">Delete</a>
                          </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')

@endsection
