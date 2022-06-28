@extends('frontend.mobile.layout.app')
@section('content')

<main class="app-content">


    <section class="padding-around m-3">
        <h3 class="text-center text-primary">Sitemap</h3>
        <hr>
        <div class="p-1">
           <i class="fas fa-link"></i> <a href="{{route('sitemap.products')}}">Products Sitemap</a>
        </div>
        <div class="p-1">
           <i class="fas fa-link"></i> <a href="{{route('sitemap.categories')}}">Categories SiteMap</a>
        </div>
        <div class="p-1">
           <i class="fas fa-link"></i> <a href="{{route('sitemap.pages')}}">Pages SiteMap</a>
        </div>
    </section>

</main>

@endsection
