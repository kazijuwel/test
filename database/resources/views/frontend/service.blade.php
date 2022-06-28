@extends('frontend.layouts.app')

@section('content')

<section class="pt-4 mb-4">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <h1 class="fw-600 h4">{{ translate('')}}</h1>
            </div>
            <div class="col-lg-6">
                <ul class="breadcrumb bg-transparent p-0 justify-content-center justify-content-lg-end">
                 
                </ul>
            </div>
        </div>
    </div>
</section>



<section class="mb-4">
        <div class="container">
            <div class="row gutters-10">

                    <div class="col-lg-12">
                         <center><div class="d-flex mb-3 align-items-baseline border-bottom">
                    <div class="col-md-12">
                        <h2 class="h5 fw-700 mb-0" style="text-algin:center">
                            {{ translate('Popular By Choice') }}
                        </h2>
                        <h6 class="py-10px"><span class="border-primary border-width-2 pb-0 d-inline-block">Categories our customers love to check out</span></h6>
                    </div>
            </div></center>
                        <div class="row gutters-5">
                 
                          

                                    <div class="col-sm-2 col-6"   >
                                        <div style="min-height: 110px;" href="#" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2 " >
                                            <div class="row align-items-center no-gutters">

                                            <img style="height:60px; width:80px; margin:auto;" src="{{asset('public/assets/img/newinstallation.jpg')}}" alt="new installation">

                                            
                                                <div class="col-12 text-center">
                                                 
                                                    <div  class="text-truncat-2 pt-3 fs-13 fw-500 text-center">New Installation </div>
                                                </div>


                                            </div>
                                     </div>
                                    </div>


                                    <div class="col-sm-2 col-6"  >
                                        <div style="min-height: 110px;" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2 ">
                                      
                                            <div class="row align-items-center no-gutters">

                                            <img style="height:60px; width:80px; margin:auto;" src="{{asset('public/assets/img/repairing.jpg')}}" alt="repaire">

                                                <div class="col-12 text-center">
                                                 
                                                    <div  class="text-truncat-2 pt-3 fs-13 fw-500 text-center">Repairing</div>
                                                </div>


                                            </div>
                                     </div>
                                    </div>


                                    <div class="col-sm-2 col-6"   >
                                        <div style="min-height: 110px;" href="#" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2 " >
                                            <div class="row align-items-center no-gutters">

                                            <img style="height:60px; width:80px; margin:auto;" src="{{asset('public/assets/img/maintanance.jpg')}}" alt="maintanance">

                                                <div class="col-12 text-center">
                                                 
                                                    <div  class="text-truncat-2 pt-3 fs-13 fw-500 text-center">Maintanance </div>
                                                </div>


                                            </div>
                                     </div>
                                    </div>


                                    <div class="col-sm-2 col-6"   >
                                        <div style="min-height: 110px;" href="#" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2 " >

                                            <div class="row align-items-center no-gutters">

                                            <img style="height:60px; width:80px; margin:auto;" src="{{asset('public/assets/img/rental.jpg')}}" alt="rental">

                                                <div class="col-12 text-center">
                                                 
                                                    <div  class="text-truncat-2 pt-3 fs-13 fw-500 text-center">Rental Products</div>
                                                </div>


                                            </div>
                                     </div>
                                    </div>

                                    <div class="col-sm-2 col-6"   >
                                        <div style="min-height: 110px;" href="#" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2 " >
                                            <div class="row align-items-center no-gutters">

                                            <img style="height:60px; width:80px; margin:auto;" src="{{asset('public/assets/img/Construction.jpg')}}" alt="Construction">

                                                <div class="col-12 text-center">
                                                 
                                                    <div  class="text-truncat-2 pt-3 fs-13 fw-500 text-center">Construction Work</div>
                                                </div>


                                            </div>
                                     </div>
                                    </div>

                                    <div class="col-sm-2 col-6"   >
                                        <div style="min-height: 110px;" href="#" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2 " >
                                            <div class="row align-items-center no-gutters">

                                            <img style="height:60px; width:80px; margin:auto;" src="{{asset('public/assets/img/Interior.jpg')}}" alt="Interior">
                                                <div class="col-12 text-center">
                                                 
                                                    <div  class="text-truncat-2 pt-3 fs-13 fw-500 text-center">Interior Work </div>
                                                </div>


                                            </div>
                                     </div>
                                    </div>

                                    <div class="col-sm-2 col-6"   >
                                        <div style="min-height: 110px;" href="#" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2 " >


                                        <div class="row align-items-center no-gutters">
                                        <img style="height:60px; width:80px; margin:auto;" src="{{asset('public/assets/img/Printing.jpg')}}" alt="Printing">

                                                <div class="col-12 text-center">
                                                 
                                                    <div  class="text-truncat-2 pt-3 fs-13 fw-500 text-center">Printing Work</div>
                                                </div>


                                            </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-2 col-6"   >
                                        <div style="min-height: 110px;" href="#" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2 " >
                                        <div class="row align-items-center no-gutters">
                                        <img style="height:60px; width:80px; margin:auto;" src="{{asset('public/assets/img/Tailoring.jpg')}}" alt="ac repaire">

                                         
                                                <div class="col-12 text-center">
                                                 
                                                    <div  class="text-truncat-2 pt-3 fs-13 fw-500 text-center">Tailoring Shop</div>
                                                </div>


                                            </div>
                                     </div>
                                    </div>
                                    <div class="col-sm-2 col-6"   >
                                        <div style="min-height: 110px;" href="#" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2 " >
                                            <div class="row align-items-center no-gutters">
                                            <img style="height:60px; width:80px; margin:auto;" src="{{asset('public/assets/img/Online.jpg')}}" alt="Online">

                                                <div class="col-12 text-center">
                                                 
                                                    <div  class="text-truncat-2 pt-3 fs-13 fw-500 text-center">Online/Offline job</div>
                                                </div>


                                            </div>
                                     </div>
                                    </div>

                                    <div class="col-sm-2 col-6"   >
                                        <div style="min-height: 110px;" href="#" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2 " >
                                            <div class="row align-items-center no-gutters">
                                            <img style="height:60px; width:80px; margin:auto;" src="{{asset('public/assets/img/tolet.jpg')}}" alt="tolet">

                                                <div class="col-12 text-center">
                                                 
                                                    <div  class="text-truncat-2 pt-3 fs-13 fw-500 text-center">To-let</div>
                                                </div>


                                            </div>
                                     </div>
                                    </div>
                                    <div class="col-sm-2 col-6"   >
                                        <div style="min-height: 110px;" href="#" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2 " >
                                            <div class="row align-items-center no-gutters">
                                            <img style="height:60px; width:80px; margin:auto;" src="{{asset('public/assets/img/Pack.jpg')}}" alt="Pack">

                                                <div class="col-12 text-center">
                                                 
                                                    <div  class="text-truncat-2 pt-3 fs-13 fw-500 text-center">Pack & Shift</div>
                                                </div>


                                            </div>
                                     </div>
                                    </div>
                                    <div class="col-sm-2 col-6"   >
                                        <div style="min-height: 110px;" href="#" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2 " >
                                            <div class="row align-items-center no-gutters">
                                            <img style="height:60px; width:80px; margin:auto;" src="{{asset('public/assets/img/Event.jpg')}}" alt="Event">

                                                <div class="col-12 text-center">
                                                 
                                                    <div  class="text-truncat-2 pt-3 fs-13 fw-500 text-center">Event Management</div>
                                                </div>


                                            </div>
                                     </div>
                                    </div>
                                    <div class="col-sm-2 col-6"   >
                                        <div style="min-height: 110px;" href="#" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2 " >
                                            <div class="row align-items-center no-gutters">
                                            <img style="height:60px; width:80px; margin:auto;" src="{{asset('public/assets/img/Furniture.jpg')}}" alt="Furniture">

                                                <div class="col-12 text-center">
                                                 
                                                    <div  class="text-truncat-2 pt-3 fs-13 fw-500 text-center">Furniture</div>
                                                </div>


                                            </div>
                                     </div>
                                    </div>

                                    <div class="col-sm-2 col-6"   >
                                        <div style="min-height: 110px;" href="#" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2 " >
                                            <div class="row align-items-center no-gutters">
                                            <img style="height:60px; width:80px; margin:auto;" src="{{asset('public/assets/img/Cleaning.jpg')}}" alt="Cleaning">

                                                <div class="col-12 text-center">
                                                 
                                                    <div  class="text-truncat-2 pt-3 fs-13 fw-500 text-center">Cleaning Service</div>
                                                </div>


                                            </div>
                                     </div>
                                    </div>
                                    <div class="col-sm-2 col-6"   >
                                        <div style="min-height: 110px;" href="#" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2 " >
                                            <div class="row align-items-center no-gutters">
                                            <img style="height:60px; width:80px; margin:auto;" src="{{asset('public/assets/img/Manpower.jpg')}}" alt="Manpower">

                                                <div class="col-12 text-center">
                                                 
                                                    <div  class="text-truncat-2 pt-3 fs-13 fw-500 text-center">Skilled Manpower Service</div>
                                                </div>


                                            </div>
                                     </div>
                                    </div>

                        </div>
                    </div>


            </div>
        </div>
    </section>





