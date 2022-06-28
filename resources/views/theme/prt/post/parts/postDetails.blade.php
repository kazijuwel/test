<div class="container pt-2 pb-4">
    <div class="row pb-4 mb-2">
        <div class="col-md-9">
            <div class="overflow-hidden">
                <h1 class="text-color-dark font-weight-normal mb-0" style="font-size: 2.75rem; line-height: 3rem;">
                    {{custom_title(Str::ucfirst($post->excerpt),25)}}</h1>
            </div>
            <div class="mt-2">
                <dl>
                    <div>
                        <dd>
                            <span>
                                Update at: {{ $post->created_at->toDateString() }}
                            </span>
                        </dd>
                    </div>
                </dl>
            </div>
            <hr>
            <div class="mb-3">
                <img src="{{ route('imagecache', ['template' => 'cpxlg', 'filename' => $post->usliveFi()]) }}" width="100%"
                    alt="{{ $post->title }}">
            </div>
            
            <p style="pt-2"><i>{{custom_title(Str::ucfirst($post->excerpt),25)}}</i></p>

            @if ($post->type != 'news')
            <div class="w3-card w-75">
                <div class="w3-container w3-display-container">
                    <div class="w3-padding w3-display-topleft">
                        <div class="tag w3-deep-orange px-2">{{ucfirst($post->type)}}</p></div>
                    </div>
                  {{-- <p class="pl-2 pt-2 w3-text-blue" style="font-weight: bold;">{{ucfirst($post->type)}}</p> --}}
                  
                  <h3 class="pl-2 w3-text-indigo mt-5">{{ucfirst($post->title)}}</h3>
                  <hr>
                  <p><i class="fas fa-map-marker-alt"></i> {{ucfirst($post->place)}}</p>
                  <p><i class="fas fa-calendar-alt"></i> {{Carbon\Carbon::parse($post->event_started_at)->format('d-m-Y')}}</p>
                </div>
            </div>  
            @endif
            

            <div class="mt-3">
                <p style="margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;">{!!
                    $post->description !!}</p>
            </div>
        </div>
        <?php $posts = App \ Model \ Post::where('type', 'news')->latest()->paginate(6); ?>
        {{-- <div class="col-md-4">
            <div class="overflow-hidden">
                <h1 class="text-color-dark text-center font-weight-normal mb-0"
                    style="font-size: 2.75rem; line-height: 3rem;"> Top News</h1>
            </div>
            @foreach ($posts->paginate(5) as $post)


                <div class="attachment-block clearfix mb-0">
                    <a href="">
                        <img class="attachment-img"
                            src="{{ route('imagecache', ['template' => 'cpsm', 'filename' => $post->usliveFi()]) }}"
                            alt="{{ $post->title }}">
                    </a>
                    <div class="attachment-pushed">
                        <h4 class="attachment-heading" style="font-size: 14px;line-height: 1.3;">
                            <a href="">{{ $post->title }}</a>
                        </h4>
                        <p>{{ $post->excerpt }} <br> <a href="{{ route('welcome.postDetails', $post) }}">Details</a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div> --}}
        <div class="col-md-3 mt-5">
            <div class="w3-bar" style="margin-left: -8px;
            padding: 8px; background-color:#000052; color:#fff;">
                Top News
            </div>
            <div class="row">
                <div class="d-flex flex-column">
                    @foreach ($posts as $post)
                        <div class="d-flex flex-row m-2">
                            <div class="d-flex flex-column">
                                <img src="{{ route('imagecache', ['template' => 'ppmd', 'filename' => $post->usliveFi()]) }}"
                                    alt="">
                            </div>
                            <div class="d-flex flex-column">
                                <p class="p-1">{{custom_title(Str::ucfirst($post->excerpt),25)}} <br>
                                    <a href="{{ route('welcome.postDetails', $post) }}">Details</a>
                                </p>

                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <br>
    <?php $posts = App\Model\Post::where('type', 'event')
            ->latest()
            ->paginate(4); ?>
    <div class="row">
        <div class="w3-bar w3-blue" style="margin: 10px;
        padding: 15px;">
            Upcomming Events
        </div>
        
        @foreach ($posts as $post)
            <div class="col-md-3">
                <div class="w3-container p-0 w3-card">
                    <img class="card-img-top"
                        src="{{ route('imagecache', ['template' => 'crspsm', 'filename' => $post->usliveFi()]) }}"
                        alt="{{ $post->title }}">
                    <p class="w3-large card-body p-2" >{{ Str::ucfirst($post->title) }}
                        <br> <a href="{{ route('welcome.postDetails', $post) }}"
                            class="w3-small">Details</a>
                    </p>
                    {{-- <p>{!!  $post->description !!}</p> --}}

                </div>

            </div>
        @endforeach
    </div>
</div>
