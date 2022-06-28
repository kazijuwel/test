@extends('coordinator.layouts.adminMaster')
@push('css')
  <link href="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css') }}" rel="stylesheet">

  <style>
    .note-group-select-from-files {
      display: none;
    }
  </style>
@endpush
@section('content')

<br>

    <!-- Main content -->
    <section class="content"> 


<br>

<!-- Info cardes -->
      <div class="row">
      <div class="col-md-12">

      @include('alerts')

        <div class="card card-widget">
            <div class="card-header with-border">
              <h3 class="card-title"><i class="fa fa-th"></i> New Content </h3>
              <div class="pull-right">
                
              </div>

              
            </div>
            <div class="card-body">
                <div class="card card-widget">
    <form  method="post" action="{{route('coordinator.contentSave')}}" enctype="multipart/form-data">
    <div class="card-body" style="background-color: #ccc;">
    <div class="row">
    <div class="col-md-7">
    <div class="card card-widget">
        <div class="card-body">
            @include('alerts')
            {{csrf_field()}}
            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title" class=" control-label">Title</label>

                <input type="text" name="title" class="form-control" value="{{ old('title') }}" id="title" placeholder="Title of Content" autocomplete="off">
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif                            
            </div>

            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description" class="control-label"> Description</label>

                    <textarea  name="description" class="form-control" rows="10" id="description" placeholder="Description"  id="description">{{ old('description') }}</textarea>

                    @if ($errors->has('description'))
                    <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                    </span>
                    @endif
            </div>

            <div class="form-group">
                <label for="excerpt" class="form-control-label">Short Description</label>


                <textarea name="excerpt" class="form-control" id="excerpt" cols="30" rows="3">{{ old('excerpt') }}</textarea>

            </div>


            <div class="form-group">
                <div class="checkbox">
                    {{-- <label><input type="checkbox"  name="publish" {{$post->publish_status == 'published' ? 'checked' : ''}} checked>Publish Instantly</label> --}}
                </div>
            </div>

            <div class="form-group">
                {{-- <div class="checkbox">
                    <label><input type="checkbox"  name="front_slider" {{$post->front_slider ? 'checked' : ''}}>Front Slider</label>
                </div> --}}
            </div>

            <div class="form-group">
                <div class="checkbox">
                    {{-- <label><input type="checkbox"  name="headline" {{$post->headline ? 'checked' : ''}}>Headline (Scrolling) </label> --}}
                </div>
            </div>

            <div class="form-group">
                <div class="checkbox">
                    {{-- <label><input type="checkbox"  name="highlight" {{$post->highlight ? 'checked' : ''}}>Highlight</label>                                 --}}
                </div>
            </div>
        </div>            
    </div>
    <div class="card card-widget">
        <div class="card-header with-border">
            <h3 class="card-title">Course</h3>
        </div>
    <div class="card-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group{{ $errors->has('course') ? ' has-error' : '' }}">
                <div class="col">
                    <div class="input-group">
                        <select class="form-control" name="course" id="course">
                            @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->title }} ({{$course->course_type}})</option>
                                {{-- <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="course" name="course" value="{{$course->id}}">{{$course->title }} ({{$course->course_type}})
                                    </label>
                                </div> --}}
                                @endforeach
                            </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div> 
<div class="card">
    <div class="card-header py-0">
        <h5>Upload Files</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group {{ $errors->has('content_files') ? ' has-error' : '' }}">
                    <label for="content_files" class="col-sm-4 control-label">Multiple Selection</label>
                    <div class="col-sm-12">
                        <input type="file" name="content_files[]" class="" id="content_files" multiple>  <br>
                        <span class="help-block"></span>
        
                        @if ($errors->has('content_files'))
                            <span class="help-block">
                                <strong>{{ $errors->first('content_files') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
</div>
    </div>

    <div class="col-md-5">
    <style>.btn-feature{text-shadow: 2px 2px 4px #000000;}
    </style>
    <div class="card card-widget">
        <div class="card-header with-border">
            <h3 class="card-title">Add Feature Image</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group {{ $errors->has('feature_image') ? ' has-error' : '' }}">
                        <label for="feature_image" class="col-sm-4 control-label">Feature Image</label>
                        <div class="col-sm-12">
                            <input type="file" name="feature_image" class="" id="feature_image" >  <br>
                            <span class="help-block">Image Dimention 300px X 200px or larger and Ratio 3/2.</span>

                            @if ($errors->has('feature_image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('feature_image') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    @if(isset($content->feature_img_name))
                        <div class="w3-display-container" style="height:300px;">
                            <img class="img-responsive" src="{{asset('storage/media/image/'. $content->feature_img_name)}}" alt="">
                            <div class="w3-display-topright" style="padding-right: 10px;padding-top: 10px;">
                                <a class="btn btn-primary btn-xs"  href=""><i class="fa fa-times"></i></a>
                            </div>

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>     

    <div class="card card-widget">
        <div class="card-header with-border">
            <h3 class="card-title">Add to Memberships</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="membership">Select Memberships to add</label>
                @foreach ($memberships as $membership)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="membership" name="memberships[]" value="{{$membership->id}}"> {{$membership->title }} 
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="card card-widget">
        <div class="card-header with-border">
            <h3 class="card-title">Post Status</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="extra_file" class=" control-label"></label>
                <div class="row">
                    
                    <div class="input-group">

                        <div class="radio">
                            <label>
                                <input type="radio" id="post" name="public" value="1" checked> Public
                            </label>
                            <small>(Public courses are accessed by everyone)</small>
                        </div>

                    </div> 

                        <div class="input-group">
                        
                            <div class="radio">
                                
                                <label>
                                    <input type="radio" id="post" name="public" value="0"> Private
                                </label>
                                <small>(Private courses are accessed only by subscribed members)</small>
                            </div>
                        </div>                                    
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-primary pull-right">Save</button>
    </div>
    </div>
    </form>
                </div>
                
                
            </div>
        </div>
      </div>
      </div>
    </section>

@endsection
@push('js')
<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>
<script>

  $(document).ready(function() {
    $('#description').summernote({
      placeholder: 'Write description of the post here...',
      minHeight: 160,
      // codemirror: { // codemirror options
      //   theme: 'monokai',
      //   lineNumbers: true,
      //   lineWrapping: true,
      // }
    });
  });
  </script>
@endpush