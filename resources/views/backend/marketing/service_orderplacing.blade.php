@extends('backend.layouts.app')

@section('content')

<div class="card">
      <form class="" action="" method="GET">
        <div class="card-header row gutters-5">
          <div class="col text-center text-md-left">
            <h5 class="mb-md-0 h6">{{ translate('Service Order List') }}</h5>
          </div>
          <div class="col-lg-2">
              <div class="form-group mb-0">
                  <input type="text" class="aiz-date-range form-control" value="{{ $date }}" name="date" placeholder="{{ translate('Filter by date') }}" data-format="DD-MM-Y" data-separator=" to " data-advanced-range="true" autocomplete="off">
              </div>
          </div>
          <!-- <div class="col-lg-2">
            <div class="form-group mb-0">
              <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type Order code & hit Enter') }}">
            </div>
          </div> -->
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
                    <th>{{ translate(' Customer Name') }}</th>
                    <th data-breakpoints="md">{{ translate('Mobile Number') }}</th>
                   
                    <th data-breakpoints="md">{{ translate('Area') }}</th>
                    <th data-breakpoints="md">{{ translate('Category') }}</th>
                    <th data-breakpoints="md">{{ translate('Product') }}</th>
                    <th data-breakpoints="md">{{ translate('Details') }}</th>
                    <th data-breakpoints="md">{{ translate('Assigned To') }}</th>
                  
                </tr>
            </thead>
            <tbody id="selectoptionsf">
                @foreach ($service_customer_applications as $key => $application)
                    <tr>
                        <td>
                           {{ $loop->iteration }}
                        </td>

                        <td>
                           {{$application->name}}
                        </td>
                        <td>
                            {{$application->mobile}}
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
                           {{$application->problem}}
                           <input type="hidden" value="{{ $application->id  }}" id="applicationid">
                           
                        </td>
                        <td>
                          <select class="service_Providersf form-control">
                            <option value="">Select Once</option>
                            @foreach($services as $service)
                            <option value="{{ $service->id }}"{{ ( $service->id == $application->assign) ? 'selected' : '' }}>{{ $service->name }}</option>
                            @endforeach
                          </select>
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
    <script>
      $(document).ready(function(){
        $("#selectoptionsf").on('change','.service_Providersf',function(){
          var row = $(this).closest("tr");
          
          var applicationId=parseFloat(row.find("#applicationid").val());
          var selectValue=parseFloat(row.find(".service_Providersf").val());
          // alert(selectValue);
          // $value=$(".service_Providersf").val();
          // alert($value);
          //post method
          $.post('{{ route('assignroleService') }}', 
          {_token:'{{ @csrf_token() }}',
          applicationId:applicationId,
          selectValue:selectValue},
          function(data){
                AIZ.plugins.notify('success', '{{ translate('Assign Update Successfuly') }}');
            });
            });
          //end Post Method
        });
      // });
      </script>
@endsection