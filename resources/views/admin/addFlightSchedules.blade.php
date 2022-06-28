@extends('admin.layouts.adminMaster')

@push('css')

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('cp/plugins/select2/css/select2.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('cp/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endpush

@section('content')
    <section class="content">
        <br>
        @include('alerts.alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-plus"></i> Add Flight Schedules
                            <a class="btn w3-white btn-sm" href="{{ route('admin.allFlightSchedules') }}"> View Flight Schedules</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.storeFlightSchedules') }}" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="price">Price</label>
                                <input type="text" name="price" , value="{{ old('name') }}" id="price"
                                    class="form-control" placeholder="Price">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="airline">Airline name</label>
                                <select name="airline" id="airline" class="form-control">
                                    <option value="">Select Airline</option>
                                    @forelse ($airlines as $airline)
                                        <option value="{{ $airline->id }}">{{ $airline->Airline }}</option>
                                    @empty
                                        <option value="">No Airline Found</option>
                                    @endforelse
                                </select>
                                @error('airline')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="from">From*</label>
                                <select name="from" id="from" class="form-control">
                                    <option value="">Select City Name</option>
                                    @forelse ($airports as $airport)
                                        <option value="{{ $airport->id }}">{{ $airport->name }}</option>
                                    @empty
                                        <option value="">No Airports Found</option>
                                    @endforelse
                                </select>
                                @error('from')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="to">To*</label>
                                <select name="to" id="to" class="form-control">
                                    <option value="">Select City Name</option>
                                    @forelse ($airports as $airport)
                                        <option value="{{ $airport->id }}">{{ $airport->name }}</option>
                                    @empty
                                        <option value="">No Airports Found</option>
                                    @endforelse
                                </select>
                                @error('to')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="start">Start Date</label>
                                <input type="datetime-local" name="start"  id="start"
                                    class="form-control">
                                @error('start')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="end">End Date</label>
                                <input type="datetime-local" name="end"   id="end"
                                    class="form-control">
                                @error('end')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <input type="checkbox" name="active" id="active"> <label for="active">Active</label>
                            </div>

                            <div class="form-group mb-2">
                                <input type="submit" class="btn btn-info">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('select').select2();
    </script>
@endpush
