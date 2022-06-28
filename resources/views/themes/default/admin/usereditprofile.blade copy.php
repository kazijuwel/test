@extends('admin.master.dashboardmaster')
@section('content')





<div class="container py-2">

    <div class="row">

        <div class="col-lg-12 mt-4 mt-lg-0">

           <div class="row text-center">
               <div class="col-md-3">
                @if($user->profile_img)
                <img src="{{asset('storage/profile/'. $user->profile_img)}}" alt="" class="img-fluid"
                    style="max-width: 80%;">
                @else
                <img src="{{asset('img/vip-user.png')}}" alt="" class="img-fluid" style="max-width: 80%;">
                @endif
                <h4 class="color-vipmm2">Profile Completed {{ $user->profilePoint() }}%</h4>

                <div class="progress mb-2">
                    <div class="progress-bar bg-color-vipmm progress-bar-striped progress-bar-animated active"
                        role="progressbar" aria-valuenow="{{
                            $user->profilePoint() }}" aria-valuemin="0" aria-valuemax="100" style="width: {{
                                $user->profilePoint() }}%">
                        <span class="sr-only">{{
                            $user->profilePoint() }}% Complete</span>
                    </div>
                </div>
               </div>
           </div>

        </div>
    </div>
        <div class="row">


        <div class="col-lg-12">

            <div class="overflow-hidden mb-1">
                <h2 class="font-weight-normal text-7 mb-0"><strong
                        class="font-weight-extra-bold">@if($user->id==auth()->user()->id)My @else
                        {{$user->name}}@endif</strong> Profile</h2>
            </div>
            <div class="overflow-hidden mb-4 pb-3">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            @include('alerts.alerts')

            <form action="{{ route('profilePost',$user->id) }}" role="form" method="POST" class="needs-validation"
                enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Name</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="name" required type="text" value="{{$user->name}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Profile
                                Created By</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="profile_created_by" id="" required>
                                    @if($user->profile_created_by!=null)
                                    <option selected value="{{$user->profile_created_by}}">{{$user->profile_created_by}}
                                    </option>


                                        @foreach ($userSettingFields[1]->values as $value)
                                        @if ($user->profile_created_by != $value->title)
                                        <option>{{ $value->title }}</option>
                                         @endif
                                    @endforeach

                                    @else
                                    <option value="">Select...</option>
                                    @foreach ($userSettingFields[1]->values as $value)

                                    <option>{{ $value->title }}</option>

                                @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Date
                                of birth </label>
                            <div class="col-lg-9">
                                <input class="form-control" name="dob" value="{{$user->dob}}" required type="date" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Gender</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="gender" id="" required>
                                    @if($user->gender!=null)
                                    <option selected value="{{$user->gender}}">{{$user->gender}}</option>
                                    @foreach ($userSettingFields[0]->values as $value)
                                    @if ($user->gender != $value->title)
                                    <option>{{ $value->title }}</option>
                                     @endif
                                @endforeach
                                    @else
                                    <option value="">Select...</option>
                                    @foreach ($userSettingFields[0]->values as $value)

                                    <option>{{ $value->title }}</option>

                                @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Religion</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="religion" id="" required>
                                    @if($user->religion!=null)
                                    <option selected value="{{$user->religion}}">{{$user->religion}}</option>
                                    @foreach ($userSettingFields[3]->values as $value)
                                    @if ($user->religion != $value->title)
                                    <option>{{ $value->title }}</option>
                                     @endif
                                @endforeach
                                    @else
                                    <option value="">Select...</option>
                                    @foreach ($userSettingFields[3]->values as $value)
                                    <option>{{ $value->title }}</option>
                                @endforeach
                                    @endif

                                </select>


                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Caste</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="caste" id="" required>
                                    @if($user->caste!=null)
                                    <option selected value="{{$user->caste}}">{{$user->caste}}</option>

                                    @foreach ($userSettingFields[28]->values as $value)
                                    @if ($user->caste != $value->title)
                                    <option>{{ $value->title }}</option>
                                     @endif
                                @endforeach
                                    @else
                                    <option value="">Select...</option>

                                    @foreach ($userSettingFields[28]->values as $value)
                                    <option>{{ $value->title }}</option>
                                @endforeach
                                    @endif

                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group row">
                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Marital
                                Status</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="marital_status" id="" required>
                                    @if($user->marital_status!=null)
                                    <option selected value="{{$user->marital_status}}">{{$user->marital_status}}</option>

                                    @foreach ($userSettingFields[10]->values as $value)
                                    @if ($user->marital_status != $value->title)
                                    <option>{{ $value->title }}</option>
                                     @endif
                                @endforeach
                                    @else
                                    <option value="">Select...</option>
                                    @foreach ($userSettingFields[10]->values as $value)
                                    <option>{{ $value->title }}</option>
                                @endforeach
                                    @endif

                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Children
                                Have?</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="children_have" id="" required>
                                    @if($user->children_have!=null)
                                    <option selected value="{{$user->children_have}}">{{$user->children_have}}</option>
                                    @foreach ($userSettingFields[12]->values as $value)
                                    @if ($user->children_have != $value->title)
                                    <option>{{ $value->title }}</option>
                                     @endif
                                @endforeach
                                    @else
                                    <option value="">Select...</option>
                                    @foreach ($userSettingFields[12]->values as $value)
                                    <option>{{ $value->title }}</option>
                                @endforeach
                                    @endif


                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Height</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="height" id="" required>
                                    @if($user->height!=null)
                                    <option selected value="{{$user->height}}">{{$user->height}}</option>
                                    @foreach ($userSettingFields[14]->values as $value)
                                    @if ($user->height != $value->title)
                                    <option>{{ $value->title }}</option>
                                     @endif
                                @endforeach
                                    @else
                                    <option value="">Select...</option>
                                    @foreach ($userSettingFields[14]->values as $value)
                                    <option>{{ $value->title }}</option>
                                @endforeach
                                    @endif

                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Weight
                                (kg)</label>
                            <div class="col-lg-9">
                                <input type="number" value="{{$user->weight}}" name="weight" class="form-control" required>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Blood
                                Group</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="blood_group" id="" required>
                                    @if($user->blood_group!=null)
                                    <option selected value="{{$user->blood_group}}">{{$user->blood_group}}</option>
                                    @foreach ($userSettingFields[24]->values as $value)
                                    @if ($user->blood_group != $value->title)
                                    <option>{{ $value->title }}</option>
                                     @endif
                                @endforeach
                                    @else
                                    <option value="">Select...</option>
                                    @foreach ($userSettingFields[24]->values as $value)
                                    <option>{{ $value->title }}</option>

                                @endforeach
                                    @endif


                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Mobile</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="mobile" type="text" value="{{$user->mobile}}"
                                    placeholder="Mobile..." required>
                            </div>
                        </div>
                    </div>
                </div>


                <h5 >Present Address</h5>
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Division</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="present_division" id="" required>
                                @if($user->present_division!=null)
                                <option selected value="{{$user->present_division}}">{{$user->present_division}}
                                </option>
                                @else
                                <option>Select...</option>
                                @endif <option value="Dhaka">Dhaka</option>

                                <option value="Rangpur">Rangpur</option>
                                <option value="Barisal">Barisal</option>

                                <option value="Khulna">Khulna</option>
                                <option value="Rajshahi">Rajshahi</option>


                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">District</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="present_district" id="" required>
                                @if($user->present_district!=null)
                                <option selected value="{{$user->present_district}}">{{$user->present_district}}
                                </option>
                                @else
                                <option>Select...</option>
                                @endif <option value="Thakurgaon">Thakurgaon</option>
                                <option value="Dinajpur">Dinajpur</option>
                                <option value="Dhaka">Dhaka</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Thana</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="present_thana" id="" required>
                                @if($user->present_thana!=null)
                                <option selected value="{{$user->present_thana}}">{{$user->present_thana}}</option>
                                @else
                                <option>Select...</option>
                                @endif <option value="Pirganj">Pirganj</option>
                                <option value="Adabar">Adabar</option>
                            </select>
                        </div>
                    </div>


                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Village</label>
                        <div class="col-lg-9">
                            <input class="form-control" value="{{$user->present_vill}}" name="present_vill" required
                                type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Citizenship
                            Status</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="citizenship_status" id="" required>
                                @if($user->citizenship_status!=null)
                                <option selected value="{{$user->citizenship_status}}">{{$user->citizenship_status}}
                                </option>
                                @else
                                <option>Select...</option>
                                @endif <option value="Citizen">Citizen</option>
                                <option value="Student Visa">Student Visa</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Postal
                            Code</label>
                        <div class="col-lg-9">
                            <input type="number" name="present_po" placeholder="Portal Code" value="{{$user->present_po}}"
                                required class="form-control">
                        </div>
                    </div>
                  </div>
              </div>




                <h5>Parmanent Address</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Division</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="parmanent_division" id="" required>
                                    @if($user->parmanent_division!=null)
                                    <option selected value="{{$user->parmanent_division}}">{{$user->parmanent_division}}
                                    </option>
                                    @else
                                    <option>Select...</option>
                                    @endif
                                    <option value="Rangpur">Rangpur</option>
                                    <option value="Barisal">Barisal</option>

                                    <option value="Khulna">Khulna</option>
                                    <option value="Rajshahi">Rajshahi</option>


                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">District</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="parmanent_district" id="" required>
                                    @if($user->parmanent_district!=null)
                                    <option selected value="{{$user->parmanent_district}}">{{$user->parmanent_district}}
                                    </option>
                                    @else
                                    <option>Select...</option>
                                    @endif <option value="Thakurgaon">Thakurgaon</option>
                                    <option value="Dinajpur">Dinajpur</option>
                                    <option value="Dhaka">Dhaka</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Thana</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="parmanent_thana" id="" required>
                                    @if($user->parmanent_thana!=null)
                                    <option selected value="{{$user->parmanent_thana}}">{{$user->parmanent_thana}}
                                    </option>
                                    @else
                                    <option>Select...</option>
                                    @endif <option value="Pirganj">Pirganj</option>
                                    <option value="Adabar">Adabar</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Village</label>
                            <div class="col-lg-9">
                                <input class="form-control" value="{{$user->parmanent_vill}}" name="parmanent_vill" required
                                    type="text" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Postal
                                Code</label>
                            <div class="col-lg-9">
                                <input type="number" name="parmanent_po" placeholder="Portal Code"
                                    value="{{$user->parmanent_po}}" required class="form-control">
                            </div>
                        </div>

                    </div>
                </div>




                <h5>Education</h5>
           <div class="row">
               <div class="col-md-6">
                <div class="form-group row">
                    <label
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Education
                        Level</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="education_level" id="" required>

                            @if($user->education_level!=null)
                            <option selected value="{{$user->education_level}}">{{$user->education_level}}
                            </option>

                            @foreach ($userSettingFields[25]->values as $value)
                            @if ($user->education_level != $value->title)
                            <option>{{ $value->title }}</option>
                             @endif
                        @endforeach
                            @else
                            <option value="">Select...</option>
                            @foreach ($userSettingFields[25]->values as $value)
                            <option>{{ $value->title }}</option>
                        @endforeach
                        @endif
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Education
                        Status</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="education_status" id="" required>
                            @if($user->education_status!=null)
                            <option selected value="{{$user->education_status}}">{{$user->education_status}}
                            </option>
                            @else
                            <option value="">Select...</option>
                            @endif <option value="Option 1">Option 1</option>
                                <option value="Completed">Completed</option>
                                <option value="Final Year">Final Year</option>
                                <option value="Waiting for result">Waiting for result
                                </option>
                                <option value="First Year">First Year</option>
                                <option value="Second Year">Second Year</option>
                                <option value="Third Year">Third Year</option>
                                <option value="Fifth Year">Fifth Year</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Major
                        Subject</label>
                    <div class="col-lg-9">
                        <input type="text" name="major_subject" class="form-control" value="{{$user->major_subject}}"
                            placeholder="Major Subject" required id="">
                    </div>
                </div>



               </div>
               <div class="col-md-6">

                <div class="form-group row">
                    <label
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">College/University</label>
                    <div class="col-lg-9">
                        <input class="form-control" name="university" placeholder="College/University..."
                            value="{{$user->university}}" required type="text" required>
                    </div>
                </div>


                <div class="form-group row">
                    <label
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Degree
                        Name</label>
                    <div class="col-lg-9">
                        <input type="number" name="degree_name" placeholder="Degree Name..."
                            value="{{$user->degree_name}}" required class="form-control">
                    </div>
                </div>
               </div>
           </div>




                <h5>Career</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Profession</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="profession" id="" required>
                                    @if($user->profession!=null)
                                    <option selected value="{{$user->profession}}">{{$user->profession}}
                                    </option>
                                    @foreach ($userSettingFields[26]->values as $value)
                                    @if ($user->profession != $value->title)
                                    <option>{{ $value->title }}</option>
                                     @endif
                                @endforeach
                                    @else
                                    <option value="">Select...</option>
                                    @foreach ($userSettingFields[26]->values as $value)

                                    <option>{{ $value->title }}</option>

                                @endforeach
                                @endif


                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Workplace</label>
                            <div class="col-lg-9">
                                <input type="text" name="workplace" class="form-control" value="{{$user->workplace}}"
                                    placeholder="Workplace" required>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Designation</label>
                            <div class="col-lg-9">
                                <input type="text" name="designation" class="form-control" value="{{$user->designation}}"
                                    placeholder="Designation" required id="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Annual
                                Income (BDT)</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="annual_income" placeholder="Annual Income" required
                                    type="text" value="{{$user->annual_income}}" required>
                            </div>
                        </div>
                    </div>
                </div>









                <h5>Physical Attribute</h5>
               <div class="row">
                   <div class="col-md-6">
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Skin
                            Color</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="skin_color" id="" required>
                                @if($user->skin_color!=null)
                                <option selected value="{{$user->skin_color}}">{{$user->skin_color}}
                                </option>
                                @foreach ($userSettingFields[18]->values as $value)
                                @if ($user->skin_color != $value->title)
                                <option>{{ $value->title }}</option>
                                 @endif
                            @endforeach
                                @else
                                <option value="">Select...</option>
                                @foreach ($userSettingFields[18]->values as $value)
                                <option>{{ $value->title }}</option>
                            @endforeach
                            @endif


                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Eye
                            Color</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="eye_color" id="" required>
                                @if($user->eye_color!=null)
                                <option selected value="{{$user->eye_color}}">{{$user->eye_color}}
                                </option>
                                @foreach ($userSettingFields[17]->values as $value)
                                @if ($user->eye_color != $value->title)
                                <option>{{ $value->title }}</option>
                                 @endif
                            @endforeach
                                @else
                                <option value="">Select...</option>
                                @foreach ($userSettingFields[17]->values as $value)
                                <option>{{ $value->title }}</option>
                            @endforeach
                                @endif



                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Hair
                            Color</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="hair_color" id="" required>
                                @if($user->hair_color!=null)
                                <option selected value="{{$user->hair_color}}">{{$user->hair_color}}
                                </option>
                                @foreach ($userSettingFields[16]->values as $value)
                                @if ($user->hair_color != $value->title)
                                <option>{{ $value->title }}</option>
                                 @endif
                            @endforeach
                                @else
                                <option value="">Select...</option>
                                @foreach ($userSettingFields[16]->values as $value)
                                <option>{{ $value->title }}</option>

                            @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                   </div>
                   <div class="col-md-6">

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Body
                            Type</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="body_type" id="" required>
                                @if($user->body_type!=null)
                                <option selected value="{{$user->body_type}}">{{$user->body_type}}
                                </option>
                                @foreach ($userSettingFields[15]->values as $value)
                                @if ($user->body_type != $value->title)
                                <option>{{ $value->title }}</option>
                                 @endif
                            @endforeach
                                @else
                                <option value="">Select...</option>
                                @foreach ($userSettingFields[15]->values as $value)
                                <option>{{ $value->title }}</option>

                            @endforeach
                                @endif

                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Disability</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="disability" id="" required>
                                @if($user->disability!=null)
                                <option selected value="{{$user->disability}}">{{$user->disability}}
                                </option>
                                @foreach ($userSettingFields[21]->values as $value)
                                @if ($user->disability != $value->title)
                                <option>{{ $value->title }}</option>
                                 @endif
                            @endforeach
                                @else
                                <option value="">Select...</option>
                                @foreach ($userSettingFields[21]->values as $value)
                                <option>{{ $value->title }}</option>
                            @endforeach
                                @endif


                            </select>
                        </div>
                    </div>
                   </div>
               </div>



                <h5>Lifestyle Info</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Drink?</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="drink" id="" required>
                                    @if($user->drink!=null)
                                    <option selected value="{{$user->drink}}">{{$user->drink}}
                                    </option>
                                    @foreach ($userSettingFields[20]->values as $value)
                                @if ($user->drink != $value->title)
                                <option>{{ $value->title }}</option>
                                 @endif
                            @endforeach
                                    @else
                                    <option value="">Select...</option>
                                    @foreach ($userSettingFields[20]->values as $value)
                                    <option>{{ $value->title }}</option>
                                @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Smoke?</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="smoke" id="" required>
                                    @if($user->smoke!=null)
                                    <option selected value="{{$user->smoke}}">{{$user->smoke}}
                                    </option>
                                    @foreach ($userSettingFields[20]->values as $value)
                                    @if ($user->smoke != $value->title)
                                    <option>{{ $value->title }}</option>
                                     @endif
                                @endforeach
                                    @else
                                    <option value="">Select...</option>
                                    @foreach ($userSettingFields[20]->values as $value)
                                    <option>{{ $value->title }}</option>
                                @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Diet</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="diet" id="" required>
                                    @if($user->diet!=null)
                                    <option selected value="{{$user->diet}}">{{$user->diet}}
                                    </option>

                                    @foreach ($userSettingFields[27]->values as $value)
                                    @if ($user->diet != $value->title)
                                    <option>{{ $value->title }}</option>
                                     @endif
                                @endforeach
                                    @else
                                    <option value="">Select...</option>
                                    @foreach ($userSettingFields[27]->values as $value)
                                    <option>{{ $value->title }}</option>
                                @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Zodiac
                                Sign</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="zodiac_sign" id="" required>
                                    @if($user->zodiac_sign!=null)
                                    <option selected value="{{$user->zodiac_sign}}">{{$user->zodiac_sign}}
                                    </option>

                                    @foreach ($userSettingFields[29]->values as $value)
                                    @if ($user->zodiac_sign != $value->title)
                                    <option>{{ $value->title }}</option>
                                     @endif
                                @endforeach
                                    @else
                                    <option value="">Select...</option>
                                    @foreach ($userSettingFields[29]->values as $value)
                                    <option>{{ $value->title }}</option>
                                @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                    </div>
                </div>




                <h5>Family Information</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Family
                                Type</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="family_type" id="" required>
                                    @if($user->family_type!=null)
                                    <option selected value="{{$user->family_type}}">{{$user->family_type}}
                                    </option>

                                    @foreach ($userSettingFields[42]->values as $value)
                                    @if ($user->family_type != $value->title)
                                    <option>{{ $value->title }}</option>
                                     @endif
                                @endforeach
                                    @else
                                    <option value="">Select...</option>
                                    @foreach ($userSettingFields[42]->values as $value)
                                    <option>{{ $value->title }}</option>
                                @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Family
                                Status</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="family_status" id="" required>
                                    @if($user->family_status!=null)
                                    <option selected value="{{$user->family_status}}">{{$user->family_status}}
                                    </option>

                                    @foreach ($userSettingFields[44]->values as $value)
                                    @if ($user->family_status != $value->title)
                                    <option>{{ $value->title }}</option>
                                     @endif
                                @endforeach
                                    @else
                                    <option value="">Select...</option>
                                    @foreach ($userSettingFields[44]->values as $value)
                                    <option>{{ $value->title }}</option>
                                @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Number
                                Of Members</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="no_of_member" id="" required>
                                    @if($user->no_of_member!=null)
                                    <option selected value="{{$user->no_of_member}}">{{$user->no_of_member}}
                                    </option>

                                    @foreach ($userSettingFields[47]->values as $value)
                                    @if ($user->no_of_member != $value->title)
                                    <option>{{ $value->title }}</option>
                                     @endif
                                @endforeach
                                    @else
                                    <option value="">Select...</option>
                                    @foreach ($userSettingFields[47]->values as $value)
                                    <option>{{ $value->title }}</option>
                                @endforeach
                                    @endif


                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Family
                                Value</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="family_value" id="" required>
                                    @if($user->family_value!=null)
                                    <option selected value="{{$user->family_value}}">{{$user->family_value}}
                                    </option>
                                    @foreach ($userSettingFields[43]->values as $value)
                                    @if ($user->family_value != $value->title)
                                    <option>{{ $value->title }}</option>
                                     @endif
                                @endforeach
                                    @else
                                    <option value="">Select...</option>
                                    @foreach ($userSettingFields[43]->values as $value)
                                    <option>{{ $value->title }}</option>
                                @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>
                    </div>
                </div>





                 <h5>Favourite List</h5>
               <div class="row">
                   <div class="col-md-6">
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Color</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="color" id="" required>
                                @if($user->color!=null)
                                <option selected value="{{$user->color}}">{{$user->color}}
                                </option>


                                @else
                                <option value="">Select...</option>
                                @endif <option value="Option 1">Option 1</option>

                                <option value="Option 2">Option 2</option>
                                <option value="Option 3">Option 3</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Books</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="book" id="" required>
                                @if($user->book!=null)
                                <option selected value="{{$user->book}}">{{$user->book}}
                                </option>

                                @foreach ($userSettingFields[36]->values as $value)
                                @if ($user->book != $value->title)
                                <option>{{ $value->title }}</option>
                                 @endif
                            @endforeach
                                @else
                                <option value="">Select...</option>
                                @foreach ($userSettingFields[36]->values as $value)
                                <option>{{ $value->title }}</option>
                            @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Movie</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="movie" id="" required>
                                @if($user->movie!=null)
                                <option selected value="{{$user->movie}}">{{$user->movie}}
                                </option>

                                @foreach ($userSettingFields[38]->values as $value)
                                @if ($user->movie != $value->title)
                                <option>{{ $value->title }}</option>
                                 @endif
                            @endforeach
                                @else
                                <option value="">Select...</option>
                                @foreach ($userSettingFields[38]->values as $value)
                                <option>{{ $value->title }}</option>
                            @endforeach
                                @endif


                            </select>
                        </div>
                    </div>
                   </div>
                   <div class="col-md-6">

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Location</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="location" id="" required>
                                @if($user->location!=null)
                                <option selected value="{{$user->location}}">{{$user->location}}
                                </option>
                                @else
                                <option>Select...</option>
                                @endif <option value="Option 1">Option 1</option>

                                <option value="Option 2">Option 2</option>
                                <option value="Option 3">Option 3</option>

                                <option value="Option 4">Option 4</option>
                                <option value="Option 5">Option 5</option>


                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Interests</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="interests" id="" required>
                                @if($user->interests!=null)
                                <option selected value="{{$user->interests}}">{{$user->interests}}
                                </option>
                                @foreach ($userSettingFields[39]->values as $value)
                                @if ($user->interests != $value->title)
                                <option>{{ $value->title }}</option>
                                 @endif
                            @endforeach
                                @else
                                <option value="">Select...</option>
                                @foreach ($userSettingFields[39]->values as $value)
                                <option>{{ $value->title }}</option>
                            @endforeach
                                @endif

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label
                            class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Hobby</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="hobby" id="" required>
                                @if($user->hobby!=null)
                                <option selected value="{{$user->hobby}}">{{$user->hobby}}
                                </option>
                                @else
                                <option>Select...</option>
                                @endif <option value="Option 1">Option 1</option>

                                <option value="Option 2">Option 2</option>
                                <option value="Option 3">Option 3</option>

                                <option value="Option 4">Option 4</option>
                                <option value="Option 5">Option 5</option>


                            </select>
                        </div>
                    </div>
                   </div>
               </div>


                <div class="form-group row">
                    <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Guardian
                        Mobile</label>
                    <div class="col-lg-9">
                        <input class="form-control" name="guardian_mobile" type="text"
                            value="{{$user->guardian_mobile}}" placeholder="Guardian Mobile..." required>
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Country</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="country" id="" required>
                            @if($user->country!=null)
                            <option selected value="{{$user->country}}">{{$user->country}}
                            </option>
                            @else
                            <option>Select...</option>
                            @endif <option value="Bangladesh">Bangladesh</option>
                            <option value="USA">USA</option>
                        </select>

                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Profile
                        Picture</label>
                    <div class="col-lg-9">
                        <input class="form-control" name="profile_img" type="file">
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rememberme" name="final_check" {{$user->final_check ? 'checked' : ''}}>
                            <label class="custom-control-label text-2" for="rememberme">Final Check (Approve)</label>
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="submit" value="Save" class="btn btn-primary btn-modern float-right"
                            data-loading-text="Loading...">
                    </div>
                </div>


            </form>

        </div>
    </div>

</div>




@endsection
