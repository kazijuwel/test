@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        All Journal List
                        <a href="{{ route('voucher_entries_modify') }}" class="btn btn-light btn-sm">New Journal Entry</a>
                    </div>
                    <div class="card-body">
                       <div class="row">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">View</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Date</th>
                                <th scope="col">Description</th>
                                <th scope="col">Debit</th>
                                <th scope="col">Credit</th>
                                <th scope="col">Balance</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                   $totalBalance  = 0;
                                   $totalDebit    = 0;
                                   $totalCredit   = 0;
                                   $Balance=0;
                                //    $Balance2=0;
                                //    foreach ($VoucherItems as $vs) {
                                //     $Balance1=  $Balance1+$vs->debit;
                                //     $Balance2= $Balance2+$vs->credit;
                                //    }
                                //    $balance=$Balance1- $Balance2
                                @endphp

                                @foreach ($VoucherItems as $vs)
                                 <tr>
                                    @php
                                    $totalDebit=  $totalDebit+$vs->debit;
                                    $totalCredit= $totalCredit+$vs->credit;
                                    @endphp

                                    <td><a href="{{ route('vourcherview',$vs->voucher->id) }}" class="btn btn-light btn-sm">View</a></td>
                                    <td><a href="{{ route('vourcheredit',$vs->voucher->id) }}" class="btn btn-light btn-sm">Edit</a></td>
                                    <td>{{ $vs->voucher->date }}</td>
                                    <td>{{$vs->voucher->name }}</td>
                                    <td>
                                        {{$vs->debit }}

                                    </td>
                                    <td>
                                        {{ $vs->credit }}
                                    </td>
                                    @php
                                         $Balance +=+$vs->credit - $vs->debit;
                                    @endphp
                                    <td>
                                        @if($Balance < 0)
                                        {{ abs($Balance)}} dr
                                        @else
                                        {{ abs($Balance)}} cr
                                        @endif
                                    </td>
                                  </tr>

                                @endforeach
                                <tr>
                                  <td colspan="4"></td>
                                    <td> {{$totalDebit}}</td>
                                    <td> {{$totalCredit}}</td>
                                    <td></td>
                                  </tr>

                            </tbody>
                          </table>
                          <div class="aiz-pagination">

                        </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
