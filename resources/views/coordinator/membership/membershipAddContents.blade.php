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
            <h3 class="card-title"><i class="fa fa-th"></i> <b>{{ $membership->title }}</b> Add Contents </h3>
            <div class="pull-right">
              

            </div>

            
          </div>
          <div class="card-body">
              <form action="{{ route('coordinator.membership.content.save', $membership) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="contents">Select Contents for this Membership</label>
                @foreach ($contents as $content)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="content" name="contents[]" value="{{$content->id}}"> {{$content->title }} 
                        </label>
                    </div>
                @endforeach
            </div>
            <div>
                <button class="btn w3-blue">Submit</button>
            </div>
            </form>
          </div>
      </div>
        
      </div>        
      </div>
      <!-- /.row -->      

    </section>
    

@endsection