let piechart = document.getElementById("pie-chart-grid");
let columnchart = document.getElementById("print-column-chart");
let btn_print = document.getElementById("btn-print");
let piechartpelaku = document.getElementById('pie-chart-pelaku');
let piechartkorban = document.getElementById('pie-chart-korban')
// Fungsi untuk menangani event setelah proses pencetakan selesai
function handleAfterPrint() {
    // Tambahkan kembali kelas yang dihapus sebelum pencetakan
    piechart.classList.add("md:grid-cols-2");
    piechart.classList.remove("grid-cols-2");

    piechartpelaku.classList.remove("w-[320px]")
    piechartkorban.classList.remove("w-[320px]")

    columnchart.classList.remove("w-[640px]");
    // Hapus kelas 'hidden' dari tombol cetak
    btn_print.classList.remove("hidden");

    // Hapus event listener afterprint agar tidak dijalankan secara berulang
    window.removeEventListener("afterprint", handleAfterPrint);
}

btn_print.addEventListener("click", function () {
    // Hapus kelas untuk tampilan cetak
    piechart.classList.remove("md:grid-cols-2");
    piechart.classList.add("grid-cols-2");
    // console.log(columnchart);
    columnchart.classList.add("w-[640px]");
    piechartpelaku.classList.add("w-[320px]")
    piechartkorban.classList.add("w-[320px]")
    // Sembunyikan tombol cetak
    btn_print.classList.add("hidden");

    // Tambahkan event listener untuk menangani event afterprint
    window.addEventListener("afterprint", handleAfterPrint);

    // Lakukan pencetakan
    setTimeout(() => {
        window.print();
    }, 1000);
});
