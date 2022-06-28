@extends('company.layouts.companyMaster')

@push('css')
@endpush

@section('content')
  <section class="content">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="mt-5 border border-success p-5">
                    <form method="POST" action="{{ route('company.addToBalanceReceive',$company)}}">
                        @csrf

                        <div class="form-group">
                          <label for="exampleInputPassword1">Balance</label>
                          <input type="number" class="form-control" id="exampleInputPassword1" name="balance" placeholder="Add Balance" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Select Payment Gateway</label>
                            <select class="form-control" id="exampleFormControlSelect2" required name="gateway">
                              <option value=" ">Select Gateway</option>
                              <option value="bkash">Bkash</option>
                              <option value="nagad">Nagad</option>
                              <option value="card">Card</option>
                            </select>
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection


@push('js')

@endpush

