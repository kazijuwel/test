@extends('frontend.mobile.layout.app')
@section('content')
@section('css')
<style>
    .card .card-body {
    /* padding: 20px 25px; */
    /* border-radius: 4px; */
}
</style>
@endsection
<main class="app-content">
    <section>
        <div class="input-group " style="background-color: #B0E0E6;padding: 8px 10px 8px 10px;">
            <input type="text" class="form-control" placeholder="Search Your Product"
                style="height:37px; border-radius: 0px">
            <div class="input-group-append">
                <span class="input-group-text bgprimary" style="width:70px; height:37px; border-radius: 0px"><i
                        class="fa fa-search text-white" aria-hidden="true"></i></span>
            </div>
        </div>
    </section>
    <!---End Header-->
    <hr class="divider">
    <section>
        <div class="card">
            <div class="card-body">
                @include('frontend.mobile.pages.userdetails')
                @include('frontend.mobile.layout.dashboardlink')
            </div>
          </div>
   </section>
    <hr class="divider">
    <section class="padding-around">
        
        <div class="card">
            <div class="card-header">
                <h1 class="h3">{{ translate('Bulk Products Upload') }}</h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered mb-0" style="font-size:14px; background-color: #cce5ff; border-color: #b8daff">
                    <tr>
                        <td>{{ translate('1. Download the skeleton file and fill it with data.')}}:</td>
                    </tr>
                    <tr >
                        <td>{{ translate('2. You can download the example file to understand how the data must be filled.')}}:</td>
                    </tr>
                    <tr>
                        <td>{{ translate('3. Once you have downloaded and filled the skeleton file, send the file to bela obela email.')}}:</td>
                    </tr>
                    <!-- <tr>
                        <td>{{ translate('4. After uploading products you need to edit them and set products images and choices.')}}</td> 
                    </tr> -->
                </table>
                <a href="{{ static_asset('download/product_bulk_demo_seller.xlsx') }}" download><button class="btn btn-primary mt-2">{{ translate('Download CSV') }}</button></a>
            </div>
        </div>
    </section>
    <hr class="divider">
    <section class="padding-around">
        <div class="card">
            <div class="card-body">
                <table class="table table-borderd mb-0" style="font-size:14px;background-color: #cce5ff;border-color: #b8daff">
                    <tr>
                        <td>{{ translate('1. উপর থেকে CSV ফাইল ডাউনলোড করেন এবং আপনার প্রোডাক্ট এর ইনফরমেশন গুলো দেন, ফাইলের প্রতিটি কলাম সঠিকভাবে পুরন করুন।')}}</td>
                    </tr>
                    <tr>
                        <td>{{ translate('2. ফাইল পুরন করার কর পর ফাইল টি সেভ করে আমাদের কে মেইল করে দেন।')}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>

   <!--start footer-->
   </main>

@endsection