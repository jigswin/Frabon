
$(document).on('click', '#reset', function() {
    $('#general-info')[0].reset();
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
    var val = document.querySelectorAll('.S5hPk');
    let array = [];

    $('.k7It4').each(function() {

        if($(this).is(":checked")) {
 
            array.push(this.value);
        }
    })
    
    if(array.length == 0) {
        $('.O6ed0').siblings('.OT150').html('Please Select Access Menu').removeClass('d-none');
        error = 1;
    }
    else{
        $('.O6ed0').siblings('.OT150').addClass('d-none');
    }

    if(error == 0){

        showLayer();

        $.ajax({
            type: 'POST',
            url: 'ajax/pages/role.php',
            data: {
                flag:'role_add', 
                name: val[0].value,
                menu: array
            },    
            success: function(res)
            {
                removeLayer();

                if(res == 1){
                    showMesPopup('Role Add Successfully');
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
    const role_id = getUrlVars()["id"];
    let array = [];

    $('.k7It4').each(function() {

        if($(this).is(":checked")) {
 
            array.push(this.value);
        }
    })
    
    if(array.length == 0) {
        $('.O6ed0').siblings('.OT150').html('Please Select Access Menu').removeClass('d-none');
        error = 1;
    }
    else{
        $('.O6ed0').siblings('.OT150').addClass('d-none');
    }

    if(error == 0){
        showLayer();
        
        $.ajax({
            type: 'POST',
            url: 'ajax/pages/role.php',
            data: {
                flag:'role_edit', 
                name: val[0].value,
                menu: array,
                role_id: role_id
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
    
    deleteSingleRow(this, 'role', 'role_id');
})

/*****************************************************************************************************************
 * Multiple Delete
*****************************************************************************************************************/

$(document).on('click', '#B6KcU', function() {

    deleteRows('role', 'role_id');
})

/*****************************************************************************************************************
 * Access Menu
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

$(document).on('click', '.select-all', function() {

    if(tmp == 0) {
        $('.OB1JT').addClass('checked');
        $('.k7It4').prop("checked", true);
        tmp = 1;
    }
    else { 
        $('.OB1JT').removeClass('checked');
        $('.k7It4').prop("checked", false);
        tmp = 0;
    }
})