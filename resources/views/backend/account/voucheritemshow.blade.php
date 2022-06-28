@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        Summery
                    </div>
                    <div class="card-body">
                       <div class="row">
                        <table class="table" class="table aiz-table mb-0">
                            <thead>
                              <tr>
                                <th scope="col">View</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Date</th>
                                <th scope="col">Description</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Balance</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                   $totalBalance=0;
                                @endphp
                             @if($balanceType == "debit")
                                @foreach ($VoucherItems as $vs)
                                @if($vs->debit != Null)
                                @php
                                    $totalBalance= $totalBalance+$vs->debit;
                                @endphp
                                 <tr>
                                    <td><a href="{{ route('vourcherview',$vs->voucher->id) }}" class="btn btn-light btn-sm">View</a></td>
                                    <td><a href="{{ route('vourcheredit',$vs->voucher->id) }}" class="btn btn-light btn-sm">Edit</a></td>
                                    <td>{{ $vs->voucher->date }}</td>
                                    <td>{{$vs->voucher->name }}</td>
                                    <td>
                                        {{ $vs->debit }}
                                    </td>
                                    <td>{{ $totalBalance }}</td>
                                  </tr>

                                  @endif
                                @endforeach
                                <tr>
                                    <td colspan="4"></td>
                                      <td>{{ $totalBalance   }}</td>
                                      <td></td>
                                  </tr>
                        @elseif($balanceType == "credit")

                            @foreach ($VoucherItems as $vs)
                            @if($vs->credit != Null)
                            @php
                            $totalBalance= $totalBalance+$vs->credit;
                           @endphp
                            <tr>
                               <td><a href="{{ route('vourcherview',$vs->voucher->id) }}" class="btn btn-light btn-sm">View</a></td>
                               <td><a href="{{ route('vourcheredit',$vs->voucher->id) }}" class="btn btn-light btn-sm">Edit</a></td>
                               <td>{{ $vs->voucher->date }}</td>
                               <td>{{$vs->voucher->name }}</td>
                               <td>-{{ $vs->credit }}</td>
                               <td>-{{ $totalBalance }}</td>
                             </tr>
                             @endif
                           @endforeach
                           <tr>
                               <td colspan="4"></td>
                                 <td>-{{ $totalBalance }}</td>
                                 <td></td>
                             </tr>
                        @else
                        @foreach ($VoucherItems as $vs)
                            @php
                            $totalBalance= $totalBalance+$vs->debit-$vs->credit;
                            @endphp
                        <tr>
                           <td><a href="{{ route('vourcherview',$vs->voucher->id) }}" class="btn btn-light btn-sm">View</a></td>
                           <td><a href="{{ route('vourcheredit',$vs->voucher->id) }}" class="btn btn-light btn-sm">Edit</a></td>
                           <td>{{ $vs->voucher->date }}</td>
                           <td>{{$vs->voucher->name }}</td>
                           <td>
                              {{  ($vs->debit != Null)? $vs->debit : "-".$vs->credit }}
                           </td>
                           <td>{{ $totalBalance }}</td>
                         </tr>
                       @endforeach
                       <tr>
                           <td colspan="4"></td>
                             <td>{{ $totalBalance }}</td>
                             <td></td>
                         </tr>
               
                       @endif

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