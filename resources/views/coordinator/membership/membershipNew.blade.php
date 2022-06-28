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
              <h3 class="card-title"><i class="fa fa-th"></i> New Membership </h3>
              <div class="pull-right">
                
              </div>

              
            </div>
            <div class="card-body">
{{-- Package form  --}}

<form action="{{ route('coordinator.membershipSave') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-5">
            <div class="box box-widget">
                <div class="box-body">
                    {{-- title start --}}
                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Title of the visit" >
                
                        @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>
                    {{-- Title end --}}
                    {{-- image input --}}
                    <div class="form-group form-group-sm {{ $errors->has('feature_image') ? ' has-error' : '' }}">
                        <label for="feature_image">Feature Image:</label>
                        <input type="file" class="form-control" id="feature_image" name="feature_image" style="padding-bottom: 30px;">
                    
                        @if ($errors->has('feature_image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('feature_image') }}</strong>
                        </span> <br>
                        @endif
                        <span class="help-block">If new image uploaded, old image will be replaced by new image.</span>
                    </div>
                    {{-- image ends --}}

                    {{-- amount starts --}}
                    <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
                        <label for="amount">Amount:</label>
                        <input type="text" class="form-control" id="amount" name="amount" value="{{ old('amount') }}" placeholder="Amount for membership" >
                
                        @if ($errors->has('amount'))
                        <span class="help-block">
                            <strong>{{ $errors->first('amount') }}</strong>
                        </span>
                        @endif
                    </div>
                    {{-- amount ends --}}

                    {{-- Currency start --}}
                    {{-- <div class="form-group {{ $errors->has('currency') ? ' has-error' : '' }}">
                        <label for="currency">Currency:</label>
                        <input type="text" class="form-control" id="currency" name="currency" value="" placeholder="Enter Currency" >
                
                        @if ($errors->has('currency'))
                        <span class="help-block">
                            <strong>{{ $errors->first('currency') }}</strong>
                        </span>
                        @endif
                    </div> --}}
                    {{-- Currency Ends --}}

                    {{-- durations --}}
                    <div class="form-group {{ $errors->has('duration') ? ' has-error' : '' }}">
                        <label for="duration">Durations (Days):</label>
                        <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration') }}" placeholder="Duration of the membership (days)" >
                
                        @if ($errors->has('duration'))
                        <span class="help-block">
                            <strong>{{ $errors->first('duration') }}</strong>
                        </span>
                        @endif
                    </div>
                    {{-- durations end --}}
                </div>
            </div>
        </div>
        {{-- Description start --}}
        <div class="col-sm-5">
            <div class="box box-widget">
                <div class="box-body">
                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">Description:</label>
                        <textarea class="form-control" rows="5" name="description" placeholder="visit description" id="description">{{ old('description') }}</textarea>
        
                        @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                    </div>
        
                    <div class="form-group {{ $errors->has('editor') ? ' has-error' : '' }}">
                        <label for="editor">Editor:</label>
                        <div class="checkbox">
                          <label><input name="editor" type="checkbox">Editor</label>
                        </div>
                            @if ($errors->has('editor'))
                        <span class="help-block">
                            <strong>{{ $errors->first('editor') }}</strong>
                        </span>
                            @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- description ends --}}
    </div>

    <div class="box box-widget mb-2">
        <div class="box-body">
            <div class="pull-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>
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