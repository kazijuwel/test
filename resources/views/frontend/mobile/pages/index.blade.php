@extends('frontend.mobile.layout.app')
@section('content')
<main class="app-content">
    <!--Lazy Loader-->
    <div class="lazy-load" data-url="{{route('welcome.lazyload',['page'=>'index','part' => '1'])}}" data-url2="{{route('welcome.lazyload',['page'=>'index','part' => '2'])}}" >
    <!--Lazy Loader-->
         @include('frontend.mobile.partials.loader')
    </div>
</main>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        var values = $('input[name="ads[]"]').map(function(){
            return $(this).val();
        }).get();
        console.log(values);
        var url="{{ route('adViewUpdate')}}";

        $.post(url,
        {
            "_token": "{{ csrf_token() }}",
           values:values,
        },
         function(result){
            console.log("success view count");
      });


    });

    function adsclick(id){
                var url="{{ route('adClickUpdate')}}";
            $.post(url,
            {
                "_token": "{{ csrf_token() }}",
                value:id,
            },
            function(result){
                console.log("success click count");
            });
            }


    </script>
<script>
    // document.onreadystatechange = function() {
    //       if (document.readyState !== "complete") {
    //           document.querySelector(
    //             "body").style.visibility = "hidden";
    //           document.querySelector(
    //             "#loader").style.visibility = "visible";
    //       } else {
    //           document.querySelector(
    //             "#loader").style.display = "none";
    //           document.querySelector(
    //             "body").style.visibility = "visible";
    //       }
    //   };
  </script>
  <script type="text/javascript">
    var myIndex = 0;
    carousel();
    function carousel() {

        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 2000); // Change image every 2 seconds
    }
</script>

<script>

    function loadajax()
    {
      var url = $('.lazy-load').attr('data-url');
      $.ajax({
        url: url,
        type:"get",
        cache:false,

      }).done(function(response) {
          console.clear();
          console.log(response.page);
            $('.lazy-load').empty().append(response.page);
            carousel();
            var url2 = $('.lazy-load').attr('data-url2');
              $.ajax({
              url: url2,
              type:"get",
              cache:false,

            }).done(function(response) {
                $('.lazy-load').append(response.page);

            });

          });


    }
    setTimeout(loadajax,1);
</script>



@endsection
