@extends('company.layouts.companyMaster')

@push('css')
@endpush

@section('content')
    <section class="content">
        <br>
        <div class="row">
            @include('company.search.part.advanceFlightSearch')
        </div>
        @forelse ($result as $item)
            <div class="card rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="row">
                                <div class="col-md-4">
                                    <b>{{ \Carbon\Carbon::parse($item->start)->format('H:m:s') }} -
                                        {{ \Carbon\Carbon::parse($item->end)->format('H:m:s') }}</b> <br>
                                    <p class="m-0">{{ $item->airport->name }} - {{ $item->airport2->name }}
                                    </p>
                                    <p class="m-0">{{ $item->airline->Airline }}</p>
                                </div>
                                <div class="col-md-4 text-center">
                                    <p class="m-0">{{ timestamToTimeDiffarece($item->start, $item->end) }}</p>
                                    <p class="m-0">{{ timestamToHoursDiffarece($item->start, $item->end) }}h in
                                        {{ $item->airport2->name }}</p>
                                </div>

                                <div class="col-md-4" style="text-align: end">
                                    <h3 class="font-weight-bold mt-0">${{ $item->price }}</h3>
                                    <p class="m-0">{{ timestamToHoursDiffarece($item->start, $item->end) }}h in
                                        {{ $item->airport2->name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <h3></h3>
                            <p><a href="{{ route('company.ticketBooking',['company'=>$company->id,'schedule'=>$item->id]) }}" class="btn btn-info"> Book now</a></p>
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <div class="card rounded">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12 m-auto">
                            <h2 class="text-danger">No Flight Schedule Found</h2>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
    </section>
@endsection

@push('js')
    <script src="{{ asset('cp/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            // $('.select2').select2({
            //     theme: 'bootstrap4'
            // });

            $('.step2-select').select2({
                theme: 'bootstrap4',

                // minimumInputLength: 1,
                ajax: {
                    data: function(params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;
                        // alert(data[0].s);
                        var data = $.map(data, function(obj) {
                            obj.id = obj.id || obj.id;
                            return obj;
                        });
                        var data = $.map(data, function(obj) {
                            obj.text = obj.name;
                            return obj;
                        });
                        return {
                            results: data,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    }
                },
            });

            //// To


        });
    </script>
    <script>
        $(document).ready(function() {
            // seleect5 search
            // $('.seleect5').select2({
            //     theme: 'bootstrap4'
            // });

            $('.search').select2({
                theme: 'bootstrap4',
                containerCssClass: ".search",
                // minimumInputLength: 1,
                ajax: {
                    data: function(params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;
                        // alert(data[0].s);
                        var data = $.map(data, function(obj) {
                            obj.id = obj.id || obj.id;
                            return obj;
                        });
                        var data = $.map(data, function(obj) {
                            obj.text = obj.name;
                            return obj;
                        });
                        return {
                            results: data,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    }
                },
            });

            //// To


        });
    </script>
@endpush
