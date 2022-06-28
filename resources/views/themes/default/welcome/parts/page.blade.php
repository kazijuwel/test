<div class="main main-raiseds">
    <div class="section section-basic m-1">
        <div class="container">

            @if($page->left_sidebar)
            <div class="row">
                <div class="col-sm-12">
                    <div class="box box-widget mb-3">
                        <div class="box-body box-body-container" style="background: #f8f8f8;">
                            <div class="row">
                                <div class="col-sm-12">
                                    @if (!$page->title_hide)
                                    <h1 class="w3-xlarge p-3 w3-text-red">{{ $page->page_title }}</h1>
                                    @endif
                                    @foreach($page->activeItems() as $item)
                                    <div class="box box-widget mb-0">
                                        <div class="box-body p-4">
                                            {{-- <div class="py-2">
                                                <strong>{{$item->title}}</strong>
                                            </div> --}}


                                            {!! $item->content !!}

                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- overlay here --}}
                        <!-- Loading (remove the following to stop the loading)-->
                        <div class="overlay my-loading-overlay" style="display: none;">
                            <i class="fa fa-circle-o-notch w3-jumbo w3-text-red fa-spin" style="top: 20%;"></i>
                        </div>
                        <!-- end loading -->
                    </div>

                </div>
            </div>

            @else

            <div class="row" style="margin-top: -50px;">
                <div class="col-sm-12">
                    @if (!$page->title_hide)
                    <h1 class="w3-xlarge">{{ $page->page_title }}</h1>
                    @endif
                    @foreach($page->activeItems() as $item)
                    {!! $item->content !!}
                    @endforeach
                </div>
            </div>

            @endif

            {{-- <div align="center">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article"
                    data-ad-format="fluid" data-ad-client="ca-pub-3322244656717684" data-ad-slot="2385267914"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div> --}}
        </div>
    </div>
</div>
