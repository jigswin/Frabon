/*****************************************************************************************************************
 * Display
 *****************************************************************************************************************/

var myState = {
  pdf: null,
  currentPage: 1,
  zoom: 1,
};

$(document).on("click", ".view-file", function () {
  $("#VCpxo").remove();
  $("body").append(`<div id="VCpxo">
                    <div class="Z8IeH"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></div>
                    <div id="KIsKB">
                        <canvas id="GoLnR"></canvas>
                    </div>
                    <div id="aO3Vn">
                        <button id="go_previous" class="download-btn-brocr"">Previous</button>
                        <input id="current_page" value="1" type="number" hidden/>
                        <button id="go_next" class="download-btn-brocr"">Next</button>
                    </div>
                </div>`);

  var link = "admin/images/brochure/" + $(this).data("file");

  pdfjsLib.getDocument(link).then((pdf) => {
    myState.pdf = pdf;
    render();
  });

  document.getElementById("go_previous").addEventListener("click", (e) => {
    if (myState.pdf == null || myState.currentPage == 1) return;
    myState.currentPage -= 1;
    document.getElementById("current_page").value = myState.currentPage;
    render();
  });

  document.getElementById("go_next").addEventListener("click", (e) => {
    if (
      myState.pdf == null ||
      myState.currentPage > myState.pdf._pdfInfo.numPages
    )
      return;
    myState.currentPage += 1;
    document.getElementById("current_page").value = myState.currentPage;
    render();
  });
});

$(document).on("click", ".Z8IeH", function () {
  $("#VCpxo").remove();
});

function render() {
  myState.pdf.getPage(myState.currentPage).then((page) => {
    var canvas = document.getElementById("GoLnR");
    var ctx = canvas.getContext("2d");

    var viewport = page.getViewport(myState.zoom);

    canvas.width = viewport.width;
    canvas.height = viewport.height;

    page.render({
      canvasContext: ctx,
      viewport: viewport,
    });
  });
}
