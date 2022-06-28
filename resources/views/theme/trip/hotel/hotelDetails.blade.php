@extends('theme.prt.layouts.prtMaster')

@section('title')
    {{ env('APP_NAME_BIG') }}
@endsection
@section('meta')
@endsection

@push('css')

@endpush

@section('contents')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header w3-blue w3-center">
                        <h3 class="card-title w3-text-white">{{ucfirst($hotel->title)}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="w3-border" src="{{ route('imagecache',['template'=>'cplg','filename'=>$hotel->image]) }}" width="100%" alt="">
                            </div>
                            <div class="col-md-6">
                                <h5>Cost for {{ucfirst($hotel->title)}} $ <span class="badge badge-primary">{{$hotel->cost}}</span></h5>
                                <p>{!!ucfirst($hotel->description)!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-2">
        <h3 class="mt-4 mb-3" style="letter-spacing: 1.5px;"><b>Explore More Hotels
        </b></h3>
        <br>
        <div class="row">
            @foreach ($hotels as $hotel)
            <div class="col-lg-3 mt-3">
                <a href="{{route('welcome.hotelDetails',['hotel'=>$hotel,'title'=>$hotel->title])}}">
                    <div class="w3-card">
                        <div class="card-header p-0">
                            <div class="thumb-info thumb-info-hide-wrapper-bg">
                                <div class="thumb-info-wrapper">
                                    
                                    <img src="{{ route('imagecache',['template'=>'cplg','filename'=>$hotel->image]) }}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pl-2 pt-0 pr-2 pb-0">
                            <p class="card-title m-0 mt-2 w3-text-black">{{ucfirst($hotel->title)}}</p>
                            <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i class="fa fa-map-marker-alt"></i> {{ucfirst($hotel->city)}}, {{ucfirst($hotel->country)}}</small></h6>
                            <p class="pt-1 pb-0 m-0 w3-text-blue" style="font-size: 16px;"><b>Cost starting from ${{$hotel->cost}}/night</b></p>
                        </div>
                    </div>
                </a>
            </div> 
        @endforeach
        </div>
    </div>

@endsection