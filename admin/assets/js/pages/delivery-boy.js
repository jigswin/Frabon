
$(document).on('click', '#reset', function() {
    $('#general-info')[0].reset();
    image.clearButton.click();
    $('.OT150').addClass('d-none');
    $('.OB1JT').removeClass('checked');
    $('.k7It4').each(function() {
        if($(this).prop("checked") == true) {
            $(this).parent('.OB1JT').addClass('checked');
        }
    })
    tmp = 0;
})

/*****************************************************************************************************************
 * Add
*****************************************************************************************************************/
  
$(document).on('click', '#add', function() {

    let error = checkError('S5hPk','OT150');
    let name = document.querySelector('#name');
    let email = document.querySelector('#email');
    let mobile = document.querySelector('#mobile');
    let pass = document.querySelector('#pass');
    let cpass = document.querySelector('#cpass');
    let address = document.querySelector('#address');
    let licence = document.querySelector('#licence');
    let vehicle = document.querySelector('#vehicle');
    let valid = ["image/jpeg", "image/png"];
    var path = uploadImage(valid);
 
    if(pass.value != cpass.value) {
        $(cpass).siblings('.OT150').html('Password And Confirm Password Not Match').removeClass('d-none');
        $(cpass).focus();
        error = 1;
    }

    let area = [];

    $('.k7It4').each(function() {

        if($(this).is(":checked")) {
 
            area.push(this.value);
        }
    })
    
    if(area.length == 0) {
        $('.O6ed0').siblings('.OT150').html('Please Select Delivery Area').removeClass('d-none');
        error = 1;
    }
    else{
        $('.O6ed0').siblings('.OT150').addClass('d-none');
    }

    if(error == 0){
        showLayer();
        
        $.ajax({
            type: 'POST',
            url: 'ajax/pages/delivery-boy.php',
            data: {
                flag:'delivery_boy_add', 
                name: name.value,
                email: email.value,
                mobile: mobile.value,
                pass: pass.value,
                address: address.value,
                array: path,
                licence: licence.value,
                vehicle: vehicle.value,
                area:area
            },    
            success: function(res)
            {
                removeLayer();

                if(res == 1){
                    showMesPopup('Delivery Boy Add Successfully');
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
    const id = getUrlVars()["id"];
    let name = document.querySelector('#name');
    let email = document.querySelector('#email');
    let mobile = document.querySelector('#mobile');
    let address = document.querySelector('#address');
    let licence = document.querySelector('#licence');
    let vehicle = document.querySelector('#vehicle');
    let valid = ["image/jpeg", "image/png"];
    var path = uploadImage(valid);
 
    let area = [];

    $('.k7It4').each(function() {

        if($(this).is(":checked")) {
 
            area.push(this.value);
        }
    })
    
    if(area.length == 0) {
        $('.O6ed0').siblings('.OT150').html('Please Select Delivery Area').removeClass('d-none');
        error = 1;
    }
    else{
        $('.O6ed0').siblings('.OT150').addClass('d-none');
    }

    if(error == 0){
        showLayer();
        
        $.ajax({
            type: 'POST',
            url: 'ajax/pages/delivery-boy.php',
            data: {
                flag:'delivery_boy_edit', 
                name: name.value,
                email: email.value,
                mobile: mobile.value,
                address: address.value,
                array: path,
                licence: licence.value,
                vehicle: vehicle.value,
                area:area,
                id:id
            },    
            success: function(res)
            {
                removeLayer();

                if(res == 1){
                    showMesPopup('Changes Save Successfully');
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
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
    
    deleteSingleRow(this, 'delivery_boy', 'id');
})

/*****************************************************************************************************************
 * Change Status
*****************************************************************************************************************/

$(document).on('click', '.ZyUtL', function() {
    
    changeStatus(this, 'delivery_boy', 'id');
})

/*****************************************************************************************************************
 * Multiple Delete
*****************************************************************************************************************/

$(document).on('click', '#B6KcU', function() {

    deleteRows('delivery_boy', 'id');
})

/*****************************************************************************************************************
 * Delivery Area
*****************************************************************************************************************/

var tmp = 0;

$(document).on('click', '.OB1JT', function() {

    if($(this).children('.k7It4').prop("checked") == true) {
        $(this).removeClass('checked');
        $(this).children('.k7It4').prop("checked", false);
    }
    else {
        $(this).addClass('checked');
        $(this).children('.k7It4').prop("checked", true);
    }
})