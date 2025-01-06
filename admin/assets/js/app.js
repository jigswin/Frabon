document.write('<script src="assets/js/libs/mousewheel.min.js"></script>');

var App = (function () {
  var MediaSize = {
    xl: 1200,
    lg: 992,
    md: 991,
    sm: 576,
  };
  var ToggleClasses = {
    headerhamburger: ".toggle-sidebar",
    inputFocused: "input-focused",
  };

  var Selector = {
    mainHeader: ".header.navbar",
    headerhamburger: ".toggle-sidebar",
    fixed: ".fixed-top",
    mainContainer: ".main-container",
    sidebar: "#sidebar",
    sidebarContent: "#sidebar-content",
    sidebarStickyContent: ".sticky-sidebar-content",
    ariaExpandedTrue: '#sidebar [aria-expanded="true"]',
    ariaExpandedFalse: '#sidebar [aria-expanded="false"]',
    contentWrapper: "#content",
    contentWrapperContent: ".container",
    mainContentArea: ".main-content",
    searchFull: ".toggle-search",
    overlay: {
      sidebar: ".overlay",
      cs: ".cs-overlay",
      search: ".search-overlay",
    },
  };

  var categoryScroll = {
    scrollCat: function () {
      var sidebarWrapper = document.querySelectorAll(
        '.sidebar-wrapper [aria-expanded="true"]'
      )[0];
      var sidebarWrapperTop = sidebarWrapper.offsetTop - 12;
      setTimeout(function () {
        $(".menu-categories").animate({ scrollTop: sidebarWrapperTop }, 500);
      }, 500);
    },
  };

  var toggleFunction = {
    sidebar: function ($recentSubmenu) {
      $(".sidebarCollapse").on("click", function (sidebar) {
        sidebar.preventDefault();
        getSidebar = $(".sidebar-wrapper");
        if ($recentSubmenu === true) {
          if ($(".collapse.submenu").hasClass("show")) {
            $(".submenu.show").addClass("mini-recent-submenu");
            getSidebar.find(".collapse.submenu").removeClass("show");
            getSidebar.find(".collapse.submenu").removeClass("show");
            $(".collapse.submenu")
              .parents("li.menu")
              .find(".dropdown-toggle")
              .attr("aria-expanded", "false");
          } else {
            if ($(Selector.mainContainer).hasClass("sidebar-closed")) {
              if ($(".collapse.submenu").hasClass("recent-submenu")) {
                getSidebar
                  .find(".collapse.submenu.recent-submenu")
                  .addClass("show");
                $(".collapse.submenu.recent-submenu")
                  .parents(".menu")
                  .find(".dropdown-toggle")
                  .attr("aria-expanded", "true");
                $(".submenu").removeClass("mini-recent-submenu");
              } else {
                $("li.active .submenu").addClass("recent-submenu");
                getSidebar
                  .find(".collapse.submenu.recent-submenu")
                  .addClass("show");
                $(".collapse.submenu.recent-submenu")
                  .parents(".menu")
                  .find(".dropdown-toggle")
                  .attr("aria-expanded", "true");
                $(".submenu").removeClass("mini-recent-submenu");
              }
            }
          }
        }
        if ($(Selector.mainContainer).hasClass("sidebar-closed")) {
          $("body").remove("style.aa");
        } else {
          $("body").append(
            "<style class='aa'>.sidebar-closed > .sidebar-wrapper { width: 54px; }</style>"
          );
        }

        $(Selector.mainContainer).toggleClass("sidebar-closed");
        $(Selector.mainHeader).toggleClass("expand-header");
        $(Selector.mainContainer).toggleClass("sbar-open");
        $(".overlay").toggleClass("show");
        $("html,body").toggleClass("sidebar-noneoverflow");
      });
    },
    onToggleSidebarSubmenu: function () {
      $(".sidebar-wrapper").on("mouseenter mouseleave", function (event) {
        event.preventDefault();
        if ($("body").hasClass("alt-menu")) {
          if ($(".main-container").hasClass("sidebar-closed")) {
            if (event.type === "mouseenter") {
              $("li .submenu").removeClass("show");
              $("li.active .submenu").addClass("recent-submenu");
              $("li.active")
                .find(".collapse.submenu.recent-submenu")
                .addClass("show");
              $(".collapse.submenu.recent-submenu")
                .parents(".menu")
                .find(".dropdown-toggle")
                .attr("aria-expanded", "true");
            } else if (event.type === "mouseleave") {
              $("li").find(".collapse.submenu").removeClass("show");
              $(".collapse.submenu.recent-submenu")
                .parents(".menu")
                .find(".dropdown-toggle")
                .attr("aria-expanded", "false");
              $(".collapse.submenu")
                .parents(".menu")
                .find(".dropdown-toggle")
                .attr("aria-expanded", "false");
            }
          }
        } else {
          if ($(".main-container").hasClass("sidebar-closed")) {
            $(".collapse.submenu.recent-submenu")
              .parents(".menu")
              .find(".dropdown-toggle")
              .attr("aria-expanded", "true");
            $(this).find(".submenu.recent-submenu").toggleClass("show");
          }
        }
      });
    },
    offToggleSidebarSubmenu: function () {
      $(".sidebar-wrapper").off("mouseenter mouseleave");
    },
    overlay: function () {
      $("#dismiss, .overlay, cs-overlay").on("click", function () {
        // hide sidebar
        $(Selector.mainContainer).addClass("sidebar-closed");
        $(Selector.mainContainer).removeClass("sbar-open");
        // hide overlay
        $(".overlay").removeClass("show");
        $("html,body").removeClass("sidebar-noneoverflow");
      });
    },
    search: function () {
      $(Selector.searchFull).click(function (event) {
        $(this)
          .parents(".search-animated")
          .find(".search-full")
          .addClass(ToggleClasses.inputFocused);
        $(this).parents(".search-animated").addClass("show-search");
        $(Selector.overlay.search).addClass("show");
        $(Selector.overlay.search).addClass("show");
      });

      $(Selector.overlay.search).click(function (event) {
        $(this).removeClass("show");
        $(Selector.searchFull)
          .parents(".search-animated")
          .find(".search-full")
          .removeClass(ToggleClasses.inputFocused);
        $(Selector.searchFull)
          .parents(".search-animated")
          .removeClass("show-search");
      });
    },
  };

  var inBuiltfunctionality = {
    mainCatActivateScroll: function () {
      const ps = new PerfectScrollbar(".menu-categories", {
        wheelSpeed: 0.5,
        swipeEasing: !0,
        minScrollbarLength: 40,
        maxScrollbarLength: 300,
      });
    },
    preventScrollBody: function () {
      $("#sidebar").bind("mousewheel DOMMouseScroll", function (e) {
        var scrollTo = null;

        if (e.type == "mousewheel") {
          scrollTo = e.originalEvent.wheelDelta * -1;
        } else if (e.type == "DOMMouseScroll") {
          scrollTo = 40 * e.originalEvent.detail;
        }

        if (scrollTo) {
          e.preventDefault();
          $(this).scrollTop(scrollTo + $(this).scrollTop());
        }
      });
    },
  };

  var _mobileResolution = {
    onRefresh: function () {
      var windowWidth = window.innerWidth;
      if (windowWidth <= MediaSize.md) {
        categoryScroll.scrollCat();
        toggleFunction.sidebar();
      }
    },

    onResize: function () {
      $(window).on("resize", function (event) {
        event.preventDefault();
        var windowWidth = window.innerWidth;
        if (windowWidth <= MediaSize.md) {
          toggleFunction.offToggleSidebarSubmenu();
        }
      });
    },
  };

  var _desktopResolution = {
    onRefresh: function () {
      var windowWidth = window.innerWidth;

      if (windowWidth > MediaSize.md) {
        categoryScroll.scrollCat();
        toggleFunction.sidebar(true);
        toggleFunction.onToggleSidebarSubmenu();
      }
    },

    onResize: function () {
      $(window).on("resize", function (event) {
        event.preventDefault();
        var windowWidth = window.innerWidth;
        if (windowWidth > MediaSize.md) {
          toggleFunction.onToggleSidebarSubmenu();
        }
      });
    },
  };

  function sidebarFunctionality() {
    function sidebarCloser() {
      if (window.innerWidth <= 991) {
        if (!$("body").hasClass("alt-menu")) {
          $("#container").addClass("sidebar-closed");
          $(".overlay").removeClass("show");
        } else {
          $(".navbar").removeClass("expand-header");
          $(".overlay").removeClass("show");
          $("#container").removeClass("sbar-open");
          $("html, body").removeClass("sidebar-noneoverflow");
        }
      } else if (window.innerWidth > 991) {
        // if (!$('body').hasClass('alt-menu')) {
        if (!$("body").hasClass("sticky")) {
          $("#container").removeClass("sidebar-closed");
          $(".navbar").removeClass("expand-header");
          $(".overlay").removeClass("show");
          $("#container").removeClass("sbar-open");
          $("html, body").removeClass("sidebar-noneoverflow");
        } else {
          $("html, body").addClass("sidebar-noneoverflow");
          $("#container").addClass("sidebar-closed");
          $(".navbar").addClass("expand-header");
          $(".overlay").addClass("show");
          $("#container").addClass("sbar-open");
          $('.sidebar-wrapper [aria-expanded="true"]')
            .parents("li.menu")
            .find(".collapse")
            .removeClass("show");
        }
      }
    }

    function sidebarMobCheck() {
      if (window.innerWidth <= 991) {
        if ($(".main-container").hasClass("sbar-open")) {
          return;
        } else {
          sidebarCloser();
        }
      } else if (window.innerWidth > 991) {
        sidebarCloser();
      }
    }

    sidebarCloser();

    $(window).resize(function (event) {
      sidebarMobCheck();
    });
  }

  return {
    init: function () {
      toggleFunction.overlay();
      toggleFunction.search();
      /*
                Desktop Resoltion fn
            */
      _desktopResolution.onRefresh();
      _desktopResolution.onResize();

      /*
                Mobile Resoltion fn
            */
      _mobileResolution.onRefresh();
      _mobileResolution.onResize();

      sidebarFunctionality();

      /*
                In Built Functionality fn
            */
      inBuiltfunctionality.mainCatActivateScroll();
      inBuiltfunctionality.preventScrollBody();
    },
  };
})();

