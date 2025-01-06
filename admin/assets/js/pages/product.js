// /****************************************************
//  * Drag & Drop
//  ****************************************************/

// changePosition("product", "id");

// /****************************************************
//  * Reset
//  ****************************************************/

// $(document).on("click", "#reset", function () {
//   image.clearButton.click();
//   $("#general-info")[0].reset();
//   $(".OT150").addClass("d-none");
// });

// /*****************************************************************************************************************
//  * Add
//  *****************************************************************************************************************/

// $(document).on("click", "#add", function () {
//   let error = checkError("S5hPk", "OT150");
//   let valid = ["image/jpeg", "image/png"];

//   var path = uploadImage(valid);
//   var name = $("#name").val();
//   var category = $("#category").val();
//   var size = $("#size").val();
//   var price = $("#price").val();
//   var stock = $("#stock").val();
//   var description = $("#description").val();

//   if (path.length == 0) {
//     alert("Please select image");
//     error = 1;
//   }

//   error = 1;

//   if (error == 0) {
//     showLayer();
//     $.ajax({
//       type: "POST",
//       url: "ajax/pages/product.php",
//       data: {
//         flag: "product_add",
//         array: path,
//         name: name,
//         category: category,
//         size: size,
//         price: price,
//         stock: stock,
//         description: description,
//       },
//       success: function (res) {
//         removeLayer();

//         if (res == 1) {
//           showMesPopup("Product Add Successfully");
//           $("#reset").click();
//         } else if (res == 2) {
//           alert("Something went wrong, please try again letter");
//         }
//       },
//     });
//   }
// });

// /*****************************************************************************************************************
//  * Edit
//  *****************************************************************************************************************/

// $(document).on("click", "#update", function () {
//   let error = checkError("S5hPk", "OT150");
//   let valid = ["image/jpeg", "image/png"];

//   var path = uploadImage(valid);
//   const id = getUrlVars()["id"];
//   var name = $("#name").val();
//   var category = $("#category").val();
//   var size = $("#size").val();
//   var price = $("#price").val();
//   var stock = $("#stock").val();
//   var description = $("#description").val();

//   if (error == 0) {
//     showLayer();

//     $.ajax({
//       type: "POST",
//       url: "ajax/pages/product.php",
//       data: {
//         flag: "product_edit",
//         array: path,
//         id: id,
//         name: name,
//         category: category,
//         size: size,
//         price: price,
//         stock: stock,
//         description: description,
//       },
//       success: function (res) {
//         removeLayer();

//         if (res == 1) {
//           showMesPopup("Changes Save Successfully");
//           setTimeout(() => {
//             location.href = location.href;
//           }, 2000);
//         } else if (res == 2) {
//           alert("Something went wrong, please try again letter");
//         }
//       },
//     });
//   }
// });

// /*****************************************************************************************************************
//  * Delete
//  *****************************************************************************************************************/

// $(document).on("click", ".delete-row", function () {
//   deleteSingleRow(this, "product", "id");
// });

// /*****************************************************************************************************************
//  * Change Status
//  *****************************************************************************************************************/

// $(document).on("click", ".ZyUtL", function () {
//   changeStatus(this, "product", "id");
// });

// /*****************************************************************************************************************
//  * Multiple Delete
//  *****************************************************************************************************************/

// $(document).on("click", "#B6KcU", function () {
//   deleteRows("product", "id");
// });

// /*****************************************************************************************************************
//  * Delete Image
//  *****************************************************************************************************************/

// $(document).on("click", ".DdtmX", function () {
//   setTimeout(function () {
//     if ($(".DdtmX input:checked").length > 0) {
//       if ($(".BKGc1").length == 0) {
//         $(".hsl38").append(`<div class="BKGc1">
//                         <div class="gaTiT">
//                             <button id="B6KcU" class="btn btn-primary ml-auto">Delete</button>
//                         </div>
//                     </div>`);
//         setTimeout(function () {
//           $(".BKGc1").addClass("open");
//         }, 100);
//       }
//     } else {
//       removeDeleteBtn();
//     }
//   }, 200);
// });

// $(document).on("click", "#B6KcU", function () {
//   let array = [];
//   $(".DdtmX input").each(function () {
//     if ($(this).is(":checked")) {
//       array.push($(this).parents(".IHO08").data("id"));
//     }
//   });

