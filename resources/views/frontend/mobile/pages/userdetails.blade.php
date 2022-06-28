

<section class="padding-x p-2 bg-primary text-white ">
    <figure class="icontext align-items-center mr-4" style="max-width: 300px;">
        <!--image-->
        @if (Auth::user()->avatar_original != null)
            <img src="{{ uploaded_asset(Auth::user()->avatar_original) }}" class="icon icon-md rounded-circle">
        @else
            <img src="{{ static_asset('assets/img/avatar-place.png') }}" class="icon icon-md rounded-circle" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
        @endif


        <!--image-->
        <figcaption class="text">
            <!--user Name-->
            @if(Auth::user()->user_type == 'customer')
            <p class="h5 title">{{ Auth::user()->name }}</p>
            @else

            <p class="h5 title">{{ Auth::user()->name }}</p>
            @endif
            <!---active-->
            <p class=""><span class="bg-success pl-1 pr-1 rounded-pill">active</span></p>

            <!--end Acti-->
        </figcaption>
    </figure>
</section>
{{-- <div class="px-4 text-center mb-4">
    <span class="avatar avatar-md mb-3">
        @if (Auth::user()->avatar_original != null)
            <img src="{{ uploaded_asset(Auth::user()->avatar_original) }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
        @else
            <img src="{{ static_asset('assets/img/avatar-place.png') }}" class="image rounded-circle" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
        @endif
    </span>

    @if(Auth::user()->user_type == 'customer')
        <h4 class="h5 fw-600">{{ Auth::user()->name }}</h4>
    @else
        <h4 class="h5 fw-600">{{ Auth::user()->name }}
            <span class="ml-2">
                @if(Auth::user()->seller->verification_status == 1)
                    <i class="las la-check-circle" style="color:green"></i>
                @else
                    <i class="las la-times-circle" style="color:red"></i>
                @endif
            </span>
        </h4>
    @endif
</div> --}}