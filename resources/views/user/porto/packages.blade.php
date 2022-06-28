@extends('user.porto.layouts.userLayoutMaster')
@push('css')
<link rel="stylesheet" href="{{ asset('cp/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('cp/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<style>
  #newBG {
    background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;
    background-color: gray;
    height: 100%;
    opacity: .8;

  }

  <style>.zoom {

    /* transition: transform .4s; */
    /* Animation */

    margin: 0 auto;
  }

  .zoom:hover {
    transform: scale(1.1);
    z-index: 9999;
    transition: .8s;
    /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
  }

  .slider-custom-caption {

    margin-top: -130px;
  }

  .owl-prev,
  .owl-next {
    background: #000033 !important;
    /* background: #04252b !important; */

  }

  .slider-card-bg-color {
    background: #00003398 !important;
    color: #fff !important;
  }

  .item-hover-border:hover {
    border: 2px solid white;
  }



  @media only screen and (max-width: 600px) {
    .slider-custom-caption {
      margin-top: 0px;

    }
  }

  @media only screen and (max-width: 600px) {
    .divheight {
      height: 100% !important;

    }

    .slider-custom-caption h2 {
      font-size: 19px !important;
    }


    .slider-custom-caption h4 {
      font-size: 16px !important;
    }


    .text-6 {
      font-size: 18px !important;
    }

  }

  /* .hide {
display: none;
}
  
.magic:hover + .hide {
display: inline;
} */


  @media only screen and (min-width: 1030px) {
    .big-screen {
      margin-top: 185px !important;
    }
  }
</style>

</style>
@endpush
@section('content')

