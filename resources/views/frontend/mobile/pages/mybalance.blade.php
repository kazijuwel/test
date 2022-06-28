@extends('frontend.mobile.layout.app')
@section('content')

<main class="app-content">
   
    <!---End Header-->
    <div class="col-12 col-sm-6 col-md-4">
        <div class="card mt-2">
            <div class="card-body">
                <div class="headersf bg-info p-4" >
                    <h5 class="text-center">Hi,Saif Islam</h5>
                    <p class="text-center"><span class="badge badge-primary">Active</span></p>
                </div>
                @include('frontend.mobile.layout.dashboardlink')
            </div>
          </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
         <div class="card mt-2">
            <div class="card-header">
                <p>My Balance</p>
            </div>
            <div class="card-body">
               <div class="card">
                <div class="headersf bg-secondary p-1">
                    <h5 class="text-center">My Balance Total(BDT)</h5>
                </div>
                <div class="card-body">
                    <h1 class="text-center">00.0</h1>
                </div>
               </div>
               <div class="card mt-3">
                <div class="headersf bg-secondary p-1">
                    <h5 class="text-center">Add Balance</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                    <input type="hidden" name="_token"   value="P8ns7EoAjMBdLKhyzIxwRNVZutdV22h0lsc8jXce">
                        <h5 class="text-center">Amount (BDT)</h5>
                        <div class="input-group input-group-sm mb-3">
                      <input type="number" required="" class="form-control" name="amount" placeholder="e.g: 5000">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Add Balance</button>
                    </div>
               </div>       
              </form>
                </div>
               </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5>All Transaction</h5>
                </div>
                <div class="card-body">
                    <div style="overflow: auto;">
                        <table class="table table-bordered">
                            <tbody><tr>
                                <th>Date</th>
                                <th>Method</th>
                                <th>Previous Balance</th>
                                <th>Transfered Balance</th>
                                <th>New Balance</th>
                                <th>Status</th>
                            </tr>

                        </tbody></table>
                        </div>
                </div>
            </div>
          </div>                
    </div>


   <!--start footer-->
</main>

@endsection