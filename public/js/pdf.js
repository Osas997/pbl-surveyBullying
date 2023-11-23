let btndownload = document.getElementById("btndownload");
let btnprint = document.getElementById("btnprint");
let downloadpage = document.getElementById("download-page");
let printdisplay = document.getElementById("print-display");
btnprint.addEventListener("click", () => {
    printdisplay.classList.add("hidden");
    window.print();
});
window.addEventListener("afterprint", () => {
    printdisplay.classList.remove("hidden");
});
btndownload.addEventListener("click", () => {
    var opt = {
        margin: 1,
        filename: "Hasil Survey.pdf",
        image: { type: "jpeg", quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: "in", format: "letter", orientation: "portrait" },
    };
    html2pdf().from(downloadpage).set(opt).save();
});
