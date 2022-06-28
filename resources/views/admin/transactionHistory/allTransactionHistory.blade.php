@extends('admin.layouts.adminMaster')

@push('css')
@endpush

@section('content')
    <section class="content">

        <br>

        <div class="row">
            <div class="col-sm-12">
                @include('alerts.alerts')
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            Balance Transaction of {{ucfirst($type)}}:
                            @if ($type == 'agent')
                                {{$user->title ?? $user->username}} ({{$user->id}})
                                @elseif ($type == 'customer')
                                {{$user->name ?? $user->username}} ({{$user->id}})
                            @endif
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Transaction ID</th>
                                    <th>Amount</th>
                                    <th>Purpose</th>
                                    <th>Transaction For</th>
                                    <th>Details</th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php $i = 1; ?>

                                <?php $i = (($transactions->currentPage() - 1) * $transactions->perPage() + 1); ?>

                                @forelse($transactions as $transaction)

                                    <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>{{ $transaction->moved_balance }}</td>
                                        <td>{{ $transaction->purpose }}</td>
                                        <td>
                                            @if ($type == 'agent')
                                                {{$user->title ?? $user->username}} ({{$user->id}})
                                            @elseif ($type == 'customer')
                                                {{$user->name ?? $user->username}} ({{$user->id}})
                                            @endif
                                        </td>
                                        <td>{{ $transaction->details }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-danger h4">No Transaction Found</td>
                                    </tr>
                                @endforelse
                                </tbody>

                            </table>

                            {{ $transactions->render() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection


@push('js')

@endpush

