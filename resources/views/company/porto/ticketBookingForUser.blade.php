@extends('company.layouts.companyMaster')

@push('css')
@endpush

@section('content')
    <section class="content">
        <br>
        <div class="col-sm-12">
            @include('alerts.alerts')
            <div>
            </div>
            <div class="card card-widget">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-briefcase text-primary"></i> <span class="badge badge-light">

                            Add New Service Profile

                        </span>
                    </h3>
                </div>
                <div class="card-body" style="min-height: 200px;">
                    <div class="container">
                        <div class="card rounded">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <b>{{ \Carbon\Carbon::parse($flight->start)->format('H:m:s') }} -
                                            {{ \Carbon\Carbon::parse($flight->end)->format('H:m:s') }}</b> <br>
                                        <p class="m-0">{{ $flight->airport->name }} -
                                            {{ $flight->airport2->name }}
                                        </p>
                                        <p class="m-0">{{ $flight->airline->Airline }}</p>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <p class="m-0">
                                            {{ timestamToTimeDiffarece($flight->start, $flight->end) }}</p>
                                        <p class="m-0">
                                            {{ timestamToHoursDiffarece($flight->start, $flight->end) }}h in
                                            {{ $flight->airport2->name }}</p>
                                    </div>

                                    <div class="col-md-4" style="text-align: end">
                                        <h3 class="font-weight-bold mt-0">${{ $flight->price }}</h3>
                                        <p class="m-0">
                                            {{ timestamToHoursDiffarece($flight->start, $flight->end) }}h in
                                            {{ $flight->airport2->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header w3-blue">Enter Existing User</div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('company.ticketBookingForUserByCompany',['company'=>$company->id]) }}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="schedule_id" value="{{ $flight->id }}">
                                            <div class="input-group mb-3">
                                                <select id="user" name="user" required
                                                    class="form-control user-select select2-container step2-select select2"
                                                    data-placeholder="Mobile Or Email"
                                                    data-ajax-url="{{ route('company.selectUser', ['company' => $company->id]) }}"
                                                    data-ajax-cache="true" data-ajax-dataType="json" data-ajax-delay="200"
                                                    style="">

                                                </select>
                                                <div class="input-group-append">
                                                    <a id="newUser" title="Add New User" target="_blank" href="#"
                                                        class="btn btn-default"><i class="fa fa-user-plus"></i></a>
                                                </div>
                                            </div>
                                            
                                            <div class="another">
                                               
                                                <div class="card">
                                                    <div class="card-header"> <b>Passenger -1</b> </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="first_name">First name</label>
                                                                    <input type="text" name="first_name[0]" id="first_name" class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="midddle_name">First name</label>
                                                                    <input type="text" name="midddle_name[0]" id="midddle_name" class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="last_name">First name</label>
                                                                    <input type="text" name="last_name[0]" id="last_name" class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="gender">Gender</label>
                                                                    <select name="gender[0]" id="gender" class="form-control">
                                                                        <option value="male">Male</option>
                                                                        <option value="female">Female</option>
                                                                        <option value="other">Others</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="dob">Date of Birth</label>
                                                                    <input type="date" name="dob[0]" id="dob" class="form-control">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="nationality">Nationality</label>
                                                                    <select name="nationality[0]" id="nationality" class="form-control">
                                                                        <option value="">Select..</option>
                                                                            <option value="2">Afghan</option>
                                                                            <option value="3">Albanian</option>
                                                                            <option value="4">Aland Islander</option>
                                                                            <option value="5">Algerian</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="javascript:void(0)" id="add2" class="btn btn-info mt-2">Add more</a>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-md-12 ">
                                                    <button type="submit" class="btn btn-primary btn-block">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="hideShow" style="display: none;">
                                <div class="card">
                                    <div class="card-header">{{ __('Create New Tenant') }}</div>
                                    <div class="card-body">
                                        <form method="POST"
                                            action="{{ route('company.creatNewUserByCompany', ['company' => $company->id]) }}">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="name"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="username"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Userame') }}</label>

                                                <div class="col-md-6">
                                                    <input id="username" type="text"
                                                        class="form-control @error('username') is-invalid @enderror"
                                                        name="username" value="{{ old('username') }}" required
                                                        autocomplete="username" autofocus>

                                                    @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="mobile"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                                                <div class="col-md-6">
                                                    <input id="mobile" type="text"
                                                        class="form-control @error('mobile') is-invalid @enderror"
                                                        name="mobile" value="{{ old('mobile') }}" required
                                                        autocomplete="mobile" autofocus>

                                                    @error('mobile')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="new-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password-confirm"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="col-md-6 offset-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="active"
                                                            id="active" checked>

                                                        <label class="form-check-label" for="active">
                                                            {{ __('Active') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Create') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
    

                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="{{ asset('cp/plugins/select2/js/select2.full.min.js') }}"></script>

    
    <script>
        var i = 0;
        var p = 1;
    $("#add2").click(function(){
            ++i;
            ++p;
            var html = '<div class="form-group">Hello</div>';
            // $(".another").append(html);
            $(".another").append('<div class="card" id="id'+p+'"><div class="card-header d-flex justify-content-between"><b>Passenger-'+p+'</b> <a href="javascript:void(0)" data-remove="id'+p+'" id="remove" class="btn btn-danger btn-xs">Remove</a></div><div class="card-body"><div class="form-group"><div class="row"><div class="col-md-4"><label for="first_name">First name</label><input type="text" name="first_name['+i+']" id="first_name" class="form-control"></div><div class="col-md-4"><label for="midddle_name">First name</label><input type="text" name="midddle_name['+i+']" id="midddle_name" class="form-control"></div><div class="col-md-4"><label for="last_name">First name</label><input type="text" name="last_name['+i+']" id="last_name" class="form-control"></div><div class="col-md-4"><label for="gender">Gender</label><select name="gender['+i+']" id="gender" class="form-control"><option value="male">Male</option> <option value="female">Female</option><option value="other">Others</option></select></div><div class="col-md-4"><label for="dob">Date of Birth</label><input type="date" name="dob['+i+']" id="dob"class="form-control"></div><div class="col-md-4"><label for="nationality">Nationality</label><select name="nationality['+i+']" id="nationality" class="form-control"><option value="">Select..</option><option value="2">Afghan</option><option value="3">Albanian</option><option value="4">Aland Islander</option><option value="5">Algerian</option><select></div></div></div> </div></div>');



            // $(".another").append('<tr><input type="hidden" name="addmore2['+i+'][user_id]" value="{{Auth()->id()}}" class="form-control" /><td><input type="file" name="addmore2['+i+'][file_name]" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
        });
        // $('#remove').click(function(){

        // });
    //     $(document).on('click', '#remove', function(){  
    //        var id= $(this).attr('data-remove');
    //      $(this).parents('tr').remove();
    //     console.log($(this).parents('div'+id));
    // });
        
        $(document).ready(function() {
            //    var mobile= $('#user').val();
            //    if (mobile.lenght < 14) {
            //        $("select#workstation").attr('disabled');
            //    }
            $('.select2').select2({
                theme: 'bootstrap4'
            });

            $('.step2-select').select2({
                theme: 'bootstrap4',
                // minimumInputLength: 1,
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
                            obj.id = obj.id || obj.id;
                            return obj;
                        });
                        var data = $.map(data, function(obj) {
                            obj.text = obj.email;
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
        });
        $('#newUser').click(function(e) {
            e.preventDefault();

            $("#hideShow").toggle();
        });
    </script>
    <script>
        $('select#workstation').on('change', function() {
            var st = $(this).val();
            var url = $(this).attr('data-url');
            $.ajax({
                url: url,
                method: 'post',
                data: {
                    id: st,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {

                    $('#category').empty();
                    $.each(data.categories, function(index, categories) {
                        $('select#category').append('<option value="' +
                            categories.id + '">' + categories.name.en +
                            '</option>');
                        // console.log(categories.id);
                    })
                }
            });
        });

        $('select#category').on('change', function() {
            var st = $(this).val();
            var url = $(this).attr('data-url');
            var user = $('select#user').val();
            $.ajax({
                url: url,
                method: 'post',
                data: {
                    id: st,
                    user: user,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    console.log(data)
                    $('.another').empty();
                    $('.another').append(data.html);

                }
            });
        });
    </script>


@endpush
