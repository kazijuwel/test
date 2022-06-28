@extends('user.porto.layouts.userLayoutMaster')

@push('css')
    <style>
        .blog-posts:not(.blog-posts-no-margins) article {
            border-bottom: 0px !important;
            margin-bottom: 50px;
            padding-bottom: 0px !important;
        }

        a.sticky {
            outline: none;
            text-decoration: none !important;
            color: black !important;
            font-weight: 600 !important;
            transition: .2s;
            border-bottom: 2px solid transparent;
        }

        a.sticky:hover {
            text-decoration: none !important;
            color: #fda300 !important;
            border-bottom: 2px solid #fda300;
            /* border-bottom-width: medium; */
            margin-bottom: 14px;
        }

        p.card2 {
            line-height: 2 !important;
            /* color: #000; */
        }

        .call-btn {
            height: 25px;
            width: 25px;
            border-radius: 50%;
            background-color: orange;
        }

        .container2 {
            width: 1100px !important;
            margin: 0 auto;
        }

    </style>
@endpush

@section('content')
    <div class="main mb-5" role="main">
        <div class="row container2 pt-3 d-flex justify-content-center" >

            @foreach($page->items as $item)
            
            {!! $item->content !!}
            @endforeach
     
        </div>
    </div>
@endsection
