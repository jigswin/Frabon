/****************************************************
 * Drag & Drop
 ****************************************************/

changePosition("contact_us", "id");

/*****************************************************************************************************************
 * Add
 *****************************************************************************************************************/

$(document).on("click", "#add", function () {
    const address = document.querySelector("#address").value;
    const mobile = document.querySelector("#mobile").value;
    const email = document.querySelector("#email").value;
    const location = document.querySelector("#location").value;
    const map_link = document.querySelector("#map_link").value;
    
    if (address && mobile && email && location && map_link) {
        $.ajax({
            type: "POST",
            url: "ajax/pages/contact_us.php",
            data: { flag: "contact_add", address, mobile, email, location, map_link },
            success: function (res) {
                if (res == 1) {
                    showMesPopup("Contactus Added Successfully");
                    setTimeout(()=> {
                        location.href = 'contact_us-add';
                    }, 2000)
                } else if (res == 2) {
                    alert("Something went wrong, please try again later");
                }
            },
        });
    } else {
        alert("Please fill all feilds");
    }
});

/*****************************************************************************************************************
 * Edit
 *****************************************************************************************************************/

$(document).on("click", "#save", function () {
    const id = getUrlVars()["id"];
    const address = document.querySelector("#address").value;
    const mobile = document.querySelector("#mobile").value;
    const email = document.querySelector("#email").value;
    const location = document.querySelector("#location").value;
    const map_link = document.querySelector("#map_link").value;
    
    if (address && mobile && email && location && map_link) {
        $.ajax({
            type: "POST",
            url: "ajax/pages/contact_us.php",
            data: { flag: "contact_edit", address, mobile, email, location, map_link, id },
            success: function (res) {
                if (res == 1) {
                    showMesPopup("Changes Save Successfully");
                } else if (res == 2) {
                    alert("Something went wrong, please try again later");
                }
            },
        });
    } else {
        alert("Please fill all feilds");
    }
});

/*****************************************************************************************************************
 * Delete
 *****************************************************************************************************************/

$(document).on("click", ".delete-row", function () {
    deleteSingleRow(this, "contact_us", "id");
});

/*****************************************************************************************************************
 * Change Status
 *****************************************************************************************************************/

$(document).on("click", ".ZyUtL", function () {
    changeStatus(this, "contact_us", "id");
});

/*****************************************************************************************************************
 * Multiple Delete
 *****************************************************************************************************************/

$(document).on("click", "#B6KcU", function () {
    deleteRows("contact_us", "id");
});
