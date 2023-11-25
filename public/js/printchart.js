// // Fungsi untuk menangani event setelah proses pencetakan selesai
// // console.log('test')
// let piechart = document.getElementById("pie-chart-grid");
// let btn_print = document.getElementById("btn-print");
// let columnchart = document.getElementById("print-column-chart");
// let piechartpelaku = document.getElementById("pie-chart-pelaku");
// let piechartkorban = document.getElementById("pie-chart-korban");
// let test = document.getElementById("test");
// btn_print.addEventListener("click", function () {
//     piechart.style.gridTemplateColumns = "1fr 1fr";
//     columnchart.classList.remove("w-full");
//     columnchart.style.width = "640px";
//     piechartkorban.style.width = "320px";
//     piechartpelaku.style.width = "320px";
//     btn_print.classList.add("hidden");
//     setTimeout(() => {
//         window.print();
//     }, 2000);
// });
// window.addEventListener("afterprint", function () {
//     this.window.location.reload();
// });


// Fungsi untuk menangani event setelah proses pencetakan selesai
let piechart = document.getElementById("pie-chart-grid");
let btn_print = document.getElementById("btn-print");
let columnchart = document.getElementById("print-column-chart");
let piechartpelaku = document.getElementById("pie-chart-pelaku");
let piechartkorban = document.getElementById("pie-chart-korban");
let test = document.getElementById("test");

// Fungsi untuk menangani perubahan ukuran saat pencetakan dimulai atau selesai
function handlePrintChange(mql) {
    if (mql.matches) {
        // Kode yang dijalankan saat pencetakan dimulai
        piechart.style.gridTemplateColumns = "1fr 1fr";
        columnchart.classList.remove("w-full");
        columnchart.style.width = "640px";
        piechartkorban.style.width = "320px";
        piechartpelaku.style.width = "320px";
        btn_print.classList.add("hidden");
    } else {
        // Kode yang dijalankan setelah pencetakan selesai
        piechart.style.gridTemplateColumns = "1fr";
        btn_print.classList.remove("hidden");
    }
}

// Membuat objek media query
let mediaQueryList = window.matchMedia('print');

// Menambahkan event listener untuk perubahan ukuran
mediaQueryList.addListener(handlePrintChange);

// Menangani event saat tombol cetak ditekan
btn_print.addEventListener("click", function () {
    columnchart.style.width = "640px";
    // Memanggil fungsi untuk menangani perubahan ukuran
    handlePrintChange(mediaQueryList);


    setTimeout(() => {
        window.print();
    }, 1000);
});

// Menangani event setelah proses pencetakan selesai
window.addEventListener("afterprint", function () {
    // Me-refresh halaman
    window.location.reload();
});
