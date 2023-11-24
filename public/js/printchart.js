let piechart = document.getElementById("pie-chart-grid");
let columnchart = document.getElementById("print-column-chart");
let btn_print = document.getElementById("btn-print");
let piechartpelaku = document.getElementById('pie-chart-pelaku');
let piechartkorban = document.getElementById('pie-chart-korban');


// Fungsi untuk menangani event setelah proses pencetakan selesai
function handlePrintChange(mql) {
    if (mql.matches) {
        // Kode yang dijalankan saat pencetakan dimulai
        // Flexing pie chart

        piechart.classList.remove("md:grid-cols-2");
        piechart.classList.add("grid-cols-2");

        // change dimensi chart
        columnchart.classList.remove('w-full')
          columnchart.classList.add("w-[640px]");

        piechartpelaku.classList.add("w-[320px]");
        piechartkorban.classList.add("w-[320px]");

        console.log(piechart);
        console.log(columnchart);
        console.log(btn_print);
        console.log(piechartkorban);
        console.log(piechartpelaku);

        // Sembunyikan tombol cetak
        btn_print.classList.add("hidden");
    } else {
        piechart.classList.add("md:grid-cols-2");
        piechart.classList.remove("grid-cols-2");

        piechartpelaku.classList.remove("w-[320px]");
        piechartkorban.classList.remove("w-[320px]");

        columnchart.classList.remove("w-[640px]");
        columnchart.classList.add('w-full')

        btn_print.classList.remove("hidden");
    }
}

// Mendengarkan perubahan media query
let mediaQueryList = window.matchMedia('print');
mediaQueryList.addListener(handlePrintChange);

btn_print.addEventListener("click", function() {
    columnchart.classList.remove('w-full')
    columnchart.classList.add("w-[640px]");
    // Hapus kelas untuk tampilan cetak
    window.addEventListener('resize', function() {
        if (!mediaQueryList.matches) {
            // Panggil handlePrintChange saat ada perubahan ukuran
            handlePrintChange(mediaQueryList);
        }
    });
    setTimeout(() => {
        window.print();

    }, 1000);
});