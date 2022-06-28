<style>
  .footer-bottom-bg-custom
{
    /*background: #003366 !important;*/
    /* background: #000033 !important; */
    /* background: #28abdf !important; */
    background: #28276d !important;
    /* background: #04252b !important; */


    color: #fff;
}

.footer-middle-bg-custom
{
    height: 6px;
    background: #234f98 !important;

}

.footer-top-bg-custom
{
    /*background: #001a33 !important;*/
    /* background: #000052 !important; */
    background: #0059ad !important;;

    /* background: #074351 !important; */

    color: #fff;
}

</style>
<div class="divider divider-style-4 pattern pattern-1 taller">
    <i class="fas fa-chevron-down w3-hover-shadow"></i>
</div>
<footer id="footer" class="bg-color-primary- footer-top-bg-custom border-top-0 " >
    <div class="container py-4">
       <div class="row">
           <div class="col-md-3 col-sm-6">
               <div class="py-1">
                @if(isset($websiteParameter->logo_alt))
                <p class="text-white"><img class="" alt="{{env('APP_NAME_BIG')}}" width="80" src="{{asset('storage/logo/'. $websiteParameter->logo_alt)}}"></p> 
                @else
                <p class="text-white">{{env('APP_NAME_BIG')}}</p> 
                @endif
               </div>   
               <div class="py-1">
                   <i class="fab fa-whatsapp text-4 p-relative text-white"></i>
                   <a class="text-white pl-2" href="tel:{{ $websiteParameter->contact_mobile ?? '' }}">{!! $websiteParameter->contact_mobile ?? '' !!}</a> 
               </div>
               <div class="py-1">
                <i class="far fa-envelope text-4 p-relative text-white"></i>
                <a class="text-white pl-2" href="mailto:{{ $websiteParameter->contact_email ?? '' }}">{!! $websiteParameter->contact_email ?? '' !!}</a>
            </div>

            <div class="py-1">
                <i class="fas fa-map-marker-alt text-4 p-relative text-white"></i>
                <span class="text-4 p-relative text-white">
                    {!! $websiteParameter->footer_address ?? '' !!}
                </span>
                 
            </div>

        </div>

        <div class="col-md-6 col-sm-6">
           <h4 class="text-white">Our Policies</h4>
           <div class="row">
            @if (isset($footerMenuPages))
            @php
                if($footerMenuPages->count() > 12){
                    $chnk = $footerMenuPages->count()/3;
                }else{
                    $chnk = 6;
                }
            @endphp
            @foreach ($footerMenuPages->chunk(6) as $footerMenuPagesChunk)
            <div class="@if($chnk == 6)col-md-6 @else col-md-4 @endif">
                <ul class="list list-icons list-icons-sm mb-0 text-white">
                    @foreach ($footerMenuPagesChunk as $page)
                    <li>
                        <i class="fas fa-angle-right top-8 text-white"></i> 
                        <a class="link-hover-style-1 text-white" href="{{ route('welcome.page', [$page->id,$page->route_name] ) }}">{{ $page->page_title }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
            @endif
             
           </div>

       </div>

       <div class="col-md-3 col-sm-6">
           <h4 class="text-white text-center">Follow Us</h4>

           <div class="pl-lg-5">

            <p class="text-6 text-center text-white">Social Media</p>

            <div class="text-center">
            <a class="text-white px-3" href="{{ $websiteParameter->fb_page_link ?? '' }}"><i class="fab fa-facebook text-5"></i></a>
            <a class="text-white px-3" href="{{ $websiteParameter->twitter_url ?? '' }}"><i class="fab fa-twitter text-5"></i></a>
            <a class="text-white px-3" href="{{ $websiteParameter->linkedin_url ?? '' }}"><i class="fab fa-linkedin-in text-5"></i></a>
            <br> <br>
            <div class="d-none d-sm-block">
                
            {{-- <img width="160" class="rounded" src="{{asset('img/mln.jpg')}}" alt="{{env('APP_NAME_BIG')}}"> --}}
            </div>
            
            </div>
            
            <div>
                <div class="fixed-bottom- w3-hover-shadow text-center">
                    {{-- <a class="btn w3-white w3-large" href="/pages/10"> <b>Become a member</b></a> --}}
                </div>
            </div>
 
           </div>

       </div>


   </div>
</div>

<div class="footer-middle-bg-custom">
    
</div>

<div class="footer-copyright bg-color-primary- footer-bottom-bg-custom bg-color-scale-overlay bg-color-scale-overlay-2"
>
    <div class="bg-color-scale-overlay-wrapper">
        <div class="container py-2">

            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">

                        <p class="text-white">

                            © Copyright {{date('Y')}} | {{$_SERVER['SERVER_NAME']}} | Site by <a class="text-white" href="{{url('https://a2sys.co')}}" title="Multisoft">a2sys.co</a>
                            <div class="d-none">
                                © Copyright {{date('Y')}} | {{env('APP_NAME_BIG')}} | Site by <a class="text-white" href="{{url('https://a2sys.co')}}" title="#a2sys">a2sys</a>
                            </div>

                            {{-- <br> --}}

                            {{-- <img width="160" class="rounded" src="{{asset('img/pay.png')}}" alt="Pay"> --}}

                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</footer>