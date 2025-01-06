/****************************************************
 * Drag & Drop
 ****************************************************/

changePosition("banner", "banner_id");

/****************************************************
 * Reset
 ****************************************************/

$(document).on("click", "#reset", function () {
    $("#title").val("");
    $("#button").val("");
    $("#link").val("");
    $("#img_url").val("");
});

/****************************************************
 * Add Banner
 ****************************************************/

$(document).on("click", "#add", function () {
    let title = $("#title").val();
    let link = $("#link").val();
    let button = $("#button").val();

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
            url: "ajax/pages/banner.php",
            data: {
                flag: "banner_add",
                array: path,
                title: title,
                button: button,
                link: link,
            },
            success: function (res) {
                removeLayer();
                if (res == 1) {
                    showMesPopup("Banner Add Successfully");
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

/****************************************************
 * Edit Banner
 ****************************************************/

$(document).on("click", "#update", function () {
    const banner_id = getUrlVars()["id"];
    let title = $("#title").val();
    let link = $("#link").val();
    let button = $("#button").val();
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

    if (path.length > 0 && img_url != "") {
        alert("Enter URL or Select Image, not both");
        return false;
    }

    if (path.length == 0 && img_url == "") {
        alert("Please select image OR Enter valid url");
        return false;
    }

    if (img_url != "") {
        path.push(img_url);
    }

    showLayer();
    $.ajax({
        type: "POST",
        url: "ajax/pages/banner.php",
        data: {
            flag: "banner_edit",
            array: path,
            banner_id: banner_id,
            title: title,
            button: button,
            link: link,
        },
        success: function (res) {
            removeLayer();

            if (res == 1) {
                showMesPopup("Changes Save Successfully");
                setTimeout(() => {
                    location.href = location.href;
                }, 2000);
            } else {
                alert("Something went wrong, please try again letter");
            }
        },
    });
});

/*****************************************************************************************************************
 * Change Status
 *****************************************************************************************************************/

$(document).on("click", ".ZyUtL", function () {
    changeStatus(this, "banner", "banner_id");
});

/*****************************************************************************************************************
 * Delete
 *****************************************************************************************************************/

$(document).on("click", ".delete-row", function () {
    deleteSingleRow(this, "banner", "banner_id");
});

/*****************************************************************************************************************
 * Multiple Delete
 *****************************************************************************************************************/

$(document).on("click", "#B6KcU", function () {
    deleteRows("banner", "banner_id");
});
