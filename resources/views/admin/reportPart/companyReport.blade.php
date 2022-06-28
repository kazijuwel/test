<div class="col-sm-12">
    <div class="card card-widget">
        <div class="card-body" style="min-height: 400px;">
          
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped table-sm ">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Company ID</th>
                        <th>Order ID</th>
                        <th>Company code</th>
                        
                        <th>Date</th>
                        <th>Mobile</th>
                        <th>Comission</th>                        
                        <th>Company Details</th>
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
                            <td>{{$report->company->id}}</td>
                            <td>{{$report->id}}</td>
                            <td>{{$report->company->company_code}}</td>
                            <td>{{$report->created_at}}</td>
                            <td>{{$report->company->mobile}}</td>
                            <td>{{$report->company_commission_in_amount}}</td>
                            <td>{{$report->company->address}}, {{$report->company->zip}}</td>

                        </tr>
                        @php
                            $balance =$balance + $report->company_commission_in_amount;
                            
                        @endphp
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>Total</th>
                            <th>{{$balance}}</th>
                            <td></td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>