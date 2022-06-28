<div class="container pt-2 pb-4" style="background: #f3f2f2;">
    <hr>
    <div class="row">
        <div class="col-md-9">
            @if ($posts->count())
                <div class="row">
                    @foreach ($posts->chunk(2) as $posts2)
                        @foreach ($posts2 as $post)
                            @if ($loop->first)
                                <div class="col-md-8">
                                    <div class="w3-container p-0 ">

                                        <div>
                                            <a href="{{ route('welcome.postDetails', $post) }}  ">
                                                <img class="card-img-top"
                                                    src="{{ route('imagecache', ['template' => 'crspsm', 'filename' => $post->usliveFi()]) }}"
                                                    alt="{{ $post->title }}">

                                            </a>
                                        </div>

                                        <div class="p-2 mt-n5" style="display: block;
                                        position: absolute;
                                        width: 95%;
                                        height: 60px;
                                        bottom: 0px;
                                        opacity: 0.8;
                                        background-color: rgba(0,0,0,.5);
                                        font-size: 22px;
                                        color: #fff;
                                        line-height: 2.5;">
                                            {{ $post->title }}
                                        </div>

                                    </div>
                                </div>
                            @else
                                <div class="col-md-4">
                                    <div class="w3-container p-0 w3-card">
                                        <img class="card-img-top"
                                            src="{{ route('imagecache', ['template' => 'crspsm', 'filename' => $post->usliveFi()]) }}"
                                            alt="{{ $post->title }}">
                                        <p class="w3-large card-body p-2">
                                            {{ custom_title($post->title, 25) }}
                                            @if ($post->type != 'news')
                                                <br>
                                                <small style="color: royalblue;">
                                                    <i class="fas fa-map-marker-alt"></i> {{$post->place}}
                                                </small>
                                                <br>
                                                <small style="color: royalblue;">
                                                    <i class="fas fa-calendar-alt"></i> {{Carbon\Carbon::parse($post->event_started_at)->format('d-m-Y')}}
                                                </small>
                                            @endif
                                            <br>
                                            <a href="{{ route('welcome.postDetails', $post) }}">Details</a>
                                        </p>


                                    </div>

                                </div>
                            @endif



                        @endforeach
                        @if ($loop->first)
                            @break
                        @endif
                    @endforeach
                </div>
            @endif
            <br>
            @if ($posts->count())
                @foreach ($posts->chunk(4) as $post3)
                    {{-- @if ($loop->first)
                        @continue
                    @else --}}
                    <br>
                    <div class="row">
                        @foreach ($post3 as $post)
                            <div class="col-md-3">
                                <div class="w3-container p-0 w3-card">
                                    <img class="card-img-top"
                                        src="{{ route('imagecache', ['template' => 'crspsm', 'filename' => $post->usliveFi()]) }}"
                                        alt="{{ $post->title }}">
                                    <p class="w3-large card-body p-2">{{ custom_title($post->title, 25) }}
                                        @if ($post->type != 'news')
                                                <br>
                                                <small style="color: royalblue;">
                                                    <i class="fas fa-map-marker-alt"></i> {{$post->place}}
                                                </small>
                                                <br>
                                                <small style="color: royalblue;">
                                                    <i class="fas fa-calendar-alt"></i> {{Carbon\Carbon::parse($post->event_started_at)->format('d-m-Y')}}
                                                </small>
                                            @endif
                                        <br> 
                                        <a href="{{ route('welcome.postDetails', $post) }}"
                                            class="w3-small">Details</a>
                                    </p>
                                    {{-- <p>{!!  $post->description !!}</p> --}}

                                </div>

                            </div>
                        @endforeach
                    </div>

                    {{-- @endif --}}
                @endforeach
            @endif
        </div>

        <div class="col-md-3">
            <div class="w3-bar" style="background-color: #000052!important;margin-left: -10px;
            padding: 11px; color:#fff;">
                Upcomming Events
            </div>
            <?php $posts = App\Model\Post::where('type', 'event')
            ->latest()
            ->paginate(4); ?>
            <div class="row">
                <div class="d-flex flex-column">
                    @foreach ($posts as $post)
                        <div class="d-flex flex-row m-2">
                            <div class="d-flex flex-column">
                                <img src="{{ route('imagecache', ['template' => 'ppmd', 'filename' => $post->usliveFi()]) }}"
                                    alt="">
                            </div>
                            <div class="d-flex flex-column">
                                <p class="p-1">{{ custom_title($post->excerpt, 25) }} <br>
                                    <a href="{{ route('welcome.postDetails', $post) }}">Details</a>
                                </p>

                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
            <br>
            <div class="w3-bar" style="background-color: #000052!important;margin-left: -10px;
            padding: 11px; color:#fff;">
                Upcomming Seminer
            </div>
            <?php $posts = App\Model\Post::where('type', 'seminer')
            ->latest()
            ->paginate(4); ?>
            <div class="row">
                <div class="d-flex flex-column">
                    @foreach ($posts as $post)
                        <div class="d-flex flex-row m-2">
                            <div class="d-flex flex-column">
                                <img src="{{ route('imagecache', ['template' => 'ppmd', 'filename' => $post->usliveFi()]) }}"
                                    alt="">
                            </div>
                            <div class="d-flex flex-column">
                                <p class="p-1">{{ custom_title($post->excerpt, 25) }} <br>
                                    <a href="{{ route('welcome.postDetails', $post) }}">Details</a>
                                </p>

                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>
    <div class="pull-right">
        {{ $posts->render() }}
    </div>
</div>
