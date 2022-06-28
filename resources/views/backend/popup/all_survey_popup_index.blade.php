@extends('backend.layouts.app')

@section('content')






    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">{{translate('All Survey PopUps Data')}}</h1>
            </div>
        </div>
    </div>
    <br>

    <div class="card">
        <form class="" id="sort_products" action="" method="GET">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    <h5 class="mb-md-0 h6">{{ translate('All Surveys') }}</h5>
                </div>
            </div>
            </from>
            <div class="card-body">
                <table class="table aiz-table mb-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{translate('Name')}}</th>
                        <th>{{translate('Email')}}</th>
                        <th>Mobile</th>
                        <th>{{translate('Comment')}}</th>
                        <th class="text-right">{{translate('Options')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($popups as $key => $popup)
                        <tr>
                            <td>{{ ($key+1) + ($popups->currentPage() - 1)*$popups->perPage() }}</td>
                            <td>
                            {{$popup->name}}
                            </td>
                            <td>
                                    {{$popup->email}}                              
                            </td>
                            <td>
                                    {{$popup->mobile}}                              
                            </td>
                            <td>
                                     {!! Str::limit($popup->comment, 100, ' .....') !!}                           
                            </td>                                                                                                                            
                            <td class="text-right">
                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('survey_popup.view', ['id'=>$popup->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
                                    <i class="las la-eye"></i>
                                </a>
                                {{-- <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('survey_popup.delete', $popup->id)}}" title="{{ translate('Delete') }}">
                                    <i class="las la-trash"></i>
                                </a> --}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="aiz-pagination">
                    {{ $popups->appends(request()->input())->links() }}
                </div>
            </div>
    </div>

@endsection

@section('modal')
    @include('modals.delete_modal')

<div class="modal fade" id="profile_modal">
        <div class="modal-dialog">
            <div class="modal-content" id="profile-modal-content">

            </div>
        </div>
    </div>

@endsection


@section('script')
    <script type="text/javascript">

        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('popup.published') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('PopUP published successfully') }}');
                    setTimeout(
                    function() {
                        location.reload();
                    }, 1000);                   
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }


        $(document).ready(function(){
      
        });


    </script>
@endsection
