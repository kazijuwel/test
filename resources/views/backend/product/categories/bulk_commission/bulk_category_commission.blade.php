@extends('backend.layouts.app')

@section('content')
<style>

</style>

<div class="row">
    <!-- Delivery Method add div start here -->
    <div class="col-md-6" style="padding: 0px;">
        <div class="card" style="height: 370px;">
            <div class="card-header">
                <h5 class="mb-0 h6">Bulk Category Commission Form</h5>
            </div>
            <div class="card-body">

                    <form action="{{route('bulk_category')}}" method="POST">
                        @csrf

                         <!-- Insert bulk category form -->

                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for="parent_id"
                                style="padding-top: 12px;">{{translate('Main Category')}}</label>
                            <div class="col-sm-9">
                                <select name="parent_id" class="select2 form-control aiz-selectpicker" data-toggle="select2" id="parent_id" data-live-search="true">
                                    <option value="0">Select</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-from-label" for=""
                                style="padding-top: 12px;">{{translate('Bulk Commission(%)')}}</label>
                            <div class="col-sm-9 ">
                                <input type="text" value="0" placeholder="{{translate('')}}"
                                    id="" name="commission" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- Delivery Method end div start here -->

    <div class="col-lg-12" style="padding: 0px;">
        <div class="card">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    <h5 class="mb-md-0 h6">{{ translate('Main Category List') }}</h5>
                </div>
            </div>
            <div class="card-body">
                <table class="table aiz-table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>

                            <th>{{translate('Category')}}</th>
                            <th>{{translate(' Commission')}}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($categories as $parent_category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>

                                 {{$parent_category->name}}

                            </td>
                            <td>{{$parent_category->commision_rate}}</td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="aiz-pagination">

                </div>
            </div>
        </div>
    </div>
    <!-- Shipping configuration list end here -->

    <!-- Shipping Seller Cost div end here -->

    <div class="col-lg-6">

    </div>
</div>


<script>

</script>
@endsection