//   if (array.length > 0) {
//     $.ajax({
//       type: "POST",
//       url: "ajax/common-ajax.php",
//       data: {
//         flag: "delete_rows",
//         id: array,
//         table_name: "product_image",
//         table_id: "id",
//       },
//       success: function (res) {
//         if (res == 1) {
//           $(".DdtmX input").each(function () {
//             if (array.includes($(this).parents(".IHO08").data("id"))) {
//               $(this).parents(".IHO08").remove();
//             }
//           });
//           showMesPopup("Images Delete Successfully");
//           removeDeleteBtn();
//         } else if (res == 2) {
//           alert("Something went wrong, please try again letter");
//         }
//       },
//     });
//   }
// });

// /****************************************************
//  * Add Field
//  ****************************************************/

// $(document).on("click", "#add-field-popup", function (e) {
//   e.preventDefault();

//   let res = $.ajax({
//     type: "POST",
//     url: "ajax/pages/product.php",
//     data: { flag: "get_field_list" },
//     async: false,
//   });

//   let list = jQuery.parseJSON(res.responseText);

//   const form = `<div class="popup-layer">
//         <div class="popup-container">
//             <div class="popup-content">
//                 <div class="popup-header">
//                     <h4>Add Field</h4>
//                     <button class="close-popup">&times;</button>
//                 </div>
//                 <div class="popup-body">
//                     <div class="row">
//                         <div class="col-lg-11 mx-auto">
//                             <div class="row">
//                                 <div class="col-xl-12 col-lg-12 col-md-12 mt-4">
//                                     <div class="">
//                                         <div class="row d-field-container">

//                                             <div class="col-sm-6">
//                                                 <div class="form-group">
//                                                     <label for="field-name">Field Name</label>
//                                                     <input type="text" class="form-control" id="field-name" placeholder="Field Name">
//                                                     <div class="LMNEu error-field-name"></div>
//                                                 </div>
//                                             </div>
//                                             <div class="col-sm-6">
//                                                 <div class="form-group">
//                                                     <label for="field-type">Field Type</label>
//                                                     <select class="form-control" id="field-type">
//                                                         <option value="">Select Field Type</option>
//                                                         <option value="text">Text (Max 200 Letters)</option>
//                                                         <option value="textarea">Text Area (Unlimited Letters)</option>
//                                                         <option value="date">Date</option>
//                                                     </select>
//                                                     <div class="LMNEu error-field-type"></div>
//                                                 </div>
//                                             </div>

//                                         </div>
//                                     </div>
//                                 </div>
//                             </div>
//                         </div>
//                     </div>
//                 </div>
//                 <div class="popup-footer mt-3">
//                     <button class="btn btn-primary" id="add-field">Add Field</button>
//                 </div>
//             </div>
//         </div>
//     </div>`;

//   $("body").append(form);
//   setTimeout(function () {
//     $(".popup-container").addClass("open");
//   }, 100);
// });

// $(document).on("click", ".close-popup", function () {
//   $(".popup-layer").remove();
// });

// $(document).on("click", "#add-field", function (e) {
//   const container = document.querySelector(".d-field-container");
//   const fieldName = document.querySelector("#field-name");
//   const fieldType = document.querySelector("#field-type");
//   const nameErr = document.querySelector(".error-field-name");
//   const typeErr = document.querySelector(".error-field-type");

//   nameErr.innerHTML = "";
//   typeErr.innerHTML = "";

//   if (fieldName.value == "") {
//     nameErr.innerHTML = "Field Name is required";
//     fieldName.focus();
//     return;
//   }

//   if (fieldType.value == "") {
//     typeErr.innerHTML = "Field Type is required";
//     fieldType.focus();
//     return;
//   }

//   $.ajax({
//     type: "POST",
//     url: "common-ajax.php",
//     data: {
//       flag: "index_add_field",
//       field_name: fieldName.value,
//       field_type: fieldType.value,
//     },
//     success: function (res) {},
//   });

//   const lable = fieldName.value.replace(/\s/g, "_");

//   let fieldHtml = `<div class="col-sm-6">
//             <div class="form-group">
//                 <label for="${lable}">${fieldName.value}</label>
//                 ${
//                   fieldType.value == "text"
//                     ? `<input type="text" class="form-control mb-2" id="${lable}" placeholder="Enter ${fieldName.value}">`
//                     : fieldType.value == "date"
//                     ? `<input type="date" class="form-control mb-2" id="${lable}" placeholder="Select ${fieldName.value}">`
//                     : fieldType.value == "textarea"
//                     ? `<textarea class="form-control mb-2" id="${lable}" placeholder="Enter ${fieldName.value}"></textarea>`
//                     : ""
//                 }
//                 <div class="LMNEu d-none"></div>
//             </div>
//         </div>`;
//   container.insertAdjacentHTML("beforeend", fieldHtml);

