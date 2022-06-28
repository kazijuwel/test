@extends('admin.layouts.adminMaster')
@section('title', 'Dhaka Metro News')

    @push('css')
    @endpush

@section('content')
<br>
<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-12">

            @include('alerts.alerts')

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Front Sliders</h3>
                </div>
                <div class="card-body text-center">
                    <form class="form-inline-" action="{{ route('admin.frontSliderAddNew') }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group- text-left">
                            <div class="form-group pb-3 {{ $errors->has('image') ? 'has-error' : '' }}">
                                <label for="image">Slider Image (1285 X 446):</label>
                                <input type="file" name="image" class="form-control" id="image" style="height: 40px;">
                                @if ($errors->has('image'))
                                    <p>{{ $errors->first('image') }}</p>
                                @endif
                            </div>

                            <div class="form-group pb-3 {{ $errors->has('image') ? 'has-error' : '' }}">
                                <label for="title">Title:</label>
                                <input type="text" name="title" class="form-control" id="title" style="height: 40px;"
                                    value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <p>{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                            <div class="form-group pb-3 {{ $errors->has('image') ? 'has-error' : '' }}">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" id="description"
                                    style="height: 40px;">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <p>{{ $errors->first('description') }}</p>
                                @endif
                            </div>

                            <div class="form-group pb-3 {{ $errors->has('button_name') ? 'has-error' : '' }}">
                                <label for="button_name">Button name:</label>
                                <input type="text" name="button_name" class="form-control" id="button_name"
                                    style="height: 40px;">
                                @if ($errors->has('button_name'))
                                    <p>{{ $errors->first('button_name') }}</p>
                                @endif
                            </div>

                            <div class="form-group pb-3 {{ $errors->has('link') ? 'has-error' : '' }}">
                                <label for="link">Link:</label>
                                <input type="text" name="link" class="form-control" id="link"
                                    style="height: 40px;">
                                @if ($errors->has('link'))
                                    <p>{{ $errors->first('link') }}</p>
                                @endif
                            </div>

                            <button style="height: 40px;" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card card-widget">
                <div class="card-header ">
                    <h3 class="card-title"><i class="fa fa-th"></i> All Front Sliders</h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="250">Image</th>

                                <th>Title</th>
                                <th>Description</th>
                                <th>Provided Link</th>
                                <th>Button Name</th>
                                
                                <th>Added By</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($sliders as $slider)
                                <tr>

                                    <td>
                                        <img width="250" src="{{ asset($slider->image_url) }}" alt="">
                                    </td>

                                    
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td>{{ $slider->link }}</td>
                                    <td>{{ $slider->button_name }}</td>
                                    <td>
                                        {{ $slider->addedBy ? $slider->addedBy->name : '' }}
                                    </td>


                                    <td width="100">

                                        <div class="btn-group btn-group-xs">
                                            <a onclick="return confirm('Do you really want to delete?');"
                                                class="w3-btn w3-round w3-red w3-small"
                                                href="{{ route('admin.frontSliderDelete', $slider) }}">Delete</a>

                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer text-center">

                </div>
            </div>

        </div>
    </div>
    <!-- /.row -->
</section>

@endsection


@push('js')


@endpush
