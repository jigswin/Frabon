
$(document).on('click', '#reset', function() {
    image.clearButton.click();
})

$(document).on("click", '#add', function() {

    let valid = ["image/jpeg", "image/png"];

    var path = uploadImage(valid);

    if(path.length != 0) {
        
        showLayer();
        $.ajax({
            type: 'POST',
            url: 'ajax/common-ajax.php',
            data: {flag:'payment_add', array:path},
            success: function(res){

                removeLayer();
               
                if(res == 1){
                    showMesPopup('Image Add Successfully');
                    $('#reset').click();
                }
                else if(res == 2){
                    alert('Something went wrong, please try again later');
                }
            }
        })
    }
    else {
        alert('Please select image');
    }
})

/*****************************************************************************************************************
 * Multiple Delete
*****************************************************************************************************************/

$(document).on('click', '.mW1dV', function() {

    $('.DdtmX').click();
    $('.DdtmX input').prop('checked', true);
})

$(document).on('click', '.DdtmX', function() {

    setTimeout(function() { 
        if($('.DdtmX input:checked').length > 0) {

            if($('.BKGc1').length == 0) {

                $('.hsl38').append(`<div class="BKGc1">
                        <div class="gaTiT">
                            <button id="B6KcU" class="btn btn-primary ml-auto">Delete</button>
                        </div>
                    </div>`);
                setTimeout(function() { $('.BKGc1').addClass('open'); }, 100);
            }
        }
        else {
            removeDeleteBtn();
        }
    }, 200);
})

$(document).on('click', '#B6KcU', function() {

    let array = [];
    $('.DdtmX input').each(function() {
        if($(this).is(":checked")) {

            array.push( $(this).parents('.IHO08').data('id') );
        }
    })

    if(array.length > 0) {
        $.ajax({
            type: 'POST',
            url: 'ajax/common-ajax.php',
            data: {flag:'delete_rows', id:array, table_name:"payment", table_id:"id"},
            success: function(res){
                
                if(res == 1){
                    
                    $('.DdtmX input').each(function() {
                        if(array.includes($(this).parents('.IHO08').data("id"))) {
                            $(this).parents('.IHO08').remove();
                        }
                    })
                    showMesPopup('Images Delete Successfully');
                    removeDeleteBtn();
                }
                else if(res == 2){
                    alert('Something went wrong, please try again letter');
                }
            }
        })
    }
})
