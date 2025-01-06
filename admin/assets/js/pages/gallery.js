/****************************************************
 * Drag & Drop
 ****************************************************/

changePosition("gallery", "id");

/****************************************************
 * Reset
 ****************************************************/

$(document).on("click", "#reset", function () {
    $("#img_url").val("");
});

/****************************************************
 * Add
 ****************************************************/

$(document).on("click", "#add", function () {
    let path = [];
    let img_url = $("#img_url").val();
    let uploading;

    Dropzone.instances[0].files.forEach((file) => {
        if (file.status == "success") {
            path.push(file.previewElement.children[0].children[0].src);
        } else if (file.status == "uploading" || file.status == "queued") {
            uploading = true;
        }
    });

    if (uploading) {
        alert("Please wait until all files are uploaded");
        return false;
    }

    if (path.length == 0 && img_url == "") {
        alert("Please select image OR Enter valid url");
        return false;
    }

    if (img_url != "") {
        path.push(img_url);
    }

    if (path.length > 0 || img_url != "") {
        showLayer();
        $.ajax({
            type: "POST",
            url: "ajax/pages/gallery.php",
            data: {
                flag: "gallery_add",
                array: path,
            },
            success: function (res) {
                removeLayer();
                if (res == 1) {
                    showMesPopup("Images Add Successfully");
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                } else {
                    alert("Something went wrong, please try again later");
                }
            },
        });
    } else {
        alert("Please select image OR Enter valid url");
    }
});

/*****************************************************************************************************************
 * Delete
 *****************************************************************************************************************/

$(document).on("click", ".delete-row", function () {
    deleteSingleRow(this, "gallery", "id");
});

/*****************************************************************************************************************
 * Multiple Delete
 *****************************************************************************************************************/

$(document).on("click", "#B6KcU", function () {
    deleteRows("gallery", "id");
});