<section class="pt-4 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-xxl-5 col-xl-6 col-md-8 mx-auto">
                <form id="shop" class="" action="{{ route('service_customer.store') }} " enctype="multipart/form-data">
                    @csrf
                   
                        <div class="bg-white rounded shadow-sm mb-3"> 
                            <div class="fs-15 fw-600 p-3 border-bottom">
                                {{ translate('Send Your Servicing Request')}}
                            </div>
                            <div class="p-3">
                                <div class="form-group">
                                    <label>{{ translate('Your Name')}} <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="{{  translate('Name') }}" name="name">
                                </div>
                                <div class="form-group">
                                    <label>{{ translate('Your Mobile Number')}} <span class="text-primary">*</span></label>
                                    <input type="" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" value="{{ old('mobile') }}" placeholder="{{  translate('Your Mobile Number') }}" name="mobile">
                                </div>
                                <div class="form-group">
                                    <label>{{ translate('Your Email')}} <span class="text-primary"></span></label>
                                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email">
                                </div>

                                <div class="form-group">
                                
                                    <label>{{ translate('select your servicing category')}} <span class="text-primary">*</span></label>
                                    <select class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}"  name="category"  >
                                        <option value="Select Category">Select Category</option>
                                        <option value="New Installation">New Installation</option>
                                        <option value="Repairing">Repairing</option>
                                        <option value="Maintanance">Maintanance</option>
                                        <option value="Rental Products">Rental Products</option>
                                        <option value="Construction Work">Construction Work</option>
                                        <option value="Interior Work" >Interior Work</option>
                                        <option value="Printing">Printing</option>
                                        <option value="Tailoring">Tailoring</option>
                                        <option value="Online/Offline job">Online/Offline job</option>
                                        <option value="To-let">To-let</option>
                                        <option value="Pack & Shift">Pack & Shift</option>
                                        <option value="Event Management">Event Management</option>
                                        <option value="Furniture">Furniture</option>
                                        <option value="Cleaning Service">Cleaning Service</option>
                                        <option value="Skilled Manpower Service">Skilled Manpower Service</option>


                                       
                                    </select>
                                
                                 </label>
                                   
                                    
                                </div>
                                <div class="form-group">
                                    <label>{{ translate('Product Name')}} <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control{{ $errors->has('product') ? ' is-invalid' : '' }}"  placeholder="{{  translate('eg:Ac,Tv,Bed') }}" name="product">
                                </div>
                                <div class="form-group">
                                    <label>{{ translate('full adress')}} <span class="text-primary">*</span></label>
                                    <input type="text" class="form-control{{ $errors->has('adress') ? ' is-invalid' : '' }}"  placeholder="{{  translate('eg:house no,road no,area,district') }}" name="adress">
                                </div>


                                <div class="form-group">
                                    <label>{{ translate('what services do you need?')}} <span class="text-primary">*</span></label>
                                    <textarea type="" rows="8" class="form-control{{ $errors->has('problem') ? ' is-invalid' : '' }}" placeholder="{{  translate('explain about your product ,model,problem etc') }}" name="problem"></textarea>                                   
                                </div>
                                
                            </div>
                        </div>
                  
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary fw-600">{{ translate('Submit')}}</button>
                    </div>
                </form>
            </div>
          
        </div>
    </div>
</section>

@endsection

