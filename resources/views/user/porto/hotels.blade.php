@extends('user.porto.layouts.userLayoutMaster')
@push('css')
    <link rel="stylesheet" href="{{ asset('cp/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cp/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <style>
        #newBG {
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            background-color: gray;
            height: 100%;
            opacity: .8;
           
        }

    </style>
@endpush
@section('content')

    <div role="main" id="newBG" class="main"
        style="background-image: url('{{ asset('storage/hotel/hotel.jpg') }}');">
        <div class="container4 pt-3 py-3">
            <div class="row">
                <div class="row mb-5 pb-3">
                    @forelse ($hotels as $hotel)
                    <div class="col-md-3 col-lg-3 mb-5 mb-lg-0 appear-animation animated fadeInUpShorter          appear-animation-visible"
                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200"
                    style="animation-delay: 200ms;">
                    <div class="card flip-card text-center my-2 rounded-0">
                        <div class="flip-front p-5" style="background-color: #eaeaea;">
                            <div class="flip-content my-4">
                                <strong
                                    class="font-weight-extra-bold text-color-dark line-height-1 text-10 mb-3 d-inline-block">${{ $hotel->cost }}</strong>
                                <h4 class="font-weight-bold text-color-primary text-2">{{ mb_substr($hotel->title,0,20) }}</h4>
                                <p>{{ mb_substr($hotel->description,0,105) }}</p>
                            </div>
                        </div>
                        <div class="flip-back d-flex align-items-center p-5"
                            style="background-image: url({{ route('imagecache',['template'=>'cardi','filename'=>$hotel->image]) }}); background-size: cover; background-position: center;">
                            <div class="flip-content my-4" style="color: white; line-height: normal">
                                <h4 class="font-weight-bold text-color-light">{{ mb_substr($hotel->title,0,20) }}</h4>
                                <p class="font-weight-light text-color-light opacity-6">{{ mb_substr($hotel->description,0,105) }}</p>
                                <a href="{{ route('welcome.hotelDetails',['hotel'=>$hotel->id,'title'=>$hotel->title]) }}" class="btn btn-light btn-modern text-color-dark font-weight-bold">LEARN
                                    MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
                    @empty
                        
                    @endforelse
                </div>
            </div>
        </div>

    </div>
@endsection

@push('js')
    <!-- Select2 -->
    <script src="{{ asset('cp/plugins/select2/js/select2.full.min.js') }}"></script>

@endpush
