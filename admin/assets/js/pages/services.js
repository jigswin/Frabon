/****************************************************
 * Drag & Drop
 ****************************************************/

changePosition("service", "id");

/****************************************************
 * Reset
 ****************************************************/

$(document).on("click", "#reset", function () {
    $(".ql-editor").html("");
    $("#name").val("");
});

/****************************************************
 * Add
 ****************************************************/

$(document).on("click", "#add", function () {
    const name = document.querySelector("#name").value;

    if (name) {
        showLayer();
        const text = getQuillText();

        $.ajax({
            type: "POST",
            url: "ajax/pages/services.php",
            data: { flag: "service_add", name: name, text: text },
            success: function (res) {
                removeLayer();

                if (res == 1) {
                    showMesPopup("Service Add Successfully");
                    $("#reset").click();
                } else if (res == 2) {
                    alert("Something went wrong, please try again letter");
                }
            },
        });
    } else {
        alert("Please enter service name");
    }
});

$(document).on("click", "#edit", function () {
    var id = getUrlVars()["id"];
    const name = document.querySelector("#name").value;

    if (name) {
        showLayer();
        const text = getQuillText();

        $.ajax({
            type: "POST",
            url: "ajax/pages/services.php",
            data: { flag: "service_edit", name: name, text: text, id: id },
            success: function (res) {
                if (res == 1) {
                    showMesPopup("Changes Save Successfully");
                } else if (res == 2) {
                    alert("Something went wrong, please try again later");
                }
            },
        });
    }
});

/*****************************************************************************************************************
 * Change Status
 *****************************************************************************************************************/

$(document).on("click", ".ZyUtL", function () {
    changeStatus(this, "service", "id");
});

/*****************************************************************************************************************
 * Delete
 *****************************************************************************************************************/

$(document).on("click", ".delete-row", function () {
    deleteSingleRow(this, "service", "id");
});

/*****************************************************************************************************************
 * Multiple Delete
 *****************************************************************************************************************/

$(document).on("click", "#B6KcU", function () {
    deleteRows("service", "id");
});
