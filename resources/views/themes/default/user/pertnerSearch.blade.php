@extends('user.master.usermaster')
@php
$me = auth()->user();
@endphp
@push('css')
    <style>
        .grid-card-contact {
            display: grid;
            grid-template-columns: 33% 33% 33%;
            text-align: center;

        }
        .areaId{
            display: none;
        }

    </style>
@endpush
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                @include('user.parts.leftsidebar')

            </div>
            <div class="col-md-9" style="background-color: ">
                @include('alerts.alerts')
                <div class="card">
                    <div class="card-body">
                        <form method="get" action="{{ route('user.userAdvanceSearch') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Min age</label>

                                        <select class="form-control  simple-select2 w-100" id="minimum_age"
                                            name="minimum_age">

                                            <option value="">Select Minimum Age </option>
                                            @if (isset($minimum_age))
                                                <option selected>{{ $minimum_age }}</option>
                                            @endif

                                            @for ($i = 16; $i <= 60; $i++)
                                                {{-- @if ($u->searchTerm->min_age != $i) --}}
                                                <option>{{ $i }}</option>
                                                {{-- @endif --}}
                                            @endfor

                                        </select>

                                        @if ($errors->has('minimum_age'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('minimum_age') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="religion">Religion</label>

                                        <select class="form-control  simple-select2 w-100" id="religion" name="religion">

                                            <option value="">Select Religion</option>
                                            {{-- @if ($u->searchTerm->gender)
                                            <option selected>{{ $u->searchTerm->gender }}</option>
                                        @endif --}}

                                            @if (isset($religion))
                                                <option selected>{{ $religion }}</option>
                                            @endif
                                            <option value="">Select...</option>
                                            @foreach($religions as $value)
                                                <option value="{{ $value->id }}">
                                                    {{ $value->name }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('religion'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('religion') }}</strong>
                                            </span>
                                        @endif
                                    </div>


                                    <div class="form-group">
                                        <label for="education_level">Education Level</label>

                                        <select class="form-control  simple-select2 w-100" id="education_level"
                                            name="education_level">



                                            @if (isset($education_level))
                                                <option selected>{{ $education_level }}</option>
                                                <option value="Any">Any</option>
                                            @else
                                                <option value="Any">Any</option>
                                            @endif


                                            {{-- id:26, title:education_level --}}
                                            @foreach ($userSettingFields[25]->values as $value)
                                                <option>{{ $value->title }}</option>
                                            @endforeach


                                        </select>



                                        @if ($errors->has('education_level'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('education_level') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="country">Country</label>

                                        <select class="form-control country w-100 " id=""
                                            name="country">

                                            {{-- @if (isset($profession))
                                                <option selected>{{ $profession }}</option>
                                                <option value="Any">Any</option>
                                            @endif
                                            --}}
                                            <option selected value="Any">Any</option>

                                            @foreach ($userSettingFields[2]->values as $value)
                                                <option value="{{ $value->title }}">{{ $value->title }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('profession'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('profession') }}</strong>
                                            </span>
                                        @endif
                                    </div>





                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Max age</label>

                                        <select class="form-control  simple-select2 w-100" id="maximum_age"
                                            name="maximum_age">

                                            <option value="">Select Maximum Age </option>


                                            @if (isset($maximum_age))
                                                <option selected>{{ $maximum_age }}</option>
                                            @endif

                                            @for ($i = 18; $i <= 80; $i++)
                                                <option>{{ $i }}</option>
                                            @endfor

                                        </select>


                                        @if ($errors->has('maximum_age'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('maximum_age') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="marital_status">Marital Status</label>

                                        <select class="form-control  simple-select2 w-100" id="marital_status"
                                            name="marital_status">
                                            @if (isset($marital_status))
                                                <option selected>{{ $marital_status }}</option>
                                                <option value="Any">Any</option>
                                            @else
                                                <option selected value="Any">Any</option>
                                            @endif
                                            {{-- id:11, title:marital_status --}}
                                            @foreach ($userSettingFields[10]->values as $value)
                                                <option>{{ $value->title }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('marital_status'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('marital_status') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="profession">Profession</label>

                                        <select class="form-control  simple-select2 w-100" id="profession"
                                            name="profession">

                                            @if (isset($profession))
                                                <option selected>{{ $profession }}</option>
                                                <option value="Any">Any</option>
                                            @endif
                                            <option selected value="Any">Any</option>
                                            {{-- id:27, title:profession --}}
                                            @foreach ($userSettingFields[26]->values as $value)
                                                <option>{{ $value->title }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('profession'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('profession') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group areaId" id="areaId">
                                        <label for="profession">Area</label>

                                        <select class="form-control w-100"
                                            name="area">

                                            <option selected value="Any">Any</option>
                                            {{-- id:27, title:profession --}}
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->name}}">{{ $area->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class=" col-md-12 text-left">
                                    <button type="submit" class="btn btn-info">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>


        </div>
    </div>
    <br>
@endsection
@push('js')
<script>
$(document).ready(function(){
  $(".country").change(function(){
    var that =$(this);
    var country=that.val();
    if(country == 'Bangladesh'){
        $("#areaId").show();
    }else{
        $("#areaId").hide();
    }


  });
});

</script>
@endpush
