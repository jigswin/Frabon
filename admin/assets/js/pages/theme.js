$(document).on("click", "#reset", function () {
  location.href = location.href;
});

$(document).on("click", ".color-box", function () {
  $("#color-picker").remove();
  var color = $(this).children(".cl-info").children("span").html();
  $(this)
    .parent(".color-wrap")
    .append(`<input type="color" id="color-picker" value="${color}">`);

  setTimeout(function () {
    $("#color-picker")[0].click();
  }, 100);

  $(document).on("change", "#color-picker", function (e) {
    $(this)
      .siblings(".color-box")
      .css("box-shadow", "0px 0px 10px orangered")
      .children(".colorCode")
      .css("background-color", this.value)
      .attr("data-c", this.value)
      .siblings(".cl-info")
      .children("span")
      .html(this.value);
  });
});

$(document).on("click", "#add", function () {
  let name = [],
    color = [];
  let tname = document.querySelector("#name").value;

  if (!tname) {
    alert("Please enter theme name");
  } else {
    $(".colorCode").each(function () {
      name.push($(this).data("n"));
      color.push($(this).siblings(".cl-info").children("span").html());
    });

    showLayer();

    $.ajax({
      type: "POST",
      url: "ajax/pages/theme.php",
      data: { flag: "add_theme", tname: tname, name: name, color: color },
      success: function (res) {
        removeLayer();

        if (res == 1) {
          showMesPopup("Theme Add Successfully");
          setTimeout(() => {
            $("#reset").click();
          }, 2000);
          $(".color-box").removeAttr("style");
        } else if (res == 2) {
          alert("Something went wrong, please try again letter");
        }
      },
    });
  }
});

$(document).on("click", "#save", function () {
  let name = [],
    color = [];
  const id = getUrlVars()["id"];
  let tname = document.querySelector("#name").value;

  if (!tname) {
    alert("Please enter theme name");
  } else {
    $(".colorCode").each(function () {
      name.push($(this).data("n"));
      color.push($(this).siblings(".cl-info").children("span").html());
    });

    showLayer();

    $.ajax({
      type: "POST",
      url: "ajax/pages/theme.php",
      data: {
        flag: "save_theme",
        tname: tname,
        name: name,
        color: color,
        id: id,
      },
      success: function (res) {
        removeLayer();

        if (res == 1) {
          showMesPopup("Changes Save Successfully");
          $(".color-box").removeAttr("style");
        } else if (res == 2) {
          alert("Something went wrong, please try again letter");
        }
      },
    });
  }
});

/*****************************************************************************************************************
 * Change Status
 *****************************************************************************************************************/

$(document).on("click", ".ZyUtL", function () {
  const id = $(this).parents(".OZ6VQ").data("id");
  let status = $(this).data("v");
  let btn, text;
  let tar = this;

  if (status == 1) {
    status = 0;
    btn =
      '<svg class="ZyUtL text-title" width="30" height="30" viewBox="0 0 24 24" data-v="0"><path fill="currentColor" d="M7,10A2,2 0 0,1 9,12A2,2 0 0,1 7,14A2,2 0 0,1 5,12A2,2 0 0,1 7,10M17,7A5,5 0 0,1 22,12A5,5 0 0,1 17,17H7A5,5 0 0,1 2,12A5,5 0 0,1 7,7H17M7,9A3,3 0 0,0 4,12A3,3 0 0,0 7,15H17A3,3 0 0,0 20,12A3,3 0 0,0 17,9H7Z" /></svg>';
    text =
      '<span class="badge outline-badge-danger shadow-none">Deactive</span>';
  } else {
    status = 1;
    btn =
      '<svg class="ZyUtL text-title" width="30" height="30" viewBox="0 0 24 24" data-v="1"><path fill="currentColor" d="M17,7H7A5,5 0 0,0 2,12A5,5 0 0,0 7,17H17A5,5 0 0,0 22,12A5,5 0 0,0 17,7M17,15A3,3 0 0,1 14,12A3,3 0 0,1 17,9A3,3 0 0,1 20,12A3,3 0 0,1 17,15Z" /></svg></li>';
    text = '<span class="badge outline-badge-info shadow-none">Active</span>';
  }

  $.ajax({
    type: "POST",
    url: "ajax/pages/theme.php",
    data: { flag: "change_status", id: id, status: status },
    success: function (res) {
      if (res == 1) {
        $(tar).parents("td").siblings(".LctVL").html(text);
        $(tar).parent("li").html(btn);
        showMesPopup("Status Change Successfully");
        setTimeout(() => {
          location.href = location.href;
        }, 1000);
      } else if (res == 2) {
        alert("Something went wrong, please try again letter");
      }
    },
  });
});

/*****************************************************************************************************************
 * Delete
 *****************************************************************************************************************/

$(document).on("click", ".delete-row", function () {
  deleteSingleRow(this, "theme", "theme_id");
  setTimeout(() => {
    location.href = location.href;
  }, 1000);
});

/*****************************************************************************************************************
 * Multiple Delete
 *****************************************************************************************************************/

$(document).on("click", "#B6KcU", function () {
  deleteRows("theme", "theme_id");
  setTimeout(() => {
    location.href = location.href;
  }, 1000);
});
