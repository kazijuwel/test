@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      <span class="text-primary">BalanceSheet Statement</span>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('createnewbalancesheetreport') }}">
                            <div class="form-row">
                              <div class="col">
                                <input type="date" class="form-control" value="{{ date('m/d/Y') }}" name="start">
                              </div>
                              <div class="col">
                                <input type="date" class="form-control" name="end">
                              </div>
                            </div>
                            <input type="hidden" value="balance_sheet" name="report_type">
                            <input type="submit" value="Create" class="btn btn-success mt-2">
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection