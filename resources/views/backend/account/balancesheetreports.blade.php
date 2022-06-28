@extends('backend.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h3 class="">belaobela</h3>
                    <p>From:   {{ $start }}   --- To:  {{$end}}</p>
                </div> --}}
                    <div class="text-center p-3">
                        <h5 class="">belaobela.com</h5>
                        <h4>Balance Sheet</h4>
                        <p>From:   {{date('d/m/Y',strtotime($start)) }}   --- To: {{date('d/m/Y',strtotime($end)) }}</p>
                        <div class="card-header d-flax justify-content-end">
                           <p class="btn btn-primary"> Net Asset:<span id="AssetBalance">

                               </span></p>
                        </div>
                    </div>


                <div class="card-body">
                    @php
                        $totalAssetBalance = 0;
                    @endphp
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Account Head</th>
                            <th>balance</th>
                          </tr>
                       </thead>
                       <tbody>



                    @foreach($coaAssets as $type)
                    <tr>
                        <td>
                            <span class="text-left text-capitalize">
                                <b>{{ $type->name }} :</b> 
                            </span>
                        </td>
                        <td>
                        </td>
                    </tr>

                        @foreach($type->subGroupAccount($type->id) as $sg)
                        <tr>
                            <td>
                                <span class=""><b>{{ $sg->name }}</b></span>
                            </td>
                            <td></td>
                        </tr>

                        
                        @php
                            $subtotalBalance=0;
                            foreach($sg->childAccount as $tb)
                            {
                                $subtotalBalance+=$tb->balance($start,$end, 'debit');

                            }
                        @endphp


                            @foreach($sg->childAccount as $coa)
                            <tr>
                                <td>
                                    <span class="p-5">{{ $coa->name }}</span>
                                </td>
                                <td><a href="{{ route('voucheritems',[$coa->id,'liabilities','balance_sheet',$start,$end]) }}">{{ round($coa->balance($start,$end, 'debit')) }}</a></td>
                            </tr>
                            {{-- <div class="row">
                                <div class="col-6 mt-1"><span class="p-5">{{ $coa->name }}</span></div>
                                <div class="col-6 text-right mt-1"><a href="{{ route('voucheritems',[$coa->id,'liabilities','balance_sheet',$start,$end]) }}">{{ round($coa->balance($start,$end, 'debit')) }}</a></div>
                            </div> --}}
                            @endforeach

                            @php
                                 $totalAssetBalance = $totalAssetBalance + $subtotalBalance;
                            @endphp

                            <tr>
                                <td>
                                    <b class="">Total {{ $sg->name }}:</b>
                                </td>
                                <td>
                                    <b> {{ round($subtotalBalance) }} </b>
                                </td>
                            </tr>
                         {{-- <div class="row mt-1">
                             <div class="col-10">

                                    <b class="">Total {{ $sg->name }}:</b>


                             </div>
                             <div class="col-2 text-right">
                                <div class="border border-left-0 border-right-0">

                                    <b> {{ round($subtotalBalance) }} </b>
                               </div>

                             </div>
                         </div>
                         <br> --}}
                        @endforeach

                        @foreach ($type->childAccount as $ma)
                        <tr>
                            <td><b class="p-1">{{ $ma->name }}</b></td>
                            <td> {{ round($coa->balance($start,$end, 'credit')) }}</td>
                        </tr>
                        {{-- <div class="row mt-1">
                            <div class="col-10">
                                   <b class="p-1">{{ $ma->name }}</b>
                            </div>
                            <div class="col-2 text-right">
                               <div class="border border-left-0 border-right-0">
                                   {{ round($coa->balance($start,$end, 'credit')) }}
                              </div>

                            </div>
                        </div>
                        <br> --}}

                        @php
                        $totalAssetBalance = $totalAssetBalance + $coa->balance($start,$end, 'credit');
                       @endphp
                        @endforeach

                    @endforeach

                    <tr>
                        <td><span class="font-weight-bold text-danger">
                            Total Assets
                        </span>
                        </td>
                        <td>{{ round($totalAssetBalance) }}</td>
                    </tr>
                    {{-- <hr class="m-1">
                        <div class="row">
                            <div class="col-10 text-danger">
                                    <b>Total Assets</b>
                            </div>
                            <div class="col-2">
                              <p class="text-right text-danger text-bold">{{ round($totalAssetBalance) }}</p>
                            </div>
                        </div>
                        <hr class="m-0"> --}}
