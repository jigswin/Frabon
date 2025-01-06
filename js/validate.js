let validate = (data) => {

    return new Promise((resolve, reject) => {

        let error = tmpError = false;
        let mes, tmp = 0;
        let inputEle = document.querySelectorAll(`.${data.input}`);
        let errorEle = document.querySelectorAll(`.${data.error}`);
        let colName = [], colValue = [];
        let optional = [];
        let files = [], finalFiles = [];
        let enterValues = ['text', 'longText', 'mobile', 'email'];
        let selectValues = ['select'];
        let uploadValues = ['file'];

        if (data.optional)
            optional = data.optional;

        if (data.files) {
            tmp = data.files.length;
            files = data.files;
            let flag;
            files.forEach(ele => {
                if (ele.length != 3) {
                    reject("Files array elements must have 3 elements");
                    flag = true;
                }
            })
            if (flag) { return false }
        }

        if (data.update && !data.check) {
            reject("`check` parameter not get");
            return false;
        }

        if ((data.insert || data.update) && !data.table) {
            reject("`table` parameter not get");
            return false;
        }

        loader.classList.remove('d-none');

        inputEle.forEach((ele, n) => {

            mes = '';

            if (!ele.value && optional.includes(ele.dataset.c) == false) {
                tmpError = true;
                if (enterValues.includes(ele.dataset.t)) {
                    mes = `Please enter ${ele.dataset.e}`;
                }
                else if (selectValues.includes(ele.dataset.t)) {
                    mes = `Please select ${ele.dataset.e}`;
                }
                else if (uploadValues.includes(ele.dataset.t)) {
                    mes = `Please upload ${ele.dataset.e}`;
                }
            }
            else if (ele.dataset.t == "text" && ele.value.length > 250) {
                tmpError = true;
                mes = `You can't write more than 250 characters in ${ele.dataset.e}`;
            }
            else if (ele.dataset.t == "email") {
                if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(ele.value) == false) {
                    tmpError = true;
                    mes = `Invalid E-mail`;
                }
            }
            else if (ele.dataset.t == "mobile" && ele.value.length != 10) {
                tmpError = true;
                mes = `Mobile number must contain 10 digits`;
            }
            else if (ele.dataset.t == "password" && ele.value.length < 5) {
                tmpError = true;
                mes = `Password must be at least 5 characters`;
            }
            else if (ele.dataset.t == "radio" && !$(`input[name=${ele.getAttribute('name')}]:checked`).val()) {
                tmpError = true;
                mes = `Please select ${ele.dataset.e}`;
            }

            if (tmpError) {
                ele.classList.add('wrong');
                errorEle[n].innerHTML = mes;
                errorEle[n].classList.remove('d-none');

                if (!error) {
                    error = true;
                    ele.focus();
                }
            }
            else {
                ele.classList.remove('wrong');
                errorEle[n].innerHTML = "";
                errorEle[n].classList.add('d-none');

                if (data.insert || data.update) {
                    if (ele.dataset.t == 'file') {
                        files.forEach(file => {
                            if (file[0] == ele.dataset.c) {
                                if (ele.files[0]) {
                                    let ext = ele.files[0].name.split('.').pop();
                                    if (file[1].includes(ext)) {
                                        let reader = new FileReader();
                                        reader.onloadend = function () {
                                            let code = `${random(10)}.${ext}`;
                                            finalFiles.push([file[2] + code, reader.result]);
                                            colName.push(ele.dataset.c);
                                            colValue.push(code);
                                            tmp--;
                                        }
                                        reader.readAsDataURL(ele.files[0]);
                                    }
                                    else {
                                        error = true;
                                        ele.focus();
                                        ele.classList.add('wrong');
                                        errorEle[n].innerHTML = "Invalid Document Extension";
                                        errorEle[n].classList.remove('d-none');
                                    }
                                }
                                else {
                                    tmp--;
                                    if (data.insert) {
                                        colName.push(ele.dataset.c);
                                        colValue.push("");
                                    }
                                }
                            }
                        });
                    }
                    else {
                        colName.push(ele.dataset.c);

                        if (ele.dataset.t == "radio") {
                            colValue.push($(`input[name=${ele.getAttribute('name')}]:checked`).val());
                        }
                        else {
                            colValue.push(ele.value);
                        }
                    }
                }
            }
            tmpError = false;
        })

        if (data.extraPmt) {
            data.extraPmt.forEach(val => {
                colName.push(val[0]);
                colValue.push(val[1]);
            })
        }

        if (!error) {
            if (data.insert || data.update) {
                let timer = setInterval(() => {
                    if (tmp == 0) {
                        clearTimeout(timer);
                        if (data.insert) {
                            let res = $.ajax({
                                type: "POST",
                                url: "validate.php",
                                data: { flag: "insert_data", name: colName, value: colValue, files: finalFiles, mail: data.mail, table: data.table },
                                async: false
                            })
                            loader.classList.add('d-none');
                            res = jQuery.parseJSON(res.responseText);
                            resolve(res);
                        }
                        else if (data.update) {
                            let res = $.ajax({
                                type: "POST",
                                url: "validate.php",
                                data: { flag: "update_data", name: colName, value: colValue, files: finalFiles, mail: data.mail, table: data.table, check: data.check },
                                async: false
                            })
                            loader.classList.add('d-none');
                            res = jQuery.parseJSON(res.responseText);
                            resolve(res);
                        }
                    }
                }, 1000);
            }
            else {
                loader.classList.add('d-none');
                resolve();
            }
        }
        else {
            loader.classList.add('d-none');
        }
    });
}

$(document).on('keypress', '.U97c2', function (e) {

    const t = this.getAttribute("data-t");

    switch (t) {
        case "text": case "email": {
            if (this.value.length >= 250)
                return false;
            return true;
        }
        case "mobile": {
            if (this.value.length >= 10) {
                return false;
            }
            else {
                return isNumber(e);
            }
        }
        case "number": {
            if (this.getAttribute("data-l")) {
                if (this.value.length >= this.getAttribute("data-l")) {
                    return false;
                }
            }
            return isNumber(e);
        }
        default:
            break;
    }
})

function isNumber(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function random(length, current) {
    current = current ? current : '';
    return length ? random(--length, "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz".charAt(Math.floor(Math.random() * 60)) + current) : current;
}
