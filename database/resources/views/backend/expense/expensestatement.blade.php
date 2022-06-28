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
<div class="col-md-12 mb-4">
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Expense</button>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            Total Amount: {{$expensesf->sum('amount')  }} Tk
        </div>
    </div>
</div>
<div class="card">
    <form class="" action="" method="GET" class="">
      <div class="card-header row gutters-5">
        <div class="col text-center text-md-left">
          <h5 class="mb-md-0 h6">{{ translate('All Expense List') }}</h5>
        </div>
        <div class="col-lg-3">
          <div class="form-group mb-0 p-2">
              <select class="custom-select js-example-disabled-results" name="expenseCategory" >
                  <option value="">Expense categroy</option>
                  @foreach($expensives as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
              </select>
          </div>
      </div>
        <div class="col-lg-2">
            <div class="form-group mb-0">
                <input type="text" class="aiz-date-range form-control" value="{{ $date }}" name="date" placeholder="{{ translate('Filter by date') }}" data-format="DD-MM-Y" data-separator=" to " data-advanced-range="true" autocomplete="off">
            </div>
        </div>
        <div class="col-auto">
          <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary">{{ translate('Filter') }}</button>
          </div>
        </div>
      </div>
  </form>

    
  <div class="card-body">
      <table class="table aiz-table mb-0 bordered">
          <thead>
              <tr>
                  <th>#</th>
                  <th>{{ translate('Expense head') }}</th>
                  <th>{{ translate('Amount') }}</th>
                  <th >{{ translate('Added By') }}</th>
                  <th >{{translate('Edited By')}}</th>
                  <th >{{translate('created_at')}}</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($expensesf as $key => $expense)
                  <tr>
                      <td>
                          {{ ($key+1) + ($expensesf->currentPage() - 1)*$expensesf->perPage() }}
                      </td>
                      <td>
                          @php
                              
                              $excatname=$expense->categoryName;
                              if($excatname){
                                  $exName=$excatname->name;
                              }else
                              {
                                $exName=Null;
                              }
                          @endphp
                          {{ $exName }}
                      </td>
                      <td>{{ $expense->amount }}</td>
                      <td>
                          @php
                          $added_by=$expense->addedby;
                          if($added_by)
                          {
                              $added_Name=$added_by->name;
                          }else{
                              $added_Name=Null;
                          }
                          @endphp
                          
                        {{  $added_Name }}</td>
                      <td>
                        @php
                        $edited_by=$expense->editorBy;
                        if($edited_by)
                        {
                            $edited_Name=$edited_by->name;
                        }else{
                            $edited_Name=Null;
                        }
                        @endphp
                          {{ $edited_Name}}
                      </td>
                      <td>{{\Carbon\Carbon::parse($expense->created_at)->format('l j F Y, h:i A')}}</td>
                  </tr>
              @endforeach
          </tbody>
      </table>
      <div class="aiz-pagination">
          {{ $expensesf->appends(request()->input())->links() }}
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
            <form method="post" action="{{ route('addexpense') }}">
               @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Expense select Head</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="ex_category_id" required >
                        <option value="">Select Expense Head</option>
                        @foreach($expensives as $expense)
                      <option value="{{ $expense->id }}">{{ $expense->name }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Expense Amount</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Amount" name="amount" required>
                  </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Expense description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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

