
$(document).on('click', '#reset', function() {
    $('#general-info')[0].reset();
    $('.OT150').addClass('d-none');
})

/*****************************************************************************************************************
 * Add
*****************************************************************************************************************/
  
$(document).on('click', '#add', function() {

    let error = checkError('S5hPk','OT150');
    let name = document.querySelector('#name');
    let pincode = document.querySelector('#pincode');
    let status = document.querySelector('#status');

    if(error == 0){
        showLayer();
        
        $.ajax({
            type: 'POST',
            url: 'ajax/pages/delivery-area.php',
            data: {
                flag:'delivery_area_add', 
                name: name.value,
                pincode: pincode.value,
                status: status.value
            },    
            success: function(res)
            {
                removeLayer();

                if(res == 1){
                    showMesPopup('Area Add Successfully');
                    $('#reset').click();
                }
                else if(res == 2){
                    alert('Something went wrong, please try again later');
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
    let name = document.querySelector('#name');
    let pincode = document.querySelector('#pincode');
    let status = document.querySelector('#status');
    const id = getUrlVars()["id"];

    if(error == 0){
        showLayer();
        
        $.ajax({
            type: 'POST',
            url: 'ajax/pages/delivery-area.php',
            data: {
                flag:'delivery_area_edit', 
                name: name.value,
                pincode: pincode.value,
                status: status.value,
                id:id
            },   
            success: function(res)
            {
                removeLayer();

                if(res == 1){
                    showMesPopup('Changes Save Successfully');
                }
                else if(res == 2){
                    alert('Something went wrong, please try again later');
                }
            }
        })    
    }
})

/*****************************************************************************************************************
 * Delete
*****************************************************************************************************************/

$(document).on('click', '.delete-row', function() {
    
    deleteSingleRow(this, 'delivery_area', 'id');
})

/*****************************************************************************************************************
 * Change Status
*****************************************************************************************************************/

$(document).on('click', '.ZyUtL', function() {
    
    changeStatus(this, 'delivery_area', 'id');
})

/*****************************************************************************************************************
 * Multiple Delete
*****************************************************************************************************************/

$(document).on('click', '#B6KcU', function() {

    deleteRows('delivery_area', 'id');
})