$(document).on("click", ".GEm8N", function () {
  $(".Jg8As").focus();
});

$(document).on("keyup", ".Jg8As", function () {
  var filter,
    table,
    tr,
    td,
    i,
    txtValue,
    count = 0;
  filter = this.value.toUpperCase();
  table = document.querySelector(".OcVRK");
  tr = table.querySelectorAll("a");
  if (filter) {
    for (i = 0; i < tr.length; i++) {
      td = tr[i].querySelector(".UXZ01");
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          count = 1;
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }

  if (count == 1) {
    $(".OcVRK").removeClass("d-none");
    $(".M8MLc").removeClass("d-none");
  } else {
    $(".OcVRK").addClass("d-none");
    $(".M8MLc").addClass("d-none");
  }
});

$(document).on("click", ".M8MLc", function () {
  $(".Jg8As").val("");
  $(".OcVRK").addClass("d-none");
  $(".M8MLc").addClass("d-none");
});

function checkError(inputClass, errorClass) {
  var error = false;
  var i = 0;

  var inpVal = document.querySelectorAll(`.${inputClass}`);
  var errMes = document.querySelectorAll(`.${errorClass}`);

  inpVal.forEach((ele) => {
    if (!ele.value) {
      if (error == false) {
        ele.focus();
      }
      errMes[i].innerHTML = `Please ${ele.getAttribute("placeholder")}`;
      errMes[i].classList.remove("d-none");
      error = true;
    } else {
      errMes[i].classList.add("d-none");
    }
    i++;
  });

  if (error == false) {
    return 0;
  } else {
    return 1;
  }
}

function getUrlVars() {
  var vars = {};
  var parts = window.location.href.replace(
    /[?&]+([^=&]+)=([^&]*)/gi,
    function (m, key, value) {
      vars[key] = value;
    }
  );
  return vars;
}

function showLayer() {
  $.blockUI({
    message:
      '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>',
    fadeIn: 800,
    overlayCSS: {
      backgroundColor: "#191e3a",
      opacity: 0.8,
      zIndex: 1200,
      cursor: "wait",
    },
    css: {
      border: 0,
      color: "#25d5e4",
      zIndex: 1201,
      padding: 0,
      backgroundColor: "transparent",
    },
  });
}

function removeLayer() {
  $(".blockUI ").remove();
}

function showMesPopup(mes) {
  $(".blockui-growl-message").remove();
  $("body").append(`<div class="blockui-growl-message">
                        <i class="flaticon-double-check"></i>&nbsp; ${mes}
                    </div>`);

  $.blockUI({
    message: $(".blockui-growl-message"),
    fadeIn: 400,
    fadeOut: 400,
    timeout: 3000, //unblock after 3 seconds
    showOverlay: false,
    centerY: false,
    css: {
      width: "250px",
      backgroundColor: "transparent",
      top: "20px",
      left: "auto",
      right: "15px",
      border: 0,
      opacity: 0.95,
      zIndex: 1200,
    },
  });
}

/*****************************************************************************************************************
 * Multiple Delete
 *****************************************************************************************************************/

/**************************** Data Check Box ****************************/

$(document).on("change", ".T8TgF, .rX8CP", function () {
  setTimeout(function () {
    if ($(".rX8CP:checked").length > 0) {
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

function updateNumber() {
  var i = 1;
  $(".TGxlg").each(function () {
    this.innerHTML = i;
    i++;
  });
}

function removeDeleteBtn() {
  $(".BKGc1").removeClass("open");
  setTimeout(function () {
    $(".BKGc1").remove();
  }, 400);
}

function checkedData() {
  let tmp = [];
  $(".rX8CP").each(function () {
    if ($(this).is(":checked")) {
      tmp.push($(this).parents(".OZ6VQ").data("id"));
    }
  });
  return tmp;
}

function changeStatus(tar, table_name, table_id) {
  const id = $(tar).parents(".OZ6VQ").data("id");
  let status = $(tar).data("v");
  let btn, text;

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
    url: "ajax/common-ajax.php",
    data: {
      flag: "change_status",
      id: id,
      status: status,
      table_name: table_name,
      table_id: table_id,
    },
    success: function (res) {
      if (res == 1) {
        $(tar).parents("td").siblings(".LctVL").html(text);
        $(tar).parent("li").html(btn);
        showMesPopup("Status Change Successfully");
      } else if (res == 2) {
        alert("Something went wrong, please try again letter");
      }
    },
  });
}

function deleteSingleRow(tar, table_name, table_id) {
  let confirm_delete = confirm("Are you sure you want to delete this?");

  if (confirm_delete) {
    let id = [];
    id[0] = $(tar).parents("tr").data("id");

    $.ajax({
      type: "POST",
      url: "ajax/common-ajax.php",
      data: {
        flag: "delete_rows",
        id: id,
        table_name: table_name,
        table_id: table_id,
      },
      success: function (res) {
        if (res == 1) {
          $(tar).parents("tr").remove();
          showMesPopup("Delete Successfully");
          updateNumber();
        } else if (res == 2) {
          alert("Something went wrong, please try again letter");
        }
      },
    });
  }
}

function deleteRows(table_name, table_id) {
  let confirm_delete = confirm("Are you sure you want to delete selected?");

  if (confirm_delete) {
    let array = checkedData();

    if (array.length > 0) {
      $.ajax({
        type: "POST",
        url: "ajax/common-ajax.php",
        data: {
          flag: "delete_rows",
          id: array,
          table_name: table_name,
          table_id: table_id,
        },
        success: function (res) {
          if (res == 1) {
            $(".rX8CP").each(function () {
              if (array.includes($(this).parents(".OZ6VQ").data("id"))) {
                $(this).parents(".OZ6VQ").remove();
              }
            });
            $(".T8TgF").prop("checked", false);
            $(".rX8CP").prop("checked", false);
            showMesPopup("Data Delete Successfully");
            updateNumber();
            removeDeleteBtn();
          } else if (res == 2) {
            alert("Something went wrong, please try again letter");
          }
        },
      });
    }
  }
}

/****************************************************
 * Drag & Drop
 ****************************************************/

function changePosition(table, key) {
  if ($("#style-1").length > 0) {
    let drag;
    $(document).on("click", "#CpSNm", function () {
      if (!drag) {
        drag = true;

        $("#style-1 tr th:nth-child(1)").remove();
        $("#style-1 tr td:nth-child(1)").remove();

        $(".BKGc1").remove();
        $(".hsl38").append(`<div class="BKGc1">
                <div class="gaTiT">
                    <div class="d-none d-sm-block" style="color: #000;">Drag row from first column to change position</div>
                    <button id="pUX1L" class="btn btn-primary ml-auto" style="margin-right: 15px;">Stop</button>
                    <button id="gGuAn" class="btn btn-primary float-right">Save</button>
                </div>
            </div>`);
        setTimeout(function () {
          $(".BKGc1").addClass("open");
        }, 100);

        $("body").append(
          "<script src='assets/js/pages/drag.js' data-key='drag'></script>"
        );
      }
    });

    $(document).on("click", "#pUX1L", function () {
      location.reload();
    });

    $(document).on("click", "#gGuAn", function () {
      let arr = [],
        i = 0;
      $(".OZ6VQ").each(function () {
        i++;
        arr.push(this.getAttribute("data-id"));
      });

      $.ajax({
        type: "POST",
        url: "ajax/common-ajax.php",
        data: {
          flag: "change_position",
          arr,
          table: table,
          key: key,
        },
        success: function (res) {
          if (res == 1) {
            showMesPopup("Order Change Successfully");
            setTimeout(() => {
              location.reload();
            }, 2000);
          } else {
            alert("Something went wrong, please try again later");
          }
        },
      });
    });
  }
}

/*****************************************************************************************************************
 * Single OR Multiple Image Upload
 *****************************************************************************************************************/

function uploadImage(validType) {
  let path = [],
    tmp,
    i = 0,
    dataArray =
      image.cachedFileArray; /* image.cachedFileArray is variable of library */

  if (type == "single") {
    var target = ".custom-file-container__image-preview--active";
  } else {
    var target = ".custom-file-container__image-multi-preview";
  }

  $(target).each(function () {
    if (validType.includes(dataArray[i]["type"])) {
      tmp = this.style.backgroundImage;
      path.push(tmp.split('"')[1]);
    }
    i++;
  });
  return path;
}

/*****************************************************************************************************************
 * backspace for go back page
 *****************************************************************************************************************/

/* $(document).on('keyup', window, function(e) {
    if(e.keyCode == 8) {
        if(!$("input"). is(":focus") && !$("textarea"). is(":focus")) {
            history.back();
        }
    }
}) */

/*****************************************************************************************************************
 * Switch Mode
 *****************************************************************************************************************/

$(document).on("click", ".switchMode", function () {
  if (localStorage.getItem("Mode")) {
    if (localStorage.getItem("Mode") == "Dark") {
      localStorage.setItem("Mode", "Light");
    } else {
      localStorage.setItem("Mode", "Dark");
    }
  } else localStorage.setItem("Mode", "Dark");
  location.href = location.href;
});

/*****************************************************************************************************************
 * Window Load
 *****************************************************************************************************************/

const darkMode = `<style id="dark-mode">
            :root{
                --white:#fff;
                --off-white:#f1f2f3;
                --white2:#e0e6ed;
                --white3:#e7e7e7;
                --black1:#0e1726;
                --black2:#060818;
                --black3:#191e3a;
                --purple1:#1b2e4b;
                --gray1:#bfc9d4;
                --gray2:#515365;
                --gray3:#888ea8;
                --gray4:#acb0c3; 
            
                --focus-text:var(--white);
                --h-background:var(--black1);
                --h-container:var(--black2);
                --login:var(--gray1);
                --h-background:var(--black1);
                --background:var(--black1);
                --h-container:var(--black2);
                --h-icon:var(--white);
                --search-dropdown:var(--black3);
                --search-dropdown-text:var(--white2);
                --search-dropdown:var(--black3);
                --search-dropdown-hover:var(--black1);
                --search-text:var(--white);
                --appointment-background:var(--black2);
                --appointment-text:var(--white2);
                --appointment-checkbox:var(--gray2);
                --appointment-shadow: 0px 0px 14px #02030a, -5px -5px 14px #0a0d26;
                --subscribers-background:var(--black2);
                --card-background:var(--black1);
                --card-container:var(--black2);
                --card-text:var(--white); 
                --card-icon:var(--white); 
                --sidebar-background:var(--black1);
                --sidebar-container:var(--black2);
                --sidebar-text:var(--white);
                --dropdown-background:var(--black1);
                --dropdown-text:var(--white);
                --dropdown-hover:var(--black2);
                --profile-background:var(--black1);
                --profile-text:var(--white);
                --sidebar-selected-text:var(--gray1);
                --profile-lable:var(--gray1);
                --profile-hover:var(--black3);
                --profile-icon:var(--gray3);
                --side-container:var(--purple1);
                --profile-border: var(--purple1);
                --profile-disabled-backgrond: var(--purple1);
                --profile-disabled-text: var(--gray4);
                --role-result-background:var(--purple1);
                --role-result-text:var(--gray1);
                --about-us-text:var(--gray1);
                --focus-textbox:var(--purple1);
                --text: var(--gray1);
            }
        </style>`;

const lightMode = `<style id="light-mode">
            :root{
                --white:#fff;
                --off-white:#f1f2f3;
                --white2:#e0e6ed;
                --white3:#e7e7e7;
                --black1:#0e1726;
                --black2:#060818;
                --black3:#191e3a;
                --purple1:#1b2e4b;
                --purple2:#1b55e2;
                --gray1:#bfc9d4;
                --gray2:#515365;
                --gray3:#888ea8;
                --gray4:#acb0c3; 

                --focus-text:#0e1726;
                --search-dropdown:var(--white);
                --search-dropdown-hover:var(--off-white);
                --background:var(--white);
                --container:var(--off-white);
                --login-text:var(--black1);
                --h-background:var(--white);
                --h-container:var(--off-white);
                --h-icon:var(--black1);
                --search-dropdown:var(--white);
                --search-dropdown-text:var(--black1);
                --search-text:var(--black1);
                --appointment-background:var(--white);
                --appointment-text:var(--black1);
                --appointment-checkbox:var(--white);
                --appointment-shadow:0 6px 10px 0 rgb(0 0 0 / 14%), 0 1px 18px 0 rgb(0 0 0 / 12%), 0 3px 5px -1px rgb(0 0 0 / 20%);
                --subscribers-background:var(--white);
                --card-background:var(--white);
                --card-container:var(--off-white);
                --card-text:var(--black1);
                --card-icon:var(--black1);
                --sidebar-background:var(--white);
                --side-container:var(--off-white);
                --sidebar-text:var(--black1);
                --dropdown-background:var(--white);
                --dropdown-text:var(--black1);
                --dropdown-hover:var(--off-white);
                --profile-background:var(--white);
                --profile-text:var(--black1);
                --profile-lable:var(--black1);
                --sidebar-selected-text:var(--black1);
                --profile-hover:var(--off-white);
                --profile-icon:var(--black1);
                --profile-container:var(--off-white);
                --profile-border: var(--white3);
                --profile-disabled-text: var(--black1);
                --role-result-background:var(--white);
                --role-result-text:var(--black1);
                --about-us-text:var(--black1);
                --focus-textbox:var(--white);
                --text: var(--black1);
            }
        </style>`;

let modeTxt = "";
if (localStorage.getItem("Mode")) {
  if (localStorage.getItem("Mode") == "Light") {
    modeTxt = "Dark Mode";
    $(".main-loader").css({ background: "#FFF" });
    $("body").append(lightMode);
  } else {
    modeTxt = "Light Mode";
    $(".main-loader").css({ background: "#000" });
    $("body").append(darkMode);
  }
} else {
  modeTxt = "Dark Mode";
  $(".main-loader").css({ background: "#FFF" });
  $("body").append(lightMode);
}
$("#clm").html(modeTxt);

/*****************************************************************************************************************
 * Logout
 *****************************************************************************************************************/

$(document).on("click", "#logout", function () {
  swal({
    title: "Are you sure?",
    icon: "warning",
    dangerMode: true,
    buttons: ["Cancel", "Logout"],
    className: "success",
    closeOnClickOutside: false,
  });

  $(document).on("click", ".swal-button--confirm", function () {
    window.location.href = "logout";
  });
});

let activity = false;

$(document).ready(function () {
  $(".main-loader").addClass("d-none");
  $(window).keypress(function () {
    activity = true;
  });
  $(window).click(function () {
    activity = true;
  });
  $(window).scroll(function () {
    activity = true;
  });
  setInterval(() => {
    if (activity) {
      let d = new Date();
      localStorage.setItem("LastActive", d.getTime());
    }
    activity = false;
  }, 10000);

  setInterval(() => {
    let lastActive = localStorage.getItem("LastActive");
    let date = new Date();
    var diff = (new Date().getTime() - lastActive) / 1000;
    diff /= 60;
    let minDiff = Math.abs(Math.round(diff));
    let minutes = 60;
    if (minDiff >= minutes) {
      $.ajax({
        type: "POST",
        url: "ajax/signin.php",
        data: { flag: "logout" },
        success: function (res) {
          if (res == 1) {
            location.href = "login";
          }
        },
      });
    }
  }, 60000);

  // $('.table-responsive').mousewheel(function(e, delta) {
  //     this.scrollLeft -= (delta*50);
  //     e.preventDefault();
  // });
});

if ($(".table-responsive").length > 0) {
  const slider = document.querySelector(".table-responsive");
  let isDown = false;
  let startX;
  let scrollLeft;

  slider.addEventListener("mousedown", (e) => {
    isDown = true;
    slider.classList.add("active");
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
  });
  slider.addEventListener("mouseleave", () => {
    isDown = false;
    slider.classList.remove("active");
  });
  slider.addEventListener("mouseup", () => {
    isDown = false;
    slider.classList.remove("active");
  });
  slider.addEventListener("mousemove", (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 3; //scroll-fast
    slider.scrollLeft = scrollLeft - walk;
  });
}

function isNumber(evt) {
  evt = evt ? evt : window.event;
  var charCode = evt.which ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
  }
  return true;
}

let getQuillText = () => {
  const text = document.querySelector(".ql-editor");
  let images = [];
  let array = [];

  $(".ql-editor img").each(function () {
    let str = this.getAttribute("src");
    if (str.includes("data:image") || str.includes("base64")) {
      images.push(str);
      array.push(this);
    }
  });

  let res = $.ajax({
    type: "POST",
    url: "ajax/common-ajax.php",
    data: { flag: "save_image", images: images },
    async: false,
  });

  let data = jQuery.parseJSON(res.responseText);

  data.link.forEach((link, index) => {
    array[index].src = `${data.path}admin/images/upload/${link}`;
  });

  return text.innerHTML;
};

let login = localStorage.getItem("LoginTime");
let date = new Date();
var diff = (new Date().getTime() - login) / 1000;
diff /= 60;
let minDiff = Math.abs(Math.round(diff));

const { h, min } = convert(minDiff);

var seconds = 0;
var minutes = min;
var hours = h;

var displaySeconds = 0;
var displayMinutes = 0;
var displayHours = 0;

var interval = null;

function startTimer() {
  seconds++;

  if (seconds / 60 === 1) {
    seconds = 0;
    minutes++;

    if (minutes / 60 === 1) {
      minutes = 0;
      hours++;
    }
  }

  if (seconds < 10) {
    displaySeconds = "0" + seconds.toString();
  } else {
    displaySeconds = seconds;
  }

  if (minutes < 10) {
    displayMinutes = "0" + minutes.toString();
  } else {
    displayMinutes = minutes;
  }

  if (hours < 10) {
    displayHours = "0" + hours.toString();
  } else {
    displayHours = hours;
  }

  document.getElementById("dis").innerHTML =
    displayHours + ":" + displayMinutes + ":" + displaySeconds;
}
document.getElementById("dis") && window.setInterval(startTimer, 1000);

function convert(min) {
  let h = 0;
  while (min >= 60) {
    h++;
    min -= 60;
  }
  return { h, min };
}
