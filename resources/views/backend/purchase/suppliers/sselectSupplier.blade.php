@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h4> Select Supplier for Purchase</h4>
                    </div>
                    <div class="card-body">
                        <div class="row pb-2">
                            <div class="col-12 col-md-5 m-auto">
                                <input type="search" name="q" id="search" data-url="{{route('supplier.serchSupplier',['warehouse'=>$warehouse])}}" name="search" placeholder="Search with supplier name/email" class="form-control">
                            </div>
                        </div>
                        <div id="showSupplier">
                            @include('backend.purchase.suppliers.ajax.ssuplierListAjax')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).on('click', '.page-item a', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                type: "GET",
                url: url,
                success: function(res) {
                    $('#showSupplier').html(res);
                }
            });

        })

        $(function() {
            //delay function start
            var delay = (function() {
                var timer = 0;
                return function(callback, ms) {
                    clearTimeout(timer);
                    timer = setTimeout(callback, ms);
                };
            })();


            $(document).on('input', '#search', function(e) {
                e.preventDefault();
                var q = $(this).val();
                var url = $(this).attr('data-url')+"?q="+q;
                delay(function() {
                    $.ajax({
                        type: "GET",
                        url: url,
                        success: function(res) {
                            $('#showSupplier').html(res);
                        }
                    });

                }, 100);

            })

        });
    </script>
@endsection
