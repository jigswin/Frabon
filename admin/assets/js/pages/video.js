/****************************************************
 * Drag & Drop
 ****************************************************/

changePosition("video", "id");

/****************************************************
 * Reset
 ****************************************************/

$(document).on("click", "#reset", function () {
    $("#general-info")[0].reset();
    $(".OT150").addClass("d-none");
});

/*****************************************************************************************************************
 * Add
 *****************************************************************************************************************/

$(document).on("click", "#add", function () {
    let error = checkError("S5hPk", "OT150");
    var val = document.querySelectorAll(".S5hPk");

    if (error == 0) {
        showLayer();

        $.ajax({
            type: "POST",
            url: "ajax/pages/video.php",
            data: {
                flag: "video_add",
                link: val[0].value,
                status: val[1].value,
            },
            success: function (res) {
                removeLayer();

                if (res == 1) {
                    showMesPopup("Video Add Successfully");
                    $("#reset").click();
                } else if (res == 2) {
                    alert("Something went wrong, please try again letter");
                }
            },
        });
    }
});

/*****************************************************************************************************************
 * Edit
 *****************************************************************************************************************/

$(document).on("click", "#update", function () {
    let error = checkError("S5hPk", "OT150");
    var val = document.querySelectorAll(".S5hPk");
    const id = getUrlVars()["id"];

    if (error == 0) {
        showLayer();

        $.ajax({
            type: "POST",
            url: "ajax/pages/video.php",
            data: {
                flag: "video_edit",
                link: val[0].value,
                status: val[1].value,
                id: id,
            },
            success: function (res) {
                removeLayer();

                if (res == 1) {
                    showMesPopup("Changes Save Successfully");

                    setTimeout(() => {
                        window.location = window.location;
                    }, 2000);
                } else if (res == 2) {
                    alert("Something went wrong, please try again letter");
                }
            },
        });
    }
});

/*****************************************************************************************************************
 * Delete
 *****************************************************************************************************************/

$(document).on("click", ".delete-row", function () {
    deleteSingleRow(this, "video", "id");
});

/*****************************************************************************************************************
 * Change Status
 *****************************************************************************************************************/

$(document).on("click", ".ZyUtL", function () {
    changeStatus(this, "video", "id");
});

/*****************************************************************************************************************
 * Multiple Delete
 *****************************************************************************************************************/

$(document).on("click", "#B6KcU", function () {
    deleteRows("video", "id");
});
