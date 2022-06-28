@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('searchjournalentry') }}" class="m-3" method="GET">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <input type="hidden" value="{{ $start }}" name="start">
                            <input type="hidden" value="{{ $end }}" name="end">
                            <input type="hidden" value="{{ $accountType }}" name="accounttype">
                          <div class="col-4">
                            <label for="inputEmail4">User Name</label>
                            <select class="form-select form-control js-example-disabled-results" aria-label="" name="usertype">
                            <option value=" ">Select User Name</option>
                                @foreach($users as $user)

                                  <option value="{{ $user->id}}">{{ $user->name}}</option>


                                @endforeach
                            </select>



                              {{-- @if($accountType == "Local Purchase")
                              <label for="inputEmail4">Seller</label>
                              <select class="form-select form-control js-example-disabled-results" aria-label="" name="usertype">
                              <option value=" ">Select Seller Name</option>
                                  @foreach($sellers as $user)
                                  @if($user->user)
                                    <option value="{{ $user->user_id}}">{{ $user->user->name}}</option>
                                   @endif
                                  @endforeach
                              </select>
                              @endif
                              @if($accountType == "Accounts Receivables / Customer")
                              <label for="inputEmail4">Customer</label>
                              <select class="form-select form-control js-example-disabled-results" aria-label="" name="usertype">
                              <option value=" ">Select Customer Name</option>
                                  @foreach($customers as $user)
                                  @if($user->user)
                                    <option value="{{ $user->user_id}}">{{ $user->user->name}}</option>
                                    @endif

                                  @endforeach
                              </select>
                              @endif --}}
                          </div>
                          <div class="col-4">
                            <label for="inputEmail4">Order ID</label>
                            <input type="text" class="form-control" name="orderid">
                          </div>
                          <div class="col-2">
                            <label for="inputEmail4"></label>
                                <button type="submit" class="btn btn-primary">Filter</button>

                          </div>
                        </div>
                        </div>
                      </form>
                    <div class="card-header bg-secondary">
                        Journal list

                    </div>
                    <div class="card-body">
                       <div class="row">
                        <table class="table" class="table aiz-table mb-0">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Narration</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Seller</th>
                                <th scope="col">Debit Amount</th>
                                <th scope="col">Credit Amount</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                              </tr>
                            </thead>
                            <tbody>

                            @foreach ($voucharItems as $vI)

                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $vI->voucher->name }}</td>
                                <td>
                                    @if($vI->customer)
                                     <a href="{{ route("uservoucherlist",['user_id'=>$vI->user_id,'ac_type'=>$chartaccountId,'start'=>$start,'end'=>$end])}}">{{ $vI->customer->name  }}</a>
                                    @endif
                                </td>
                                <td>
                                    @if($vI->seller)
                                    @php
                                         $sellers=$vI->voucher;
                                    @endphp
                                        @foreach($sellers->voucherItems()->groupBy('seller_id')->get() as $seller)

                                        <a href="{{ route('sellervoucherlist',['seller_id'=>$seller->seller->id,'ac_type'=>$chartaccountId,'start'=>$start,'end'=>$end]) }}" target="_blank">{{$seller->seller->name }}</a>

                                        <br>

                                        @endforeach
                                    @endif
                                    {{-- @if($vI->seller)
                                    <a href="{{ route('sellervoucherlist',['seller_id'=>$vI->seller_id,'ac_type'=>$chartaccountId,'start'=>$start,'end'=>$end]) }}" target="_blank">{{$vI->seller->name }}</a>
                                    @endif --}}
                                </td>
                                <td>{{ $vI->total_debit}}</td>
                                <td>{{ $vI->total_credit }}</td>
                                <td>
                                    {{ date('d/m/Y',strtotime($vI->voucher->created_at)) }}
                                </td>
                                <td>
                                    {{-- <a href="{{ route('addtopurchasepaidview',) }}" type="button" class="btn btn-warning">Purchase Paid</a> --}}
                                    <a href="{{ route('belaobelajournalentryedit',$vI->voucher->id) }}" type="button" class="btn btn-primary btn-sm">View</a>
                                </td>

                            </tr>

                            @endforeach

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
<script>
var $disabledResults = $(".js-example-disabled-results");
$disabledResults.select2();
</script>

@endsection
