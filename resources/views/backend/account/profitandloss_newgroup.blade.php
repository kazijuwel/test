@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card" style="width: 90%;">
                    <div class="card-header">
                        <h5 class="text-secondary">Profit and Loss Group Statement</h5>

                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('managechartofaccouts') }}">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('storeprofitandlossgroup') }}">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" class="form-control" name="name" required>
                              <input type="hidden" class="form-control" name="report_type" value="profit_loss">

                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Type</label>
                              <select class="form-control" name="parent_id" required id="groupId">
                                {{-- @foreach($coatype->allprofitandlossgroup() as  $item)
                                <option value="{{  $item->id }}">{{ $item->name }}</option>
                                @endforeach --}}
                                {{-- <option value="income">Income Group</option> --}}
                                {{-- <option value="expense">Expense Group</option> --}}
                                <option value="" selected>Select Subgroup</option>
                                <option value="subgroup">SubGroup Of</option>
                              </select>
                            </div>
                            <div class="form-group" id="SubgroupCategory">
                                <label for="exampleInputPassword1">category</label>
                                <select class="form-control" name="subgroupcategory" required id="groupId">
                                  @foreach($coatype->allprofitandloss() as  $item)
                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                  @endforeach

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
<script>
$("#SubgroupCategory").hide();
$("#groupId").change(function(){
    var groupName=$(this).val();
    if(groupName== "subgroup"){
        $("#SubgroupCategory").show();
    }else{
        $("#SubgroupCategory").hide();
    }
});
</script>
@endsection
