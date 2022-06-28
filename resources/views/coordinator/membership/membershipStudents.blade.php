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
              <h3 class="card-title"><i class="fa fa-th"></i> <b>{{ $membership->title }}</b> Students </h3>
              <div class="pull-right">
                
              </div>

              
            </div>

            <div class="card-body">
                <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Expire Date</th>
              </tr>
            </thead>
            <tbody>
            <?php $i = (($membershipStudents->currentPage() - 1) * $membershipStudents->perPage()); ?>
            @foreach($membershipStudents as $student)
              <tr>
                <td>{{ $i+$loop->iteration }}</td>
                
                <td>{{$student->user->name}}</td>
                <td>{{$student->user->email}}</td>
                <td>{{$student->user->mobile}}</td>
   
                <td>
                    {{ now()->parse($student->expire_date)->format('d-M-Y') }}
                </td>
              </tr>
              <?php $i++; ?>
            @endforeach
            </tbody>
          </table>
              </div>
  
              <div class="box-footer text-center">
                {{$membershipStudents->render()}}
              </div>
        </div>
        
      </div>        
      </div>
      <!-- /.row -->      

    </section>


@endsection