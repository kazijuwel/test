@extends('backend.layouts.app')

@section('content')

    <div class="col-lg-12  mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Advertisment items')}}->{!! $adContainer->device!!}->{!! $adContainer->page!!}->{!! $adContainer->place!!}</h5>
                <a href="{{route('advertisement_items',$adContainer->id)}}" class="btn btn-primary">New ad items</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Action</th>
                            <th>Ad Containers</th>
                            <th>Image</th>
                            <td>Url</td>
                            <th>Started_at</th>
                            <th>Ended_at</th>
                            <th>Active</th>
                            <th>Added By</th>
                            <th>Editedby</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($adContainer->adItems as $ad)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>
                                    <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{ route('advertisement_items_edit',$ad->id)}}" title="Edit">
                                        <i class="las la-edit"></i>
                                    </a>
                                    <a class="btn btn-soft-danger btn-icon btn-circle btn-sm" onclick=" return confirm('Press a button!\nEither OK or Cancel.')" href="{{route('advertisementItemDelete',$ad->id)}}" title="delete">
                                        <i class="las la-trash"></i>
                                    </a>
                                </td>
                                <td>
                                        {{$ad->addcontainer->device }}--{{$ad->addcontainer->page }}-{{$ad->addcontainer->place }}-{{$ad->addcontainer->position }}
                                </td>
                                <td>
                                    <img src="{{ asset('public/uploads/advertisment/'.$ad->image_name) }}" width="100px">
                                </td>
                                <td>
                                    {{$ad->url }}
                                </td>
                                <td>
                                    {{$ad->started_at }}
                                </td>
                                <td>
                                    {{$ad->ended_at }}
                                </td>
                                <td>
                                    {{$ad->active ==1 ? "Active":"Deactive" }}
                                </td>

                                <td>
                                    {{ $ad->addeduser?$ad->addeduser->name:""}}
                                </td>
                                <td>
                                    {{$ad->editeduser?$ad->editeduser->name:""}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            </div>
        </div>
    </div>

@endsection
