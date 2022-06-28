@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card" style="width: 90%;">
                    <div class="card-header">
                        <h5 class="text-secondary">Profit and Loss Group Statement</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('updateprofitandlossgroup') }}">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" class="form-control" name="name" value="{{ $coa_types->name }}" required>
                              <input type="hidden" class="form-control" name="report_type" value="profit_loss">
                              <input type="hidden" class="form-control" name="coatype_id" value="{{ $coa_types->id }}">
                      
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Type</label>
                                <select class="form-control" name="parent_id" required id="groupId">
                                  {{-- @foreach($coatype->allprofitandlossgroup() as  $item)
                                  <option value="{{  $item->id }}">{{ $item->name }}</option>
                                  @endforeach --}}
                                  <option value="income">Income Group</option>
                                  <option value="expense">Expense Group</option>
                                  <option value="subgroup"@if($coa_types->parent_id != null) selected @endif>SubGroup Of</option>
                                </select>
                              </div>
                              <div class="form-group" id="SubgroupCategory">
                                  <label for="exampleInputPassword1">category</label>
                                  <select class="form-control" name="subgroupcategory" required id="groupId">
                                    @foreach($coa_types->allprofitandloss() as  $item)
                                    <option value="{{ $item->id }}" {{ ($item->id == $coa_types->parent_id )? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
  
                                  </select>
                                </div>
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('deleteprofitandlossgroup',$coa_types->id) }}" type="button" class="btn btn-danger">Delete</a>
                          </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
@section('script')
<script>
   var groupName= $("#groupId").val();
   if(groupName == "subgroup" ){
    $("#SubgroupCategory").show();
   }
    else{
        $("#SubgroupCategory").hide();
    }
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
