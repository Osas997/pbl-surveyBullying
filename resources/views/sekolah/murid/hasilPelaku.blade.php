@extends('layout.pages')
@section('title','Hasil Survey Pelaku')
@section('content')

<div class="w-full bg-[#0090D4] min-h-screen overflow-x-hidden scroll-smooth ">
    <div class="w-full  md:w-8/12 mx-auto px-10 mt-10">
        <div class="w-full bg-white mx-auto p-8 rounded shadow-md">
            @if ($murid)
            <div class="px-20">
                <div class="flex justify-around">

                    <a href="{{route('murid.hasilpelaku')}}">
                        <div
                            class="bg-blue-500 w-[120px] md:w-[240px] flex justify-center items-center py-4 mt-8 mb-14 rounded-lg text-white hover:underline">
                            <span>
                                Pelaku
                            </span>
                        </div>
                    </a>
                    <a href="{{route('murid.hasilkorban')}}">

                        <div
                            class=" w-[120px] md:w-[240px]  flex justify-center items-center py-4 mt-8 mb-14 rounded-lg text-black hover:text-white hover:bg-blue-500 duration-300 ease-in-out">
                            <span>
                                Korban
                            </span>
                        </div>
                    </a>

                </div>
            </div>
            {{-- <h1 class="font-semibold text-lg md:text-xl mb-6">Pelaku</h1> --}}
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
                    <p class="uppercase">: {{ $murid->murid->nama_murid }}</p>
                    <p class="uppercase">: {{ $murid->murid->nisn }}</p>
                    <p class="uppercase">: {{ $murid->murid->kelas }}</p>
                    <p class="uppercase">: {{ $murid->murid->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</p>
                    <p class="uppercase">: {{ $murid->murid->sekolah->nama_sekolah }}</p>
                </div>
            </div>
            <div class="flex justify-center items-center flex-col gap-2 mt-4">
                <p class="text-center font-medium text-base">Nilai Anda</p>
                <h2 class="text-center font-semibold text-4xl">{{ $murid->skor_total_pelaku }}</h2>
            </div>
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
                    {{-- jika nilai sedang --}}
                    {{-- <p class="font-medium text-amber-400"> : Berpontesi Sedang</p> --}}
                    {{-- jika nilai tinggi --}}
                    {{-- <p class="font-medium text-red-500"> : Berpontesi Tinggi</p> --}}
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

            {{-- print --}}
            <div class="flex justify-center items-center">
                <a href="{{route('murid.hasilpelaku.print')}}" class="bg-blue-500 w-[60px] md:w-[180px]  flex justify-center items-center py-4 mt-8 mb-14 rounded-lg text-white hover:bg-[#0090D4] transition-colors duration-300 ease-in-out">
          
                        <span>
                            Print
                        </span>
                </a>
            </div>
            @else
            <h1 class="text-center text-2xl">Silahkan Mengisi Angket Terlebih Dahulu</h1>
            @endif
        </div>
    </div>

</div>
@endsection