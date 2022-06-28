@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span class="text-primary">Profit and Loss Statement</span>    
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('createnewprofitandlossreport') }}">
                            <div class="form-row">
                              <div class="col">
                                <input type="date" class="form-control" name="start">
                              </div>
                              <div class="col">
                                <input type="date" class="form-control" name="end">
                              </div>
                            </div>
                            <input type="hidden" value="profit_loss" name="report_type">
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
