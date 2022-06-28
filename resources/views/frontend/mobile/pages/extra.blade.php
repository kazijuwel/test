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
            <div class="card-header bg-info">
                <p>My Profile Details</p>
            </div>
            <div class="card-body">
             <p>Personal Profile <span class="badge badge-success">edit Profile</span> <span class="badge badge-danger">Change Password</span></p>
             <p><strong>Name:</strong> Saiful Islam</p>
             <p><strong>Email:</strong>saifislamfci@gmail.com</p>
             <p><strong>Phone</strong> 01872330757</p>
             <p><strong>Profile</strong><span class="badge badge-success">verified</span></p>
             <p>Shipping Address</p>
             <p><strong>Address:</strong></p>
             <p><strong>Zip Code:</strong></p>
             <p><strong>City:</strong></p>
             <p><strong>District:</strong></p>
             <p><strong>Country:</strong>Bangladesh</p>
            </div>
          </div>

          <div class="card mt-2">
            <div class="card-header bg-info">
                <p>My Recent Order</p>
            </div>
            <div class="card-body">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi minus aliquam quibusdam voluptas ipsa odit dolorem ut quaerat vitae. Laudantium error recusandae exercitationem inventore necessitatibus veritatis cupiditate, iure iste eaque.
            </div>
          </div>
          
    </div>


   <!--start footer-->
   </main>

@endsection