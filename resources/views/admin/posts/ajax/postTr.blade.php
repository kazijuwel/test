<td >
					@if($post->type == 'notice')
	                  	@if($post->imgFeature())
	                  		{{-- <img class="img-responsive" width="100" src="{{asset($post->fi())}}"> --}}
							<div class="w3-display-container " >
								<a href="{{asset('storage/media/image/'. $post->feature_img_name)}}" download class="btn btn-primary btn-sm">
									<i class="fa fa-download"></i> Download file
								</a>
							</div>
	                  	@endif
	                @else
						@if($post->imgFeature())
	                  		<img class="img-responsive" width="100" src="{{asset($post->fi())}}">
	                  	@endif
					@endif 	
	                  </td>
	                  
						<td  >
							
							{{$post->title}} 
						</td>
	                  <td >


	              <div class="btn-group btn-group-xs pull-right ">
                  	<a class="btn btn-primary" target="_blank" href="{{route('admin.postEdit',$post)}}">Edit</a>
                  	<button type="button" class="btn btn-primary dropdown-toggle" 	data-toggle="dropdown">
                    <span class="caret"></span>
                  	</button>
                  <ul class="dropdown-menu" role="menu">
					<li>
						<a href="{{route('admin.postDelete',$post)}}" class="btn btn-sm btn-danger ml-2" onclick="return confirm('Do you really want to delete this post?');">Delete</a>
					</li>
                  </ul>                  
                </div>

	                  </td>