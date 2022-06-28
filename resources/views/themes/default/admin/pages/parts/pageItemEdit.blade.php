<section class="content-header">
  <h1>
    Page Part
    <small>Edit</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Page Part</a></li>
    <li class="active">Edit</li>
  </ol>
</section>



<!-- Main content -->
<section class="content">




  <!-- Info boxes -->
  <div class="row">
    <div class="col-md-12">

      @include('alerts')


      <div class="box box-widget">
        <div class="box-body">
          <div class="box box-widget mb-0">
            <div class="box-body w3-gray ">
              @include('admin.pages.includes.pageSingleWithoutDel')

              <div class="row">
                <div class="col-sm-10 col-sm-offset-1">

                  @foreach($page->items as $item)
                  @include('admin.pages.includes.pageItemSingle')
                  @endforeach

                </div>
              </div>


            </div>
          </div>
        </div>
      </div>


      <div class="box box-widget">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-edit"></i> Update Page Part <span class="label label-default">{{
              $it->title }}</span> of <span class="label label-default">{{ $page->page_title }}</span> Page</h3>
        </div>

        <div class="box-body">
          <div class="box box-widget mb-0">
            <div class="box-body w3-gray ">




              <div class="row">
                <div class="col-sm-7">

                  <div class="box box-widget mb-0">
                    <div class="box-body">


                      @include('admin.pages.includes.pagePartEditForm')



                    </div>
                  </div>

                </div>

                <div class="col-sm-5">

                  <div class="box box-widget">
                    <div class="box-header with-border">
                      <h3 class="box-title">Media Gallery</h3>

                      <div class="box-tools pull-right">
                        {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                            class="fa fa-times"></i></button> --}}
                        <a href="{{route('admin.mediaAll')}}"
                          class="w3-btn btn-sm w3-round w3-white w3-border w3-border-blue"> <i
                            class="fa fa-image"></i>Upload Image</a>


                        {{-- <div class="">
                          <a href="javascript::void()" class="w3-btn w3-round w3-white w3-border w3-border-blue"
                            data-toggle="modal" data-target="#uploadImageModal"> <i class="fa fa-upload"></i> Upload
                            Video</a>
                          <a href="javascript::void()" class="w3-btn w3-round w3-white w3-border w3-border-blue"> <i
                              class="fa fa-file-o"></i> Upload File</a>
                        </div> --}}

                      </div>
                    </div>
                    <div class="box-body slim-media">

                      <div class="box box-widget">
                        <div class="box-body" style="background-color: #ccc;">


                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>




            </div>
          </div>
        </div>
      </div>






      {{-- <div class="box box-widget">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-edit"></i> Page Edit <span class="label label-default">{{
              $page->page_title }}</span></h3>
        </div>

        <div class="box-body">
          <div class="box box-widget mb-0">
            <div class="box-body w3-gray ">




              <div class="box box-widget">
                <div class="box-body">
                  Page ID: <b>{{ $page->id }}</b>, &nbsp;
                  Page Title: <b> {{ $page->page_title }}</b>, &nbsp;
                  Route Name: <b> {{ $page->route_name }}</b>, &nbsp;
                  Active: <b>{{ $page->active ? 'Yes' : 'No' }}</b>,
                  List In Menu: <b>{{ $page->list_in_menu ? 'Yes' : 'No' }}</b>,
                  Title Hide: <b>{{ $page->title_hide ? 'Yes' : 'No' }}</b>,

                  <div class="pull-right">
                    <a class="w3-btn w3-blue btn btn-xs " href="">Edit</a>
                    &nbsp;
                    <a class="w3-btn w3-blue btn btn-xs " href="">Add Page Part</a>
                    &nbsp;
                    <a class="w3-btn w3-red btn btn-xs " href="">Delete</a>
                  </div>
                </div>
              </div>



            </div>
          </div>
        </div>
      </div> --}}



    </div>
  </div>
  <!-- /.row -->




</section>
