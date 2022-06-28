@extends('backend.layouts.app')

@section('content')

    <div class="col-lg-12  mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Advertisment Containers')}}</h5>
                <a href="{{route('advertisement_containers')}}" class="btn btn-primary">New ad Container</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Action</th>
                            <th>Device</th>
                            <th>Page</th>
                            <td>Place</td>
                            <th>Position</th>
                            <th>Container item count</th>
                            <th>Active</th>
                            <th>Added By</th>
                            <th>Editedby</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($adContainers as $ad)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>
                                    <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{ route('advertisement_container_edit',$ad->id)}}" title="Edit">
                                        <i class="las la-edit"></i>
                                    </a>
                                    <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="{{ route('advertisement_container_items_view',$ad->id)}}" title="View">
                                        <i class="las la-eye"></i>
                                    </a>
                                    <a class="btn btn-soft-danger btn-icon btn-circle btn-sm" onclick=" return confirm('Press a button!\nEither OK or Cancel.')" href="{{ route('advertisementContainerDelete',$ad->id) }}" title="Edit">
                                        <i class="las la-trash"></i>
                                    </a>
                                </td>
                                <td>
                                    {{ $ad->device}}
                                </td>
                                <td>
                                     {!! str_replace('_', ' ', $ad->page) !!}
                                </td>
                                <td>
                                    {!! str_replace('_', ' ', $ad->place) !!}
                                </td>
                                <td>
                                    {!! str_replace('_', ' ', $ad->position) !!}
                                </td>
                                <td>
                                    {!!  $ad->container_item_count !!}
                                </td>
                                <td>
                                    {{ $ad->active == 1? "Active" : "Deactive" }}
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

@endsection
