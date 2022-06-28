@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">

                            <div>
                                All Journal List
                            </div>

                            <div class="input-group" style="width:60%">
                                <input type="text" class="form-control" data-url="{{ route('allvoucherSearch') }}" id="search" placeholder="Narration or Date (22/05/22)">
                            </div>
                            <div>
                                <a href="{{ route('voucher_entries_modify') }}" class="btn btn-light btn-xs">New Journal Entry</a>
                            </div>


                    </div>
                    <div class="card-body " id="showdata">
                        @include('backend.account.voucherlist')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).on('click', '.aiz-pagination .page-link', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                    url: url,
                    type: 'GET'
                })
                .done(function(data) {
                    $('#showdata').html(data);


                });

        });
        $(document).on('keyup input', '#search', function(e) {
            e.preventDefault();
            var url = $(this).attr('data-url');
            var searchVal = $(this).val();
            var finalUrl = url+"?type=search&q="+searchVal;
            $.ajax({
                    url: finalUrl,
                    type: 'GET'
                })
                .done(function(data) {
                    $('#showdata').html(data);


                });

        });


        // $.ajax({
        //         url: url,
        //         type: 'GET',
        //         dataType: 'json',
        //         cache: false,
        //         data: {
        //             qnt: qty
        //         }
        //     })
        //     .done(function(data) {



        //     });
    </script>
@endsection
