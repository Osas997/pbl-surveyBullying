// Fungsi untuk menangani event setelah proses pencetakan selesai
// console.log('test')
let piechart = document.getElementById("pie-chart-grid");
let btn_print = document.getElementById("btn-print");
let columnchart = document.getElementById("print-column-chart");
let piechartpelaku = document.getElementById("pie-chart-pelaku");
let piechartkorban = document.getElementById("pie-chart-korban");
let test = document.getElementById("test");
btn_print.addEventListener("click", function () {
    piechart.style.gridTemplateColumns = "1fr 1fr";
    columnchart.classList.remove("w-full");
    columnchart.style.width = "640px";
    piechartkorban.style.width = "320px";
    piechartpelaku.style.width = "320px";
    btn_print.classList.add("hidden");
    setTimeout(() => {
        window.print();
    }, 2000);
});
window.addEventListener("afterprint", function () {
    this.window.location.reload();
});
