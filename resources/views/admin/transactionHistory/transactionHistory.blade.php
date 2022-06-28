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
                            All Balance Transaction of {{ucfirst($type)}}
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
                                <?php $i = (($transaction_histories->currentPage() - 1) * $transaction_histories->perPage() + 1); ?>

                                @forelse($transaction_histories as $transaction)


                                    <tr>

                                        <td>{{ $transaction->id }}</td>
                                        <td>{{ $transaction->moved_balance }}</td>
                                        <td>{{ $transaction->purpose }}</td>
                                        <td>
                                            @if ($type == 'agent')
                                                {{$transaction->agent ?? $transaction->agent->username ? $transaction->agent->username : $transaction->agent->title}} ({{$transaction->agent ? $transaction->agent->id : ''}})
                                            @elseif ($type == 'customer')
                                                {{$transaction->customer ?? $transaction->customer->name ? $transaction->customer->username : $transaction->agent->title}} ({{$transaction->customer ? $transaction->customer->id : ''}})

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

                            {{ $transaction_histories->render() }}

                        </div>



                    </div>
                </div>
            </div>
        </div>



    </section>
@endsection


@push('js')

@endpush

