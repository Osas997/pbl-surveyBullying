
let btndownload = document.getElementById("btndownload");
let btnprint = document.getElementById("btnprint");
let downloadpage = document.getElementById("download-page");
let printdisplay = document.getElementById("print-display");

// let uniba_logo = document.getElementById("uniba-logo");
// let header_title = document.getElementById("header-title");
// let kemdigbud_logo = document.getElementById("kemdigbud-logo");
// let ristekdikti_logo = document.getElementById("ristekdikti-logo");

let unibaLogo = document.getElementById('uniba-logo');
let headerTitle = document.getElementById('header-title')
let kemdigbudLogo = document.getElementById('kemdigbud-logo')
let ristekdiktiLogo = document.getElementById('ristekdikti-logo')

function handlePrintChange(mql) {
    if (mql.matches) {
        // Kode yang dijalankan saat pencetakan dimulai
        unibaLogo.classList.remove('w-10', 'h-10', 'md:w-20', 'md:h-20');
        headerTitle.classList.remove('text-[8px]', 'md:text-base');
        kemdigbudLogo.classList.remove('w-10', 'h-10', 'md:w-20', 'md:h-20');
        ristekdiktiLogo.classList.remove('w-10', 'h-10', 'md:w-20', 'md:h-20');

        unibaLogo.classList.add('w-20', 'h-20');
        headerTitle.classList.add('text-base');
        kemdigbudLogo.classList.add('w-20', 'h-20');
        ristekdiktiLogo.classList.add('w-20', 'h-20');
        printdisplay.classList.add('hidden')
     
    } else {
        // Kode yang dijalankan setelah pencetakan selesai
        unibaLogo.classList.remove('w-20', 'h-20');
        headerTitle.classList.remove('text-base');
        kemdigbudLogo.classList.remove('w-20', 'h-20');
        ristekdiktiLogo.classList.remove('w-20', 'h-20');

        unibaLogo.classList.add('w-10', 'h-10', 'md:w-20', 'md:h-20');
        headerTitle.classList.add('text-[8px]', 'md:text-base');
        kemdigbudLogo.classList.add('w-10', 'h-10', 'md:w-20', 'md:h-20');
        ristekdiktiLogo.classList.add('w-10', 'h-10', 'md:w-20', 'md:h-20');
        printdisplay.classList.remove('hidden')
    }
}

// Mendengarkan perubahan media query untuk pencetakan
let mediaQueryList = window.matchMedia('print');


btnprint.addEventListener("click", () => {
    mediaQueryList.addListener(handlePrintChange);
    window.print()
});

btndownload.addEventListener("click", () => {
    unibaLogo.classList.remove("w-10", "h-10", "md:w-20", "md:h-20");
    unibaLogo.classList.add("w-20", "h-22");

    kemdigbudLogo.classList.remove("w-10", "h-10", "md:w-20", "md:h-20");
    kemdigbudLogo.classList.add("w-20", "h-20");

    ristekdiktiLogo.classList.remove("w-10", "h-10", "md:w-20", "md:h-20");
    ristekdiktiLogo.classList.add("w-20", "h-20");

    headerTitle.classList.remove("text-[8px]","md:text-base");
    headerTitle.classList.add("text-base");
    var opt = {
        margin: 1,
        filename: "Hasil Survey.pdf",
        image: { type: "jpeg", quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: "in", format: "letter", orientation: "portrait" },
    };
    html2pdf().from(downloadpage).set(opt).save();
    setTimeout(() => {
        unibaLogo.classList.add("w-10", "h-10", "md:w-20", "md:h-20");
        unibaLogo.classList.remove("w-20", "h-20");

        kemdigbudLogo.classList.add("w-10", "h-10", "md:w-20", "md:h-20");
        kemdigbudLogo.classList.remove("w-20", "h-20");

        ristekdiktiLogo.classList.add("w-10", "h-10", "md:w-20", "md:h-20");
        ristekdiktiLogo.classList.remove("w-20", "h-20");

        headerTitle.classList.add("text-[8px]","md:text-base");
        headerTitle.classList.remove("text-base");
    }, 100);
});
