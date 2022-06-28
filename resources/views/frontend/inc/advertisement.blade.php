
@if($topAd->topadsitems()->count() > 0)

    <div class="container">
        <div class="row">
        @if($topAd->container_item_count == 1)
            @foreach ($topAd->topadsitems()->take(1) as $ad)
                <div class="col-12">
                    <a onclick="adsclick({{$ad->id}})" href="{{$ad->url}}">
                        <img class="img-fluid" src="{{ asset('public/uploads/advertisment/'.$ad->image_name) }}" alt="images" style="width:100%">
                    </a>
                </div>
                <input type="hidden" name="ads[]" class="add" value="{{$ad->id}}">
            @endforeach
        @elseif($topAd->container_item_count == 2)
        @foreach ($topAd->topadsitems()->take(2) as $ad)
                <div class="col-6">
                    <a onclick="adsclick($ad->id)" href="{{$ad->url}}" onclick="adsclick({{$ad->id}})">
                    <img class="img-fluid" src="{{ asset('public/uploads/advertisment/'.$ad->image_name) }}" alt="images" style="width:100%">
                    </a>
                </div>
                <input type="hidden" name="ads[]" class="add" value="{{$ad->id}}">
            @endforeach

        @endif
    </div>
    </div>

@endif
<!---change by saif-->
{{-- <div class="position-relative logo-bar-area">
    <div class="container">
        <img class="img-fluid" src="{{ asset('public/uploads/advertisment/ad1650342637.jpg') }}" alt="images">
    </div>
</div> --}}

