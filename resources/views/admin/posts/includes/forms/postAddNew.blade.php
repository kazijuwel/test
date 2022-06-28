<div class="card card-primary mt-3">
     	<div class="card-header with-border">
     		<h3 class="card-title"><i class="fa fa-plus"></i>
     			New {{ $type ? Str::ucfirst($type) : '' }}
     		</h3>
     	</div>
     	<form  method="post" action="{{route('admin.postAddNewPost')}}" enctype="multipart/form-data">
        <div class="card-body" style="background-color: #ccc;">
          <div class="row">
           <div class="col-md-7">

            <div class="card card-widget">
              <div class="card-body">

              	@include('alerts')

              	{{csrf_field()}}


                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                  <label for="title" class=" control-label">Title</label>

                    <input type="text" name="title" class="form-control" value="{{old('title')}}" id="title" placeholder="Title of {{ $type }}" autocomplete="off">
                    @if ($errors->has('title'))
                    <span class="help-block">
                     <strong>{{ $errors->first('title') }}</strong>
                   </span>
                   @endif               
                </div>


                @if ($type !='notice')
                  <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="control-label"> Description</label>
    
                      <textarea  name="description" class="form-control" rows="10" id="description" placeholder="Description">{!! old('description') !!}</textarea>
    
                      @if ($errors->has('description'))
                      <span class="help-block">
                      <strong>{{ $errors->first('description') }}</strong>
                    </span>
                    @endif
    
                  </div>
                  <div class="form-group {{ $errors->has('excerpt') ? ' has-error' : '' }}">
                    <label for="excerpt" class=" control-label">excerpt</label>
      
                      <textarea  name="excerpt" id="description" class="form-control" rows="3" id="excerpt" placeholder="Excerpt of Post">{{ old('excerpt') }}</textarea>
      
                      @if ($errors->has('excerpt'))
                      <span class="help-block">
                       <strong>{{ $errors->first('excerpt') }}</strong>
                     </span>
                     @endif
                    
                 </div>
                @endif
               

             


           {{-- <div class="form-group">
            <label for="title" class=" control-label">Tags (For Search)</label>


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
              @if(old('tags'))
              @foreach(old('tags') as $tagg)
              <option selected="selected">{{ $tagg }}</option>
              @endforeach
              @endif

            </select>

        </div> --}}
        @if($type == 'event')
        <div class="form-group {{ $errors->has('place') ? ' has-error' : '' }}">
          <label for="place" class=" control-label">Event Place</label>

            <input type="text" name="place" class="form-control" value="{{old('place')}}" id="place" placeholder="place of event" autocomplete="off">
            @if ($errors->has('place'))
            <span class="help-block">
             <strong>{{ $errors->first('place') }}</strong>
           </span>
           @endif
       
       </div>

        <div class="form-group">


          <div class="form-controll">
            <label>Event Date</label>
            <input class="form-control" type="date"  name="date" required>
          </div>                  

      </div>
      @elseif($type == 'seminer')
      <div class="form-group {{ $errors->has('place') ? ' has-error' : '' }}">
        <label for="place" class=" control-label">Seminer Place</label>

          <input type="text" name="place" class="form-control" value="{{old('place')}}" id="place" placeholder="place of seminer" autocomplete="off">
          @if ($errors->has('place'))
          <span class="help-block">
           <strong>{{ $errors->first('place') }}</strong>
         </span>
         @endif
     
     </div>
      <div class="form-group">


        <div class="form-controll">
          <label>Seminar Date</label>
          <input class="form-controll" type="date"  name="date" checked>
        </div>                  

    </div>
      @endif
        <div class="form-group">


            <div class="form-controll">
              <label><input type="checkbox"  name="publish" checked>Publish Instantly</label>
            </div>                  

        </div>

        @if ($type != 'notice')
        <div class="form-group">

          <div class="checkcard">
            <label><input type="checkbox"  name="front_slider" checked>Front Slider</label>
          </div>                  

      </div>

      <div class="form-group">

          <div class="checkcard">
            <label><input type="checkbox"  name="headline">Headline (Scrolling) </label>
          </div>                  

      </div>

      <div class="form-group">

          <div class="checkcard">
            <label><input type="checkbox"  name="highlight">Highlight</label>
          
        </div>
      </div>
        @endif





        




      </div>
    </div>




 


  </div>
  <div class="col-md-5">
    <style>
    .btn-feature{
      text-shadow: 2px 2px 4px #000000;
    }
  </style>

@if ($type != 'notice')
<div class="card card-widget">
  <div class="card-header with-border">
    <h3 class="card-title">Add Feature Image</h3>
  </div>
  <div class="card-body">


    <div class="form-group {{ $errors->has('feature_image') ? ' has-error' : '' }}">
      <label for="feature_image" class="col-sm-4 control-label">Feature Image</label>
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
</div>
@endif
{{-- if notice is available --}}
@if ($type == 'notice')
<div class="card card-widget" style="min-height: 156px;">
  <div class="card-header with-border">
    <h3 class="card-title">Add File</h3>
  </div>
  <div class="card-body">


    <div class="form-group {{ $errors->has('pdf') ? ' has-error' : '' }}">
      <label for="pdf" class="col-sm-4 control-label">PDF file</label>
      <div class="col-sm-8">
        <input type="file" name="pdf" class="" id="pdf">
        
        @if ($errors->has('pdf'))
        <span class="help-block">
          <strong>{{ $errors->first('pdf') }}</strong>
        </span>
        @endif
      </div>
    </div>


  </div>
</div>
@endif
{{-- ./ notice --}}
@if ($type != 'notice')
  <div class="card card-widget">
    <div class="card-header with-border">
      <h3 class="card-title">Media Gallery</h3>

      <div class="card-tools pull-right">
                  {{-- <button type="button" class="btn btn-card-tool" data-widget="remove"><i class="fa fa-times"></i></button> --}}
                  <a href="{{route('admin.mediaAll')}}" class="w3-btn btn-sm w3-round w3-white w3-border w3-border-blue"> <i class="fa fa-image"></i>Upload Image</a>

                </div>
    </div>
    <div class="card-body slim-media">

      <div class="card card-widget">
        <div class="card-body" style="background-color: #ccc;">

          @include('admin.posts.includes.others.mediaAllForPost')
        
        </div>
      </div>

    </div>
  </div>
@endif



</div>
</div>



{{-- @if ($type != 'notice')
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

         <div class="checkcard">
       <label><input type="checkbox" name="categories[]" value="{{$cat->id}}" {{$cat->hasPost($post) ? 'checked' : ''}}>{{$cat->title}}</label>
     </div>


     @if($cat->subcats()->first())
     <div class="pl-3">

      
     @foreach($cat->subcats as $sub)
      <div class="checkcard">
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
@endif --}}


<input type="hidden" name="type" value="{{$type}}">

</div>

<div class="card-footer">
  <button type="submit" class="btn btn-primary pull-right">Save</button>
</div>
</form>
</div>