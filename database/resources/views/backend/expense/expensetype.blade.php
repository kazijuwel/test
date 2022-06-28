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
            <table class="table table-bordered text-white">
                <tr>
                    <td>Id</td>
                    <td>Expense Type</td>
                    <td>Added By</td>
                    <td>Edited By</td>
                    <td>Action</td>
                </tr>
                @foreach($expends_types as $expense)
                <tr>
                    <td>{{ $loop->index+1}}</td>
                    <td>{{ $expense->name}}</td>
                    <td>
                        @php
                        $addedtype=$expense->user;
                        if($addedtype)
                        {
                            $addedName=$addedtype->name;
                        }
                        else{
                            $addedName=Null;
                        }
                       @endphp
                       {{ $addedName}}
                    </td>
                    <td>
                        @php
                         $editedtype=$expense->editedby;
                         if($editedtype)
                         {
                             $editorName=$editedtype->name;
                         }
                         else{
                             $editorName=Null;
                         }
                        @endphp
                        {{ $editorName}}
                    </td>
                    <td><a class="btn btn-info" href="{{ route('expenseEdit',$expense->id) }}" target="_blank" class="text-center"><i class="las la-eye"></i></a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<!---model-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Expense</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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
  </div>
@endsection

@section('modal')


@endsection

