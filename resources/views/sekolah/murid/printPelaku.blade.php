@extends('layout.pages')
@section('title','Hasil Survey Pelaku')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div>
        <h1 class="text-center font-semibold text-base mb-4">Hasil Inventory Potensi Menjadi Pelaku Bullying</h1>
        <div class="flex gap-10">
            <div class="left">
                <p>Nama</p>
                <p>NISN</p>
                <p>Kelas</p>
                <p>Jenis Kelamin</p>
                <p>Sekolah</p>
            </div>
            <div class="right">
                <p>: {{ $murid->murid->nama_murid }}</p>
                <p>: {{ $murid->murid->nisn }}</p>
                <p>: {{ $murid->murid->kelas }}</p>
                <p>: {{ $murid->murid->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</p>
                <p>: {{ $murid->murid->sekolah->nama_sekolah }}</p>
            </div>
        </div>
        <div class="flex gap-14 mt-4">
            <div class="nilai">
                <p class="font-medium text-base">Nilai Anda</p>
                <h2 class="text-center font-semibold text-4xl">{{ $murid->skor_total_pelaku }}</h2>
            </div>
            <div class="rentan">
                <h1>Rentang Nilai : </h1>
                <div class="flex gap-4">
                    <div class="left">
                        <p class="font-medium">Skor 14 - 23</p>
                        <p class="font-medium">Skor 24 - 34</p>
                        <p class="font-medium">Skor 35 - 45</p>
                        <p class="font-medium">Skor 46 - 56</p>
                    </div>
                    <div class="right">
                        <p class="font-medium text-green-400"> : Berpontesi Rendah</p>
                        <p class="font-medium text-yellow-400"> : Berpotensi Sedang</p>
                        <p class="font-medium text-red-800"> : Berpotensi Tinggi</p>
                        <p class="font-medium text-red-800"> : Berpotensi Sangat Tinggi</p>
                    </div>
                </div>
            </div>
        </div>


        <h1 class="mt-4">Interpretasi :</h1>
        <p class="text-base sm:text-1xl mb-1"> {{ $murid->murid->nama_murid }} memiliki
            kecenderungan menjadi pelaku bullying yang
            @if ($murid->skor_total_pelaku >= 46)
            <span class="text-red-500">Sangat Tinggi</span>. Hal ini dapat disebabkan oleh beberapa faktor,
            seperti lingkungan, pertemanan, atau pengalaman pribadi.
            @elseif ($murid->skor_total_pelaku >= 35 && $murid->skor_total_pelaku < 46) <span class="text-red-500">
                Tinggi</span>. Hal ini dapat disebabkan oleh beberapa faktor, seperti
                lingkungan, pertemanan, atau pengalaman pribadi.
                @elseif ($murid->skor_total_pelaku >= 24 && $murid->skor_total_pelaku < 35) <span
                    class="text-yellow-300-400">Sedang</span>. Hal ini dapat disebabkan oleh beberapa faktor,
                    seperti lingkungan, pertemanan, atau pengalaman pribadi.
                    @else
                    <span class="text-green-400">Rendah</span>. Hal ini dapat disebabkan oleh beberapa faktor,
                    seperti lingkungan, pertemanan, atau pengalaman pribadi.
                    @endif
        </p>

        <h1 class="mt-4">Rekomendasi : </h1>
        <p class="font-medium">Karena Anda termasuk dalam kategori potensi rendah, untuk lebih jelasnya silahkan
            temui dan konsultasi
            hal ini dengan konselor anda</p>

    </div>
    <script>
        window.print();
    </script>
    {{-- @else
    belum mengisi survey
    @endif --}}
    @endsection