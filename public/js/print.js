let unibaLogo = document.getElementById("logo-uniba");
let headerTitle = document.getElementById("header-title");
let kemdigbudLogo = document.getElementById("logo-kemdigbud");
let ristekdiktiLogo = document.getElementById("logo-ristekdikti");

function handlePrintChange(mql) {
    if (mql.matches) {
        // Kode yang dijalankan saat pencetakan dimulai
        unibaLogo.classList.remove("w-10", "h-10", "md:w-20", "md:h-20");
        headerTitle.classList.remove("text-[8px]", "md:text-base");
        kemdigbudLogo.classList.remove("w-10", "h-10", "md:w-20", "md:h-20");
        ristekdiktiLogo.classList.remove("w-10", "h-10", "md:w-20", "md:h-20");

        unibaLogo.classList.add("w-20", "h-20");
        headerTitle.classList.add("text-base");
        kemdigbudLogo.classList.add("w-20", "h-20");
        ristekdiktiLogo.classList.add("w-20", "h-20");
    } else {
        // Kode yang dijalankan setelah pencetakan selesai
        unibaLogo.classList.remove("w-20", "h-20");
        headerTitle.classList.remove("text-base");
        kemdigbudLogo.classList.remove("w-20", "h-20");
        ristekdiktiLogo.classList.remove("w-20", "h-20");

        unibaLogo.classList.add("w-10", "h-10", "md:w-20", "md:h-20");
        headerTitle.classList.add("text-[8px]", "md:text-base");
        kemdigbudLogo.classList.add("w-10", "h-10", "md:w-20", "md:h-20");
        ristekdiktiLogo.classList.add("w-10", "h-10", "md:w-20", "md:h-20");
    }
}

// Mendengarkan perubahan media query untuk pencetakan
let mediaQueryList = window.matchMedia("print");
mediaQueryList.addListener(handlePrintChange);
window.print();
