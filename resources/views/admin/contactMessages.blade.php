@extends('admin.layouts.adminMaster')

@push('css')



@endpush

@section('content')
  <section class="content">

  	<br>

  	<div class="container-fluid">

      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline mb-2">
            <div class="card-header">
              <h3 class="card-title">Contact Messages</h3>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Forename</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $msg)
                        <tr>
                            <td>{{ $msg->forename }}</td>
                            <td>{{ $msg->surname }}</td>
                            <td>{{ $msg->email }}</td>
                            <td>{{ $msg->subject }}</td>
                            <td>{{ $msg->message }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                {{ $messages->links() }}
            </div>
        </div>
      </div>


      </div><!-- /.container-fluid -->



  </section>
@endsection


@push('js')





@endpush


