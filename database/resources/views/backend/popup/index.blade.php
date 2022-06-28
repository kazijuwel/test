@extends('backend.layouts.app')

@section('content')






    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">{{translate('All PopUps')}}</h1>
            </div>
                <div class="col-md-6 text-md-right">
                    <a href="{{ route('popup.create') }}" class="btn btn-circle btn-info">
                        <span>{{translate('Add New Pop-Up')}}</span>
                    </a>
                </div>
        </div>
    </div>
    <br>

    <div class="card">
        <form class="" id="sort_products" action="" method="GET">
            <div class="card-header row gutters-5">
                <div class="col text-center text-md-left">
                    <h5 class="mb-md-0 h6">{{ translate('All POPUP') }}</h5>
                </div>
            </div>
            </from>
            <div class="card-body">
                <table class="table aiz-table mb-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th width="20%">{{translate('Image')}}</th>
                        <th>{{translate('Pop-Up Type')}}</th>
                        <th>{{translate('Added By')}}</th>
                        <th style="text-align:center;">{{translate('Description')}}</th>
                        <th style="text-align:center;">{{translate('Showing Time After(Second)')}}</th>
                        <th>{{translate('Published')}}</th>
                        <th class="text-right">{{translate('Options')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($popups as $key => $popup)
                        <tr>
                            <td>{{ ($key+1) + ($popups->currentPage() - 1)*$popups->perPage() }}</td>
                            <td>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <img src="{{url('public/images/'.$popup->image)}}" alt="Image" class="w-50px">
                                    </div>
                                    <div class="col-md-8">
                                        
                                    </div>
                                </div>
                            </td>
                            <td>
                            <?php 
                            if($popup->popup_type == 1){
						        echo 'Advertise';
                                }else{
                                    echo 'Query';
                                }
                            ?>                              
                            </td>
                            <td>
                                    {{$popup->added_by}}                              
                            </td>
                            <td>
                                 {!! Str::limit($popup->description, 100, ' .....') !!}                               
                            </td>
                                                                                                          
                            <td style="text-align:center;"> 
                                    {{$popup->showing_time}} Sec
                            </td>    

                            <td>
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input popup-type="{{ $popup->popup_type }}" onchange="update_published(this)" value="{{ $popup->id }}" type="checkbox" <?php if($popup->status == 1) echo "checked";?> >
                                    <span class="slider round"></span>
                                </label>
                            </td>                      

                            <td class="text-right">
                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('popup.edit', ['id'=>$popup->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
                                    <i class="las la-edit"></i>
                                </a>
                                {{-- <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('popup.delete', $popup->id)}}" title="{{ translate('Delete') }}">
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
            var popups_type=jQuery(el).attr('popup-type');
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('popup.published') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status,popup_type:popups_type}, function(data){
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
