var toolbarOptions = [
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    ['blockquote', 'code-block'],

    [{ 'header': 1 }, { 'header': 2 }],               // custom button values
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
    [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
    [{ 'direction': 'rtl' }],                         // text direction

    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    [{ 'font': [] }],
    [{ 'align': [] }],
    ['image'],
    ['link'],
    ['table'],
    ['clean']                                         // remove formatting button
];

var quill = new Quill('#editor-container', {
	modules: {
		'toolbar': toolbarOptions,
        table: true
	},

	placeholder: 'Write something...',
	theme: 'snow'  // or 'bubble'
});

$('.ql-editor').html($(".tmp-code").html());

$("body").append(`
    <div class="WoZKq">
        <button class="tb-btn" id="insert-row-above">Insert Row Above</button>
        <button class="tb-btn" id="insert-column-left">Insert Column Left</button>
        <button class="tb-btn" id="insert-row-below">Insert Row Below</button>
        <button class="tb-btn" id="insert-column-right">Insert Column Right</button>
        <button class="tb-btn" id="delete-row">Delete Row</button>
        <button class="tb-btn" id="delete-column">Delete Column</button>
        <button class="tb-btn ylggo" id="delete-table">Delete Table</button>
    </div>
`);

$("body").append(`
    <div class="Bo7Rq">
        <div class="kMVtN">
            <div class="AgLyV">
                <input type="radio" class="size-in" name="size-in" id="in-pixel" value="pixel" checked>
                <label for="in-pixel">Pixels</label>
            </div>
            <div class="AgLyV">
                <input type="radio" class="size-in" name="size-in" id="in-percentage" value="percentage">
                <label for="in-percentage">Percentage</label>
            </div>
        </div>
        <div class="kMVtN">
            <div class="fE3ew">
                <input type="checkbox" id="aspect-ratio" value="checked" Checked>
                <label for="aspect-ratio">Maintain aspect ratio</label>
            </div>
        </div>
        <div class="kMVtN justify-content-center">
            <div class="V00PT mr-2">
                <label for="ele-height">Height</label>
                <input type="text" id="ele-height">
            </div>
            <div class="V00PT">
                <label for="ele-width">Width</label>
                <input type="text" id="ele-width">
            </div>
        </div>
        <div class="kMVtN mt-2 mb-2">
            <button class="btn btn-danger m-auto" id="delete-image">Delete</button>
            <button class="btn btn-warning m-auto" id="cancel-size">Cancel</button>
            <button class="btn btn-primary m-auto" id="apply-size">Apply</button>
        </div>
    </div>
`);

const table = quill.getModule('table');

document.querySelector('#insert-row-above').addEventListener('click', function() {
    table.insertRowAbove();
});
document.querySelector('#insert-row-below').addEventListener('click', function() {
    table.insertRowBelow();
});
document.querySelector('#insert-column-left').addEventListener('click', function() {
    table.insertColumnLeft();
});
document.querySelector('#insert-column-right').addEventListener('click', function() {
    table.insertColumnRight();
});
document.querySelector('#delete-row').addEventListener('click', function() {
    table.deleteRow();
});
document.querySelector('#delete-column').addEventListener('click', function() {
    table.deleteColumn();
});
document.querySelector('#delete-table').addEventListener('click', function() {
    table.deleteTable();
    $(".WoZKq").removeClass("show");
});

let i = j = 0;
let t;
let arh;
let arw;
let arCode = [];
let aspectRatio = [];
const eleHeight = document.querySelector('#ele-height');
const eleWidth = document.querySelector('#ele-width');
const ratio = document.querySelector("#aspect-ratio");
const inPixel = document.querySelector("#in-pixel");
const inPercentage = document.querySelector("#in-percentage");

$(document).on('click', '.ql-editor img', function() {
    t = this;
    i = 1;
    eleHeight.value = this.offsetHeight;
    eleWidth.value = this.offsetWidth;
    $(".Bo7Rq").addClass("show");



    if(!arCode.includes(this.getAttribute("data-c"))) {
        let code = random(5);
        this.setAttribute("data-c", code);
        aspectRatio[code] = [];
        aspectRatio[code].push(eleHeight.value, eleWidth.value);
        arCode.push(code);
    }
})

$(document).on('click', '.ql-editor table', function() {
    j = 1;
    $(".WoZKq").addClass("show");
})

$(document).on('click', window, function(e) {
    let imgCon = $(".Bo7Rq");
    if (imgCon.has(e.target).length === 0 && i == 0) { sizeReset(); }
    else { i = 0; }

    let tableCon = $(".WoZKq");
    if (tableCon.has(e.target).length === 0 && j == 0) { $(".WoZKq").removeClass("show"); }
    else { j = 0; }
})

$(document).on('change', '.size-in', function() {
    if(this.value == 'pixel') {
        eleHeight.value = t.offsetHeight;
        eleWidth.value = t.offsetWidth;
    }
    else {
        eleHeight.value = 100;
        eleWidth.value = 100;
    }
})

$(document).on('keypress', '#ele-height, #ele-width', function(e) {
    return isNumber(e);
})

$(document).on('keyup', '#ele-height', function(e) {
    if(ratio.checked) {
        arh = aspectRatio[t.getAttribute('data-c')][0];
        arw = aspectRatio[t.getAttribute('data-c')][1];
        eleWidth.value = (arw * this.value) / arh;
    }
})

$(document).on('keyup', '#ele-width', function(e) {
    if(ratio.checked) {
        arh = aspectRatio[t.getAttribute('data-c')][0];
        arw = aspectRatio[t.getAttribute('data-c')][1];
        eleHeight.value = (arh * this.value) / arw;
    }
})

$(document).on('click', '#apply-size', function() {
    if(inPixel.checked) {
        t.style.height = `${eleHeight.value}px`;
        t.style.width = `${eleWidth.value}px`;
        sizeReset();
    }
    else {
        t.style.height = `${eleHeight.value}%`;
        t.style.width = `${eleWidth.value}%`;
        sizeReset();
    }
})

$(document).on('click', '#cancel-size', function() {
    sizeReset();
})

$(document).on('click', '#delete-image', function() {
    t.remove();
    sizeReset();
})

function sizeReset() {
    $(".Bo7Rq").removeClass("show");
    $('.size-in').prop('checked', false);
    $('#in-pixel').prop('checked', true);
    $('#aspect-ratio').prop('checked', true);
    eleHeight.value = 0;
    eleWidth.value = 0;
    t = '';
}

function random(length, current) {
    current = current ? current : '';
    return length ? random(--length, "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz".charAt(Math.floor(Math.random() * 60)) + current) : current;
}

function isNumber(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}