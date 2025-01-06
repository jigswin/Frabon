function getUrlVars() {
  // get value from url
  var vars = {};
  var parts = window.location.href.replace(
    /[?&]+([^=&]+)=([^&]*)/gi,
    function (m, key, value) {
      vars[key] = value;
    }
  );
  return vars;
}

const loader = document.querySelector(".GmWow");

/******************************************************************************************
 * Header
 ******************************************************************************************/

$(document).on("click", ".uinTv", function () {
  $(".SJsW2").show();
  setTimeout(function () {
    $(".q9VPn").css("transform", "translateX(0%)");
  }, 100);
  $(".menu-btn").addClass("open");
});

$(document).on("click", ".SJsW2", function (e) {
  var menu = $(".q9VPn");
  var btn = $(".uinTv");

  if (
    !btn.is(e.target) &&
    btn.has(e.target).length === 0 &&
    !menu.is(e.target) &&
    menu.has(e.target).length === 0 &&
    screen.width <= 700
  ) {
    $(".q9VPn").css("transform", "translateX(-100%)");
    setTimeout(function () {
      $(".SJsW2").hide();
      $(".menu-btn").removeClass("open");
    }, 500);
  }
});

$(document).on("click", ".createPDF", function () {
  window.open("pdf", "_blank");
});

/******************************************************************************************
 * Index
 ******************************************************************************************/

