<div class="col-md-4 col-sm-6 p-2 mt-3">
    <article class="post post-medium border-0 rounded h-100 w3-hover-shadow-">
        {{-- <div class="post-image">
            <a href="{{ route('welcome.event', [$eventcard->id, Str::slug($eventcard->title) ]) }}">
                <img src="{{ asset($eventcard->fi()) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="">
            </a>
        </div> --}}
        <div class="post-content">
            <a href="{{ route('welcome.event', [$eventcard->id, Str::slug($eventcard->title) ]) }}">
            <div class="h2 font-weight-semibold text-5 line-height-6 mt-3 mb-2" style="padding: 30px 10px; background-color: #eaff; color: #212529; @if(isset($loop->iteration) && $loop->iteration == 1) border-radius: 20px 5px 5px 5px; @else border-radius: 5px 5px 5px 5px; @endif">{{ Str::limit($eventcard->title, 40, '...') }}</div>
            {{-- <p>{!! Str::limit($eventcard->description, 200, '...') !!}</p> --}}
            </a>
            <div class="post-meta px-2">
                <span><i class="fas fa-calendar-alt"></i> {{ $eventcard->event_started_at ? now()->parse($eventcard->event_started_at)->format('D d-M-Y') : '' }} </span>
                {{-- <span><i class="far fa-user"></i> By <a href="#">John Doe</a> </span>
                <span><i class="far fa-folder"></i> <a href="#">Events</a>, <a href="#">Design</a> </span>
                <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span> --}}
                <a href="{{ route('welcome.event', [$eventcard->id, Str::slug($eventcard->title) ]) }}" class="btn btn-outline btn-rounded btn-quaternary float-right btn-with-arrow mb-2">Read More <span><i class="fas fa-chevron-right"></i></span></a>
            </div>
        </div>
    </article>
</div>