<!---LiabitiesBalance--------->
                     @php
                         $totalLiabitiesBalance = 0;
                     @endphp


                    @foreach($coaLiabilities as $type)

                    <tr>
                        <td>{{ $type->name }}</td>
                        <td></td>
                    </tr>
                    {{-- <span class="text-capitalize"><b> {{ $type->name }} :</b></span> <br> --}}

                        @foreach($type->subGroupAccount($type->id) as $lia)
                        <tr>
                            <td>{{ $lia->name }}</td>
                            <td></td>
                        </tr>
                       {{-- <span class="p-3"><b>{{ $lia->name }}</b></span>
                        <br> --}}
                        @php
                            $subtotalBalance=0;
                            foreach($lia->childAccount as $tb)
                            {
                                $subtotalBalance+=$tb->balance($start,$end, 'credit');
                            }
                        @endphp
                            @foreach($lia->childAccount as $coa)
                            <tr>
                                <td>{{ $coa->name }}</td>
                                <td><a href="{{ route('voucheritems',[$coa->id,'liabilities','balance_sheet',$start,$end]) }}"><b>{{ $coa->balance($start,$end, 'credit') }}</b> </a></td>
                            </tr>
                            {{-- <div class="row">
                                <div class="col-6 mt-1"><span class="p-5">{{ $coa->name }}</span></div>
                                <div class="col-6  mt-1 text-right">

                                    <a href="{{ route('voucheritems',[$coa->id,'liabilities','balance_sheet',$start,$end]) }}"><b>{{ $coa->balance($start,$end, 'credit') }}</b> </a>
                                </div>
                               </div> --}}
                            @endforeach
                            <tr>
                                <td> 
                                    <b class="">Total  {{ $lia->name }}:</b>
                                </td>
                                <td>
                                    <b> {{ $subtotalBalance }} </b>
                                </td>
                            </tr>
                            {{-- <div class="row mt-1">
                                <div class="col-10">
                                    <b class="">Total  {{ $lia->name }}:</b>
                                </div>
                                <div class="col-2 text-right">
                                    <div class="border border-left-0 border-right-0">
                                        <b> {{ $subtotalBalance }} </b>
                                   </div>
                                </div>
                            </div> --}}

                        @php
                            $totalLiabitiesBalance = $totalLiabitiesBalance + $subtotalBalance;
                        @endphp

                        @endforeach

                        @foreach ($type->childAccount as $ma)
                        <tr>
                            <td>{{ $ma->name }}</td>
                            <td>                                   <b> {{ $ma->balance($start,$end, 'credit') }} </b></td>
                        </tr>
                        {{-- <div class="row mt-1">
                            <div class="col-10">

                                   <b class="p-5">{{ $ma->name }}:</b>


                            </div>
                            <div class="col-2 text-right">
                               <div class="border border-left-0 border-right-0">

                                   <b> {{ $ma->balance($start,$end, 'credit') }} </b>
                              </div>

                            </div>
                        </div>
                        <br> --}}

                        @php
                        $totalLiabitiesBalance = $totalLiabitiesBalance + $coa->balance($start,$end, 'credit')+$ma->balance($start,$end, 'credit');
                       @endphp
                        @endforeach


                    @endforeach
                    <tr>
                        <td>
                            <span class="font-weight-bold">Net Profit/Loss:</span>
                        </td>
                        <td><b> {{ ($totalAssetBalance - $totalLiabitiesBalance) > 0 ? ($totalAssetBalance - $totalLiabitiesBalance) : '('.-($totalAssetBalance - $totalLiabitiesBalance).')'}}</b></td>
                    </tr>
                    <tr>
                        <td><span class=" font-weight-bold text-danger">Total Liabilities</span></td>
                        <td>{{ $totalLiabitiesBalance }}</td>
                    </tr>
                    {{-- <hr>
                    <div class="row">
                        <div class="col-10 font-weight-bold text-danger">Total Liabilities:</div>
                        <div class="col-2 text-right">
                            <div class="text-danger">

                                <b> {{ $totalLiabitiesBalance }}</b>
                           </div>

                        </div>
                    </div>
                    <hr> --}}

                    {{-- <hr> --}}

                    {{-- <div class="row">
                        <div class="col-6 font-weight-bold text-danger">Net Assets:</div>
                        <div class="col-6 text-right text-danger"> <b> {{ ($totalAssetBalance - $totalLiabitiesBalance) > 0 ? ($totalAssetBalance - $totalLiabitiesBalance) : '('.-($totalAssetBalance - $totalLiabitiesBalance).')'}}</b>
                        </div>
                    </div> --}}
{{-- 
                    <hr> --}}
                </tbody>
            </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
