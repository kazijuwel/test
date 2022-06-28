@extends('backend.layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-md-12">
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Create Expense</button>
</div>
<div class="col-md-12 mt-3">
    <p>Expense List</p>
    <div class="card bg-grad-2 text-white ">
        <div class="card-header">
        <div class="card-body">
            <form method="post" action="{{ route('addexpensetype') }}">
                @csrf
                 <div class="form-group">
                   <label for="exampleInputEmail1">Expense Type</label>
                   <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Expense Type" name="name">
                 </div>
                 <button type="submit" class="btn btn-primary">Save</button>
               </form>
        </div>
    </div>
</div>
<!---model-->

@endsection

@section('modal')


@endsection

