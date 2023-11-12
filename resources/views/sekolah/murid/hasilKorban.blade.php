@extends('layout.pages')
@section('title','Hasil Survey Korban')
@section('content')
<div class="w-full bg-[#0090D4] min-h-screen overflow-x-hidden scroll-smooth ">
    <div class="w-full  md:w-8/12 mx-auto px-10 mt-10">
        <div class="w-full bg-white mx-auto p-8 rounded shadow-md">
            @if ($murid)
            <div class="px-20">
                <div class="flex justify-between">

                    <a href="{{route('murid.hasilpelaku')}}">
                        <div
                            class="w-[120px] md:w-[240px] flex justify-center items-center py-4 mt-8 mb-14 rounded-lg text-black hover:underline">
                            <span>
                                Pelaku
                            </span>
                        </div>
                    </a>
                    <a href="{{route('murid.hasilkorban')}}">

                        <div
                            class="bg-blue-500 w-[120px] md:w-[240px]  flex justify-center items-center py-4 mt-8 mb-14 rounded-lg text-white hover:bg-[#0090D4] transition-colors duration-300 ease-in-out">
                            <span>
                                Korban
                            </span>
                        </div>
                    </a>

                </div>
            </div>

            {{-- <h1 class="font-semibold text-lg md:text-xl mb-6">Pelaku</h1> --}}
            <h1 class="text-center font-semibold text-base mb-4">Hasil Inventory Potensi Menjadi Korban Bullying</h1>
            <div class="flex gap-10">
                <div class="left">
                    <p>Nama</p>
                    <p>NISN</p>
                    <p>Kelas</p>
                    <p>Jenis Kelamin</p>
                    <p>Sekolah</p>
                </div>
                <div class="right">
                    <p class="uppercase">: {{ $murid->murid->nama_murid }}</p>
                    <p class="uppercase">: {{ $murid->murid->nisn }}</p>
                    <p class="uppercase">: {{ $murid->murid->kelas }}</p>
                    <p class="uppercase">: {{ $murid->murid->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</p>
                    <p class="uppercase">: {{ $murid->murid->sekolah->nama_sekolah }}</p>
                </div>
            </div>
            <div class="flex justify-center items-center flex-col gap-2 mt-4">
                <p class="text-center font-medium text-base">Nilai Anda</p>
                <h2 class="text-center font-semibold text-4xl">{{ $murid->skor_total_korban }}</h2>
            </div>
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

            <h1 class="mt-4">Interpretasi :</h1>
            <p class="text-base sm:text-1xl mb-1"> {{ $murid->murid->nama_murid }} memiliki
                kecenderungan menjadi Korban bullying yang
                @if ($murid->skor_total_korban >= 46)
                <span class="text-red-400">Sangat Tinggi</span>. Hal ini dapat disebabkan oleh beberapa faktor,
                seperti kepercayaan diri, kemampuan sosial, atau dukungan dari orang-orang terdekat.
                @elseif ($murid->skor_total_korban >= 35 && $murid->skor_total_korban < 46) <span
                    class="text-yellow-400">
                    Tinggi</span>. Hal ini dapat disebabkan oleh beberapa faktor, seperti
                    kepercayaan diri, kemampuan sosial, atau dukungan dari orang-orang terdekat.
                    @elseif ($murid->skor_total_korban >= 24 && $murid->skor_total_korban < 35) <span
                        class="text-teal-400">Sedang</span>. Hal ini dapat disebabkan oleh beberapa faktor,
                        seperti kepercayaan diri, kemampuan sosial, atau dukungan dari orang-orang terdekat.
                        @else
                        <span class="text-green-400">Rendah</span>. Hal ini dapat disebabkan oleh beberapa faktor,
                        seperti kepercayaan diri, kemampuan sosial, atau dukungan dari orang-orang terdekat.
                        @endif
            </p>
            <h1 class="mt-4">Rekomendasi : </h1>
            <p class="font-medium">Karena Anda termasuk dalam kategori potensi rendah, untuk lebih jelasnya
                silahkan
                temui dan konsultasi
                hal ini dengan konselor anda</p>
            {{-- print --}}
            <div class="flex justify-center items-center">
                <a href="{{route('murid.hasilkorban.print')}}">
                    <div
                        class="bg-blue-500 w-[60px] md:w-[180px]  flex justify-center items-center py-4 mt-8 mb-14 rounded-lg text-white hover:bg-[#0090D4] transition-colors duration-300 ease-in-out">
                        <span>
                            Print
                        </span>
                    </div>
                </a>
            </div>
            @else
            <h1 class="text-center text-2xl">Silahkan Mengisi Angket Terlebih Dahulu</h1>
            @endif
            {{-- link --}}
        </div>
    </div>

</div>
@endsection