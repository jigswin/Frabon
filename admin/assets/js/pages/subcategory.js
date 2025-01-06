
$(document).on('click', '#reset', function() {
    image1.clearButton.click();
    image2.clearButton.click();
    $('#general-info')[0].reset();
    $('.OT150').addClass('d-none');
})

/*****************************************************************************************************************
 * Add
*****************************************************************************************************************/
  
$(document).on('click', '#add', function() {

    let error = checkError('S5hPk','OT150');
    let valid = ["image/jpeg", "image/png"];

    let path = [], tmp1, tmp2, i1 = 0, i2 = 0, dataArray1 = image1.cachedFileArray, dataArray2 = image2.cachedFileArray;  /* image.cachedFileArray is variable of library */
    path[0] = []; path[1] = [];

    if(type == 'single') {
        var target1 = '#iFfxy';
    }
    else {
        var target1 = '#iFfxy .custom-file-container__image-multi-preview';
    }

    $(target1).each(function() {

        if(valid.includes(dataArray1[i1]['type'])) {

            tmp1 = this.style.backgroundImage;
            path[0].push(tmp1.split('"')[1]);
        }
        i1++;
    })

    if(type == 'single') {
        var target2 = '#yxfFi';
    }
    else {
        var target2 = '#yxfFi .custom-file-container__image-multi-preview';
    }

    $(target2).each(function() {

        if(valid.includes(dataArray2[i2]['type'])) {

            tmp2 = this.style.backgroundImage;
            path[1].push(tmp2.split('"')[1]);
        }
        i2++;
    })

    var name = $('#name').val();
    var cat_id = $('#cat_id').val();

    if(path[0].length == 0) {
        alert('Please select image');
        error = 1;
    }

    if(error == 0) {
        
        showLayer();
        $.ajax({
            type: 'POST',
            url: 'ajax/pages/subcategory.php',
            data: {flag:'subcategory_add', array1:path[0], array2:path[1], name:name, cat_id:cat_id},
            success: function(res){

                removeLayer();
                
                if(res == 1){
                    showMesPopup('Sub Category Add Successfully');
                    $('#reset').click();
                }
                else if(res == 2){
                    alert('Something went wrong, please try again letter');
                }
            }
        })
    }
})

/*****************************************************************************************************************
 * Edit
*****************************************************************************************************************/

$(document).on('click', '#update', function() {

    let error = checkError('S5hPk','OT150');
    let valid = ["image/jpeg", "image/png"];
    var name = $('#name').val();
    var cat_id = $('#cat_id').val();
    const scat_id = getUrlVars()["id"];

    let path = [], tmp1, tmp2, i1 = 0, i2 = 0, dataArray1 = image1.cachedFileArray, dataArray2 = image2.cachedFileArray;  /* image.cachedFileArray is variable of library */
    path[0] = []; path[1] = [];

    if(type == 'single') {
        var target1 = '#iFfxy';
    }
    else {
        var target1 = '#iFfxy .custom-file-container__image-multi-preview';
    }

    $(target1).each(function() {

        if(valid.includes(dataArray1[i1]['type'])) {

            tmp1 = this.style.backgroundImage;
            path[0].push(tmp1.split('"')[1]);
        }
        i1++;
    })

    if(type == 'single') {
        var target2 = '#yxfFi';
    }
    else {
        var target2 = '#yxfFi .custom-file-container__image-multi-preview';
    }

    $(target2).each(function() {

        if(valid.includes(dataArray2[i2]['type'])) {

            tmp2 = this.style.backgroundImage;
            path[1].push(tmp2.split('"')[1]);
        }
        i2++;
    })

    if(error == 0){
        showLayer();
        
        $.ajax({
            type: 'POST',
            url: 'ajax/pages/subcategory.php',
            data: {
                flag:'subcategory_edit', 
                array1:path[0], 
                array2:path[1],
                name:name,
                cat_id: cat_id,
                scat_id: scat_id
            },    
            success: function(res)
            {
                removeLayer();
                
                if(res == 1){
                    showMesPopup('Changes Save Successfully');
                    setTimeout(() => {
                        location.href = location.href;
                    }, 2000);
                }
                else if(res == 2){
                    alert('Something went wrong, please try again letter');
                }
            }
        })    
    }
})

/*****************************************************************************************************************
 * Delete
*****************************************************************************************************************/

$(document).on('click', '.delete-row', function() {
    
    deleteSingleRow(this, 'sub_category', 'id');
})

/*****************************************************************************************************************
 * Change Status
*****************************************************************************************************************/

$(document).on('click', '.ZyUtL', function() {
    
    changeStatus(this, 'sub_category', 'id');
})

/*****************************************************************************************************************
 * Multiple Delete
*****************************************************************************************************************/

$(document).on('click', '#B6KcU', function() {

    deleteRows('sub_category', 'id');
})
