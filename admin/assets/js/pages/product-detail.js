/***************************************************************
 * Delete
***************************************************************/

$(document).on('click', '.delete-row', function() {
	
	deleteSingleRow(this, 'product_detail', 'id');
})

/***************************************************************
 * Change Status
***************************************************************/

$(document).on('click', '.ZyUtL', function() {
	
	changeStatus(this, 'product_detail', 'id');
})

/***************************************************************
 * Multiple Delete
***************************************************************/

$(document).on('click', '#B6KcU', function() {

	deleteRows('product_detail', 'id');
})

/****************************************************************************************************
* Stock Update
****************************************************************************************************/

var pro_id = 0;
var stock = 0;
$(document).on('click', '.updatestock', function(){
    pro_id = $(this).data('i');
    stock = $(this).parent().siblings().children('.stockval').val();
    swal("Are you sure, you want to change stock?", {
        dangerMode: true,
        buttons: true,
        closeOnClickOutside: false,
    });
})

$(document).on('click', '.swal-button--cancel', function(){
    pro_id = stock = 0;
    $('.swal-overlay').remove();
})

$(document).on('click', '.swal-button--danger', function(){
    if(pro_id && stock){
        $.ajax({
            type: 'POST',
            url: 'ajax/pages/product.php',
            data: {flag:'update_stock',id:pro_id,stock:stock},
            success: function(res)
            {
                swal({
                    title: "SuccessFully!",
                    text: "Your stock has been updated.",
                    icon: "success",
                    button: "Ok",
                    className: "success",
                    closeOnClickOutside: false,
                });
            }
        })
    }
})

$(document).on('click', '.success .swal-button', function(){
    $('.swal-overlay').remove();
})