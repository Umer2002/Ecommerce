
$(document).ready( function(){
    // alert();
        $('.increment-button').click(function(e){
           
            e.preventDefault();

            // var inc_value = $('.qty-input').val();
            var inc_value = $(this).closest('.products_data').find('.quantity-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 10) {
                value++;
                // $('.qty-input').val(value);
                $(this).closest('.products_data').find('.quantity-input').val(value);
            }
        });

    });

    $('.decrement-button').click(function(e){
        e.preventDefault();

        // var dec_value = $('.qty-input').val();
        var dec_value = $(this).closest('.products_data').find('.quantity-input').val();

        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            // $('.qty-input').val(value);
            $(this).closest('.products_data').find('.quantity-input').val(value);
        }
});