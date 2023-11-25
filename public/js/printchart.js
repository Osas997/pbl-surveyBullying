// Fungsi untuk menangani event setelah proses pencetakan selesai
console.log('test')
let piechart = document.getElementById("pie-chart-grid");
let btn_print = document.getElementById('btn-print');
let columnchart = document.getElementById("print-column-chart");
let piechartpelaku = document.getElementById('pie-chart-pelaku');
let piechartkorban = document.getElementById('pie-chart-korban');
let test = document.getElementById('test')
btn_print.addEventListener('click',function(){

    // piechart.classList.remove("md:grid-cols-2");
    // piechart.classList.add("grid-cols-2");
    // piechart.classList.replace("md:grid-cols-2","grid-cols-2")
    piechart.style.gridTemplateColumns = "1fr 1fr";
    // console.log(piechart)
    // console.log('add grid')
    // change dimensi chart
    // columnchart.classList.replace('w-full','w-[640px]')
    columnchart.classList.remove('w-full');
    columnchart.style.width= '640px';
    // columnchart.classList.add("w-[640px]");
    piechartkorban.style.width= '320px'
    piechartpelaku.style.width= '320px'
    btn_print.classList.add("hidden");
    setTimeout(() => {

        window.print()
    }, 1000);
    // piechartpelaku.classList.add("w-[320px]");
    // piechartkorban.classList.add("w-[320px]");

})
window.addEventListener('afterprint',function(){
    this.window.location.reload()
})
// function handlePrintChange(mql) {


// if (mql.matches) {
//     // Kode yang dijalankan saat pencetakan dimulai
//     // Flexing pie chart
    
//     piechart.classList.remove("md:grid-cols-2");
//     piechart.classList.add("grid-cols-2");
    
//     columnchart.classList.remove('w-full');
//     columnchart.style.width= '640px';
//     // columnchart.classList.add("w-[640px]");
//     piechartkorban.style.add= '320px'
//     piechartpelaku.style.add= '320px'
//     // change dimensi chart
//     // columnchart.classList.remove('w-full');
//     // columnchart.classList.add("w-[640px]");

//     // piechartpelaku.classList.add("w-[320px]");
//     // piechartkorban.classList.add("w-[320px]");

//     // Sembunyikan tombol cetak

// } else {
//     piechart.classList.add("md:grid-cols-2");
//     piechart.classList.remove("grid-cols-2");

//     piechartpelaku.classList.remove("w-[320px]");
//     piechartkorban.classList.remove("w-[320px]");

//     columnchart.classList.remove("w-[640px]");
//     columnchart.classList.add('w-full');

//     btn_print.classList.remove("hidden");
// }
// }

// // Mendengarkan perubahan media query
// let mediaQueryList = window.matchMedia('print');
// mediaQueryList.addListener(handlePrintChange);


// btn_print.addEventListener("click", function() {
//     columnchart.classList.remove('w-full');
//     columnchart.classList.add("w-[640px]");

//     // Hapus kelas untuk tampilan cetak
//     window.addEventListener('resize', function() {
//         if (!mediaQueryList.matches) {
//             // Panggil handlePrintChange saat ada perubahan ukuran
//             handlePrintChange(mediaQueryList);
//         }
//     });

//     setTimeout(() => {
//         window.print();
//     }, 1000);
// });

