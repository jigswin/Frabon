$(document).on("click", "#reset", function () {
  $("#general-info")[0].reset();
  $(".OT150").addClass("d-none");
  $(".ql-editor").html("");
});

/*****************************************************************************************************************
 * Add
 *****************************************************************************************************************/

$(document).on("click", "#add", function () {
  let error = checkError("S5hPk", "OT150");

  let title = $("#title").val();
  let description = getQuillText();
  let min_salary = $("#min_salary").val();
  let max_salary = $("#max_salary").val();
  let vacancy = $("#vacancy").val();
  let location = $("#location").val();
  let work_days = $("#work_days").val();
  let timings = $("#timings").val();
  let education = $("#education").val();
  let experience = $("#experience").val();
  let type;
  if (document.querySelector('input[name="jobtype"]:checked')) {
    type = document.querySelector('input[name="jobtype"]:checked').value;
    $(".vGOBh").addClass("d-none").html("");
  } else {
    $(".vGOBh").removeClass("d-none").html("Please Select Job Type");
    return false;
  }
  let gender;
  if (document.querySelector('input[name="gender"]:checked')) {
    gender = document.querySelector('input[name="gender"]:checked').value;
    $(".PQxTN").addClass("d-none").html("");
  } else {
    $(".PQxTN").removeClass("d-none").html("Please Select Gender");
    return false;
  }
  let date = getDateTime().replace("&", " ");

  if (error == 0) {
    showLayer();
    $.ajax({
      type: "POST",
      url: "ajax/pages/careers.php",
      data: {
        flag: "job_add",
        title: title,
        description: description,
        min_salary: min_salary,
        max_salary: max_salary,
        vacancy: vacancy,
        location: location,
        work_days: work_days,
        timings: timings,
        education: education,
        type: type,
        experience: experience,
        gender: gender,
        date: date,
      },
      success: function (res) {
        removeLayer();

        if (res == 1) {
          showMesPopup("Job Add Successfully");
          $("#reset").click();
        } else if (res == 2) {
          alert("Something went wrong, please try again later");
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
  const id = getUrlVars()["id"];

  let title = $("#title").val();
  let description = getQuillText();
  let min_salary = $("#min_salary").val();
  let max_salary = $("#max_salary").val();
  let vacancy = $("#vacancy").val();
  let location = $("#location").val();
  let work_days = $("#work_days").val();
  let timings = $("#timings").val();
  let education = $("#education").val();
  let experience = $("#experience").val();
  let type;
  if (document.querySelector('input[name="jobtype"]:checked')) {
    type = document.querySelector('input[name="jobtype"]:checked').value;
    $(".vGOBh").addClass("d-none").html("");
  } else {
    $(".vGOBh").removeClass("d-none").html("Please Select Job Type");
    return false;
  }
  let gender;
  if (document.querySelector('input[name="gender"]:checked')) {
    gender = document.querySelector('input[name="gender"]:checked').value;
    $(".PQxTN").addClass("d-none").html("");
  } else {
    $(".PQxTN").removeClass("d-none").html("Please Select Gender");
    return false;
  }

  if (error == 0) {
    showLayer();

    $.ajax({
      type: "POST",
      url: "ajax/pages/careers.php",
      data: {
        flag: "job_edit",
        title: title,
        description: description,
        min_salary: min_salary,
        max_salary: max_salary,
        vacancy: vacancy,
        location: location,
        work_days: work_days,
        timings: timings,
        education: education,
        type: type,
        experience: experience,
        gender: gender,
        id: id,
      },
      success: function (res) {
        removeLayer();

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
 * Delete
 *****************************************************************************************************************/

$(document).on("click", ".P6ROS", function () {
  const tar = this;
  const id = $(this).data("i");
  const flag = confirm("Are you sure to delete?");
  if (flag) {
    showLayer();
    $.ajax({
      type: "POST",
      url: "ajax/pages/careers.php",
      data: { flag: "delete_job", id: id },
      success: function (res) {
        removeLayer();

        if (res == 1) {
          $(tar).parents(".useTC").remove();
          showMesPopup("Delete Successfully");
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

$(document).on("click", ".ES9Xr", function () {
  const tar = this;
  const id = $(this).data("i");
  showLayer();
  $.ajax({
    type: "POST",
    url: "ajax/pages/careers.php",
    data: { flag: "change_status", id: id },
    success: function (res) {
      removeLayer();

      if (res == 1) {
        if ($(tar).html() == "Deactivate") {
          $(tar).html("Activate");
        } else {
          $(tar).html("Deactivate");
        }
        showMesPopup("Status Change Successfully");
      } else if (res == 2) {
        alert("Something went wrong, please try again later");
      }
    },
  });
});

/****************************************************
 * Detailed Page
 ****************************************************/

$(document).on("click", ".icXJS", function () {
  $(".nJ3lS").toggleClass("d-none");
});

$(document).on("click", window, function (e) {
  let abtn = $(".icXJS");
  if (abtn.has(e.target).length === 0) {
    $(".nJ3lS").addClass("d-none");
  }
});

$(document).on("click", ".OlbG6", function () {
  let n = this.getAttribute("data-n");
  $(`.OlbG6`).removeClass("active");
  $(this).addClass("active");
  $(`.LO10B`).removeClass("active");
  $(`.LO10B[data-n=${n}]`).addClass("active");
});
