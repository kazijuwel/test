@extends('theme.prt.layouts.prtMaster')

@section('title')
{{ env('APP_NAME_BIG') }}
@endsection
@section('meta')
@endsection

@push('css')

@endpush

@section('contents')
<div class="container mt-3">
    <div class="row">
        
        <div class="col">
            <div class="card">
                <div class="card-header w3-center ">
                    <h3 class="card-title w3-text-deep-orange">AMC Gallaries</h3>
                </div>
                <div class="card-body">

                    
                    <div class="row">
                        @foreach ($gallaries as $photo)
                    <div class="col-lg-4">
                        <div class="w3-border w3-border-deep-orange w3-round">
                            <img src="{{ route('imagecache',['template'=>'cpxs','filename'=>$photo->image_name]) }}" class="p-1 img-fluid" alt="" style="height: 190px;">
                        </div>
                        <h6 class="w3-center mt-1">{{ ucfirst($photo->image_title) }}</h5>

                    </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
@endpush



