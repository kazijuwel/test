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

<div class="col-md-12 mt-3">
    <p>Expense Edit</p>
    <div class="card  text-white ">
        <div class="card-header">
        <div class="card-body">
            <form method="post" action="{{ route('updateexpensetype',$expensName->id) }}">
                @csrf
                 <div class="form-group">
                   <label for="exampleInputEmail1">Expense Type</label>
                   <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $expensName->name }}" name="name">
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

