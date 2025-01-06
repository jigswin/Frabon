/****************************************************
 * Drag & Drop
 ****************************************************/

changePosition("blog", "blog_id");

/*****************************************************************************************************************
 * Add
 *****************************************************************************************************************/

$(document).on("click", "#add", function () {
    let text = $(".ql-editor").html();

    if (text != "<p><br></p>") {
        $.ajax({
            type: "POST",
            url: "ajax/pages/post.php",
            data: { flag: "post_add", text: text },
            success: function (res) {
                if (res == 1) {
                    showMesPopup("Post Created Successfully");
                    $(".ql-editor").html("");
                } else if (res == 2) {
                    alert("Something went wrong, please try again letter");
                }
            },
        });
    } else {
        alert("Please write something in post");
    }
});

/*****************************************************************************************************************
 * Edit
 *****************************************************************************************************************/

$(document).on("click", "#update", function () {
    let text = $(".ql-editor").html();
    const id = getUrlVars()["id"];

    if (text != "") {
        $.ajax({
            type: "POST",
            url: "ajax/pages/post.php",
            data: { flag: "post_edit", text: text, id: id },
            success: function (res) {
                if (res == 1) {
                    showMesPopup("Changes Save Successfully");
                } else if (res == 2) {
                    alert("Something went wrong, please try again letter");
                }
            },
        });
    } else {
        alert("Please write something in post");
    }
});

/*****************************************************************************************************************
 * Delete
 *****************************************************************************************************************/

$(document).on("click", ".delete-row", function () {
    deleteSingleRow(this, "blog", "blog_id");
});

/*****************************************************************************************************************
 * Change Status
 *****************************************************************************************************************/

$(document).on("click", ".ZyUtL", function () {
    changeStatus(this, "blog", "blog_id");
});

/*****************************************************************************************************************
 * Multiple Delete
 *****************************************************************************************************************/

$(document).on("click", "#B6KcU", function () {
    deleteRows("blog", "blog_id");
});
