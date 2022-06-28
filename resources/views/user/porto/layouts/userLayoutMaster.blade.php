<!DOCTYPE html>
<html>

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Trip Beyond</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Favicon -->
    @if ($websiteParameter->favicon)

    <link rel="shortcut icon" href="{{ asset('storage/favicon/' . $websiteParameter->favicon) }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('storage/favicon/' . $websiteParameter->favicon) }}" type="image/x-icon">

    @endif

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7COpen+Sans:400,700,800"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('user/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/vendor/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/vendor/magnific-popup/magnific-popup.min.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('user/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/theme-elements.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/theme-blog.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/theme-shop.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/w3.css') }}">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <!-- Demo CSS -->
    <link rel="stylesheet" href="{{ asset('user/css/demos/demo-landing.css') }}">

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('user/css/skins/skin-landing.css') }}">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('user/css/custom.css') }}">

    <!-- Head Libs -->
    <script src="{{ asset('user/vendor/modernizr/modernizr.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('user/css/gradient.css') }}">
    <link rel="stylesheet" href="{{ asset('user/vendor/rs-plugin/css/settings.css' )}}">
    <link rel="stylesheet" href="{{ asset('user/vendor/rs-plugin/css/layers.css' )}}">
    <link rel="stylesheet" href="{{ asset('user/vendor/rs-plugin/css/navigation.css' )}}">
    <link rel="stylesheet" href="{{ asset('user/vendor/circle-flip-slideshow/css/component.css' )}}">

    @stack('css')



    <style>
        nav.collapse.show ul a {
            border-radius: 35px !important;
        }

        nav.collapse.show ul a:nth-child(4) {
            margin-top: 10px !important;
            color: black;

        }

        .dropdown-menu.dropdown-menu-lg.dropdown-menu-right.show a {
            color: white;
        }

        .dropdown-menu.dropdown-menu-lg.dropdown-menu-right.show {
            background-color: #291a6d;
            color: white !important;
        }

        .dropdown-menu.dropdown-menu-lg.dropdown-menu-right.show a:hover {
            background-color: orange;
            color: white;
        }

        .tarek-h-a {
            color: #fff !important;
        }

        .tarek-h-b {
            height: 28px !important;
            width: 28px !important;
            border-radius: 50% !important;
            background-color: #F6931D !important;
        }

        .tarekl-3 {
            margin-left: 1rem !important;
        }

        .tb-o {
            border-radius: 60px !important;
        }

        @media only screen and (max-width: 993px) {
            .tarek-h-a {
                color: #2196f3 !important;
                border: black 1px solid !important;
                background-color: white !important;
                border-radius: 0% !important;
            }

            .tarek-h-b {
                height: 28px !important;
                width: 28px !important;
                border-radius: 0% !important;
                background-color: #fff !important;
            }

            .tarek-d {
                display: none !important;
            }

            nav.collapse.show ul a {
                border-radius: 0px !important;
            }

            .tarekl-3 {
                margin-left: 0rem !important;
            }

        }
    </style>
</head>

<body class="alternative-font-4 loading-overlay-showing" data-plugin-page-transition data-loading-overlay
    data-plugin-options="{'hideDelay': 100}">
    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <div class="body tarek-add-bk">
        @include('user.porto.part.userHeader')
        @yield('content')
        <div class="container pt-5 tarek-add-bk">
            <div class="row text-center ">
                <div class="col-md-12 ">
                    <div class="blog-posts ">
                        <article class="post post-medium btn btn-rounded ">
                            <div class="post-image ">
                                <a href="# ">
                                    <img src="{{ asset('user/img/ios.png') }} "
                                        class="img-fluid img-thumbnail-no-borders rounded-5 border-curve " alt=" " />
                                </a>
                            </div>

                        </article>
                    </div>
                </div>
            </div>
            @stack('extra')
        </div>
        @include('user.porto.part.userModal')
        @include('user.porto.part.userFooter')
    </div>
    </div>

    <script src="{{ asset('user/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('user/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('user/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('user/vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>
    <script src="{{ asset('user/vendor/popper/umd/popper.min.js') }}"></script>
    <script src="{{ asset('user/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/vendor/common/common.min.js') }}"></script>
    <script src="{{ asset('user/vendor/jquery.validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('user/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('user/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
    <script src="{{ asset('user/vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
    <script src="{{ asset('user/vendor/isotope/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('user/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('user/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('user/vendor/vide/jquery.vide.min.js') }}"></script>
    <script src="{{ asset('user/vendor/vivus/vivus.min.js') }}"></script>

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('user/js/theme.js') }}"></script>

    <!-- Current Page Vendor and Views -->
    <script src="{{ asset('user/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('user/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

    <!-- Theme Custom -->
    <script src="{{ asset('user/js/custom.js') }}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ asset('user/js/theme.init.js') }}"></script>
    @stack('js')
    <!-- Examples -->

    <!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
  <script>
      (function(i, s, o, g, r, a, m) {
          i['GoogleAnalyticsObject'] = r;
          i[r] = i[r] || function() {
              (i[r].q = i[r].q || []).push(arguments)
          }, i[r].l = 1 * new Date();
          a = s.createElement(o),
              m = s.getElementsByTagName(o)[0];
          a.async = 1;
          a.src = g;
          m.parentNode.insertBefore(a, m)
      })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

      ga('create', 'UA-12345678-1', 'auto');
      ga('send', 'pageview');
  </script>
  -->

</body>

</html>