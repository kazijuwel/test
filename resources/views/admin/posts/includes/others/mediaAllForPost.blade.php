@if($mediaAll->count())

	@foreach($mediaAll as $media)

			<div class="card card-default" style="margin-bottom: 5px;">
					<div class="card-body">

					<div class="media border">
				  <div class="media-left">
				    <a href="#">

				    		<img class="media-object" style="width: 80px;height:60px;" src="{{asset($media->file_url)}}" alt="...">


				      
				    </a>
				  </div>
				  <div class="media-body ml-2"   style=" word-wrap: break-word;word-break: break-all;">
					{{-- <h4> <small>{{url('/'.$media->file_url)}}</small></h4> --}}
					<p>
					Orig.Name: {{$media->file_original_name}} <br>
									Size: {{human_filesize($media->file_size)}}, 
									Width: {{$media->width}}px, 
									Height: {{$media->height}}px <br>
				
									<small> {{url('/'.$media->file_url)}}  </small> <br>
				
									<button class="copyboard btn btn-primary btn-xs" data-text="{{url('/'.$media->file_url)}}">Copy to Clipboard</button>
								</p>
				  </div>
				  
				</div>

				{{-- <small><pre>{{url('/'.$media->file_url)}}</pre> </small>	 --}}
						
					</div>
				</div>

	@endforeach


<div class="pull-right">
	{{$mediaAll->render()}}
</div>

@endif 
