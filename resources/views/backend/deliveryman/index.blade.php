@extends('backend.layouts.app')
@section('content')
<a href="{{ route('deliveryMan.create')}}" class="btn btn-xs btn-primary btn-sm mb-2 float-right">Add Delivery Man</a>
<h5 class="text-center text-primary">All Delivery Mans</h5>
<div class="col-md-12 card p-1">

    <div class="table-responsive">

    <table class="table table-bordered p-2">
        <thead>
          <tr>
            <th>Name</th>
            <th>Action</th>
            <th>Registered  Name</th>
            <th>Mobile 1</th>
            <th>Mobile 2</th>
            <th>Email 1/th>
            <th>Email 2</th>
            <th>Area</th>
            <th>AddedBy</th>
            <th>EditedBy</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($deliveryMen as $man )
            <tr>
                <td>{{$man->name}}</td>
                <td>
                    <a href="{{ route('deliveryMan.edit',$man->id) }}" class="btn btn-xs btn-warning">Edit</a>
                </td>
                <td>{{ $man->user?$man->user->name: " "}} </td>
                <td>{{ $man->mobile_1}}</td>
                <td>{{ $man->mobile_2}}</td>
                <td>{{ $man->email_1}}</td>
                <td>{{ $man->email_2}}</td>
                <td>{{ $man->area}}</td>
                <td>{{ $man->addedby? $man->addedby->name: " "}}</td>
                <td>{{ $man->editedby ? $man->editedby->name :" "}}</td>
                <td>{{ $man->active==1 ? "active":"Deactive"}}</td>
            </tr>
            @endforeach
            <div class="aiz-pagination">
                {{ $deliveryMen->appends(request()->input())->links() }}
            </div>

            </tbody>
      </table>
    </div>
</div>
@endsection
