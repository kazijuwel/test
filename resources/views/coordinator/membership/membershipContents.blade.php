@extends('coordinator.layouts.adminMaster')

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
              <h3 class="card-title"><i class="fa fa-th"></i> <b>{{ $membership->title }}</b> Contents <a class="btn btn-primary btn-sm" href="{{ route('coordinator.membership.content.add', $membership) }}"> <i class="fa fa-plus"></i> add more content</a></h3>
              <div class="pull-right">
                
              </div>

              
            </div>

            <div class="card-body">
                <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th>SL</th>
                <th>Title</th>
                <th>Short Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $i = (($membershipContents->currentPage() - 1) * $membershipContents->perPage() + 1); ?>
            @foreach($membershipContents as $data)
              <tr>
                <td>{{ $i }}</td>
                
                <td>{{$data->title}}</td>
                <td>{!! Str::limit($data->excerpt, 100, '...') !!}</td>
   
                <td>
  
  
                <div class="btn-group">
                    <a class="btn btn-xs btn-warning" href="{{ route('coordinator.content.edit',$data) }}">Edit</a>
                    {{-- <div class="btn-group">
                      <button type="button" class="btn btn-xs btn-warning dropdown-toggle" data-toggle="dropdown">
                       Delete</button>
  
                      <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        <li>
  
                        <a class="btn btn-xs btn-danger w3-hover-red w3-text-white" href="{{ route('coordinator.content.delete',$data) }}">Confirm</a>
                          
  
                        </li>
  
                      </ul>
                    </div> --}}

                    <a class="btn btn-xs w3-red" href="{{ route('coordinator.membership.content.remove', [$membership,$data->id]) }}"> Remove</a>
                  </div>
  
                </td>
              </tr>
              <?php $i++; ?>
            @endforeach
            </tbody>
          </table>
              </div>
  
              <div class="box-footer text-center">
                {{$membershipContents->render()}}
              </div>
        </div>
        
      </div>        
      </div>
      <!-- /.row -->      

    </section>


@endsection