<script>
    $(function() {

        var s_t = '';

        function formatState(state) {

            var $state = $(
                '<div class="media">  <img class="mr-3" src="' + state.image +
                '" alt="Generic placeholder image"> <div class="media-body">' + state.name +
                ' &nbsp; </br> <b>ID: </b> ' + state.id + '  Unit Price: ' + state.unit_price +
                '</div> </div>'
            );
            return $state;
        };

        $('.select2').select2({
            closeOnSelect: true,
            templateResult: formatState,
            ajax: {
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    params.page = params.page || 1;
                    // alert(data[0].s);
                    var data = $.map(data, function(obj) {
                        obj.id = obj.id || obj.name;
                        return obj;
                    });
                    var data = $.map(data, function(obj) {
                        obj.text = obj.text || obj.name;
                        return obj;
                    });
                    return {
                        results: data,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                }
            },
        });
        $('.select2').on('change',function(){
            var product_id = $(this).val();
            var url ="{{route('getProductPrice')}}";
            var finalUrl = url+"?product_id="+product_id;
            $.ajax({
                url:finalUrl,
                method:"GET",
                success:function(res){
                    $('#sale_price').val(res.unit_price);
                }
            })
        })

        $('#submitTempForm').on('submit', function(e) {
            e.preventDefault();
            var warehouse = $('.warehouse_id').val();
            var supplier = $('.supplier_id').val();
            var url = $(this).attr('action');
            var alldata = new FormData(this);
            var product_id = $("#product").val();
            if (product_id) {
                $.ajax({
                    url: url,
                    type: "POST",
                    data: alldata,
                    contentType: false,
                    cache: false,
                    processData: false,

                }).done(function(res) {

                    if (res.success == true) {
                        if (res.status == 'updated') {
                            var temp_item = $('#id' + res.temp_id);
                            if (temp_item) {
                                temp_item.closest('tr').find('.quantity').text(res
                                    .quantity);
                                temp_item.closest('tr').find('.p_price').text(res
                                    .purchase_price);
                                temp_item.closest('tr').find('.s_price').text(res
                                    .sale_price);
                                temp_item.closest('tr').find('.t_price').text(res
                                    .total_price);
                            }
                        } else {
                            $('#showTempItems').append(res.html);
                        }
                        var grandTotal = res.grand_total;
                        $('#total_purchase_price').val(res.total_purchase_price);
                        $('#grand_total').val(grandTotal.toFixed(2));
                        $('#paid_amount').trigger('input');
                        $('.select2').val(null).trigger('change');
                        $('#submitTempForm').trigger('reset');

                    } else {
                        // $.each(response.errors, function(key, value) {
                        //     $("[name~='" + key + "']").after(
                        //         "<span class='help-block text-red'><strong>" + value +
                        //         "</strong></span>");
                        // });
                    }



                }).fail(function() {
                    // alert('error');
                });




            } else {
                alert("Please Entry the currect Barcode");
            }
        })
        // $('.select2').on('select2:select', function(evt) {
        //     alert($(this).val());
        //     $('.s-t').val(s_t);
        //     $('.header-form').submit();
        // });

        $(document).on('keyup', '.select2-search__field', function() {
            s_t = this.value;
        });
    });
</script>
<script>
    //Card Select Click Toggle
    $(document).on('click', '.deleteItem', function(e) {
        e.preventDefault();
        $(this).closest('tr').remove();
        var that = $(this);
        var url = that.attr('href');
        $.ajax({
            url: url,
            type: 'GET',
            cache: false,
            dataType: 'json',
            success: function(res) {
                var grandTotal = res.grand_total;
                $('#total_purchase_price').val(res.total_purchase_price);
                $('#grand_total').val(grandTotal.toFixed(2));

                $('#paid_amount').trigger('input');

            },
            error: function() {}
        });
    })

    $(function() {
        //delay function start
        var delay = (function() {
            var timer = 0;
            return function(callback, ms) {
                clearTimeout(timer);
                timer = setTimeout(callback, ms);
            };
        })();


        //delay function end
        $(document).on('keyup input', "#paid_amount", function(e) {
            var paid_amount = $(this).val();
            var grand_total = $("#grand_total").val()
            $('#new_due').val(grand_total - paid_amount);
        });

    });
</script>
