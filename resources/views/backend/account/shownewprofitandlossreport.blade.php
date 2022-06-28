@extends('backend.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="text-center p-3">
                    <h5 class="">belaobela.com</h5>
                    <h4>Profit and Loss Statement</h4>
                    <p>From:   {{date('d/m/Y',strtotime($start)) }}   --- To: {{date('d/m/Y',strtotime($end)) }}</p>
                </div>
                <hr>
                <div class="card-body">

                    @php
                        $totalIncomeBalance = 0;
                    @endphp


                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-success">
                        <th scope="col">Particulars</th>
                        <th scope="col">Amount(Tk)</th>
                        <th scope="col">Amount(Tk)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($coaIncomes as $type)
                    <tr>
                        <td>
                           <b>Operting </b><span class="text-left text-capitalize"><b>{{ $type->name }} :</b></span>
                        </td>
                        <td></td>
                        <td></td>

                    </tr>





                        @foreach($type->subGroupAccount($type->id) as $sg)

                        <tr>
                            <th scope="row">
                                <span class="text-left text-capitalize"><b>{{ $sg->name }} :</b></span>
                            </th>
                            <td></td>
                            <td></td>

                          </tr>

                        @php
                            $subtotalBalance=0;
                            foreach($sg->childAccount as $tb)
                            {
                                $subtotalBalance+=$tb->balance($start,$end, 'credit');

                            }
                        @endphp


                            @foreach($sg->childAccount as $coa)

                            <tr>
                                <th scope="row">
                                    <span class="text-left text-capitalize"><b>{{ $coa->name }}</b></span>
                                </th>
                                <td>
                                    <a href="{{ route('voucheritems',[$coa->id,'credit','profit_loss',$start,$end]) }}">{{ $coa->balance($start,$end, 'credit') }} Tk</a>
                                </td>
                                <td></td>

                              </tr>
                            @endforeach

                            @php
                                 $totalIncomeBalance = $totalIncomeBalance + $subtotalBalance;
                            @endphp
                            <tr>
                                <td>Total {{ $sg->name }}</td>
                                <td>{{ $subtotalBalance }}</td>
                            </tr>

                        {{-- - <b> Total {{ $sg->name }}: {{ $subtotalBalance }} </b> --}}

                        @endforeach


                        @foreach ($type->childAccount as $ma)
                        <tr>
                            <td>{{ $ma->name }}</td>
                            <td> <a href="{{ route('voucheritems',[$ma->id,'credit','profit_loss',$start,$end]) }}"><b> {{ $ma->balance($start,$end, 'credit') }} Tk </b></a></td>
                            <td></td>

                        </tr>
                        {{-- <div class="row">
                            <div class="col-10">
                                  <span class="pl-5">{{ $ma->name }}</span>
                            </div>
                            <div class="col-2 text-right">
                                   <a href="{{ route('voucheritems',[$ma->id,'credit','profit_loss',$start,$end]) }}"><b> {{ $ma->balance($start,$end, 'credit') }} </b></a>
                            </div>
                        </div> --}}
                        {{-- <br> --}}

                        @php
                        $totalIncomeBalance = $totalIncomeBalance + $ma->balance($start,$end, 'credit');
                        @endphp
                        @endforeach
                    @endforeach
                        <tr>
                            <td>
                                <span class="pl-4">
                                <b>Total Income:</b></span></td>
                            <td></td>
                            <td><b>{{ $totalIncomeBalance }} Tk</b></td>
                        </tr>


                        {{-- <div class="row">
                            <div class="col-10">
                                <span class="pl-5">
                                <b>Total Income:</b></span></div>
                            <div class="col-2 text-right">
                                <div class="border border-left-0 border-right-0">
                                    <b>{{ $totalIncomeBalance }}</b>
                                  </div>
                            </div>
                        </div> --}}

                     <!-----------Liabilities----->

                     <br>

                     @php
                         $totalExpenseBalance = 0;
                     @endphp


                    @foreach($coaExpenses as $type)
                    <tr>
                        <td><span class="text-capitalize"><b>Operting </b><b>{{ $type->name }} :</b></span></td>
                        <td></td>
                    </tr>
                    {{-- <span class="text-left text-capitalize"><b>{{ $type->name }} :</b> <br></span> --}}
                        @foreach($type->subGroupAccount($type->id) as $lia)
                            <tr>
                                <td>{{ $lia->name }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                        {{-- <span class="text-left text-capitalize"><b>{{ $lia->name }} :</b> <br></span> --}}
                        @php
                            $subtotalBalance=0;
                            foreach($lia->childAccount as $tb)
                            {
                                $subtotalBalance+=$tb->balance($start,$end, 'debit');
                            }
                        @endphp


                            @foreach($lia->childAccount as $coa)
                            <tr>
                                <td>
                                    <span class="">{{ $coa->name }}</span>
                                </td>
                                <td><a href="{{ route('voucheritems',[$coa->id,'debit','profit_loss',$start,$end]) }}">{{ $coa->balance($start,$end, 'credit') }} Tk</a></td>
                                <td></td>
                            </tr>
                            {{-- <div class="row">
                                <div class="col-6 mt-1">
                                    <span class="">{{ $coa->name }}</span>
                                </div>
                                <div class="col-6 text-right mt-1">
                                    <a href="{{ route('voucheritems',[$coa->id,'debit','profit_loss',$start,$end]) }}">{{ $coa->balance($start,$end, 'credit') }}</a>
                                </div>
                            </div> --}}
                            @endforeach
                            <tr>
                                <td> <span class="">Total {{ $lia->name }}:</span></td>
                                <td></td>
                                <td> <b>  {{ $subtotalBalance }} </b></td>

                            </tr>

                            {{-- <div class="row">
                                <div class="col-10 mt-1">
                                    <span class="">Total {{ $lia->name }}:</span>
                                </div>
                                <div class="col-2 text-right mt-1">
                                    <div class="border border-left-0 border-right-0">
                                        <b>  {{ $subtotalBalance }} </b>
                                      </div>

                                </div>
                            </div> --}}
                        {{-- -  <br> --}}

                        @php
                            $totalExpenseBalance = $totalExpenseBalance + $subtotalBalance;
                        @endphp

                        @endforeach
                        @foreach ($type->childAccount as $exp)
                        <tr>
                            <td>{{ $exp->name }}</td>
                            <td><a href="{{ route('voucheritems',[$exp->id,'debit','profit_loss',$start,$end]) }}"> <b> {{ $exp->balance($start,$end, 'debit') }} Tk </b></a></td>
                            <td></td>
                        </tr>
                        {{-- <div class="row">
                            <div class="col-10">
                                  <span class="pl-5">{{ $exp->name }}</span>
                            </div>
                            <div class="col-2 text-right">
                                  <a href="{{ route('voucheritems',[$exp->id,'debit','profit_loss',$start,$end]) }}"> <b> {{ $exp->balance($start,$end, 'debit') }} </b></a>
                            </div>
                        </div> --}}
                        {{-- <br> --}}

                            @php
                            $totalExpenseBalance = $totalExpenseBalance + $exp->balance($start,$end, 'debit');
                            @endphp
                        @endforeach


                    @endforeach
                    <tr>
                        <td><span class="pl-4">
                            <b>Total Expense:</b></span></td>
                        <td></td>
                        <td> <b>{{ $totalExpenseBalance }} Tk</b></td>
                    </tr>
                    {{-- <div class="row">
                        <div class="col-10">
                            <span class="pl-5">
                            <b>Total Expense:</b></span></div>
                        <div class="col-2 text-right">
                            <div class="border border-left-0 border-right-0">
                                <b>{{ $totalExpenseBalance }}</b>
                              </div>
                        </div>
                    </div> --}}
                    {{-- <br> --}}

                    <tr >
                        <td style="background: yellow"><b>Net Income:</b></td>
                        <td></td>
                        <td><b>{{ ($totalIncomeBalance - $totalExpenseBalance) > 0 ? ($totalIncomeBalance - $totalExpenseBalance) : '('.abs($totalIncomeBalance - $totalExpenseBalance).')'}} Tk</b></td>
                    </tr>
                    {{-- <b>Net Profit: {{ ($totalIncomeBalance - $totalExpenseBalance) > 0 ? ($totalIncomeBalance - $totalExpenseBalance) : '('.abs($totalIncomeBalance - $totalExpenseBalance).')'}}</b> --}}


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
