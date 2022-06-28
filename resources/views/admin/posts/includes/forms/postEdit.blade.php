<div class="card card-primary mt-4">
     	<div class="card-header with-border">
     		<h3 class="card-title">
     			Post Update 
     		</h3>
     	</div>
     	<form method="post" action="{{route('admin.postUpdate',$post)}}" enctype="multipart/form-data">
              <div class="card-body" style="background-color: #ccc;">
              <div class="row">
              	<div class="col-md-7">

                <div class="card card-widget">
                <div class="card-body">

              	@include('alerts')

              	{{csrf_field()}}

 
                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                  <label for="title" class="  control-label">Title</label>
 
                    <input type="text" name="title" class="form-control" value="{{old('title') ?: $post->title}}" id="title" placeholder="Title of Directory" autocomplete="off">
                    @if ($errors->has('title'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('title') }}</strong>
	                    </span>
	                @endif
                       
                </div>
 
 
                @if ($post->type != 'notice')
                  <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="control-label"> Description</label>

                      <textarea  name="description" class="form-control" rows="10" id="description" placeholder="Description">{!! old('description') ?: $post->description !!}</textarea>

                      @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif

                  </div>
                  <div class="form-group {{ $errors->has('excerpt') ? ' has-error' : '' }}">
                    <label for="excerpt" class="control-label">excerpt</label>
  
  
                      <textarea  name="excerpt" class="form-control" rows="3" id="excerpt" placeholder="Excerpt of Post">{{ old('excerpt') ?: $post->excerpt }}</textarea>
                      @if ($errors->has('excerpt'))
                        <span class="help-block">
                            <strong>{{ $errors->first('excerpt') }}</strong>
                        </span>
                    @endif
               
                  </div>
                @endif
                

                

 
                {{-- <div class="form-group">
                  <label for="title" class="control-label">Tags (For Search)</label>


                    <select id="tags"
                        name="tags[]"
                        class="form-control select2-tags select2-container step2-select select2"
                        data-placeholder="Select Tags From list or Add New"
                        data-ajax-url="{{route('welcome.selectTagsOrAddNew')}}"
                        data-ajax-cache="true"
                        data-ajax-dataType="json"
                        data-ajax-delay="200"
                        multiple="multiple"
                        style="width: 100%;" >
                        @if($oldTags)
                          @foreach($oldTags as $ot)
                            <option selected="selected">{{ $ot }}</option>
                          @endforeach
                          @endif
                        </select>

                </div> --}}
                
                @if($post->type == 'event')
                <div class="form-group {{ $errors->has('place') ? ' has-error' : '' }}">
                  <label for="place" class=" control-label">Event Place</label>
        
                    <input type="text" name="place" class="form-control" value="{{$post->place}}" id="place" placeholder="place of event" autocomplete="off">
                    @if ($errors->has('place'))
                    <span class="help-block">
                     <strong>{{ $errors->first('place') }}</strong>
                   </span>
                   @endif
               
               </div>
                  <div class="form-group">


                    <div class="form-controll">
                      <label>Event Date</label>
                      <input class="form-controll" type="date" name="date"  value="{{Carbon\Carbon::parse($post->event_started_at)->format('Y-m-d')}}">
                    </div>                  

                  </div>
                  @elseif($post->type == 'seminer')
                  <div class="form-group {{ $errors->has('place') ? ' has-error' : '' }}">
                    <label for="place" class=" control-label">Seminer Place</label>
          
                      <input type="text" name="place" class="form-control" value="{{$post->place}}" id="place" placeholder="place of seminer" autocomplete="off">
                      @if ($errors->has('place'))
                      <span class="help-block">
                       <strong>{{ $errors->first('place') }}</strong>
                     </span>
                     @endif
                 
                 </div>
                  <div class="form-group">

                    
                    <div class="form-controll">
                      <label>Seminar Date</label>
                      <input class="form-controll" type="date" name="date" value="{{Carbon\Carbon::parse($post->event_started_at)->format('Y-m-d')}}" >
                    </div>         

                </div>
                  @endif
 
 
                <div class="form-group">
                  

                    <div class="checkbox">
				      <label><input type="checkbox"  name="publish" {{$post->publish_status == 'published' ? 'checked' : ''}}>Publish Instantly</label>
				    </div>                  

                </div>
        @if ($post->type != 'notice')
        <div class="form-group">

          <div class="checkbox">
            <label><input type="checkbox"  name="front_slider" {{$post->front_slider ? 'checked' : ''}}>Front Slider </label>
          </div>                  

      </div>

      <div class="form-group">

          <div class="checkbox">
            <label><input type="checkbox"  name="headline" {{$post->headline ? 'checked' : ''}}>Headline (Scrolling)</label>
          </div>                  

      </div>


      <div class="form-group">

          <div class="checkbox">
            <label><input type="checkbox"  name="highlight" {{$post->highlight ? 'checked' : ''}}>Highlight</label>
          </div>                  

      </div>
        @endif
        

                                

 
                </div>
                </div>




                  






              		
              	</div>
              	<div class="col-md-5">                 


                @if ($post->type != 'notice')
                <div class="card">
                  <div class="card-header with-border">
                    <h4 class="card-title">Update Feature Image</h3>
                  </div>
                  <div class="card-body ">

                    <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group {{ $errors->has('feature_image') ? ' has-error' : '' }}">
                  <label for="feature_image" class="col-sm-8 control-label">Feature Image</label>
                  <div class="col-sm-8">
                    <input type="file" name="feature_image" class="" id="feature_image">
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
                      @if($post->feature_img_name)
                      <div class="w3-display-container" style="height:300px;">
                <img class="img-responsive" height="60" width="60" src="{{asset('storage/media/image/'. $post->feature_img_name)}}" alt="">
                <div class="w3-display-topright" style="padding-right: 10px;padding-top: 10px;">
                  <a class="btn btn-primary btn-xs"  href="{{route('admin.featureImageDelete',$post)}}"><i class="fa fa-times"></i></a>
                </div>

              </div>
              @endif
                    </div>
                  </div>

                  </div>
                </div>
                @endif
                @if ($post->type == 'notice')
                <div class="card">
                  <div class="card-header with-border">
                    <h4 class="card-title">Update File</h3>
                  </div>
                  <div class="card-body ">

                    <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group {{ $errors->has('file') ? ' has-error' : '' }}">
                  <label for="file" class="col-sm-8 control-label">PDF file</label>
                  <div class="col-sm-8">
                    <input type="file" name="file" class="" id="file">
                    

                    @if ($errors->has('file'))
                      <span class="help-block">
                          <strong>{{ $errors->first('file') }}</strong>
                      </span>
                  @endif
                  </div>
                </div>
                    </div>
                    <div class="col-sm-6">
                      
                      @if($post->feature_img_name)
                        @if ($post->feature_img_ext == 'pdf')
                        <div class="w3-display-container" style="height:300px;">
                          <a href="{{asset('storage/media/image/'. $post->feature_img_name)}}" download>
                            Download file
                          </a>
                          
                            <a class="btn btn-primary btn-xs"  href="{{route('admin.featureImageDelete',$post)}}"><i class="fa fa-times"></i></a>
                          </div>
          
                        </div>
                        @elseif ($post->feature_img_ext == 'docx')
                        <div class="w3-display-container mt-4" style="height:300px;">
                          <a href="{{asset('storage/media/image/'. $post->feature_img_name)}}" download class="btn btn-primary btn-sm">
                            <i class="fa fa-download"></i> Download file
                          </a>
                            <a class="btn btn-primary btn-xs"  href="{{route('admin.featureImageDelete',$post)}}"><i class="fa fa-times"></i></a>
                          </div>
          
                        </div>
                        @endif
                      
                      @endif
                    </div>
                  </div>

                  </div>
                </div>
                @endif
                @if ($post->type != 'notice')
                <div class="card card-widget">
                  <div class="card-header with-border">
                    <h3 class="card-title">Media Gallery</h3>
                
                    <div class="card-tools pull-right">
                                {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> --}}
                                <a href="{{route('admin.mediaAll')}}" class="w3-btn btn-sm w3-round w3-white w3-border w3-border-blue"> <i class="fa fa-image"></i>Upload Image</a>
                    </div>
                  </div>
                  <div class="card-body slim-media">
                
                  <div class="card">
                    <div class="card-body" style="background-color: #ccc;">
                
                      @include('admin.posts.includes.others.mediaAllForPost')
                    
                    </div>
                  </div>
                
                </div>
                </div>
                @endif


                 




  
                </div>
              </div>
 

 @if ($post->type != 'notice')
 <div class="row">
  
  <div class="col-sm-12"> 
    

<div class="card card-widget">
  <div class="card-header with-border">
    <h3 class="card-title">Add Category and Subcategory</h3>
  </div>
  <div class="card-body">
    <div class="form-group">
     <label for="extra_file" class=" control-label"></label>


     <div class="row">

       @foreach($cats->chunk(ceil($cats->count()/4)) as $cat3)
       <div class="col-sm-3">
         @foreach($cat3 as $cat)

         <div class="checkbox">
       <label><input type="checkbox" name="categories[]" value="{{$cat->id}}" {{$cat->hasPost($post) ? 'checked' : ''}}>{{$cat->title}}</label>
     </div>


     @if($cat->subcats()->first())
     <div class="pl-3">

      <!-- <span class="text-muted">Subcategories</span>         -->
     @foreach($cat->subcats as $sub)
      <div class="checkbox">
       <label><input type="checkbox" name="subcategories[]" value="{{$sub->id}}" {{$sub->hasPost($post) ? 'checked' : ''}}>{{$sub->title}}</label>
     </div>

     @endforeach
     </div>
     @endif


         @endforeach
       </div>
       @endforeach
     </div>

 </div>
</div>
</div>

  </div>
</div> 
 @endif              

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary pull-right">Update</button>
              </div>
            </form>
     </div>