if (
  location.href.split("/").slice(-1) == "" ||
  location.href.split("/").slice(-1) == "index"
) {
  /****************************************************
   * Banner
   ****************************************************/

  if ($(".pOo2M").length > 0) {
    var banner = new Swiper(".pOo2M", {
      slidesPerView: 1,
      grabCursor: true,
      loop: true,
      autoplay: {
        delay: 5000,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  }

  // const bannerCon = document.querySelector(".L5k2P");
  // function setImage(img) {
  //   const loading = document.querySelector(".NM4Aw");
  //   let imgCon = `<div class="swiper-slide AidKF">
  // 		<img src="admin/images/banner/${img}" alt="">
  // 	</div>`;
  //   $(bannerCon).append(imgCon);
  //   // var image = document.createElement('img');
  //   // image.classList = 'swiper-slide AidKF';
  //   // image.src = `admin/images/banner/${img}`;
  //   // bannerCon.appendChild(image);
  //   $(loading).remove();
  //   bannerCon.classList.remove("L5k2P");
  // }

  $(".M4MAw").remove();
  $(".HTGrU").removeClass("d-none");
  $(".olmdb")
    .append(`<div class="swiper-button-next swiper-button-white XOe0N"></div>
		<div class="swiper-button-prev swiper-button-white XOe0N"></div>`);

  var category = new Swiper(".olmdb", {
    slidesPerView: 4,
    loop: true,
    spaceBetween: 30,
    autoplay: {
      delay: 3000,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      1150: {
        slidesPerView: 4,
      },
      900: {
        slidesPerView: 3,
      },
      540: {
        slidesPerView: 2,
      },
      0: {
        slidesPerView: 1,
      },
    },
  });

  $(".M7d3w").remove();
  $(".O6ed0").removeClass("d-none");
  $(".OB1JT")
    .append(`<div class="swiper-button-next swiper-button-white XOe0N"></div>
			<div class="swiper-button-prev swiper-button-white XOe0N"></div>`);

  var gallery = new Swiper(".OB1JT", {
    effect: "coverflow",
    centeredSlides: true,
    slidesPerView: 4,
    loop: true,
    freeMode: true,
    autoplay: {
      delay: 3000,
    },
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },
    pagination: {
      el: ".swiper-pagination",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      1150: {
        slidesPerView: 4,
      },
      900: {
        slidesPerView: 3,
      },
      540: {
        slidesPerView: 2,
      },
      0: {
        slidesPerView: 1,
      },
    },
  });
}

/******************************************************************************************
 * gallery photos slider
 ******************************************************************************************/

if ($(".slideshow-container").length > 0) {
  var slideclick = 0;
  $(document).click(function () {
    var container = $(".slideshow-container");
    if (
      !container.is(event.target) &&
      !container.has(event.target).length &&
      slideclick == 0
    ) {
      $("#photos-main").css("display", "none").html("");
      $("body").css("overflow", "auto");
    } else {
      slideclick = 0;
    }
  });
}

function slide(no) {
  slideclick = 1;
  data = "";
  var data =
    '<button class="close-post-slider"><i class="fa fa-close"></i></button><div class="slideshow-container">';
  $(".gallery_view").each(function () {
    data +=
      '<div class="mySlides fade"><div class="img-con-g"><img src="' +
      $(this).attr("src") +
      '" /></div></div>';
  });

  data +=
    '<a class="prev btn-slide" onclick="plusSlidespg(-1)">&#10094;</a><a class="next btn-slide" onclick="plusSlidespg(1)">&#10095;</a></div>';

  $("#photos-main").css("display", "flex").html(data);
  $("body").css("overflow", "hidden");
  currentSlidepg(no);
}

var slideIndex = 1;

function plusSlidespg(n) {
  showSlidespg((slideIndex += n));
}

function currentSlidepg(n) {
  showSlidespg((slideIndex = parseInt(n)));
  alert(slideIndex);
}

function showSlidespg(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace("active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}

/******************************************************************************************
 * Subscribe
 ******************************************************************************************/

$(document).on("click", ".DWyZC", function () {
  const email = document.querySelector("#eI03D").value;
  if (!email) {
    alert("Please enter email id");
    return false;
  }

  $.ajax({
    type: "POST",
    url: "common-ajax.php",
    data: { flag: "subscribe", email: email },
    success: function (res) {
      if (res == 1) {
        swal({
          title: "Thank You!",
          text: "You'r subscribe successfully.",
          icon: "success",
          className: "success",
        });
        $("#eI03D").val("");
      } else {
        alert("You'r already subscriber");
      }
    },
  });
});

/******************************************************************************************
 * Gallery Popup
 ******************************************************************************************/

/* gallery page */

$(document).on("click", ".ONfDK", function () {
  var slides = "";

  const items = document.querySelectorAll(".ONfDK .HnpC3");
  let active = parseInt(this.getAttribute("index"));
  items.forEach((ele) => {
    slides += `<div class="swiper-slide Jg8As">
			<img src="${ele.src}" />
		</div>`;
  });

  $("body").append(`<div class="e6HgB">
		<div class="swiper-container hsl38">
			<div class="pEL5e"><i class="fal fa-times"></i></div>
			<div class="swiper-wrapper">
				${slides}
			</div>
			<!-- Add Arrows -->
			<div class="swiper-button-next swiper-button-white L8OdB"></div>
			<div class="swiper-button-prev swiper-button-white L8OdB"></div>
		</div>
		<div class="swiper-container UXZ01">
			<div class="swiper-wrapper">
				${slides}
			</div>
		</div>
	</div>`);

  var galleryPageThumbs = new Swiper(".UXZ01", {
    spaceBetween: 10,
    slidesPerView: 4,
    loop: true,
    freeMode: true,
    loopedSlides: 5, //looped slides should be the same
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
  });
  var galleryPage = new Swiper(".hsl38", {
    spaceBetween: 10,
    loop: true,
    autoplay: {
      delay: 5000,
    },
    loopedSlides: 5, //looped slides should be the same
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: galleryPageThumbs,
    },
  });
  $(".hsl38 .Jg8As").on("mouseover", function () {
    galleryPage.autoplay.stop();
  });

  $(".hsl38 .Jg8As").on("mouseout", function () {
    galleryPage.autoplay.start();
  });
  active += 4;
  galleryPage.slideTo(active);
});

/* index gallery */

$(document).on("click", ".GEm8N", function () {
  var slides = "";

  const items = document.querySelectorAll(".GEm8N .O72Pi");
  let active = parseInt(this.getAttribute("index"));
  items.forEach((ele) => {
    slides += `<div class="swiper-slide Jg8As">
			<img src="${ele.src}" />
		</div>`;
  });

  $("body").append(`<div class="e6HgB">
		<div class="swiper-container hsl38">
			<div class="pEL5e"><i class="fal fa-times"></i></div>
			<div class="swiper-wrapper">
				${slides}
			</div>
			<!-- Add Arrows -->
			<div class="swiper-button-next swiper-button-white L8OdB"></div>
			<div class="swiper-button-prev swiper-button-white L8OdB"></div>
		</div>
		<div class="swiper-container UXZ01">
			<div class="swiper-wrapper">
				${slides}
			</div>
		</div>
	</div>`);

  var indexGalleryThumbs = new Swiper(".UXZ01", {
    spaceBetween: 10,
    slidesPerView: 4,
    loop: true,
    freeMode: true,
    loopedSlides: 5, //looped slides should be the same
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
  });
  var indexGallery = new Swiper(".hsl38", {
    spaceBetween: 10,
    loop: true,
    autoplay: {
      delay: 5000,
    },
    loopedSlides: 5, //looped slides should be the same
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: indexGalleryThumbs,
    },
  });
  $(".hsl38 .Jg8As").on("mouseover", function () {
    indexGallery.autoplay.stop();
  });

  $(".hsl38 .Jg8As").on("mouseout", function () {
    indexGallery.autoplay.start();
  });
  active += 8;
  indexGallery.slideTo(active);
});

$(document).on("click", ".pEL5e", function () {
  $(".e6HgB").remove();
});

/******************************************************************************************
 * Appointment
 ******************************************************************************************/

$(document).on("focus", ".inputbox input, .inputbox textarea", function () {
  $(this).siblings("span").hide();
});

$(document).on("focusout", ".inputbox input, .inputbox textarea", function () {
  if ($(this).val() == "") {
    $(this).siblings("span").show();
  }
});

$(document).on("focus", "#datepicker", function () {
  $(this).attr("type", "date");
});

$(document).on("focusout", "#datepicker", function () {
  if ($(this).val() == "") {
    $(this).attr("type", "text");
  }
});

/******************************************************************************************
 * Contact Us
 ******************************************************************************************/

$(document).on("click", "#submit-contact", function () {
  validate({
    input: "HS0fb",
    error: "awA3N",
  }).then((res) => {
    const name = document.querySelector("#cusname");
    const email = document.querySelector("#cusemail");
    const mobile = document.querySelector("#cusmobile");
    const mess = document.querySelector("#cusmess");

    $("#stopclick").show();

    $.ajax({
      type: "POST",
      url: "common-ajax.php",
      data: {
        flag: "contact_us",
        name: name.value,
        mobile: mobile.value,
        email: email.value,
        mess: mess.value,
      },
      success: function (res) {
        $("#stopclick").hide();

        if (res == 1) {
          $("input:text").val("");
          $("textarea").val("");
          swal({
            title: "Thank You!",
            text: "We will contact you shortly.",
            icon: "success",
            button: "Home",
            className: "success",
            closeOnClickOutside: false,
          });
          $(document).on("click", ".success .swal-button", function () {
            window.location.href = "./";
          });
          setTimeout(() => {
            $(".success .swal-button").click();
          }, 5000);
        } else if (res == 2) {
          alert("Something went wrong please try again");
        }
      },
    });
  });
});

/******************************************************************************************
 * Job Apply page
 ******************************************************************************************/

let job_id = 0;

$(document).on("click", ".ICs6K", function () {
  job_id = $(this).data("i");
  $(".KkJxq").removeClass("d-none");
  $("body").css("overflow", "hidden");
  $(".wks89").html(
    $(this).parents(".G5GRk").children("a").children(".SgCMr").html()
  );
  setTimeout(() => {
    $(".KgK9v").addClass("open");
  }, 100);
  let s = $(this).data("v");
  $("#service").val(s);
});

$(document).on("click", ".m4e3w", function () {
  $(".KgK9v").removeClass("open");
  setTimeout(() => {
    $(".KkJxq").addClass("d-none");
    $("body").css("overflow", "auto");
  }, 100);
});

$(document).on("click", "#BbNpS", async function () {
  const dateTime = getDateTime().split("&");

  let res = await validate({
    input: "HS0fb",
    error: "awA3N",
    insert: true,
    files: [["resume", ["pdf", "doc", "docx"], "admin/resume/"]],
    extraPmt: [
      ["job_id", job_id],
      ["date", `${dateTime[0]} ${dateTime[1]}`],
    ],
    optional: ["resume"],
    table: "job_applications",
    mail: "job-applications",
  });

  if (res.status == 1) {
    $(".m4e3w").click();
    swal({
      title: "Thank You!",
      text: "Your application send successfully.",
      icon: "success",
      button: "Ok",
      className: "success",
      closeOnClickOutside: false,
    });
    $(document).on("click", ".success .swal-button", function () {
      location.reload();
    });
  } else if (res.status == 2) {
    alert("Something went wrong please try again");
  }
});

/******************************************************************************************
 * Functions
 ******************************************************************************************/

function getDateTime() {
  var st = srvTime();
  var date = new Date(st);
  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();
  var fulldate = day + "/" + month + "/" + year;
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? "pm" : "am";
  hours = hours % 12;
  hours = hours ? hours : 12;
  minutes = minutes < 10 ? "0" + minutes : minutes;
  var strTime = hours + ":" + minutes + " " + ampm;
  var dateTime = fulldate + "&" + strTime;
  return dateTime;
}

var xmlHttp;
function srvTime() {
  try {
    //FF, Opera, Safari, Chrome
    xmlHttp = new XMLHttpRequest();
  } catch (err1) {
    //IE
    try {
      xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (err2) {
      try {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (eerr3) {
        //AJAX not supported, use CPU time.
        alert("AJAX not supported");
      }
    }
  }
  xmlHttp.open("HEAD", window.location.href.toString(), false);
  xmlHttp.setRequestHeader("Content-Type", "text/html");
  xmlHttp.send("");
  return xmlHttp.getResponseHeader("Date");
}

/*****************************************************************************
 * feedback page
 *****************************************************************************/

$(document).on("click", ".rating__icon", function () {
  var no = $(this).data("f");
  $(`.rating__icon`).removeClass("star");
  $(".rating__input").prop("checked", false);

  for (let i = 1; i <= no; i++) {
    $(`.rating__icon[data-f = ${i}]`).addClass("star");
    $(`.rating__input[data-f = ${i}]`).prop("checked", true);
  }
});

$(document).on("click", "#feedback", function () {
  var rating = $("input[name=rating]:checked").length + 1;

  if (!rating) {
    alert("Please select ratings");
    return false;
  }
  validate({
    input: "HS0fb",
    error: "awA3N",
  }).then((res) => {
    var name = $("#feedname").val();
    var mes = $("#feedmess").val();

    $.ajax({
      type: "POST",
      url: "common-ajax.php",
      data: { name: name, rating: rating, mes: mes, flag: "feeddata_insert" },
      success: function (data) {
        if (data == 1) {
          swal({
            title: "Thank You!",
            text: "Feedback send successfully.",
            icon: "success",
            button: "Home",
            className: "success",
            closeOnClickOutside: false,
          });
          $(document).on("click", ".success .swal-button", function () {
            window.location.href = "./";
          });
          setTimeout(() => {
            $(".success .swal-button").click();
          }, 5000);
        } else if (data == 2) {
          alert("Somthing Wrong");
        }
      },
    });
  });
});

/*****************************************************************************
 * Share page
 *****************************************************************************/

$(document).on("click", "#send-wa-link", function () {
  const no = document.querySelector("#whatsapp-no");
  const id = getUrlVars()["id"];

  if (!no.value) {
    $(no).siblings("span").removeClass("d-none");
    no.focus();
  } else {
    $(no).siblings("span").addClass("d-none");

    var path = window.location;
    window.open(
      "https://api.whatsapp.com/send?phone=+91" +
        no.value +
        "&text=https://" +
        path.hostname,
      "_blank"
    );
  }
});

function isNumberKey(evt) {
  var charCode = evt.which ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
  return true;
}

/******************************************************************************************
 * Enquiry page
 ******************************************************************************************/

$(document).on("click", "#bookap", function () {
  validate({
    input: "HS0fb",
    error: "awA3N",
  }).then((res) => {
    var pass = "true";
    $(".listinginput").each(function () {
      var data = $(this).val();
      if (data == "") {
        $(this).focus();
        pass = "false";
        return false;
      }
    });
    if (pass == "true") {
      $("#stopclick").show();
      $("#emailError2").html("");
      var name = $("#inqname").val();
      var email = $("#email").val();
      var phone = $("#phone").val();
      var mes = $("#mes").val();
      var id = getUrlVars()["id"];
      var proname = getUrlVars()["name"];
      var dateTime = getDateTime().split("&");
      var date = dateTime[0] + " " + dateTime[1];
      if (id != "") {
        $.ajax({
          type: "POST",
          url: "common-ajax.php",
          data: {
            proid: id,
            proname: proname,
            name: name,
            email: email,
            phone: phone,
            mes: mes,
            date: date,
            flag: "enquiry_data",
          },
          success: function (data) {
            $("#stopclick").hide();
            $("input:text").val("");
            swal({
              title: "Thank You!",
              text: "Your enquiry send successfully.",
              icon: "success",
              button: "Home",
              className: "success",
              closeOnClickOutside: false,
            });
            $(document).on("click", ".success .swal-button", function () {
              window.location.href = "./";
            });
            setTimeout(() => {
              $(".success .swal-button").click();
            }, 5000);
          },
        });
      } else {
        $.ajax({
          type: "POST",
          url: "common-ajax.php",
          data: {
            name: name,
            email: email,
            phone: phone,
            mes: mes,
            listid: listid,
            flag: "enquiry_data",
          },
          success: function (data) {
            $("body").append(
              '<div class="process-done"><div class="done-con"><i class="fa fa-check mr-3"></i>Enquiry Send Successfully.</div></div>'
            );
            setTimeout(function () {
              $(".copy-done").remove();
              window.history.back();
            }, 3000);

            $("input:text").val("");
            $("#stopclick").hide();
          },
        });
      }
    }
  });
});

/******************************************************************************************
 * product page
 ******************************************************************************************/

$(document).on("click", ".tAlBZ", function () {
  $(".EaNh0 img").attr("src", $("img", this).attr("src"));
  $(".tAlBZ").removeClass("activeImg");
  $(this).addClass("activeImg");
});

$(document).ready(function () {
  if ($(window).width() > 900) {
    $("#ZniR0").imagezoomsl({
      zoomrange: [3, 3],
    });
  }
  $(".tAlBZ:first-child").addClass("activeImg");
});

$(document).on("click", ".mnLDx", function () {
  $(".model").removeClass("d-none");
  setTimeout(() => {
    $(".model-wrap").removeClass("fade-pop");
  }, 100);
});

$(document).on("click", ".close-w-pop", function () {
  $(".model-wrap").addClass("fade-pop");
  setTimeout(() => {
    $(".model").addClass("d-none");
  }, 250);
});

$(document).on("click", "#send-wa", function () {
  const no = document.querySelector("#whatsapp-no");
  const id = getUrlVars()["id"];

  if (!no.value) {
    $(no).siblings("span").removeClass("d-none");
    no.focus();
  } else {
    $(no).siblings("span").addClass("d-none");

    var url = window.location;
    window.open(
      "https://api.whatsapp.com/send?phone=+91 " +
        no.value +
        "&text=" +
        url.hostname +
        "/product?id=" +
        id,
      "_blank"
    );
  }
});

$(document).on("click", ".copy-brochure-link", function () {
  var url = window.location;
  let link =
    url.hostname + "/admin/images/brochure/" + this.getAttribute("data-file");
  navigator.clipboard.writeText(link).then(
    function () {
      alert("Link Copied Successful!");
    },
    function (err) {
      alert("Could not copy link, try after few minutes.");
    }
  );
});