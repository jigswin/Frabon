let status = [];

let tmp = getUrlVars()["status"];
if(tmp) {
    tmp = tmp.split('-');
    tmp.forEach(ele => {
        status.push(ele);
        $(`.status[data-v=${ele}]`).addClass("active_s");
    });
}

$(document).on('click', '.status', function() {

    if(this.classList.contains('active_s')) {
        this.classList.remove('active_s');
        const index = status.indexOf($(this).data('v'));
        if (index > -1) {
            status.splice(index, 1);
        }
    }
    else {
        this.classList.add('active_s');
        status.push($(this).data('v'));
    }
})

$(document).on('click', '#show', function() {
    let cust = $('#customer').val();
    let date = $('#date-p').val();
    date = date.split(" to ");

    var path = window.location.pathname;
    var page = path.split("/").pop();
    let str = '';

    if(status.length > 0) {
        str = '&status=';

        status.forEach((ele, index) => {
            if(index == 0) {
                str += `${ele}`;
            }
            else {
                str += `-${ele}`;
            }
        });
    }

    if(date[0]) {
        if(!date[1]) {
            date[1] = date[0];
        }
        location.replace(`${page}?cust=${cust}&sdate=${date[0]}&edate=${date[1]}${str}`);
    }
    else {
        location.replace(`${page}?cust=${cust}${str}`);
    }    
})

$(document).on('click', '#reset', function() {
    $('#customer').val('all');
    $('#date-p').val('');
    status = [];
    $('.status').removeClass('active_s');
})

/***********************************************************************************************
 * Order detail show
***********************************************************************************************/

$(document).on('click', '.nykTw', function(){
    var order = $(this).parent('.OZ6VQ').data('id');
    $.ajax({
        type: 'POST',
        url: 'ajax/pages/order-list.php',
        data: {flag:'getOrderDetail',order_id:order},
        success: function(res)
        {
            $('.lDCab').css('display','flex');
            $('.huyCD').html(res);
        }
    })
})

$(document).on('click', '.hfCXV', function(){
    $('.lDCab').css('display','none');
    $('.huyCD').html('');
})

$(document).on('click', '.lDCab', function(e) {
	if ($('.OWp1r').has(e.target).length === 0){
		$('.lDCab').css('display','none');
		$('.huyCD').html('');
	}
})

/***********************************************************************************************
 * Download Invoice
***********************************************************************************************/

$(document).on('click', '#download-all-invoice', function() {
    
    let urls = [], name = [];
    var zip = new JSZip();
    var count = 0;
    let invoice = document.querySelectorAll('.invoice');

    invoice.forEach(ele => {
        urls.push(ele.href);
        name.push(ele.download);
    });

    urls.forEach(function(url, index){
        JSZipUtils.getBinaryContent(url, function (err, data) {
            if(err) {
                throw err;
            }
            zip.file(name[index], data, {binary:true});
            count++;
            if (count == urls.length) {
                zip.generateAsync({type:"blob"}).then(function (blob) {
                    saveAs(blob, "Invoices.zip");
                });
            }
        });
    });
})