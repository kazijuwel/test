 
    <section class="content">

      <br>

    @include('alerts')

    <div class="row">
        <div class="col-sm-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">All {{ucfirst(Str::plural($type))}}</h3>
 

                <div class="card-tools">

                  <a class="btn btn-light w3-text-dark-gray" href="{{route('admin.postAddNew',['type'=>$type])}}">Add New {{ucfirst($type)}}</a>
                  
                </div>
            </div>
            <!-- /.card-header -->
            <div class="profile-table-body">
            @include('admin.posts.ajax.postsAll')
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
	</section>