<div role="main" id="newBG" class="main" style="background-color: #ededed;">
  <div class="container4 pt-3 py-3">
    <div class="row">
      <div class="col-lg-3">
        <div class="card zoom w3-border">

          <div class="card-body p-0">
            <img class="img-fluid w3-round" width="100%" height="200"
              src="https://tb.trip-beyond.com/img/trip/card_img1.jpg" alt="Project Image">

            <div class="p-2">

              <p class="card-title m-0 mt-2 w3-text-black">lorem sit amet conseur oler.</p>
              <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i
                    class="fa fa-map-marker-alt"></i> Paris</small></h6>
              <p class="pt-1 pb-0 m-0" style="font-size: 16px;"><b>Cost starting from $0.99</b></p>
              <div class="row">
                <div class="col-md-2">
                  <p class="py-1 px-1"><span class="badge badge-primary">7.5</span></p>
                </div>
                <div class="col-md-10">
                  <p class="py-1 w3-text-black" style="margin-top: 1px;">Good . <small>100
                      views</small></p>
                </div>
              </div>

            </div>


          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="card zoom w3-border">

          <div class="card-body p-0">

            <img class="img-fluid w3-round" width="100%" height="200"
              src="https://tb.trip-beyond.com/img/trip/card_img2.jpg" alt="Project Image">


            <div class="p-2">

              <p class="card-title m-0 mt-2 w3-text-black">lorem sit amet conseur oler.</p>
              <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i
                    class="fa fa-map-marker-alt"></i> Paris</small></h6>
              <p class="pt-1 pb-0 m-0" style="font-size: 16px;"><b>Cost starting from $0.99</b></p>
              <div class="row">
                <div class="col-md-2">
                  <p class="py-1 px-1"><span class="badge badge-primary">7.5</span></p>
                </div>
                <div class="col-md-10">
                  <p class="py-1 w3-text-black" style="margin-top: 1px;">Good . <small>100
                      views</small></p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="card zoom w3-border">

          <div class="card-body p-0">

            <img class="img-fluid w3-round" width="100%" height="200"
              src="https://tb.trip-beyond.com/img/trip/card_img1.jpg" alt="Project Image">


            <div class="p-2">

              <p class="card-title m-0 mt-2 w3-text-black">lorem sit amet conseur oler.</p>
              <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i
                    class="fa fa-map-marker-alt"></i> Paris</small></h6>
              <p class="pt-1 pb-0 m-0" style="font-size: 16px;"><b>Cost starting from $0.99</b></p>
              <div class="row">
                <div class="col-md-2">
                  <p class="py-1 px-1"><span class="badge badge-primary">7.5</span></p>
                </div>
                <div class="col-md-10">
                  <p class="py-1 w3-text-black" style="margin-top: 1px;">Good . <small>100
                      views</small></p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>


      <div class="col-lg-3">
        <div class="card zoom w3-border">

          <div class="card-body p-0">

            <img class="img-fluid w3-round" width="100%" height="200" src="https://tb.trip-beyond.com/img/trip/rio.jpg"
              alt="Project Image">


            <div class="p-2">

              <p class="card-title m-0 mt-2 w3-text-black">lorem sit amet conseur oler.</p>
              <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i
                    class="fa fa-map-marker-alt"></i> Paris</small></h6>
              <p class="pt-1 pb-0 m-0" style="font-size: 16px;"><b>Cost starting from $0.99</b></p>
              <div class="row">
                <div class="col-md-2">
                  <p class="py-1 px-1"><span class="badge badge-primary">7.5</span></p>
                </div>
                <div class="col-md-10">
                  <p class="py-1 w3-text-black" style="margin-top: 1px;">Good . <small>100
                      views</small></p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="row my-2">
      <div class="col-lg-3">
        <div class="card zoom w3-border">

          <div class="card-body p-0">

            <img class="img-fluid w3-round" width="100%" height="200" src="https://tb.trip-beyond.com/img/trip/rio2.jpg"
              alt="Project Image">


            <div class="p-2">

              <p class="card-title m-0 mt-2 w3-text-black">lorem sit amet conseur oler.</p>
              <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i
                    class="fa fa-map-marker-alt"></i> Paris</small></h6>
              <p class="pt-1 pb-0 m-0" style="font-size: 16px;"><b>Cost starting from $0.99</b></p>
              <div class="row">
                <div class="col-md-2">
                  <p class="py-1 px-1"><span class="badge badge-primary">7.5</span></p>
                </div>
                <div class="col-md-10">
                  <p class="py-1 w3-text-black" style="margin-top: 1px;">Good . <small>100
                      views</small></p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>


      <div class="col-lg-3">
        <div class="card zoom w3-border">

          <div class="card-body p-0">

            <img class="img-fluid w3-round" width="100%" height="200" src="https://tb.trip-beyond.com/img/trip/rio4.jpg"
              alt="Project Image">


            <div class="p-2">

              <p class="card-title m-0 mt-2 w3-text-black">lorem sit amet conseur oler.</p>
              <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i
                    class="fa fa-map-marker-alt"></i> Paris</small></h6>
              <p class="pt-1 pb-0 m-0" style="font-size: 16px;"><b>Cost starting from $0.99</b></p>
              <div class="row">
                <div class="col-md-2">
                  <p class="py-1 px-1"><span class="badge badge-primary">7.5</span></p>
                </div>
                <div class="col-md-10">
                  <p class="py-1 w3-text-black" style="margin-top: 1px;">Good . <small>100
                      views</small></p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>


      <div class="col-lg-3">
        <div class="card zoom w3-border">

          <div class="card-body p-0">

            <img class="img-fluid w3-round" width="100%" height="200" src="https://tb.trip-beyond.com/img/trip/rio3.jpg"
              alt="Project Image">


            <div class="p-2">

              <p class="card-title m-0 mt-2 w3-text-black">lorem sit amet conseur oler.</p>
              <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i
                    class="fa fa-map-marker-alt"></i> Paris</small></h6>
              <p class="pt-1 pb-0 m-0" style="font-size: 16px;"><b>Cost starting from $0.99</b></p>
              <div class="row">
                <div class="col-md-2">
                  <p class="py-1 px-1"><span class="badge badge-primary">7.5</span></p>
                </div>
                <div class="col-md-10">
                  <p class="py-1 w3-text-black" style="margin-top: 1px;">Good . <small>100
                      views</small></p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>


      <div class="col-lg-3">
        <div class="card zoom w3-border">

          <div class="card-body p-0">

            <img class="img-fluid w3-round" width="100%" height="200"
              src="https://tb.trip-beyond.com/img/trip/card_img2.jpg" alt="Project Image">


            <div class="p-2">

              <p class="card-title m-0 mt-2 w3-text-black">lorem sit amet conseur oler.</p>
              <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i
                    class="fa fa-map-marker-alt"></i> Paris</small></h6>
              <p class="pt-1 pb-0 m-0" style="font-size: 16px;"><b>Cost starting from $0.99</b></p>
              <div class="row">
                <div class="col-md-2">
                  <p class="py-1 px-1"><span class="badge badge-primary">7.5</span></p>
                </div>
                <div class="col-md-10">
                  <p class="py-1 w3-text-black" style="margin-top: 1px;">Good . <small>100
                      views</small></p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="row">


      <div class="col-lg-3">
        <div class="card zoom w3-border">

          <div class="card-body p-0">

            <img class="img-fluid w3-round" width="100%" height="200" src="https://tb.trip-beyond.com/img/trip/rio.jpg"
              alt="Project Image">


            <div class="p-2">

              <p class="card-title m-0 mt-2 w3-text-black">lorem sit amet conseur oler.</p>
              <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i
                    class="fa fa-map-marker-alt"></i> Paris</small></h6>
              <p class="pt-1 pb-0 m-0" style="font-size: 16px;"><b>Cost starting from $0.99</b></p>
              <div class="row">
                <div class="col-md-2">
                  <p class="py-1 px-1"><span class="badge badge-primary">7.5</span></p>
                </div>
                <div class="col-md-10">
                  <p class="py-1 w3-text-black" style="margin-top: 1px;">Good . <small>100 views</small></p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="card zoom w3-border">

          <div class="card-body p-0">

            <img class="img-fluid w3-round" width="100%" height="200" src="https://tb.trip-beyond.com/img/trip/rio3.jpg"
              alt="Project Image">


            <div class="p-2">

              <p class="card-title m-0 mt-2 w3-text-black">lorem sit amet conseur oler.</p>
              <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i
                    class="fa fa-map-marker-alt"></i> Paris</small></h6>
              <p class="pt-1 pb-0 m-0" style="font-size: 16px;"><b>Cost starting from $0.99</b></p>
              <div class="row">
                <div class="col-md-2">
                  <p class="py-1 px-1"><span class="badge badge-primary">7.5</span></p>
                </div>
                <div class="col-md-10">
                  <p class="py-1 w3-text-black" style="margin-top: 1px;">Good . <small>100 views</small></p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="card zoom w3-border">

          <div class="card-body p-0">

            <img class="img-fluid w3-round" width="100%" height="200" src="https://tb.trip-beyond.com/img/trip/rio2.jpg"
              alt="Project Image">


            <div class="p-2">

              <p class="card-title m-0 mt-2 w3-text-black">lorem sit amet conseur oler.</p>
              <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i
                    class="fa fa-map-marker-alt"></i> Paris</small></h6>
              <p class="pt-1 pb-0 m-0" style="font-size: 16px;"><b>Cost starting from $0.99</b></p>
              <div class="row">
                <div class="col-md-2">
                  <p class="py-1 px-1"><span class="badge badge-primary">7.5</span></p>
                </div>
                <div class="col-md-10">
                  <p class="py-1 w3-text-black" style="margin-top: 1px;">Good . <small>100 views</small></p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="card zoom w3-border">

          <div class="card-body p-0">

            <img class="img-fluid w3-round" width="100%" height="200"
              src="https://tb.trip-beyond.com/img/trip/card_img2.jpg" alt="Project Image">


            <div class="p-2">

              <p class="card-title m-0 mt-2 w3-text-black">lorem sit amet conseur oler.</p>
              <h6 class="m-0" style="letter-spacing: .5px; font-family:revert;"> <small><i
                    class="fa fa-map-marker-alt"></i> Paris</small></h6>
              <p class="pt-1 pb-0 m-0" style="font-size: 16px;"><b>Cost starting from $0.99</b></p>
              <div class="row">
                <div class="col-md-2">
                  <p class="py-1 px-1"><span class="badge badge-primary">7.5</span></p>
                </div>
                <div class="col-md-10">
                  <p class="py-1 w3-text-black" style="margin-top: 1px;">Good . <small>100 views</small></p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>
@endsection

@push('js')
<!-- Select2 -->
<script src="{{ asset('cp/plugins/select2/js/select2.full.min.js') }}"></script>

@endpush