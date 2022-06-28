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
              <h3 class="card-title"><i class="fa fa-th"></i> All Memberships <a class="btn btn-primary btn-sm" href="{{ route('coordinator.membershipNew') }}"> <i class="fa fa-plus"></i> add new</a></h3>
              <div class="pull-right">
                
              </div>

            </div>

            <div class="card-body">
              <table class="table table-bordered text-center table-sm">
          <thead>
            <tr>
              <th>SL</th>
              <th>Membership Title</th>
              <th>Price</th>
              <th>Duration</th>
              <th>Contents</th>
              <th>Students</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $i = (($memberships->currentPage() - 1) * $memberships->perPage() + 1); ?>
          @foreach($memberships as $membership)
            <tr>
              <td>{{ $i }}</td>
              <td>{{$membership->title}}</td>
              <td>{{$membership->amount}}</td>
              <td>{{ $membership->duration }}</td>
              <td>{{ $membership->contents->count() }}</td>
              <td>{{ $membership->students->count() }}</td>
              <td>
              <div class="btn-group">
                  <a class="btn btn-xs btn-warning" href="{{ route('coordinator.membership.edit',$membership) }}">Edit</a>
                   
                  <div class="btn-group">
                    <button type="button" class="btn btn-xs btn-warning dropdown-toggle" data-toggle="dropdown">
                     option</button>

                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                      <li class="px-2">

                      <a class="btn btn-xs btn-danger w3-hover-red w3-text-white" onClick="return confirm('Do you really want to delete this membership? All the taken courses, exams etc. will be deleted.');" href="{{ route('coordinator.membership.delete',$membership) }}">delete</a>
                        
                      </li>

                    </ul>

                  </div>
                  <a href="{{ route('coordinator.membershipContents', $membership) }}" class="btn btn-xs w3-blue mx-2">Contents</a>
                  <a href="{{ route('coordinator.membershipStudents', $membership) }}" class="btn btn-xs w3-blue mx-2">Students</a>
                </div>

              </td>
            </tr>
            <?php $i++; ?>
          @endforeach
          </tbody>
        </table>
            </div>

            <div class="card-footer text-center">
              {{$memberships->render()}}
            </div>
        </div>
        
      </div>        
      </div>
      <!-- /.row -->      

    </section>


@endsection