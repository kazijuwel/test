
  <section class="content">
    <div class="row">

     <div class="col-sm-12">

        <div class="box box-widget" style="border-radius: 0;margin-bottom: 0;">
          <div class="box-body" style="padding-bottom: 0;">

            <div class="row">
              <div class="col-sm-2">
                <a href="{{ url('/') }}">
             <img src="{{asset('img/logo_bn.jpg')}}" class="img-responsive" alt="Dhaka Metro News" style="">
          </a>
              </div>
              <div class="col-sm-10">

                {{-- top ad --}}
            @include('welcome.includes.adv.topAdd')
              </div>
            </div>


 
            {{-- top menubar --}}
            @include('welcome.includes.menubars.topMenubar')


            {{-- news scroll --}}
            @include('welcome.includes.others.newsScroll')
          </div>
        </div>



        @include('welcome.includes.others.update') 

        @include('welcome.includes.others.videoGalleryForGallery')        

        
      </div>
    </div>
  </section>

  
 
