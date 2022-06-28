@extends('theme.prt.layouts.prtMaster')

@section('title')
{{ $post->title }} | {{ env('APP_NAME') }}
@endsection
@section('meta')
@endsection

@push('css')

@endpush

@section('contents')
@include('alerts.alerts')
<section class="page-header page-header-modern bg-color-primary page-header-md">
    <div class="container">
        <div class="row">
            <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                <h1 class="">{{ Str::limit($post->title, 80, '...') }} </strong></h1>
            </div>
            <div class="col-md-4 order-1 order-md-2 align-self-center">
                <ul class="breadcrumb d-block text-md-right breadcrumb-light">
                    <li><a href="/">Home</a></li>
                    <li class=""><a href="{{ route('welcome.newsAll') }}">Event</a></li>
                    <li class="active">{{ Str::limit($post->title, 40, '...') }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="container">
        <div class="row">
            {{-- <div class="col-lg-3 order-lg-2">
                <aside class="sidebar"> 
                        <div class="tabs tabs-dark mb-4 pb-2"> 
                            <ul class="nav nav-tabs"> 
                                <li class="nav-item active">
                                    <a class="nav-link show text-1 font-weight-bold text-uppercase active" href="#popularPosts" data-toggle="tab">Popular</a>
                                </li> 
                                <li class="nav-item"><a class="nav-link text-1 font-weight-bold text-uppercase" href="#recentPosts" data-toggle="tab">Recent</a>
                                </li> 
                            </ul> 
                            <div class="tab-content"> 
                                <div class="tab-pane active" id="popularPosts"> 
                                    <ul class="simple-post-list"> 
                                        @foreach ($popularEvent as $popitem)
                                        
                                        <li> 
                                            <div class="post-image"> 
                                                <div class="img-thumbnail img-thumbnail-no-borders d-block"> 
                                                    <a href="{{ route('welcome.news', [$popitem->id, Str::slug($popitem->title) ]) }}"> 
                                                        <img src="{{ asset($popitem->fi()) }}" width="50" height="50" alt=""> 
                                                    </a> 
                                                </div> 
                                            </div> 
                                            <div class="post-info"> <a href="{{ route('welcome.news', [$popitem->id, Str::slug($popitem->title) ]) }}">{{ Str::limit($popitem->title, 40, '...') }}</a> 
                                                <div class="post-meta"> {{ now()->parse($popitem->created_at)->format('D d-M-Y') }} 
                                                </div> 
                                            </div> 
                                        </li> 
                                        @endforeach
                                    </ul> 
                                </div> 
                                <div class="tab-pane" id="recentPosts">
                                    <ul class="simple-post-list"> 
                                        
                                        @foreach ($latestNews as $letitem)
                                        
                                        <li> 
                                            <div class="post-image"> 
                                                <div class="img-thumbnail img-thumbnail-no-borders d-block"> 
                                                    <a href="{{ route('welcome.news', [$letitem->id, Str::slug($letitem->title) ]) }}"> 
                                                        <img src="{{ asset($letitem->fi()) }}" width="50" height="50" alt=""> 
                                                    </a> 
                                                </div> 
                                            </div> 
                                            <div class="post-info"> 
                                                <a href="{{ route('welcome.news', [$letitem->id, Str::slug($letitem->title) ]) }}">{{ Str::limit($letitem->title, 40, '...') }}</a> 
                                                <div class="post-meta"> {{ now()->parse($letitem->created_at)->format('D d-M-Y') }} 
                                                </div> 
                                            </div> 
                                        </li>
                                        @endforeach  
                                    </ul> 
                                </div> 
                            </div> 
                        </div> 
                        <h5 class="font-weight-bold pt-4">About Us</h5> 
                        <p class="text-justify">Research Council of Health London is an independent, specialist awarding organisation based in London, United Kingdom, which pioneers the most innovative qualifications in the healthcare industry. We design, develop, deliver and award qualifications for health professionals. <br>
                            We offer high-quality education, innovative instruction and support, which promotes student achievement, academic excellence in the area of Medical Sciences. </p> 
                    </aside>
            </div> --}}
            <div class="col-lg-12 order-lg-1">
                
                <div class="blog-posts single-post">
                    <article class="post post-large blog-single-post border-0 m-0 p-0">
                        <div class="post-image ml-0">
                            <a href="">
                                <img src="{{ asset($post->fi()) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0 w-100" alt="">
                            </a>
                        </div>
                        <div class="post-date ml-0">
                            <span class="day">{{ now()->parse($post->created_at)->format('d') }}</span>
                            <span class="month">{{ now()->parse($post->created_at)->format('M') }}</span>
                        </div>
                        <div class="post-content ml-0">
                            <h2 class="font-weight-bold"><a href="">{{ $post->title }}</a></h2>
                            <div class="post-meta">
                                <span><i class="far fa-user"></i> By <a href="/">{{ env('APP_NAME') }}</a> </span>
                                {{-- <span><i class="far fa-folder"></i> <a href="#">Lifestyle</a>, <a href="#">Design</a> </span>
                                <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span> --}}
                            </div>
                            <p class="text-justify">{!! $post->description !!} </p>
                            {{-- <div class="post-block mt-5 post-share">
                                <h4 class="mb-3">Share this Post</h4>
                                
                                <div class="addthis_toolbox addthis_default_style ">
                                    <a class="addthis_button_facebook_like at300b" fb:like:layout="button_count"><div class="fb-like fb_iframe_widget" data-layout="button_count" data-show_faces="false" data-share="false" data-action="like" data-width="90" data-height="25" data-font="arial" data-href="https://www.okler.net/previews/porto/8.0.0/blog-post.html" data-send="false" style="height: 25px;" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=172525162793917&amp;container_width=0&amp;font=arial&amp;height=25&amp;href=https%3A%2F%2Fwww.okler.net%2Fpreviews%2Fporto%2F8.0.0%2Fblog-post.html&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;share=false&amp;show_faces=false&amp;width=90"><span style="vertical-align: bottom; width: 90px; height: 28px;"><iframe name="f37d0aa6c0046b8" width="90px" height="25px" data-testid="fb:like Facebook Social Plugin" title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v2.6/plugins/like.php?action=like&amp;app_id=172525162793917&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df2881913bbb3c3%26domain%3Dwww.okler.net%26origin%3Dhttps%253A%252F%252Fwww.okler.net%252Ff295118e99826e4%26relation%3Dparent.parent&amp;container_width=0&amp;font=arial&amp;height=25&amp;href=https%3A%2F%2Fwww.okler.net%2Fpreviews%2Fporto%2F8.0.0%2Fblog-post.html&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;share=false&amp;show_faces=false&amp;width=90" style="border: none; visibility: visible; width: 90px; height: 28px;" class=""></iframe></span></div></a>
                                    <a class="addthis_button_tweet at300b"><div class="tweet_iframe_widget" style="width: 62px; height: 25px;"><span><iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" class="twitter-share-button twitter-share-button-rendered twitter-tweet-button" style="position: static; visibility: visible; width: 60px; height: 20px;" title="Twitter Tweet Button" src="https://platform.twitter.com/widgets/tweet_button.6e189c4f2b6d88c453045806323cdcf3.en.html#dnt=false&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=https%3A%2F%2Fwww.okler.net%2Fpreviews%2Fporto%2F8.0.0%2Fblog-post.html&amp;size=m&amp;text=Post%20Full%20Width%20%7C%20Porto%20-%20Responsive%20HTML5%20Template%3A&amp;time=1613639205575&amp;type=share&amp;url=https%3A%2F%2Fwww.okler.net%2Fpreviews%2Fporto%2F8.0.0%2Fblog-post.html%23.YC4uJVy1q2I.twitter" data-url="https://www.okler.net/previews/porto/8.0.0/blog-post.html#.YC4uJVy1q2I.twitter"></iframe></span></div></a>
                                    <a class="addthis_button_pinterest_pinit at300b"></a>
                                    <a class="addthis_counter addthis_pill_style" href="#" style="display: inline-block;"><a class="atc_s addthis_button_compact">Share<span></span></a><a class="addthis_button_expanded" target="_blank" title="More" href="#"></a></a>
                                    <div class="atclear"></div></div>
                                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>
                                    
                                </div>
                                <div class="post-block mt-4 pt-2 post-author">
                                    <h4 class="mb-3">Author</h4>
                                    <div class="img-thumbnail img-thumbnail-no-borders d-block pb-3">
                                        <a href="blog-post.html">
                                            <img src="img/avatars/avatar.jpg" alt="">
                                        </a>
                                    </div>
                                    <p><strong class="name"><a href="#" class="text-4 pb-2 pt-2 d-block">John Doe</a></strong></p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui. </p>
                                </div>
                                <div id="comments" class="post-block mt-5 post-comments">
                                    <h4 class="mb-3">Comments (3)</h4>
                                    <ul class="comments">
                                        <li>
                                            <div class="comment">
                                                <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                                    <img class="avatar" alt="" src="img/avatars/avatar-2.jpg">
                                                </div>
                                                <div class="comment-block">
                                                    <div class="comment-arrow"></div>
                                                    <span class="comment-by">
                                                        <strong>John Doe</strong>
                                                        <span class="float-right">
                                                            <span> <a href="#"><i class="fas fa-reply"></i> Reply</a></span>
                                                        </span>
                                                    </span>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui.</p>
                                                    <span class="date float-right">January 12, 2020 at 1:38 pm</span>
                                                </div>
                                            </div>
                                            <ul class="comments reply">
                                                <li>
                                                    <div class="comment">
                                                        <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                                            <img class="avatar" alt="" src="img/avatars/avatar-3.jpg">
                                                        </div>
                                                        <div class="comment-block">
                                                            <div class="comment-arrow"></div>
                                                            <span class="comment-by">
                                                                <strong>John Doe</strong>
                                                                <span class="float-right">
                                                                    <span> <a href="#"><i class="fas fa-reply"></i> Reply</a></span>
                                                                </span>
                                                            </span>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
                                                            <span class="date float-right">January 12, 2020 at 1:38 pm</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="comment">
                                                        <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                                            <img class="avatar" alt="" src="img/avatars/avatar-4.jpg">
                                                        </div>
                                                        <div class="comment-block">
                                                            <div class="comment-arrow"></div>
                                                            <span class="comment-by">
                                                                <strong>John Doe</strong>
                                                                <span class="float-right">
                                                                    <span> <a href="#"><i class="fas fa-reply"></i> Reply</a></span>
                                                                </span>
                                                            </span>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
                                                            <span class="date float-right">January 12, 2020 at 1:38 pm</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="comment">
                                                <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                                    <img class="avatar" alt="" src="img/avatars/avatar.jpg">
                                                </div>
                                                <div class="comment-block">
                                                    <div class="comment-arrow"></div>
                                                    <span class="comment-by">
                                                        <strong>John Doe</strong>
                                                        <span class="float-right">
                                                            <span> <a href="#"><i class="fas fa-reply"></i> Reply</a></span>
                                                        </span>
                                                    </span>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    <span class="date float-right">January 12, 2020 at 1:38 pm</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="comment">
                                                <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                                    <img class="avatar" alt="" src="img/avatars/avatar.jpg">
                                                </div>
                                                <div class="comment-block">
                                                    <div class="comment-arrow"></div>
                                                    <span class="comment-by">
                                                        <strong>John Doe</strong>
                                                        <span class="float-right">
                                                            <span> <a href="#"><i class="fas fa-reply"></i> Reply</a></span>
                                                        </span>
                                                    </span>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                    <span class="date float-right">January 12, 2020 at 1:38 pm</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-block mt-5 post-leave-comment">
                                    <h4 class="mb-3">Leave a comment</h4>
                                    <form class="contact-form p-4 rounded bg-color-grey" action="php/contact-form.php" method="POST">
                                        <div class="p-2">
                                            <div class="form-row">
                                                <div class="form-group col-lg-6">
                                                    <label class="required font-weight-bold text-dark">Full Name</label>
                                                    <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" required="">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label class="required font-weight-bold text-dark">Email Address</label>
                                                    <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" required="">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="required font-weight-bold text-dark">Comment</label>
                                                    <textarea maxlength="5000" data-msg-required="Please enter your message." rows="8" class="form-control" name="message" required=""></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col mb-0">
                                                    <input type="submit" value="Post Comment" class="btn btn-primary btn-modern" data-loading-text="Loading...">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    
    @push('js')
    @endpush