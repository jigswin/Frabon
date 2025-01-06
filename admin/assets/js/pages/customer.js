
$(document).on('click', '#reset', function() {
    $('#general-info')[0].reset();
    $('.OT150').addClass('d-none');
})

/*****************************************************************************************************************
 * Add
*****************************************************************************************************************/
  
$(document).on('click', '#add', function() {

    let error = checkError('S5hPk','OT150');
    var val = document.querySelectorAll('.S5hPk');
 
    if(val[3].value != val[4].value) {
        $(val[4]).siblings('.OT150').html('Password And Confirm Password Not Match').removeClass('d-none');
        $(val[4]).focus();
        error = 1;
    }

    if(error == 0){
        showLayer();
        
        $.ajax({
            type: 'POST',
            url: 'ajax/pages/customer.php',
            data: {
                flag:'customer_add', 
                name: val[0].value,
                email: val[1].value,
                mobile: val[2].value,
                pass: val[3].value
            },    
            success: function(res)
            {
                removeLayer();

                if(res == 1){
                    showMesPopup('Customer Add Successfully');
                    $('#reset').click();
                }
                else if(res == 2){
                    alert('Something went wrong, please try again letter');
                }
            }
        })    
    }
})

/*****************************************************************************************************************
 * Edit
*****************************************************************************************************************/

$(document).on('click', '#update', function() {

    let error = checkError('S5hPk','OT150');
    var val = document.querySelectorAll('.S5hPk');
    const cust_id = getUrlVars()["id"];

    if(error == 0){
        showLayer();
        
        $.ajax({
            type: 'POST',
            url: 'ajax/pages/customer.php',
            data: {
                flag:'customer_edit', 
                name: val[0].value,
                email: val[1].value,
                mobile: val[2].value,
                cust_id: cust_id
            },    
            success: function(res)
            {
                removeLayer();

                if(res == 1){
                    showMesPopup('Changes Save Successfully');
                }
                else if(res == 2){
                    alert('Something went wrong, please try again letter');
                }
            }
        })    
    }
})

/*****************************************************************************************************************
 * Delete
*****************************************************************************************************************/

$(document).on('click', '.delete-row', function() {
    
    deleteSingleRow(this, 'customer', 'user_id');
})

/*****************************************************************************************************************
 * Change Status
*****************************************************************************************************************/

$(document).on('click', '.ZyUtL', function() {
    
    changeStatus(this, 'customer', 'user_id');
})

/*****************************************************************************************************************
 * Multiple Delete
*****************************************************************************************************************/

$(document).on('click', '#B6KcU', function() {

    deleteRows('customer', 'user_id');
})
