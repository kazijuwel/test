@extends('backend.layouts.app')

@section('content')
@php
    $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
@endphp
<div class="card">
    
    <div class="card-body">
        <p class="text-primary">Jounal List</p>
        <table class="table aiz-table mb-0 table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="text-center">{{translate('options')}}</th>
                    <th>{{ translate('Date') }}</th>
                    <th>{{ translate('Narration') }}</th>
                    <th data-breakpoints="md">{{ translate('Debit') }}</th>
                    <th data-breakpoints="md">{{ translate('Credit') }}</th>
                    <th data-breakpoints="md">{{ translate('Status') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($journals as $key => $journal)
                    <tr>
                        <td>
                            {{ ($key+1) + ($journals->currentPage() - 1)*$journals->perPage() }}
                        </td>
                        <td class="text-center">
                            <a class="btn btn-soft-primary btn-sm" href="{{ route('journialDetails', $journal->id) }}" title="{{ translate('Download Invoice') }}">
                                View
                            </a> 
            
                        </td>
                        <td>{{\Carbon\Carbon::parse($journal->created_at)->format('l j F Y, h:i A')}}</td>
                        <td class="text-center">
                            <a href="{{ route('adminCustomerVeiw',$journal->user->id) }}"> @if ($journal->user != null)
                             <span class="text-dark">Belaobela sales of</span>   {{ $journal->user->name }}
                            @else
                            <span  class="text-dark">Belaobela sales of</span>  Guest ({{ $journal->guest_id }})
                            @endif
                        </a>
                        </td>
                       
                        <td>
                            {{$journal->creditAmount()}}
                        </td>
                        <td class="text-center">
                       
                            {{$journal->debitAmount()}}
                        </td>
                        <td class="text-center">
                             @if($journal->debitAmount() < $journal->creditAmount() )
                            <span class="bg-danger p-1 rounded text-white">Unbalanced</span> 
                             @else
                             <span class="bg-success p-1 rounded text-white">  Balanced</span>
                             @endif
                       
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="aiz-pagination">
            {{ $journals->appends(request()->input())->links() }}
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

        function show_seller_profile(id){         
            $.post('{{ route('sellers.profile_modal_v2') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
                $('#profile_modal #profile-modal-content').html(data);
                $('#profile_modal').modal('show', {backdrop: 'static'});
            });
        }

    </script>
@endsection