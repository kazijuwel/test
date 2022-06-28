@extends('theme.prt.layouts.prtMaster')

@section('title')
    {{ env('APP_NAME_BIG') }}
@endsection
@section('meta')
@endsection
@push('css')
<style>

    .zoom {
            
        transition: transform .4s; /* Animation */
        
        margin: 0 auto;
        }

    .zoom:hover {
        transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
    .slider-custom-caption {

        margin-top: -130px;
        }

    .owl-prev,.owl-next
    {
    background: #000033 !important;
    /* background: #04252b !important; */

    }
    .slider-card-bg-color
    {
    background: #00003398 !important;
    color: #fff !important;
    }
    .item-hover-border:hover{
        border: 2px solid white;
    }



    @media only screen and (max-width: 600px) {
        .slider-custom-caption {
        margin-top: 0px;

        }
    }
    @media only screen and (max-width: 600px) {
        .divheight {
        height: 100% !important  ;

        }

    .slider-custom-caption h2
    {
    font-size: 19px !important;
    }


    .slider-custom-caption h4
    {
    font-size: 16px !important;
    }


    .text-6{
        font-size: 18px !important;
    }

}



</style>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endpush


@section('contents')
    {{-- @include('alerts.alerts') --}}
    @include('theme.trip.search.part.searchForFlight')
@endsection
@push('js')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(document).ready(function() {
            $("#round-trip").click(function() {
                $(".multi-city").hide();
                $(".single-trip").show();
                $(".round-trip-form").show();
            });
            $("#one-trip").click(function() {
                $(".multi-city").hide();
                $(".single-trip").show();
                $(".round-trip-form").hide();

            });

            $("#multi-trip").click(function() {
                $("#multi-trip").css('display', '');
                $(".multi-city").show();
                $(".single-trip").hide();

            });

            $("#add").click(function() {
                console.log('ye');
                // $("#add-more").css('display','');
                // $(".add-more").show();
                var zzz = `<div class="row mt-4" >
        <div class="col-md-4">
                        <input type="text" class="form-control form-control-lg text-4 w3-border " style="border: 1px solid #0059ad !important;" placeholder="From">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control form-control-lg text-4 w3-border " style="border: 1px solid #0059ad !important;" placeholder="To">
                    </div>
                    <div class="col-md-4">
                        <input type="text" id="datepicker" placeholder = "Depart" class="form-control form-control-lg text-4 w3-border " style="border: 1px solid #0059ad !important;">
                    </div>
                    
                    </div>`;
                $('.add-more').append(zzz);
            });

        });
    </script>

    <script>
        $(function() {
            $("#datepicker").datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 2
            });
        });
    </script>
    <script>
        $(function() {
            var dateFormat = "mm/dd/yy",
                from = $("#from")
                .datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 2
                })
                .on("change", function() {
                    to.datepicker("option", "minDate", getDate(this));
                }),
                to = $("#to").datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 2
                })
                .on("change", function() {
                    from.datepicker("option", "maxDate", getDate(this));
                });

            function getDate(element) {
                var date;
                try {
                    date = $.datepicker.parseDate(dateFormat, element.value);
                } catch (error) {
                    date = null;
                }

                return date;
            }
        });
    </script>

@endpush

