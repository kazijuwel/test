@extends('frontend.layouts.app')

@section('content')
<section class="pt-4 mb-4">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <h1 class="fw-600 h4">{{ translate('Register yourself as service Provider')}}</h1>
            </div>
            <div class="col-lg-6">
                <ul class="breadcrumb bg-transparent p-0 justify-content-center justify-content-lg-end">
                    <li class="breadcrumb-item opacity-50">
                        <a class="text-reset" href="{{ route('home') }}">{{ translate('Home')}}</a>
                    </li>
                    <li class="text-dark fw-600 breadcrumb-item">
                        <a class="text-reset" href="{{ route('service_provider.create') }}">"{{ translate('Register yourself')}}"</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="pt-4 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-xxl-5 col-xl-6 col-md-8 mx-auto">
                <form id="shop" class="" action="{{ route('service_provider.store') }}" enctype="multipart/form-data" autocomplete="off" method="post">
                    @csrf
                    
                        <div class="bg-white rounded shadow-sm mb-3">
                            <div class="fs-15 fw-600 p-3 border-bottom">
                                {{ translate('Personal Info')}}
                            </div>
                            <div class="p-3">
                                <div class="form-group">
                                    <label>{{ translate('Your Name')}} <span class="text-primary">*</span></label>
                                    <input autocomplete="off" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="{{  translate('Name') }}" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label>{{ translate('Your Email')}} <span class="text-primary"></span></label>
                                    <input autocomplete="off" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>{{ translate('Your Mobile Number')}} <span class="text-primary">*</span></label>
                                    <input type="" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" placeholder="{{  translate('Your Mobile Number') }}" name="phone">
                                </div>

                                <div class="form-group">
                                    <label>{{ translate('Your Nid Number')}} <span class="text-primary">*</span></label>
                                    <input autocomplete="off" type="text" class="form-control{{ $errors->has('nidn') ? ' is-invalid' : '' }}" value="{{ old('nidn') }}" placeholder="{{  translate('Name') }}" name="nidn" required>
                                </div>


                                <div class="form-group">
                                
                                <label>{{ translate('select your education qualification')}} <span class="text-primary">*</span></label>
                                <select class="form-control{{ $errors->has('qualification') ? ' is-invalid' : '' }}"  name="qualification"  >
                                    <option value="Select Qualification">Select Category</option>
                                    <option value="Under SSC">Under SSC</option>
                                    <option value="SSC">SSC</option>
                                    <option value="HSC">HSC</option>
                                    <option value="Graduate">Graduate</option>
                                   
                                </select>
                            
                             </label>    
                            </div>

                              
                                <div class="form-group">
                                <label>{{ translate('Adress')}} <span class="text-primary">*</span></label>
                                <input autocomplete="off" type="text"class="form-control{{ $errors->has('adress') ? ' is-invalid' : '' }}" value="{{ old('adress') }}" placeholder="{{  translate('adress') }}" name="adress" required>
                            </div>

                            <div class="form-group">
                                
                                <label>{{ translate('select your servicing category')}} <span class="text-primary">*</span></label>
                                <select class="ss form-control"  name="categorys[]"  multiple>
                                    
                                    
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
                                <label>{{ translate('Select Your Image')}}</label>
                                <div class="custom-file">
                                    <label class="custom-file-label">
                                        <input type="file" class="custom-file-input" name="Image" >
                                        <span class="custom-file-name">{{ translate('Choose image') }}</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ translate('Attach Your NID')}}<span class="text-primary">*</span></label>
                                <div class="custom-file">
                                    <label class="custom-file-label">
                                        <input type="file" class="custom-file-input" name="nidp" accept="image/*">
                                        <span class="custom-file-name">{{ translate('Choose image') }}</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ translate('Attach Your Updated CV')}}</label>
                                <div class="custom-file">
                                    <label class="custom-file-label">
                                        <input type="file" class="custom-file-input" name="cv" accept="image/*">
                                        <span class="custom-file-name">{{ translate('Choose image') }}</span>
                                    </label>
                                </div>
                            </div>



                            </div>


                     
                        </div>
                        
                        <div class="text-right">
                        <button type="submit" class="btn btn-primary fw-600">{{ translate('Register Yourself')}}</button>
                    </div>
                       
                         
                            
                           
                        
                    </div>

                  

                   
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript">
    // making the CAPTCHA  a required field for form submission
    $(document).ready(function(){
        // alert('helloman');
        $("#shop").on("submit", function(evt)
        {
            var response = grecaptcha.getResponse();
            if(response.length == 0)
            {
            //reCaptcha not verified
                alert("please verify you are humann!");
                evt.preventDefault();
                return false;
            }
            //captcha verified
            //do the rest of your validations here
            $("#reg-form").submit();
        });
    });
</script>

<script src="{{ asset('public/cp/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $('select').select2({
    placeholder: 'This is my placeholder',
    allowClear: true
  });
$(".ss").select2({

    placeholder: 'This is my placeholder',
    multiple : true,
    allowClear: true,
});
$('.select2Cats').select2({
                minimumInputLength: 1,
                tags: true,
                tokenSeparators: [','],
                ajax: {
                    data: function(params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;
                        // alert(data[0].s);
                        var data = $.map(data, function(obj) {
                            obj.id = obj.id || obj.name;
                            return obj;
                        });
                        var data = $.map(data, function(obj) {
                            obj.text = obj.text || obj.name;
                            return obj;
                        });
                        return {
                            results: data,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    }
                },
            });

</script>

@endsection