//   $(".popup-layer").remove();
// });

/****************************************************
 * Drag & Drop
 ****************************************************/

changePosition("product", "id");

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
  var name = $("#name").val();
  var category = $("#category").val();
  var size = $("#size").val();
  var price = $("#price").val();
  var stock = $("#stock").val();
  var description = $("#description").val();
  let cust_field = [];
  cust_field[0] = [];
  cust_field[1] = [];
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

  if (path.length == 0) {
    alert("Please select image");
    error = 1;
  }

  let fields = document.querySelectorAll(".cust_field");

  fields.forEach((ele) => {
    cust_field[0].push(ele.getAttribute("data-c"));
    cust_field[1].push(ele.value);
  });

  if (error == 0) {
    showLayer();
    $.ajax({
      type: "POST",
      url: "ajax/pages/product.php",
      data: {
        flag: "product_add",
        array: path,
        name: name,
        category: category,
        size: size,
        price: price,
        stock: stock,
        description: description,
        cust_field,
      },
      success: function (res) {
        removeLayer();

        if (res == 1) {
          showMesPopup("Product Add Successfully");
          $("#reset").click();
        } else {
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
  // let valid = ["image/jpeg", "image/png"];

  // var path = uploadImage(valid);
  let path = [];
  const id = getUrlVars()["id"];
  var name = $("#name").val();
  var category = $("#category").val();
  var size = $("#size").val();
  var price = $("#price").val();
  var stock = $("#stock").val();
  var description = $("#description").val();

  let cust_field = [];
  cust_field[0] = [];
  cust_field[1] = [];

  let fields = document.querySelectorAll(".cust_field");

  fields.forEach((ele) => {
    cust_field[0].push(ele.getAttribute("data-c"));
    cust_field[1].push(ele.value);
  });

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
      url: "ajax/pages/product.php",
      data: {
        flag: "product_edit",
        array: path,
        id: id,
        name: name,
        category: category,
        size: size,
        price: price,
        stock: stock,
        description: description,
        cust_field,
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
  deleteSingleRow(this, "product", "id");
});

/*****************************************************************************************************************
 * Change Status
 *****************************************************************************************************************/

$(document).on("click", ".ZyUtL", function () {
  changeStatus(this, "product", "id");
});

/*****************************************************************************************************************
 * Multiple Delete
 *****************************************************************************************************************/

$(document).on("click", "#B6KcU", function () {
  deleteRows("product", "id");
});

/*****************************************************************************************************************
 * Delete Image
 *****************************************************************************************************************/

$(document).on("click", ".DdtmX", function () {
  setTimeout(function () {
    if ($(".DdtmX input:checked").length > 0) {
      if ($(".BKGc1").length == 0) {
        $(".hsl38").append(`<div class="BKGc1">
                         <div class="gaTiT">
                             <button id="B6KcU" class="btn btn-primary ml-auto">Delete</button>
                         </div>
                     </div>`);
        setTimeout(function () {
          $(".BKGc1").addClass("open");
        }, 100);
      }
    } else {
      removeDeleteBtn();
    }
  }, 200);
});

$(document).on("click", "#B6KcU", function () {
  let array = [];
  $(".DdtmX input").each(function () {
    if ($(this).is(":checked")) {
      array.push($(this).parents(".IHO08").data("id"));
    }
  });

  if (array.length > 0) {
    $.ajax({
      type: "POST",
      url: "ajax/common-ajax.php",
      data: {
        flag: "delete_rows",
        id: array,
        table_name: "product_image",
        table_id: "id",
      },
      success: function (res) {
        if (res == 1) {
          $(".DdtmX input").each(function () {
            if (array.includes($(this).parents(".IHO08").data("id"))) {
              $(this).parents(".IHO08").remove();
            }
          });
          showMesPopup("Images Delete Successfully");
          removeDeleteBtn();
        } else if (res == 2) {
          alert("Something went wrong, please try again letter");
        }
      },
    });
  }
});

/****************************************************
 * Add Field
 ****************************************************/

$(document).on("click", "#add-field-popup", function (e) {
  e.preventDefault();

  let res = $.ajax({
    type: "POST",
    url: "ajax/pages/product.php",
    data: { flag: "get_field_list" },
    async: false,
  });

  let list = jQuery.parseJSON(res.responseText);

  const form = `<div class="popup-layer">
         <div class="popup-container">
             <div class="popup-content">
                 <div class="popup-header">
                     <h4>Add Field</h4>
                     <button class="close-popup">&times;</button>
                 </div>
                 <div class="popup-body">
                     <div class="row">
                         <div class="col-lg-11 mx-auto">
                             <div class="row">
                                 <div class="col-xl-12 col-lg-12 col-md-12 mt-4">
                                     <div class="">
                                         <div class="row d-field-container">
                                             <div class="col-sm-6">
                                                 <div class="form-group">
                                                     <label for="field-name">Field Name</label>
                                                     <input type="text" class="form-control" id="field-name" placeholder="Field Name">
                                                     <div class="LMNEu error-field-name"></div>
                                                 </div>
                                             </div>
                                             <div class="col-sm-6">
                                                 <div class="form-group">
                                                     <label for="field-type">Field Type</label>
                                                     <select class="form-control" id="field-type">
                                                         <option value="">Select Field Type</option>
                                                         <option value="text">Text (Max 200 Letters)</option>
                                                         <option value="textarea">Text Area (Unlimited Letters)</option>
                                                         <option value="date">Date</option>
                                                     </select>
                                                     <div class="LMNEu error-field-type"></div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="popup-footer mt-3">
                     <button class="btn btn-primary" id="add-field">Add Field</button>
                 </div>
                 <div class="popup-data-list">
                     <h5>Field List</h5>
                     <div class="data-list">
                         <div class="row align-items-center">
                             <div class="col-5">
                                 <b>Field Name</b>
                             </div>
                             <div class="col-5">
                                 <b>Field Type</b>
                             </div>
                             <div class="col-2">
                                 <b>Delete</b>
                             </div>
                         </div>
 
                         ${getList(list)}
 
                     </div>
                 </div>
             </div>
         </div>
     </div>`;

  $("body").append(form);
  setTimeout(function () {
    $(".popup-container").addClass("open");
  }, 100);
});

const getList = (list) => {
  let res = "";
  if (Array.isArray(list)) {
    for (let i = 0; i < list.length; i++) {
      res += `<div class="row align-items-center">
                 <div class="col-5">
                     ${list[i].name.replace("_", " ")}
                 </div>
                 <div class="col-5">
                     ${list[i].type}
                 </div>
                 <div class="col-2">
                     <a href="javascript:;" class="delete-field" data-n="${
                       list[i].name
                     }"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                 </div>
             </div>`;
    }
  } else {
    res = "";
  }
  return res;
};

$(document).on("click", ".delete-field", function () {
  let name = this.getAttribute("data-n");
  let tar = this;
  const cnf = confirm("Are you sure you want to delete this field?");
  if (cnf) {
    $.ajax({
      type: "POST",
      url: "ajax/pages/product.php",
      data: {
        flag: "delete_field",
        name: name,
      },
      success: function (res) {
        if (res == 1) {
          $(tar).parents(".row").remove();
          showMesPopup("Field Delete Successfully");
        } else {
          alert("Something went wrong, please try again later");
        }
      },
    });
  }
});

$(document).on("click", ".close-popup", function () {
  $(".popup-layer").remove();
});

$(document).on("click", "#add-field", function (e) {
  const fieldName = document.querySelector("#field-name");
  const fieldType = document.querySelector("#field-type");
  const nameErr = document.querySelector(".error-field-name");
  const typeErr = document.querySelector(".error-field-type");

  nameErr.innerHTML = "";
  typeErr.innerHTML = "";

  if (fieldName.value == "") {
    nameErr.innerHTML = "Field Name is required";
    fieldName.focus();
    return;
  } else if (!/^[a-z\s]+$/.test(fieldName.value)) {
    nameErr.innerHTML =
      "Field Name is not valid, Allow only lowercase letters and spaces";
    fieldName.focus();
    return;
  }

  if (fieldType.value == "") {
    typeErr.innerHTML = "Field Type is required";
    fieldType.focus();
    return;
  }

  $.ajax({
    type: "POST",
    url: "ajax/pages/product.php",
    data: {
      flag: "add_field",
      field_name: fieldName.value,
      field_type: fieldType.value,
    },
    success: function (res) {
      if (res == 1) {
        showMesPopup("Field Add Successfully");
        $(".popup-layer").remove();
      } else if (res == 2) {
        alert("Field Name Already Exist");
      } else {
        alert("Something went wrong, please try again later");
      }
    },
  });
});
