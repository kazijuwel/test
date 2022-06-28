<div class="col-sm-12">
    @include('alerts.alerts')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                Advance Search
            </h3>
        </div>
        <div class="card-body">
{{--            <form action="{{ route('company.serchFlight',$company) }}" method="GET" class="form-group">--}}
                <form action="{{route('airSearch',['usertype'=>'agent'])}}" method="GET" id="airSearch" class="form-group">
                    <input type="hidden" name="company" value="{{$company->id}}">
                    <div class="row">
                        <div class="col-12 col-md-10">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <label for=""><i class="fa fa-plane-departure"></i> From</label>
                                    <div class="text-left pl2">
                                        <select id="user" name="from" role="textbox"
                                                class="form-control user-select select2-container step2-select select2"
                                                data-placeholder="Select City" data-ajax-url="{{ route('welcome.tripSearchAjax2') }}"
                                                data-ajax-cache="true" data-ajax-dataType="json" data-ajax-delay="200" style="">
                                            <option value="DAC" selected>DHAKA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-5">
                                    <label for=""><i class="fa fa-plane-arrival"></i> TO</label>
                                    <div class="">
                                        <select id="modal-container" name="to" class="seleect5 search form-control"
                                                data-placeholder="Select City" data-ajax-url="{{ route('welcome.tripSearchAjax2') }}"
                                                data-ajax-cache="true" data-ajax-dataType="json" data-ajax-delay="200" style="">
                                            <option value="JED" selected>Jedda</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="col-12 col-md-5 pt-3">
                                    <label for=""><i class="fa fa-calendar"></i> Departure Date</label>
                                    <input type="date" name="departs" class="form-control" placeholder="Date" value="{{\Carbon\Carbon::tomorrow()->format('Y-m-d')}}" id="">
                                </div>
                                <div class="col-12 col-md-5 pt-3">
                                    <label for="return"><i class="fa fa-calendar"></i> Return Date</label>
                                    <input type="date" name="return"  class="form-control" placeholder="Date"
                                           id="">
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="" style="padding-top: 25px">
                                <lable></lable>
                                <button type="button" class="btn btn-outline-danger form-control" data-toggle="modal" data-target="#modal-sm">
                                    <i class="fas fa-user-plus"></i> Add Passenger
                                </button>
                            </div>
                            <div class="" style="padding-top: 40px">
                                <input type="submit" value="search" id="airSerchBtn" class="btn btn-info form-control">
                            </div>

                        </div>
                        <!-- /.modal -->

                        <div class="modal fade" id="modal-sm">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Passenger</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <lable for="adult">Adult (12-12yrs)</lable>
                                            <input type="number" name="adult" class="form-control" min="1" value="1">
                                        </div>
                                        <div class="form-group">
                                            <lable for="children">Children (2-less then 12yrs)</lable>
                                            <input type="number" name="children" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <lable for="infant">Infant (less then 32 yrs)</lable>
                                            <input type="number" name="infant" class="form-control">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <div class="row">
                                            <div class="col-12"><b>Cabin Class</b></div>
                                            <div class="col-12">
                                                <lable for="economy">
                                                    <input type="radio" name="cabinClass" id="economy" value="Economy"> Economy
                                                </lable>
                                            </div>
                                            <div class="col-12">
                                                <lable for="business">
                                                    <input type="radio" name="cabinClass" id="business" value="Business"> Business
                                                </lable>
                                            </div>
                                            <div class="col-12">
                                                <lable for="firstClass">
                                                    <input type="radio" name="cabinClass" id="firstClass" value="First Class"> First Class
                                                </lable>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    </div>

            </form>
        </div>
    </div>
</div>
