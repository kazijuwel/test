@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card" style="width: 90%;">
                    <div class="card-header">
                        <h5 class="text-secondary">Profit and loss Statement Account</h5>
                    </div>
                    <div class="card-body">

                        <form method="post" action="{{ route('updateProfitandLossAccount') }}">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" class="form-control" name="name" value="{{ $co_Accounts->name  }}">
                              <input type="hidden" class="form-control" name="chartofId" value="{{ $co_Accounts->id}}">
                              <input type="hidden" class="form-control" name="report_type" value="profit_loss">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Code</label>
                                <input type="text" class="form-control" name="code" value="{{$co_Accounts->code}}" >
                                <input type="hidden" class="form-control" name="report_type" value="balance_sheet" value="{{ $co_Accounts->code  }}">

                              </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Group</label>
                              <select class="form-control" name="account_type" required>
                                  @foreach ($coaType->allprofitandlossgroups() as $item)
                                  <option value="{{ $item->id }}" {{ ( $item->id == $co_Accounts->id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                  @endforeach

                              </select>
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleInputPassword1">Type</label>
                                <select class="form-control" name="account_type" required>
                                    @foreach ($coaType->allprofitandlossgroups() as $item)
                                    <option value="{{ $item->id }}" {{ ( $item->id == $co_Accounts->id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach

                                </select>
                              </div> --}}
                            <input type="hidden" value="profit_loss" name="report_type">
                            <button type="submit" class="btn btn-success">update</button>
                            <a href="{{ route('profitChildGroupDelete',$co_Accounts->id) }}" type="button" class="btn btn-primary">Delete</a>
                          </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
@section('script')

@endsection
