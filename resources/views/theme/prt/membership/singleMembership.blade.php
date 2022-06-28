@extends('theme.prt.layouts.prtMaster')

@section('title')
ALL @if(isset($mode)) {{strtoupper(Str::plural($mode))}} @else Memberships @endif | {{ env('APP_NAME_BIG') }}
@endsection
@section('meta')
@endsection

@push('css')

@endpush

@section('contents')

 <section class="p-0 m-0" style="min-height: 300px;background: #ddd;">

    <div class="container">

        <div class="container appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="300">
            <div class="course-caption">
               <div class="row">
                   <div class="col-sm-12">
                       <div class="w3-card rounded">

                       <div class="card card-default">
                           <div class="card-body">
                                 <div class="row">
                                     <div class="col-sm-7">

                                       <img src="{{ asset($membership->fi()) }}" class="img-fluid rounded w-100" alt="img">

                                       <h1 class="  font-weight-bold text-6"  >{{$membership->title}}</h1>

                                 <p style="white-space: pre-line; text-align: justify;">{!! $membership->description !!}</p>

                                     </div>
                                     <div class="col-sm-5">



                     <div class="w3-border w3-container w3-border-light-gray rounded">


                                           <h3 class="text-primary">Membership Key Points</h3>


                   <p class="">
                       <b>Membership Duration:</b> <span class="badge badge-primary">{{ $membership->duration }} Days</span> <br>
                       <b>Subscription Fees:</b> {{$membership->amount}} <br>

                   </p>
                   @auth

                   <div class="text-center mb-3">


       {{-- <a class="btn btn-lg  w3-deep-orange btn-block w3-hover-shadow" href="{{ route('user.checkoutMembership', [$membership->id ]) }}">Take this Membership</a> --}}
       <a class="btn btn-lg  w3-deep-orange btn-block w3-hover-shadow" href="{{ route('welcome.applyNow') }}">Take this Membership</a>

                               @else

                               <div class="text-center mb-3">

                               <a class="btn btn-lg  w3-deep-orange btn-block w3-hover-shadow" href="{{ route('welcome.applyNow') }}">Apply for this Membership</a>
                               </div>

                               @endauth

                     </div>



                                     </div>
                                 </div>


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
@endpush
