@extends('layout.pages')
@section('title','Hasil Survey Korban')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-center items-center">
            <button onclick="printPage()" id="print" style="visibility: visible" class="underline">Print</button>
        </div>
        <div>
            <h1 class="text-center font-semibold text-base mb-4">Hasil Inventory Potensi Menjadi Korban Bullying</h1>
            <div class="flex gap-10">
                <div class="left">
                    <p>Nama</p>
                    <p>Kelas</p>
                    <p>Sekolah</p>
                    <p>Tanggal Lahir</p>
                </div>
                <div class="right">
                    <p>: Paijo</p>
                    <p>: XII B</p>
                    <p>: SMP 1 Banyuwangi</p>
                    <p>: 12 September 2005</p>
                </div>
            </div>
            <div class="flex gap-14 mt-4">
                <div class="nilai">
                    <p class="font-medium text-base">Nilai Anda</p>
                    <h2 class="font-semibold text-4xl">30</h2>
                </div>
                <div class="rentan">
                    <h1>Rentang Nilai : </h1>
                    <div class="flex gap-4">
                        <div class="left">
                            <p class="font-medium">Skor 30 - 74,5</p>
                            <p class="font-medium">Skor 75 - 120</p>
                        </div>
                        <div class="right">
                            <p class="font-medium text-green-400"> : Berpontesi Rendah</p>
                            {{-- jika nilai sedang --}}
                            {{-- <p class="font-medium text-amber-400"> : Berpontesi Sedang</p> --}}
                            {{-- jika nilai tinggi --}}
                            {{-- <p class="font-medium text-red-500"> : Berpontesi Tinggi</p> --}}
                            <p class="font-medium"> : Berpotensi Tinggi</p>
                        </div>
                    </div>
                </div>
            </div>
          

            <h1 class="mt-4">Interpretasi :</h1>
            <p class="font-medium">Anda Termasuk dalam kategory siswa yang berpotensi rendah menjadi pelaku bully <br>
                Sebagian tindakan anda mencerminkan pelaku bully, tetapi masih dalam taraf rendah</p>

            <h1 class="mt-4">Rekomendasi : </h1>
            <p class="font-medium">Karena Anda termasuk dalam kategori potensi rendah, untuk lebih jelasnya silahkan
                temui dan konsultasi
                hal ini dengan konselor anda</p>

        </div>
        <script>
            let buttonPrint = document.getElementById('print');
        let container = document.querySelector('.container');

        function printPage() {
            buttonPrint.style.visibility = "hidden";
            container.style.width = '100%';
            window.print();
            alert("Jangan menekan tombol OK sebelum dokumen selesai tercetak!");
            buttonPrint.style.visibility = "visible";
        }
        </script>
        {{-- @else
        belum mengisi survey
        @endif --}}
@endsection