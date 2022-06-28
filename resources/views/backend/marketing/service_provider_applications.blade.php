@extends('backend.layouts.app')

@section('content')

<div class="card">
      <form class="" action="" method="GET">
        <div class="card-header row gutters-5">
          <div class="col text-center text-md-left">
            <h5 class="mb-md-0 h6">{{ translate('Service ProviderList') }}</h5>
          </div>
          <div class="col-lg-2">
              <div class="form-group mb-0">
                <select class="form-control" id="exampleFormControlSelect1" name="category">
                  <option value="Select Category">Select Category</option>
                  <option value="New Installation">New Installation</option>
                  <option value="Repairing">Repairing</option>
                  <option value="Maintanance">Maintanance</option>
                  <option value="Rental Products">Rental Products</option>
                  <option value="Construction Work">Construction Work</option>
                  <option value="Interior Work" >Interior Work</option>
                  <option value="Printing">Printing</option>
                  <option value="Tailoring">Tailoring</option>
                  <option value="Online/Offline job">Online/Offline job</option>
                  <option value="To-let">To-let</option>
                  <option value="Pack & Shift">Pack & Shift</option>
                  <option value="Event Management">Event Management</option>
                  <option value="Furniture">Furniture</option>
                  <option value="Cleaning Service">Cleaning Service</option>
                  <option value="Skilled Manpower Service">Skilled Manpower Service</option>
              </select>

                </select>
              </div>
          </div>
          <div class="col-lg-2">
            <div class="form-group mb-0">
              <input type="text" class="form-control"  name="area" placeholder="{{ translate('Area') }}">
            </div>
        </div>
        <div class="col-lg-2">
          <div class="form-group mb-0">
              <input type="text" class="aiz-date-range form-control" value="{{ $date }}" name="date" placeholder="{{ translate('Filter by date') }}" data-format="DD-MM-Y" data-separator=" to " data-advanced-range="true" autocomplete="off">
          </div>
      </div>


          {{-- <div class="form-group mb-0">
            <input type="text" class="aiz-date-range form-control" value="{{ $date }}" name="date" placeholder="{{ translate('Filter by date') }}" data-format="DD-MM-Y" data-separator=" to " data-advanced-range="true" autocomplete="off">
        </div>
        <div class="form-group mb-0">
            <input type="text" class="aiz-date-range form-control" value="{{ $date }}" name="Area" placeholder="{{ translate('Area') }}">
        </div> --}}
          
       <!--filter by area-->
        <!--filter by category/product-->
          <div class="col-auto">
            <div class="form-group mb-0">
              <button type="submit" class="btn btn-primary">{{ translate('Filter') }}</button>
            </div>
          </div>
        </div>
        
    </form>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ translate('Name') }}</th>
                    <th data-breakpoints="md">{{ translate('Image') }}</th>
                    <th data-breakpoints="md">{{ translate('Mobile Number') }}</th>
                    <th data-breakpoints="md">{{ translate('Email') }}</th>
                    <th data-breakpoints="md">{{ translate('qualification') }}</th>
                    <th data-breakpoints="md">{{ translate('Area') }}</th>
                    <th data-breakpoints="md">{{ translate('Category') }}</th>
                    <th data-breakpoints="md">{{ translate('Product') }}</th>
                    <th data-breakpoints="md" >{{ translate('Nid image') }}</th>
                   
                  
                </tr>
            </thead>
            <tbody>
                @foreach ($service_provider_applications as $key => $application)
                    <tr>
                        <td>
                           {{ $loop->iteration }}
                        </td>
                        <td>
                           {{$application->name}}
                        </td>

                        <td>
                          <img src="{{ asset('public/uploads/image/'.$application->image) }}" height="30px" width="50px">
                        </td>
                        <td>
                            {{$application->phone}}
                        </td>
                        <td>
                           {{$application->email}}
                        </td>
                        <td>
                           {{$application->qualification}}
                        </td>
                        <td>
                           {{$application->adress}}
                        </td>
                        <td>
                           {{$application->category}}
                        </td>
                        <td>
                           {{$application->product}}
                        </td>
                        <td>
                          <img src="{{ asset('public/uploads/image/'.$application->nidp) }}" height="30px" width="50px">
                        </td>
                       
                      

                      <!--  <td class="text-right">
                                    <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"  onclick="show_message_modal('{{ $application->id }}');" title="{{ translate('Message View') }}">
                                            <i class="las la-eye"></i>
                                        </a>
                                    </td>-->

                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>

@endsection

@section('modal')
@include('modals.delete_modal')

<div class="modal fade" id="message_modal">
  <div class="modal-dialog">
    <div class="modal-content" id="message-modal-content">

    </div>
  </div>
</div>


@endsection

@section('script')
    <script type="text/javascript">

        function show_message_modal(id){
          $.post('{{ route('contuct_us.message_modal') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
              $('#message-modal-content').html(data);
              $('#message_modal').modal('show', {backdrop: 'static'});
          });
      }

    </script>
@endsection
