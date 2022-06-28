<div class="col-sm-12">
    <div class="card card-widget">
        <div class="card-body" style="min-height: 400px;">
          
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped table-sm ">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Order ID</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Date</th>      
                        <th>Price</th>
                        <th>Mobile</th>
                    </tr>
                    </thead>
                    @if(isset($reports))
                        @php
                            $i = 1;
                            $balance = 0;
                            
                        @endphp
                        @foreach ($reports as $report)

                        <tr>
                            <td>{{$i++}}</td>
                            <th>{{ $report->id }}</th>
                            <td>{{$report->user_id}}</td>
                            <td>{{$report->user->name}}</td>
                            <td>{{$report->created_at}}</td>
                            <td>{{$report->final_price}}</td>
                            <td>{{$report->user->mobile}}</td>
                            
                            {{-- <td>{{$report->company->address}}, {{$report->company->zip}}</td> --}}

                        </tr>
                        @php
                            $balance =$balance + $report->final_price;
                            
                        @endphp
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            <td>{{$balance}}</td>
                            <td></td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>