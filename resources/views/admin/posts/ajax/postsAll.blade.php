
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-sm w3-striped table-boarder table-hover">
      <thead>
        <tr>
          <th width="80">Files</th>
          <th width="80">Title</th>
          <th width="100">Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach($posts as $post)
        <tr class="post-tr-{{$post->id}}">
          @include('admin.posts.ajax.postTr')
        </tr>
    @endforeach             		
      </tbody>
      
      
    </table>
  </div>
</div>
<!-- /.card-body -->
<div class="card-footer">
	<div class="pull-right">
		{{$posts->links()}}            		
	</div>
</div>