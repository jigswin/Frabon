$(document).on("click", "#reset", function () {
    image.clearButton.click();
    $("#general-info")[0].reset();
    $(".OT150").addClass("d-none");
});

$(document).on("click", "#create", function () {
    let error = checkError("S5hPk", "OT150");
    let valid = ["image/jpeg", "image/png"];

    var path = uploadImage(valid);
    var subject = $("#subject").val();
    var text = getQuillText();
    let date = getDateTime().replace("&", " ");

    if (error == 0) {
        showLayer();
        $.ajax({
            type: "POST",
            url: "ajax/pages/support.php",
            data: { flag: "create_ticket", array: path, subject, text, date },
            success: function (res) {
                removeLayer();

                if (res == 1) {
                    showMesPopup("Ticket Created Successfully");
                    setTimeout(() => {
                        window.location.href = "support";
                    }, 2000);
                } else if (res == 2) {
                    alert("Something went wrong, please try again later");
                }
            },
        });
    }
});

/****************************************************
 * Reply
 ****************************************************/

$(document).on("click", "#open-reply-form", function () {
    $(".reply-form").removeClass("d-none");
});

$(document).on("click", "#cancel", function () {
    image.clearButton.click();
    document.querySelector(".ql-editor").innerHTML = "";
    $(".OT150").addClass("d-none");
    $(".reply-form").addClass("d-none");
});

$(document).on("click", ".chat-attachment-title", function () {
    $(this).siblings(".chat-attachment-list").toggleClass("d-none");
});

$(document).on("click", "#send-reply", function () {
    let valid = ["image/jpeg", "image/png"];
    let path = uploadImage(valid);
    let mes = getQuillText();
    let id = getUrlVars()["id"];
    let date = getDateTime().replace("&", " ");

    if (mes != "<p><br></p>") {
        showLayer();
        $.ajax({
            type: "POST",
            url: "ajax/pages/support.php",
            data: { flag: "ticket_reply", array: path, mes, id, date },
            success: function (res) {
                removeLayer();
                if (res == 1) {
                    showMesPopup("Your Reply Send Successfully");
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                } else if (res == 2) {
                    alert("Something went wrong, please try again later");
                }
            },
        });
    } else {
        alert("Please Enter Message");
    }
});

$(document).on("change", "#filter", function () {
    let val = this.value;
    if (val == "all") {
        $(".OZ6VQ").removeClass("d-none");
    } else {
        $(".OZ6VQ").addClass("d-none");
        $(".OZ6VQ").each(function () {
            if ($(this).data("s") == val) {
                $(this).removeClass("d-none");
            }
        });
    }
});


/******************************************************************************************
 * Functions
 ******************************************************************************************/

function getDateTime() {
    var st = srvTime();
    var date = new Date(st);
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();
    var fulldate = day + "/" + month + "/" + year;
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? "pm" : "am";
    hours = hours % 12;
    hours = hours ? hours : 12;
    minutes = minutes < 10 ? "0" + minutes : minutes;
    var strTime = hours + ":" + minutes + " " + ampm;
    var dateTime = fulldate + "&" + strTime;
    return dateTime;
}

var xmlHttp;
function srvTime() {
    try {
        //FF, Opera, Safari, Chrome
        xmlHttp = new XMLHttpRequest();
    } catch (err1) {
        //IE
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (err2) {
            try {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (eerr3) {
                //AJAX not supported, use CPU time.
                alert("AJAX not supported");
            }
        }
    }
    xmlHttp.open("HEAD", window.location.href.toString(), false);
    xmlHttp.setRequestHeader("Content-Type", "text/html");
    xmlHttp.send("");
    return xmlHttp.getResponseHeader("Date");
}
