@extends('user.layouts.userMaster')

@push('css')
@endpush
@section('content')
<section class="content">
    <br>
    <div class="row">
        <div class="col-sm-12">
            @include('alerts.alerts')
            <div class=" card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Contents Details
                    </h3>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img style="max-width: 100%; max-height: 300px;" src="{{ asset($content->image_url) }}" alt="">
                            </div>
                            <div class="col-md-9">
                                <div class="">
                                    <b>Title:</b> {{ $content->title }}
                                </div>
                                <div>
                                    <b>Attached Course:</b> {{ $content->course->title }}
                                </div>
                                <div>
                                    <b>Type:</b> @if ($content->public)
                                        Public
                                        @else
                                        Private
                                      @endif
                                </div>
                                <div>
                                    <b>Short description:</b> {!! $content->excerpt !!}
                                </div>
                                <div>
                                    <b>Description:</b> 
                                    <div style="white-space: pre-line;  line-height: 1;  margin-left: 45px; color: #010101;   text-align: justify;">
                                        {!! $content->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        @if ($files->count() > 0)
                      <div class="row  w3-dark-grey">
                              
                          @foreach ($files as $file)
                              <div class="col-md-4 text-center p-1 ">
                                  <div class="w3-white p-1 h-100">
                                      <div><span class="">{{ $loop->iteration }}.</span> </div>
                                      @if ($file->file_type == 'image')
                                      <img style="max-width: 100%" src="{{ asset($file->file_url) }}" alt="">
                                  @elseif ($file->file_type == 'video')
                                  <video width="320" height="240" controls>
                                      <source src="{{ asset($file->file_url) }}" type="video/mp4">
                                      {{-- <source src="movie.ogg" type="video/ogg"> --}}
                                      Your browser does not support the video play.
                                  </video>
                                  @elseif ($file->file_type == 'audio')
                                  <div class="py-5">
                                      <audio controls>
                                          {{-- <source src="horse.ogg" type="audio/ogg"> --}}
                                          <source src="{{ asset($file->file_url) }}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                        </audio>
                                  </div>
                                  @else
                                      <b>File type:</b> {{ Str::ucfirst($file->file_type) }} <br><br>
                                      <a class="btn w3-blue" href="{{ asset($file->file_url) }}" download> <i class="fas fa-download"></i> download </a>
                                  @endif
                                  </div>
                              </div>
                          @endforeach
                      </div>
                      @else
                      <p>No file found.</p>
                      @endif
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('js')

@endpush
