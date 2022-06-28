@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card" style="width: 90%;">
                    <div class="card-header">
                        <h5 class="text-secondary">Balance Sheet Group Edit</h5>
                    </div>
                    <div class="card-body">

                        <form method="post" action="{{ route('updategroupbalancesheetgroup') }}">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" class="form-control" name="name" value="{{ $bAccouts->name}}">
                              <input type="hidden" class="form-control" name="report_type" value="balance_sheet">
                              <input type="hidden" class="form-control" name="coaId" value="{{ $bAccouts->id }}">

                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Type</label>
                              <select class="form-control" name="parent_id" required>
                                  @foreach ($coatype->allBalancesheetGroup() as $item)
                                  <option value="{{ $item->id }}" {{ ( $item->id == $bAccouts->parent_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                  @endforeach


                              </select>
                            </div>
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('deletebalanceSheetMainGroup',$bAccouts->id) }}" type="button" class="btn btn-danger">Delete</a>
                          </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
@section('script')

@endsection
