<!--<section class="mt-auto pb-1 pt-2" style="background: #FD6500; margin:0px 0px 5px 0px;">-->
<!--    <div class="container-fluid">-->
<!--        <div class="row no-gutters d-flex justify-content-beween align-items-center">-->



<!--                <div class="col-7">-->
<!--                <div >-->
<!--                    <span style="font-size: 15px; color: white;"> সাইন আপ করলেই পাচ্ছেন ১০০ টাকার কুপন কোড</span>-->
<!--                    <br>-->

<!--                </div>-->
<!--                </div>-->

<!--<div class="col-5">-->
<!--                <a href="{{ route('user.registration') }}" class=" py-2 btn btn-primary d-block m-1" style="color:white; width:90%; " ><i-->
<!--                                                    class="fas fa-sign-in-alt"></i> {{ translate('Sign Up ') }}</a>-->







<!--        </div>-->
<!--</div>-->
<!--    </div>-->
<!--</section>-->
<section>
    <div class="row px-1" style="background-color:white;">
        <div class="col-6">

            @if (get_setting('widget_one_labels') != null)
                @foreach (json_decode(get_setting('widget_one_labels'), true) as $key => $value)
        @if ($key == 4)
        </div>
        <div class="col-6">
            @endif


            <a href="{{ json_decode(get_setting('widget_one_links'), true)[$key] }}">

                <div class="find_item">
                    <p>
                        <span class="pl-1">
                            {{ $value }}
                        </span>
                        <span class="float-right">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </span>
                     </p>

                </div>
            </a>
            @endforeach
            <a href="{{ route('sitemapPage') }}">
            <div class="find_item">
                <p>
                    <span class="pl-1">
                       Sitemap
                    </span>
                    <span class="float-right">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </span>
                 </p>

            </div>
            </a>
        </div>
        @endif

        {{-- <a href="">

            <div class="find_item">
                <p>
                    <span class="pl-1">
                       Sitemap
                    </span>
                    <span class="float-right">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </span>
                 </p>

            </div>
        </a> --}}


    </div>
    </div>
</section>
<section style="margin-bottom:80px; background-color:white;">
    <hr>
    <div class="row">
        <div class="footer-image-sf text-center">
            @if (get_setting('payment_method_images') != null)
                @foreach (explode(',', get_setting('payment_method_images')) as $key => $value)
                    <img class="img-fit" src="{{ uploaded_asset($value) }}" style="width:80%">
                @endforeach
            @endif
            <p class="text-center text-secondary">Copyright demo © 2020 Bela obela</p>
        </div>
        <hr>


    </div>

</section>







{{-- <a href="https://belaobela.com.bd/how-To-be-a-Seller">
    <div class="find_item">
        <p style="color:black; text-align:center; background-color: #F2F2F2">How To be a Seller <span class="float-right"><i  aria-hidden="true"></i></span></p>
    </div>
</a> --}}
