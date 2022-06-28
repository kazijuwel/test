@extends('frontend.layouts.app')
@section('content')
<section class="pt-5 mb-4">
    <div class="container">
        <h3 class="text-center text-primary">Sitemap</h3>
        <hr>
        <div class="p-1">
            <i class="fa-solid fa-link"></i> <a href="{{route('sitemap.products')}}">Products Sitemap</a>
        </div>
        <div class="p-1">
            <i class="fa-solid fa-link"></i> <a href="{{route('sitemap.categories')}}">Categories SiteMap</a>
        </div>
        <div class="p-1">
            <i class="fa-solid fa-link"></i> <a href="{{route('sitemap.pages')}}">Pages SiteMap</a>
        </div>
        {{-- <ul>
            <li><a href="{{route('sitemap.products')}}">Products Sitemap</a></li>
            <li><a href="{{route('sitemap.categories')}}">Categories SiteMap</a></li>
            <li><a href="{{route('sitemap.pages')}}">Pages SiteMap</a></li>
        </ul> --}}
    </div>
</section>
@endsection
