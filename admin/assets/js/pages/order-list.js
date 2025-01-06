let status = [];

let tmp = getUrlVars()["status"];
if (tmp) {
  tmp = tmp.split("-");
  tmp.forEach((ele) => {
    status.push(ele);
    $(`.status[data-v=${ele}]`).addClass("active_s");
  });
}

$(document).on("click", ".status", function () {
  if (this.classList.contains("active_s")) {
    this.classList.remove("active_s");
    const index = status.indexOf($(this).data("v"));
    if (index > -1) {
      status.splice(index, 1);
    }
  } else {
    this.classList.add("active_s");
    status.push($(this).data("v"));
  }
});

$(document).on("click", "#show", function () {
  let cust = $("#customer").val();
  let date = $("#date-p").val();
  date = date.split(" to ");

  var path = window.location.pathname;
  var page = path.split("/").pop();
  let str = "";

  if (status.length > 0) {
    str = "&status=";

    status.forEach((ele, index) => {
      if (index == 0) {
        str += `${ele}`;
      } else {
        str += `-${ele}`;
      }
    });
  }

  if (date[0]) {
    if (!date[1]) {
      date[1] = date[0];
    }
    location.replace(
      `${page}?cust=${cust}&sdate=${date[0]}&edate=${date[1]}${str}`
    );
  } else {
    location.replace(`${page}?cust=${cust}${str}`);
  }
});

$(document).on("click", "#reset", function () {
  $("#customer").val("all");
  $("#date-p").val("");
  status = [];
  $(".status").removeClass("active_s");
});

/***********************************************************************************************
 * Order detail show
 ***********************************************************************************************/

$(document).on("click", ".nykTw", function () {
  var order = $(this).parent(".OZ6VQ").data("id");
  $.ajax({
    type: "POST",
    url: "ajax/pages/order-list.php",
    data: { flag: "getOrderDetail", order_id: order },
    success: function (res) {
      $(".lDCab").css("display", "flex");
      $(".huyCD").html(res);
    },
  });
});

$(document).on("click", ".LLncf", function () {
  var order = $(this).parent(".OZ6VQ").data("id");
  $.ajax({
    type: "POST",
    url: "ajax/pages/order-list.php",
    data: { flag: "getPaymentDetail", order_id: order },
    success: function (res) {
      $(".lDCab").css("display", "flex");
      $(".huyCD").html(res);
    },
  });
});

$(document).on("click", ".hfCXV", function () {
  $(".lDCab").css("display", "none");
  $(".huyCD").html("");
});

$(document).on("click", ".lDCab", function (e) {
  if ($(".OWp1r").has(e.target).length === 0) {
    $(".lDCab").css("display", "none");
    $(".huyCD").html("");
  }
});

/***********************************************************************************************
 * Order allocations
 ***********************************************************************************************/

$(document).on("change", ".order-status", function () {
  let tar = this;
  let status = $(this).val();
  let order = [$(this).parents(".OZ6VQ").data("id")];
  $.ajax({
    type: "POST",
    url: "ajax/pages/order-list.php",
    data: { flag: "change_order_status", status: status, arr: order },
    success: function (res) {
      var data = jQuery.parseJSON(res);

      if (data.flag == 1) {
        showMesPopup("Status Change Successfully");
        if (status == "Accepted") {
          $(tar).parent().siblings(".d-boy").html(data.dboy);
        } else {
          $(tar).parent().siblings(".d-boy").html("");
        }
      } else {
        alert("Something went wrong please try again");
      }
    },
  });
});

let flag = 0;

$(document).on("click", ".eiIfn", function () {
  $(".vVyBe").removeClass("open").addClass("d-none");
  $(this).siblings(".vVyBe").removeClass("d-none");
  setTimeout(() => {
    $(this).siblings(".vVyBe").addClass("open");
  }, 10);
  flag = 1;
});

$(document).on("click", window, function () {
  if (flag == 0) {
    $(".vVyBe").removeClass("open").addClass("d-none");
  } else {
    flag = 0;
  }
});

let multiStatus, dBoy;

$(document).on("click", ".tmhbb", function () {
  multiStatus = $(this).data("v");
  $(".aJQk9").html(multiStatus);
  if (multiStatus == "Accepted") {
    $(".FHQiv").removeClass("d-none");
  } else {
    $(".FHQiv").addClass("d-none");
    $(".BeTkn").html("Select Delivery Boy");
    dBoy = "";
  }
});

$(document).on("click", ".q42mu", function () {
  dBoy = $(this).data("i");
  $(".BeTkn").html($(this).data("v"));
});

$(document).on("click", "#save", function () {
  if (multiStatus) {
    let tmp = [];
    $(".JH5fJ").each(function () {
      if ($(this).is(":checked")) {
        tmp.push($(this).parents(".OZ6VQ").data("id"));
      }
    });

    if (tmp.length == 0) {
      alert("Please select orders");
      return false;
    }

    $.ajax({
      type: "POST",
      url: "ajax/pages/order-list.php",
      data: {
        flag: "change_order_status",
        status: multiStatus,
        arr: tmp,
        dBoy: dBoy,
      },
      success: function (res) {
        var data = jQuery.parseJSON(res);

        if (data.flag == 1) {
          showMesPopup("Status Change Successfully");

          tmp.forEach((ele, index) => {
            $(".order-status", `.OZ6VQ[data-id=${ele}]`).val(multiStatus);
            if (multiStatus == "Accepted") {
              $(".d-boy", `.OZ6VQ[data-id=${ele}]`).html(data.dboy[index]);
            } else {
              $(".d-boy", `.OZ6VQ[data-id=${ele}]`).html("");
            }
          });

          $(".aJQk9").html("Select Status");
          $(".BeTkn").html("Select Delivery Boy");
          $(".FHQiv").addClass("d-none");

          multiStatus = dBoy = "";

          $(".sJ9Xw").prop("checked", false);
          $(".JH5fJ").prop("checked", false);

          location.reload();
        } else {
          alert("Something went wrong please try again");
        }
      },
    });
  } else {
    alert("Please select status");
  }
});
