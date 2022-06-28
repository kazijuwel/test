@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card" style="width: 90%;">
                    <div class="card-header">
                        <h5 class="text-secondary">Journal Entry</h5>
                    </div>
                    <div class="card-body">

                        <form method="post" action="{{ route('storevoucherentries') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Date</label>
                                <input type="date" class="form-control" name="date" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Narration</label>
                                <input type="text" class="form-control" name="narration" required>
                            </div>

                            <div class="form-row">
                                <div class="col-3">
                                    <label for="">Accounts</label>
                                </div>
                                <div class="col-3">
                                    <label for="">Debit</label>
                                </div>
                                <div class="col-3">
                                    <label for="">Credit</label>
                                </div>
                                <div class="col-3">
                                    <label for="">Description</label>
                                </div>
                            </div>

                            <div id="accounts">
                                <div class="form-row del2">
                                    <div class="col-3">
                                    <select id="js-example-disabled-results" name="chart_id[]" class="form-control">
                                            @foreach ($coa_all as $item)
                                                <option value=" {{ $item->id }}">{{ $item->name }}-- -{{ $item->account_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <input type="text" value="" name="debit[]" class="debit form-control" >
                                    </div>
                                    <div class="col-3">
                                        <input type="text" value="" name="credit[]" class="credit form-control">
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" value="" name="desc[]">
                                    </div>
                                </div>

                                <div class="form-row mt-2 del2">
                                    <div class="col-3">
                                        <select id="exampleFormControlSelect1" name="chart_id[]" class="form-control">
                                            @foreach ($coa_all as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}-- -{{ $item->account_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <input type="text" value="" name="debit[]" class="debit form-control">
                                    </div>
                                    <div class="col-3">
                                        <input type="text" value="" name="credit[]" class="credit form-control">
                                    </div>
                                    <div class="col-3">
                                        <input type="text" value="" name="desc[]" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <br>
                            <div id="message"></div>
                            <button type="button" id="addline">Add Line</button>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-success">create</button>
                            <button type="button" class="btn btn-primary">create and another</button>
                        </form>
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
    <script>
        $("#addline").click(function() {
        var i=0
            var box = ` <div class="form-row del2 mt-2">
                                    <div class="col-3">
                                        <select id="exampleFormControlSelect1" name="chart_id[]" class="form-control">
                                            @foreach ($coa_all as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}-- -{{ $item->account_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <input type="text" value="" name="debit[]" class="debit form-control">
                                    </div>
                                    <div class="col-3">
                                    <input type="text" value="" name="credit[]" class="credit form-control">
                                    </div>

                                    <div class="col-2">
                                        <input type="text" value="" name="desc[]" class="form-control">
                                    </div>
                                    <div class="col-1">
                                        <input type="button" class="del" value="delete">
                                    </div>
                                </div>`;
            $("#accounts").append(box);
        });
        $(document).on('click','.del',function(){
           var that= (this);
           console.log(that);
        var s=   that.closest('div.del2').remove();

        });


        $(document).on('change','.del2',function(){
            var totalDebit= 0;
            var totalcredit= 0;
            document.querySelectorAll("input.debit").forEach(element => {
                totalDebit +=parseInt($(element).val());
            });

            document.querySelectorAll("input.credit").forEach(element => {
                totalcredit +=parseInt($(element).val());
            });

            if(totalDebit != totalcredit )
            {
                $("#message").html("Out of Balance");
            }else if(totalDebit == totalcredit ){
                $("#message").html("Balance metch");
            }

               });
    </script>
@endsection
