<script>
    $(document).on('input', '#search', function() {
        var value = $(this).val().toLowerCase();;
        $(".product_row .product").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    //Card Select Click Toggle
    $(document).on('click', '.product-card', function() {
        var that = $(this);
        if (that.hasClass('checkedProduct')) {
            var product_id = that.attr('data-product-id')
            var url = that.attr('data-unselect-url');
            $.ajax({
                url: url,
                type: 'GET',
                cache: false,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        that.removeClass('checkedProduct');
                        $("#id-" + response.product_id).closest('tr').remove();
                        if (response.hasItem) {
                           $('.submitBtn').attr('disabled',false);

                        }else{
                            $('.submitBtn').attr('disabled',true);
                        }
                    }

                },
                error: function() {}
            });

        } else {
            var url = that.attr('data-select-url');
            $.ajax({
                url: url,
                type: 'GET',
                cache: false,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        that.addClass('checkedProduct');
                        $("#showTempItems").append(response.html);
                        $("#id-" + response.product_id).prop("checked", true);

                        $("#total_purchase_price").val(response
                            .total_purchase_price);
                        $("#grand_total").val(response.grand_total);
                        if (response.hasItem) {
                           $('.submitBtn').attr('disabled',false);

                        }else{
                            $('.submitBtn').attr('disabled',true);
                        }
                    }

                },
                error: function() {}
            });


        }
    })

    $(document).on('click', '.tempCheckedUncecked', function() {
        var that = $(this);
        if (!that.is(':checked')) {
            var url = that.attr('data-unselect-url');
            $.ajax({
                url: url,
                type: 'GET',
                cache: false,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('.id-' + response.product_id).removeClass('checkedProduct');
                        that.closest('tr').remove();


                        $("#total_purchase_price").val(response
                            .total_purchase_price);
                        $("#grand_total").val(response.grand_total);
                        $('#paid_amount').trigger('keyup');

                        if (response.hasItem) {
                           $('.submitBtn').attr('disabled',false);

                        }else{
                            $('.submitBtn').attr('disabled',true);
                        }
                    }

                },
                error: function() {}
            });

        }
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

        //Quantity Price Change
        $(document).on('keyup input', ".price_change", function(e) {
            var that = $(this);
            var url = that.attr('data-url');
            var purchase_price = that.val();
            var quantity = that.closest('tr').find('.quantity_change').val();
            delay(function() {
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        purchase_price: purchase_price,
                        quantity: quantity
                    },
                    success: function(res) {
                        if (res.success) {
                            if (res.type == 'price') {
                                that.closest('tr').find('.total_item_price').text(
                                    res.final_item_price);
                                $("#total_purchase_price").val(res
                                    .total_purchase_price);
                                $("#grand_total").val(res.grand_total);
                                $('#paid_amount').trigger('keyup');
                            }


                        }
                    }
                });

            }, 100);
        });
        //Quantity Change
        $(document).on('keyup input', ".quantity_change", function(e) {
            var that = $(this);
            var url = that.attr('data-url');
            var quantity = that.val();
            var purchase_price = that.closest('tr').find('.price_change').val();
            delay(function() {
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        purchase_price: purchase_price,
                        quantity: quantity
                    },
                    success: function(res) {
                        if (res.success) {
                            if (res.type == 'quantity') {
                                that.closest('tr').find('.total_item_price').text(
                                    res.final_item_price);
                                $("#total_purchase_price").val(res
                                    .total_purchase_price);
                                $("#grand_total").val(res.grand_total);
                                $('#paid_amount').trigger('keyup');
                            }
                        }
                    }
                });

            }, 100);
        });
        $(document).on('keyup input', ".sale_price", function(e) {
            var that = $(this);
            var url = that.attr('data-url');
            var sale_price = that.val();
            delay(function() {
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        sale_price: sale_price
                    },
                    success: function(res) {
                        if (res.success) {

                        }
                    }
                });

            }, 100);
        });
    });
</script>
