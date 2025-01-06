/****************************************************
 * Drag & Drop
 ****************************************************/

changePosition("brochure", "id");

/*****************************************************************************************************************
 * Display
 *****************************************************************************************************************/

var myState = {
    pdf: null,
    currentPage: 1,
    zoom: 1,
};

$(document).on("click", ".view-file", function () {
    $("#VCpxo").remove();
    $(".hsl38").append(`<div id="VCpxo">
                    <div class="Z8IeH"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></div>
                    <div id="KIsKB">
                        <canvas id="GoLnR"></canvas>
                    </div>
                    <div id="aO3Vn">
                        <button id="go_previous" class="btn btn-primary">Previous</button>
                        <input id="current_page" value="1" type="number" hidden/>
                        <button id="go_next" class="btn btn-primary">Next</button>
                    </div>
                </div>`);

    var link = "images/brochure/" + $(this).data("file");

    pdfjsLib.getDocument(link).then((pdf) => {
        myState.pdf = pdf;
        render();
    });

    document.getElementById("go_previous").addEventListener("click", (e) => {
        if (myState.pdf == null || myState.currentPage == 1) return;
        myState.currentPage -= 1;
        document.getElementById("current_page").value = myState.currentPage;
        render();
    });

    document.getElementById("go_next").addEventListener("click", (e) => {
        if (
            myState.pdf == null ||
            myState.currentPage > myState.pdf._pdfInfo.numPages
        )
            return;
        myState.currentPage += 1;
        document.getElementById("current_page").value = myState.currentPage;
        render();
    });
});

$(document).on("click", ".Z8IeH", function () {
    $("#VCpxo").remove();
});

function render() {
    myState.pdf.getPage(myState.currentPage).then((page) => {
        var canvas = document.getElementById("GoLnR");
        var ctx = canvas.getContext("2d");

        var viewport = page.getViewport(myState.zoom);

        canvas.width = viewport.width;
        canvas.height = viewport.height;

        page.render({
            canvasContext: ctx,
            viewport: viewport,
        });
    });
}

/*****************************************************************************************************************
 * Reset
 *****************************************************************************************************************/

$(document).on("click", "#reset", function () {
    $("#general-info")[0].reset();
    $(".OT150").addClass("d-none");
});

/*****************************************************************************************************************
 * Add
 *****************************************************************************************************************/

$(document).on("click", "#add", function () {
    let error = checkError("S5hPk", "OT150");

    if (!file) {
        alert("Please select file");
        error = 1;
    }

    if (error == 0) {
        var fd = new FormData();
        var files = $("#file")[0].files[0];
        var name = $("#name").val();
        fd.append("file", files);
        fd.append("name", name);
        fd.append("flag", "brochure_add");

        showLayer();

        $.ajax({
            type: "POST",
            url: "ajax/pages/brochure.php",
            data: fd,
            contentType: false,
            processData: false,
            success: function (res) {
                removeLayer();

                if (res == 1) {
                    showMesPopup("Brochure Add Successfully");
                    $("#reset").click();
                } else if (res == 2) {
                    alert("Something went wrong, please try again letter");
                } else if (res == 3) {
                    $("#file")
                        .val("")
                        .siblings(".OT150")
                        .html("File Not Valid")
                        .removeClass("d-none");
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

    if (error == 0) {
        var fd = new FormData();
        var files = $("#file")[0].files[0];
        var name = $("#name").val();
        var id = getUrlVars()["id"];
        fd.append("file", files);
        fd.append("name", name);
        fd.append("id", id);
        fd.append("flag", "brochure_edit");

        showLayer();

        $.ajax({
            type: "POST",
            url: "ajax/pages/brochure.php",
            data: fd,
            contentType: false,
            processData: false,
            success: function (res) {
                removeLayer();

                if (res == 1) {
                    showMesPopup("Changes Save Successfully");
                    setTimeout(() => {
                        location.href = location.href;
                    }, 2000);
                } else if (res == 2) {
                    alert("Something went wrong, please try again letter");
                } else if (res == 3) {
                    $("#file")
                        .val("")
                        .siblings(".OT150")
                        .html("File Not Valid")
                        .removeClass("d-none");
                }
            },
        });
    }
});

/*****************************************************************************************************************
 * Delete
 *****************************************************************************************************************/

$(document).on("click", ".delete-row", function () {
    deleteSingleRow(this, "brochure", "id");
});

/*****************************************************************************************************************
 * Change Status
 *****************************************************************************************************************/

$(document).on("click", ".ZyUtL", function () {
    changeStatus(this, "brochure", "id");
});

/*****************************************************************************************************************
 * Multiple Delete
 *****************************************************************************************************************/

$(document).on("click", "#B6KcU", function () {
    deleteRows("brochure", "id");
});
