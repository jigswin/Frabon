$(document).on("click", "#reset", function () {
  image.clearButton.click();
  $("#general-info")[0].reset();
  $(".OT150").addClass("d-none");
});

let bannerImg;
let loadImage = function (event) {
  let img = event.target.files[0];
  let imgType = img.type;
  const valid = ["image/jpeg", "image/png", "image/jpg"];
  if (!valid.includes(imgType)) {
    alert("Invalid image type");
    event.target.value = "";
  } else bannerImg = img;
};

$(document).on("click", "#save", async function () {
  var path = [];
  let array = [];
  const name = document.querySelector("#pname").value;

  if (bannerImg) {
    const converImg = () => {
      return new Promise((resolve) => {
        const reader = new FileReader();
        reader.onload = function () {
          resolve(reader.result);
        };
        reader.readAsDataURL(bannerImg);
      });
    };
    bannerImg = await converImg();
  }

  if ($(".A25Fy").length > 0) {
    let valid = ["image/jpeg", "image/png"];
    var path = uploadImage(valid);

    array[0] = [];
    array[1] = [];

    $(".HnpC3").each(function () {
      array[0].push($(this).attr("id"));
      array[1].push($(this).val());
    });

    $(".ONfDK").each(function () {
      array[0].push($(this).attr("id"));
      if ($(this).is(":checked")) {
        array[1].push(1);
      } else {
        array[1].push(0);
      }
    });
  }

  $.ajax({
    type: "POST",
    url: "ajax/pages/settings.php",
    data: {
      flag: "updateProfile",
      name: name,
      logo: path[0],
      array: array,
      bannerImg,
    },
    success: function (res) {
      if (res == 1) {
        showMesPopup("Changes Saved Successfully");

        if (path.length > 0 || bannerImg) {
          setTimeout(() => {
            location.href = location.href;
          }, 2000);
        }
      } else if (res == 2) {
        alert("Something went wrong please try again");
      }
    },
  });
});
