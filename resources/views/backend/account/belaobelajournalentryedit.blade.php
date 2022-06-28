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

                        <form method="post" action="{{ route('updatebelaobelaentries') }}">
                            
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Date</label>
                                <input type="date" class="form-control" name="date" value="{{ $voucher->date }}" >
                                <input type="hidden" value="{{ $voucher->id }}" name="oldvoucherID" >
                            </div>
        
                            <div class="form-group">
                                <label for="exampleInputEmail1">Narration</label>
                                <input type="text" class="form-control" name="narration" value={{ $voucher->name }} >
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
                                @foreach($voucher->voucherItems as $v_items )
                                <div class="form-row del2 mt-2">
                                    <div class="col-3">
                                        <select id="js-example-disabled-results" name="chart_id[]">
                                            @foreach ($coa_all as $item)
                                                <option value=" {{ $item->id }}" {{ ( $item->id == $v_items->chartof_account_id) ? 'selected' : '' }}>{{ $item->name }}-- -{{ $item->account_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <input type="text"  name="debit[]" class="debit" value="{{ $v_items->debit }}" >
                                    </div>
                                    <div class="col-3">
                                        <input type="text" name="credit[]" class="credit" value="{{ $v_items->credit }}">
                                    </div>
                                    <div class="col-3">
                                        <input type="text" name="desc[]" value="{{  $v_items->description }}">
                                    </div>
                                </div>
                                @endforeach

                            </div>
                          

                            <br>
                            <div id="message"></div>
                            <button type="button" id="addline">Add Line</button>
                            <br>
                            <br>



                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('voucherentriesdelete',$voucher->id) }}" type="button" class="btn btn-primary">Delete</a>
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
                                        <select id="exampleFormControlSelect1" name="chart_id[]">
                                            @foreach ($coa_all as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}-- -{{ $item->account_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <input type="text" value="" name="debit[]" class="debit">
                                    </div>
                                    <div class="col-3">
                                    <input type="text" value="" name="credit[]" class="credit">
                                    </div>

                                    <div class="col-2">
                                        <input type="text" value="" name="desc[]">
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