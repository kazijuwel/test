@extends('backend.layouts.app')

@section('content')

    <div class="col-lg-12  mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Edit Advertisment items')}}</h5>
            </div>
            <div class="card-body">
                @include('alerts.alerts')
                <form class="form-horizontal" action="{{ route('advertisement_items_post_update') }}" method="POST" enctype="multipart/form-data">

                	@csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Ad Containers')}}</label>
                        <div class="col-sm-9">
                            <p>Device Name - Page Name- Place Name - Position</p>
                            <select class="form-control" id="exampleFormControlSelect1" required name="addcontainer">
                                @foreach($adContainers as $ad)
                                <option value="{{$ad->id}}" {{  $aditem->container_id == $ad->id ? "selected":"" }}>{{ $ad->device}}--{!! str_replace('_',' ',$ad->page) !!}--{!! str_replace('_',' ',$ad->place) !!}--{!! str_replace('_',' ',$ad->position) !!}</option>
                                @endforeach
                              </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('URL')}}</label>
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" name="itemId" value="{{ $aditem->id }}" >
                            <input type="text" class="form-control" name="url" value="{{ $aditem->url }}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Image Name')}}</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="image">
                            <img src="{{ asset('public/uploads/advertisment/'.$aditem->image_name) }}" width="100px">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Started at')}}</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" name="started_at_date" value="{{ Carbon\Carbon::parse($aditem->started_at)->format('Y-m-d') }}">
                        </div>
                        <div class="col-sm-4">
                            <input type="time" class="form-control" name="started_at_time" value="{{ Carbon\Carbon::parse($aditem->started_at)->format('H:i:s') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Ended at')}}</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" name="ended_at_date" value="{{ Carbon\Carbon::parse($aditem->ended_at)->format('Y-m-d') }}">
                        </div>
                        <div class="col-sm-4">
                            <input type="time" class="form-control" name="ended_at_time" value="{{ Carbon\Carbon::parse($aditem->ended_at)->format('H:i:s') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="name">{{translate('Active')}}</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="" required name="active">
                                <option value="1" {{ $aditem->active==1? "selected":"" }}>Active</option>
                                <option value="0" {{ $aditem->active==0? "selected":"" }}>Deactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

