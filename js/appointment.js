$(document).on('click', '#submit-appnt', function(){

    validate({
        input: 'HS0fb',
        error: 'awA3N'
    })
    .then( res => {
        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var mess = $('#mess-appnt').val();
        var datepicker = $('#datepicker').val();
        var timepicker = $('.timepicker').val();
        loader.classList.remove('d-none');

        $.ajax({
            type: "POST",
            url: "common-ajax.php",
            data: {name:name,email:email,phone:phone,mess:mess,datepicker:datepicker,timepicker:timepicker,flag:"book_appointment"},
            success: function(data){
                
                if(data == 1){
                    alert('Email not valid');
                    $('#email').focus();
                }
                else if(data == 2){
                    $('.otppop').addClass('show-otppop');
                    $('#otp-input').focus();
                    resendtimer();
                }
                loader.classList.add('d-none');
            }
        })
    })
})

$(document).on('click', '#resend-otp', function(){

loader.classList.remove('d-none');
$.ajax({
    type: "POST",
    url: "common-ajax.php",
    data: {flag:"resend_otp_appnt"},
    success: function(data){

        if(data == 1){
            alert('OTP resend');
            resendtimer();
        }
        loader.classList.add('d-none');
    }
})
})

$(document).on('click', '#sub-otp', function(){

var otp = $('#otp-input').val();

$('#otpErrorapp').hide();
loader.classList.remove('d-none');

$.ajax({
    type: "POST",
    url: "common-ajax.php",
    data: {otp:otp,flag:"appnt_otp_submit"},
    success: function(data){
        if(data == 1){
            $('#otpErrorapp').show();
            $('#otp-input').focus();
        }
        else{
            swal({
                title: "Thank You!",
                text: "Your appointment is Book.",
                icon: "success",
                button: "Home",
                className: "success",
                closeOnClickOutside: false,
            });
            $(document).on('click', '.success .swal-button', function(){
                window.location.href = './';
            })
            setTimeout(() => {
                $(".success .swal-button").click();
            }, 5000);
        }
        loader.classList.add('d-none');
    }
});

})

var time;
function resendtimer(){
    $('#resend-otp').addClass('d-none');
    var i=60;

    time = setInterval(function(){
        $('.otp-s-count').html('Resend after '+ i+'s').removeClass('d-none');
        if(i > 0){
            i--;
        }
        else{
            $('.otp-s-count').html('').addClass('d-none');
            $('#resend-otp').removeClass('d-none');
            clearInterval(time);
        }
    }, 1000);
}

$(document).on('click', '.close-poppost', function(){
    $(".otppop").removeClass("show-otppop");
})