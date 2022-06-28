@extends('theme.prt.layouts.prtMaster')

@section('title')
    {{ env('APP_NAME_BIG') }}
@endsection
@section('meta')
@endsection

@section('contents')


<section class="page-header page-header-modern page-header-background page-header-background-md py-0 overlay overlay-color-primary overlay-show overlay-op-2" style="background-image: url({{asset('storage/destination/'.$destination->image)}});">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 order-2 order-sm-1 align-self-center p-static">
                
                <div class="overflow-hidden pb-2">
                    <h1 class="text-10 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300"><strong>{{ucfirst(custom_name($destination->title,20))}}</strong></h1>
                </div>
                <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                    <span class="sub-title text-4 mt-4">{!!$destination->description!!}</span>
                </div>
                <div class="appear-animation d-inline-block" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                    <a href="#" class="btn btn-modern btn-dark mt-4">Buy Now <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
                <div class="appear-animation d-inline-block" data-appear-animation="rotateInUpRight" data-appear-animation-delay="500">
                    <span class="arrow hlt" style="top: 40px;"></span>
                </div>
            </div>
            <div class="col-sm-7 order-1 order-sm-2 align-items-end justify-content-end d-flex pt-5">
                <div style="min-height: 350px;" class="overflow-hidden">
                    <img  alt="" src="img/custom-header.png" class="img-fluid appear-animation" data-appear-animation="slideInUp" data-appear-animation-delay="600" data-appear-animation-duration="1s">
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">

    <div class="row">
        <div class="col py-4">
            <p class="lead">{!!ucfirst($destination->description)!!}</p>
        </div>
    </div>

</div>

<div class="container py-2">
    <h3 class="mt-4 mb-3" style="letter-spacing: 1.5px;"><b> Destinations You Will Like
    </b></h3>
    {{-- <br> --}}
    <div class="row">
        @foreach ($destinations as $destination)
        <div class="col-sm-4 mt-3 mb-2 mb-md-0">
            <div class="w3-card w3-round w3-border w3-border-blue w3-hover-shadow">
                <div class="card-body p-0 m-0">
                   <div class="row">
                    
                        <img class="col-sm-6" src="{{ route('imagecache',['template'=>'cpmd','filename'=>$destination->image]) }}" alt="sans"/>

                        <div class="col-sm-6 mt-3">
                            <a href="{{route('welcome.destinationDetails',['destination'=>$destination, 'title'=>$destination->title])}}">{{ucfirst($destination->title)}}</a>
                            <p>{{ucfirst($destination->country)}}</p>
                        </div>
                   </div>
                </div>
            </div>
        </div> 
        @endforeach
    </div>
</div>


@endsection
