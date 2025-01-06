
$(document).on("click", '#save-about-us', function() {

    saveText("aboutus");
})

$(document).on("click", '#save-terms', function() {

    saveText("terms");
})

$(document).on("click", '#save-policy', function() {

    saveText("policy");
})

function saveText(table) {

    showLayer();
    const text = getQuillText();

    $.ajax({
        type: 'POST',
        url: 'ajax/common-ajax.php',
        data: {flag:'save_text', text:text, table:table},
        success: function(res){

            if(res == 1){
                showMesPopup('Changes Save Successfully');
            }
            else if(res == 2){
                alert('Something went wrong, please try again later');
            }
        }
    })
}