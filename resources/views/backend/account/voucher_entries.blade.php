@extends('backend.layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form>
                    <div class="form-row">
                      <div class="col-2">
                       <label for="">Voucher No:</label>
                      </div>
                      <div class="col-4">
                        <select class="form-select form-control">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                      </select>
                      </div>
                      <div class="col-3">
                        <button class="btn btn-success">Add</button>
                        <button class="btn btn-warning">Clear</button>
                        {{-- <input type="button" class="form-control" value="Add"> --}}
                      </div>
                      <div class="col-3">
                        {{-- <button class="btn btn-warning">Clear</button> --}}
                        {{-- <input type="button" class="form-control" value="Clear"> --}}
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="col-2">
                        <label for="">Date:</label>
                      </div>   
                        <div class="col-4">
                          <input type="Date" class="form-control" >
                        </div>     
                    </div>
               </div>
            
                <div class="col-md-4">
                    <div class="form-row">
                      <div class="col-2">
                        <label for="">Cash</label>
                      </div>  
                      <div class="col-4">
                        <input type="text" disabled value="432763">
                      </div>     
                    </div>
                </div>
            </div>
        <div class="row">
          <div class="table-responsive" style="height: 400px">
            <table class="table table-striped table-bordered mt-2">
                <thead>
                  <tr>
                    <th scope="col">Particulars</th>
                    <th scope="col">Description</th>
                    <th scope="col">Debit</th>
                    <th scope="col">Credit</th>
                    <th scope="col">Avidence</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">Cash On Hand</td>
                        <td scope="row">Last</td>
                        <td scope="row">Last</td>
                        <td scope="row">Last</td>
                        <td scope="row">Last</td>
                      </tr>
                      <tr>
                        <td scope="row">Gas Bill</td>
                        <td scope="row">Last</td>
                        <td scope="row">Last</td>
                        <td scope="row">Last</td>
                        <td scope="row">Last</td>
                      </tr>
                      <tr>
                        <td scope="row">Conveyance</td>
                        <td scope="row">Last</td>
                        <td scope="row">Last</td>
                        <td scope="row">Last</td>
                        <td scope="row">Last</td>
                      </tr>
                      <tr>
                        <td scope="row">Entertainment</td>
                        <td scope="row">Last</td>
                        <td scope="row">Last</td>
                        <td scope="row">Last</td>
                        <td scope="row">Last</td>
                      </tr>
                      <tr>
                        <td scope="row">Office Expense</td>
                        <td scope="row">Last</td>
                        <td scope="row">Last</td>
                        <td scope="row">Last</td>
                        <td scope="row">Last</td>
                      </tr>
                </tbody>
              </table>
            </div>
              

              
            </form>
        </div>
        <div class="row">
          <div class="col-md-7">
                           
            <div class="form-row">
                <div class="col-2">
                  <button class="btn btn-success">Save</button>
                    {{-- <input type="button" class="form-control" value="Save" > --}}
                  </div>   
                <div class="col-2">
                  <button class="btn btn-warning">Edit</button>
                    {{-- <input type="button" class="form-control" value="Edit" > --}}
                  </div>    
                <div class="col-2">
                  <button class="btn btn-danger">Delete</button>
                  {{-- <input type="button" class="form-control" value="Delete"> --}}
                </div>     
            </div>
          </div>
          <div class="col-md-5">
              <div class="form-row">
                <div class="col-1">
                  <p>Total</p>
                </div> 
                <div class="col-1">
                  Dr.
                </div>
                <div class="col-2 ">
                    <input type="text" class="form-control" disabled>
                </div> 
                <div class="col-1">
                  cr.
                </div> 
                <div class="col-2">
                      <input type="text" class="form-control"  disabled>
                </div>        
              </div>
          </div>
      </div>
    </form>
      <hr>
      <h5>Reports</h5>
        <form action="">
               <div class="row">
                <div class="col-8">
                <div class="row">
                  <div class="col-3">
                    <label for="">Account Head</label>
                   </div>
                    <div class="col-9">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <label for="">From Date</label>
                   </div>
                    <div class="col-4">
                        <input type="date" name="" id="" class="form-control">
                    </div>
                    <div class="col-1">
                        To
                    </div>
                    <div class="col-4">
                        <input type="date" class="form-control" name="" id="">

                    </div>
                </div>
                </div> 
                <div class="col-4">
                <div class="form-row">
                    <div class="col-4">
                      <button class="btn btn-success">Leager</button>
                        {{-- <input type="button" value="Ledger"> --}}
                    </div>
                    <div class="col-4">
                      <button class="btn btn-primary">Report</button>
                        {{-- <input type="button" value="Report"> --}}

                    </div>

                </div> 
                </div> 
                 
              </div>
        </form>
      <hr>

    </div>
</section>
@endsection
