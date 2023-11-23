let btndownload = document.getElementById("btndownload");
let btnprint = document.getElementById("btnprint");
let downloadpage = document.getElementById("download-page");
let printdisplay = document.getElementById("print-display");

let uniba_logo = document.getElementById("uniba-logo");
let header_title = document.getElementById("header-title");
let kemdigbud_logo = document.getElementById("kemdigbud-logo");
let ristekdikti_logo = document.getElementById("ristekdikti-logo");

btnprint.addEventListener("click", () => {
    printdisplay.classList.add("hidden");
    uniba_logo.classList.remove("w-10", "h-10", "md:w-20", "md:h-20");
    uniba_logo.classList.add("w-12", "h-12");

    kemdigbud_logo.classList.remove("w-10", "h-10", "md:w-20", "md:h-20");
    kemdigbud_logo.classList.add("w-12", "h-12");

    ristekdikti_logo.classList.remove("w-10", "h-10", "md:w-20", "md:h-20");
    ristekdikti_logo.classList.add("w-12", "h-12");

    header_title.classList.remove("text-[8px]");
    header_title.classList.add("text-md");

    window.print();
});
window.addEventListener("afterprint", () => {
    printdisplay.classList.remove("hidden");

    uniba_logo.classList.add("w-10", "h-10", "md:w-20", "md:h-20");
    uniba_logo.classList.remove("w-12", "h-12");

    kemdigbud_logo.classList.add("w-10", "h-10", "md:w-20", "md:h-20");
    kemdigbud_logo.classList.remove("w-12", "h-12");

    ristekdikti_logo.classList.add("w-10", "h-10", "md:w-20", "md:h-20");
    ristekdikti_logo.classList.remove("w-12", "h-12");

    header_title.classList.add("text-[8px]");
    header_title.classList.remove("text-md");
});
btndownload.addEventListener("click", () => {
    uniba_logo.classList.remove("w-10", "h-10", "md:w-20", "md:h-20");
    uniba_logo.classList.add("w-12", "h-12");

    kemdigbud_logo.classList.remove("w-10", "h-10", "md:w-20", "md:h-20");
    kemdigbud_logo.classList.add("w-12", "h-12");

    ristekdikti_logo.classList.remove("w-10", "h-10", "md:w-20", "md:h-20");
    ristekdikti_logo.classList.add("w-12", "h-12");

    header_title.classList.remove("text-[8px]");
    header_title.classList.add("text-md");
    var opt = {
        margin: 1,
        filename: "Hasil Survey.pdf",
        image: { type: "jpeg", quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: "in", format: "letter", orientation: "portrait" },
    };
    html2pdf().from(downloadpage).set(opt).save();
    setTimeout(() => {
        uniba_logo.classList.add("w-10", "h-10", "md:w-20", "md:h-20");
        uniba_logo.classList.remove("w-12", "h-12");

        kemdigbud_logo.classList.add("w-10", "h-10", "md:w-20", "md:h-20");
        kemdigbud_logo.classList.remove("w-12", "h-12");

        ristekdikti_logo.classList.add("w-10", "h-10", "md:w-20", "md:h-20");
        ristekdikti_logo.classList.remove("w-12", "h-12");

        header_title.classList.add("text-[8px]");
        header_title.classList.remove("text-md");
    }, 0.001);
});
