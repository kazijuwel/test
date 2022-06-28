<section class="content">

    <div class="row">
        <div class="col-sm-12">

            @include('alerts')

            <div class="card card-widget">
                <div class="card-body w3-center">
                    <form class="form-inline" method="post" action="{{ route('admin.galleryImageAddNew') }}" enctype="multipart/form-data">
                        @csrf
                  
                        <div class="form-group {{ $errors->has('images') ? ' has-error' : '' }}">
                          <label for="images">Upload Image:</label>
                          <input type="file" name="images[]" value="{{old('images')}}" placeholder="File" class="form-control" id="images" style="padding-bottom: 32px;" multiple>
                          @if ($errors->has('images'))
                          <span class="help-block">
                            <strong>{{ $errors->first('images') }}</strong>
                          </span>
                          @endif
                        </div>

                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }} ml-2">
                            <label for="title">Title:</label>
                            <input type="text" name="title" value="{{old('title')}}" placeholder="Title" class="form-control ml-2" id="title" multiple>
                            @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif

                        </div>
                  
                        
                        <button type="submit" class="w3-btn w3-blue w3-round w3-border w3-border-white">Add Image</button>
                  
                    </form>
                </div>
            </div>
            <div class="card card-widget">
                <div class="card-header">
                  <h3 class="card-title">
                    Media All
                  </h3>
                </div>
                <div class="card-body">
                    <table class="table table-lg w3-striped w3-bordered">
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Featured</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($galleries as $gal)
                            <tr>
                                <td>
                                    <img src="{{ route('imagecache',['template'=>'cpmd','filename'=>$gal->image_name]) }}" height="80" width="100" alt="">
                                </td>
                                <td>{{ ucfirst($gal->image_title) }}</td>
                                <td>
                                    <input type="checkbox" name="featured" class="w3-center" {{ $gal->featured == 1 ? 'checked' : ''}} id="feature_{{ $gal->id }}" onchange="toggleFeature('{{ route('admin.galleryFeature', $gal) }}')">
                                </td>
                                <td>
                                    <a href="{{ route('admin.galleryImageDelete',$gal) }}" onclick="return confirm('Are you want to delete this image ?')"  class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>