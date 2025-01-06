/****************************************************
 * Drag & Drop
 ****************************************************/

changePosition("testimony", "id");

/****************************************************
 * Reset
 ****************************************************/

$(document).on("click", "#reset", function () {
    image.clearButton.click();
    $("#general-info")[0].reset();
    $(".OT150").addClass("d-none");
});

/*****************************************************************************************************************
 * Add
 *****************************************************************************************************************/

$(document).on("click", "#add", function () {
    let error = checkError("S5hPk", "OT150");
    let valid = ["image/jpeg", "image/png"];

    var path = uploadImage(valid);
    var name = $("#name").val();
    var desc = $("#desc").val();

    if (path.length == 0) {
        alert("Please select image");
        error = 1;
    }

    if (error == 0) {
        showLayer();
        $.ajax({
            type: "POST",
            url: "ajax/pages/testimony.php",
            data: {
                flag: "testimony_add",
                array: path,
                name: name,
                desc: desc,
            },
            success: function (res) {
                removeLayer();

                if (res == 1) {
                    showMesPopup("Testimony Add Successfully");
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
    let valid = ["image/jpeg", "image/png"];

    var path = uploadImage(valid);
    var name = $("#name").val();
    var desc = $("#desc").val();
    const id = getUrlVars()["id"];

    if (error == 0) {
        showLayer();

        $.ajax({
            type: "POST",
            url: "ajax/pages/testimony.php",
            data: {
                flag: "testimony_edit",
                array: path,
                name: name,
                desc: desc,
                id: id,
            },
            success: function (res) {
                removeLayer();

                if (res == 1) {
                    showMesPopup("Changes Save Successfully");
                    setTimeout(() => {
                        location.href = location.href;
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
    deleteSingleRow(this, "testimony", "id");
});

/*****************************************************************************************************************
 * Change Status
 *****************************************************************************************************************/

$(document).on("click", ".ZyUtL", function () {
    changeStatus(this, "testimony", "id");
});

/*****************************************************************************************************************
 * Multiple Delete
 *****************************************************************************************************************/

$(document).on("click", "#B6KcU", function () {
    deleteRows("testimony", "id");
});
