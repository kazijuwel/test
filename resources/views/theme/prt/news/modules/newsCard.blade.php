<div class="col-md-4 col-sm-6 p-1 mt-3">
    <article class="post post-medium border-0 p-2 rounded h-100 w3-hover-shadow">
        <div class="post-image">
            <a href="{{ route('welcome.news', [$newscard->id, Str::slug($newscard->title) ]) }}">
                <img src="{{ asset($newscard->fi()) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="">
            </a>
        </div>
        <div class="post-content">
            <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="{{ route('welcome.news', [$newscard->id, Str::slug($newscard->title) ]) }}">{{ Str::limit($newscard->title, 40, '...') }}</a></h2>
            <p>{!! Str::limit($newscard->description, 200, '...') !!}</p>
            <div class="post-meta">
                {{-- <span><i class="fas fa-calendar-alt"></i> {{ now()->parse($newscard->created_at)->format('D d-M-Y h:m A') }} </span> --}}
                {{-- <span><i class="far fa-user"></i> By <a href="#">John Doe</a> </span>
                <span><i class="far fa-folder"></i> <a href="#">News</a>, <a href="#">Design</a> </span>
                <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span> --}}
                <span class="d-block mt-2"><a href="{{ route('welcome.news', [$newscard->id, Str::slug($newscard->title) ]) }}" class="btn btn-xs btn-light text-1 text-uppercase w3-hover-blue">Read More</a></span>
            </div>
        </div>
    </article>
</div>