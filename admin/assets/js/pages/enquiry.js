/*****************************************************************************************************************
 * Delete
*****************************************************************************************************************/

$(document).on('click', '.delete-row', function() {
    
    deleteSingleRow(this, 'enquiry', 'id');
})

/*****************************************************************************************************************
 * Multiple Delete
*****************************************************************************************************************/

$(document).on('click', '#B6KcU', function() {

    deleteRows('enquiry', 'id');
})

$(document).on('click', '#show', function() {
    let date = $('#date-p').val();
    date = date.split(" to ");

    var path = window.location.pathname;
    var page = path.split("/").pop();
    let str = '';

    if(date[0]) {
        if(!date[1]) {
            date[1] = date[0];
        }
        location.replace(`${page}?sdate=${date[0]}&edate=${date[1]}${str}`);
    }
    else {
        location.replace(`${page}`);
    }    
})

$(document).on('click', '#reset', function() {
    $('#customer').val('all');
    $('#date-p').val('');
    status = [];
    $('.status').removeClass('active_s');
})
