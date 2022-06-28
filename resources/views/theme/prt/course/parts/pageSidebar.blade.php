        @php
            $slogans = ['Lorem ipsum sit catelong Mollitia quidem provident', 'Perferendis, dignissimos? Mollitia quidem provident dolores architecto, modi voluptas quas, debitis reprehenderit. Odit.
', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.', 'totam aut sequi rerum aspernatur doloremque! olor sit amet '];

        $colors = ['w3-green', 'w3-deep-orange', 'w3-indigo', 'w3-yellow', 'w3-blue', 'w3-red', 'w3-dark-grey', 'w3-brown', 'w3-amber', 'w3-orange'];

        $sloganKey = array_rand($slogans,1);
        $colorKey = array_rand($colors,1);
        @endphp
<div class="card mt-3 shadow w3-hover-white {{ $colors[$colorKey] }}" data-appear-animation="fadeInUp" data-appear-animation-delay="300">
    <div class="card-body">
        <div class="text-6 text-center">
            {{ ucwords($slogans[$sloganKey]) }}
        </div>
    </div>
</div>
<div class="card mt-4">
    <div class="card-body">
        <div class="w3-text-white- p-2 border-">
            <a class="w3-text-white-" href="/" ><i class="fas fa-home"></i> Home</a>
        </div>
        @if (isset($aboutUsOp))
        @foreach ($aboutUsOp->pages as $p)
        <div class="w3-text-white- px-3 py-2 border-"  data-appear-animation="fadeInRight" data-appear-animation-delay="{{ $loop->iteration }}00">
            <a class="w3-text-white-" href="{{ route('welcome.page', [$p->id] ) }}" ><i class="fas fa-angle-right"></i> {{$p->page_title}}</a>
        </div>
        @endforeach
        @endif
        @if (isset($service))
        @foreach ($service->pages as $mp)
        <div class="w3-text-white- px-3 py-2 border-" data-appear-animation="fadeInRight" data-appear-animation-delay="{{ $loop->iteration+5 }}00">
            <a class="w3-text-white-" href="{{ route('welcome.page', [$mp->id] ) }}" ><i class="fas fa-angle-right"></i> {{$mp->page_title}}</a>
        </div>
        @endforeach
        @endif
    </div>
</div>
<div class="card mt-5 w3-indigo" data-appear-animation="fadeInRight" data-appear-animation-delay="300">
    <div class="card-body text-cente" >
        <a class="text-4  w3-text-white" href=""><i class="far fa-envelope "></i> Contact with us</a>
    </div>
</div>
<div class="card mt-5 w3-green  w3-text-white" data-appear-animation="fadeInUp" data-appear-animation-delay="300">
    <div class="card-body text-cente">
        <a class="text-4  w3-text-white" ><i class="fas fa-book"></i> Check our <br> &nbsp; &nbsp; <span class="text-4">details</span></a>
    </div>
</div>
