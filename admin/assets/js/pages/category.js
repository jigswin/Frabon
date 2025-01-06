/****************************************************
 * Drag & Drop
 ****************************************************/

changePosition("category", "id");

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
  // let valid = ["image/jpeg", "image/png"];

  // var path = uploadImage(valid);
  let path = [];
  let uploading;

  var name = $("#name").val();

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

  if (path.length == 0) {
    alert("Please select image");
    error = 1;
  }

  if (error == 0) {
    showLayer();
    $.ajax({
      type: "POST",
      url: "ajax/pages/category.php",
      data: { flag: "category_add", array: path, name: name },
      success: function (res) {
        removeLayer();

        if (res == 1) {
          showMesPopup("Category Add Successfully");
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
  //   let valid = ["image/jpeg", "image/png"];

  //   var path = uploadImage(valid);
  var name = $("#name").val();
  const cat_id = getUrlVars()["id"];

  let path = [];
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

  if (error == 0) {
    showLayer();

    $.ajax({
      type: "POST",
      url: "ajax/pages/category.php",
      data: {
        flag: "category_edit",
        array: path,
        name: name,
        cat_id: cat_id,
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
  deleteSingleRow(this, "category", "id");
});

/*****************************************************************************************************************
 * Change Status
 *****************************************************************************************************************/

$(document).on("click", ".ZyUtL", function () {
  changeStatus(this, "category", "id");
});

/*****************************************************************************************************************
 * Multiple Delete
 *****************************************************************************************************************/

$(document).on("click", "#B6KcU", function () {
  deleteRows("category", "id");
});
