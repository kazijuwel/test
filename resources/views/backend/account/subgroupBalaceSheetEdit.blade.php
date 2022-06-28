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
                              <input type="text" class="form-control" name="name" value="{{ $co_type->name }}">
                              <input type="hidden" class="form-control" name="coaId" value="{{ $co_type->id }}">
                              <input type="hidden" class="form-control" name="report_type" value="balance_sheet">

                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Type</label>
                              <select class="form-control" name="category" required id="groupId">
                                  {{-- //@foreach ($coatype->allBalancesheetGroup() as $item) --}}
                                  <option value="assets">Assets Group</option>
                                  <option value="liabilites">Liabilites Group</option>
                                  <option value="equity">Equity Group</option>
                                  <option value="subgroup" @if($co_type->parent_id != null) selected @endif>SubGroup Of</option>
                                  {{-- @endforeach --}}


                              </select>
                            </div>
                            <div class="form-group" id="SubgroupCategory">
                                <label for="exampleInputPassword1">category</label>
                                <select class="form-control" name="subgroupcategory" required id="SubgroupCategory">
                                  @foreach($co_type->parentBalancesheetGroup() as  $item)
                                  <option value="{{ $item->id }}" {{ ($item->id == $co_type->parent_id )? 'selected' : '' }}>{{ $item->name }}</option>
                                  @endforeach

                                </select>
                              </div>
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('deleteprofitandlossgroup',$co_type->id) }}" type="button" class="btn btn-danger">Delete</a>
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
