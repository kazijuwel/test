@extends('frontend.mobile.layout.app')
@section('content')

<main class="app-content">
    <section>
        <div class="input-group" style="background-color: #B0E0E6;padding: 8px 10px 8px 10px;">
            <input type="text" class="form-control" placeholder="Search Your Product"
                style="height:37px; border-radius: 0px">
            <div class="input-group-append">
                <span class="input-group-text bgprimary" style="width:70px; height:37px; border-radius: 0px"><i
                        class="fa fa-search text-white" aria-hidden="true"></i></span>
            </div>
        </div>
    </section>
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
                <p><strong>My Return & Cancellations</strong></p>
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


   <!--start footer-->
</main>

@endsection