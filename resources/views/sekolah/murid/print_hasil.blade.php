@extends('layout.pages')
@section('title','Hasil Survey Korban')
@section('content')
<div class="container mx-auto px-4 py-8">
    @if ($murid)
    <div class="flex justify-center items-center gap-2 mb-8" id="print-display">
        <div class="justify-center items-center gap-1 cursor-pointer bg-blue-200 px-3 py-1 rounded-xl hover:bg-blue-300 duration-300 hidden md:flex"
            id="btnprint">
            <div class="w-8 h-8">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M7 17H5C3.89543 17 3 16.1046 3 15V11C3 9.34315 4.34315 8 6 8H7M7 17V14H17V17M7 17V18C7 19.1046 7.89543 20 9 20H15C16.1046 20 17 19.1046 17 18V17M17 17H19C20.1046 17 21 16.1046 21 15V11C21 9.34315 19.6569 8 18 8H17M7 8V6C7 4.89543 7.89543 4 9 4H15C16.1046 4 17 4.89543 17 6V8M7 8H17M15 11H17"
                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>
            </div>
            <h1>Print</h1>
        </div>
        <div class="flex justify-center items-center gap-1 cursor-pointer bg-blue-200 px-3 py-1 rounded-xl hover:bg-blue-300 duration-300"
            id="btndownload">
            <div class="w-8 h-8">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M17 17H17.01M17.4 14H18C18.9319 14 19.3978 14 19.7654 14.1522C20.2554 14.3552 20.6448 14.7446 20.8478 15.2346C21 15.6022 21 16.0681 21 17C21 17.9319 21 18.3978 20.8478 18.7654C20.6448 19.2554 20.2554 19.6448 19.7654 19.8478C19.3978 20 18.9319 20 18 20H6C5.06812 20 4.60218 20 4.23463 19.8478C3.74458 19.6448 3.35523 19.2554 3.15224 18.7654C3 18.3978 3 17.9319 3 17C3 16.0681 3 15.6022 3.15224 15.2346C3.35523 14.7446 3.74458 14.3552 4.23463 14.1522C4.60218 14 5.06812 14 6 14H6.6M12 15V4M12 15L9 12M12 15L15 12"
                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>
            </div>
            <h1>Download</h1>
        </div>
    </div>
    <div id="download-page">
        {{-- header logo --}}
        <div class="grid grid-cols-4 justify-center items-center mb-10">
            <div class="w-full flex justify-center items-center">
                <img src="{{asset('assets/img/uniba.png')}}" id="uniba-logo" alt="" srcset=""
                    class="w-10 h-10 md:w-20 md:h-20 ">
            </div>
            {{-- ! ketika di download atau di print maka menggunakan text mobile --}}
            <h1 class="text-[8px] md:text-base text-center col-span-2" id="header-title">PENELITIAN DOSEN PEMULA,
                KEMENTRIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI BIMBINGAN DAN KONSELING</h1>
            <div class="w-full flex justify-center items-center">
                <img src="{{asset('assets/img/kemdigbud.png')}}" alt="" id="kemdigbud-logo" srcset=""
                    class="w-10 h-10 md:w-20 md:h-20">
                <img src="{{asset('assets/img/ristekdikti.png')}}" alt="" id="ristekdikti-logo" srcset=""
                    class="w-10 h-10 md:w-20 md:h-20 ">
            </div>
        </div>

        <h1 class="text-center font-semibold text-base mb-4">Hasil Instrumen Assesment Bullying</h1>
        <div class="flex flex-col gap-1">
            <div class="flex justify-center items-start w-full">
                <p class="text-xs sm:text-base w-1/3">Nama</p>
                <p class="uppercase text-xs sm:text-base w-2/3">: {{ $murid->murid->nama_murid }}</p>
            </div>
            <div class="flex justify-center items-start w-full">
                <p class="text-xs sm:text-base w-1/3">NISN</p>
                <p class="uppercase text-xs sm:text-base w-2/3">: {{ $murid->murid->nisn }}</p>
            </div>
            <div class="flex justify-center items-start w-full">
                <p class="text-xs sm:text-base w-1/3">Kelas</p>
                <p class="uppercase text-xs sm:text-base w-2/3">: {{ $murid->murid->kelas }}</p>
            </div>
            <div class="flex justify-center items-start w-full">
                <p class="text-xs sm:text-base w-1/3 whitespace-nowrap">Jenis Kelamin</p>
                <p class="uppercase text-xs sm:text-base w-2/3">: {{ $murid->murid->jenis_kelamin == 'L' ? 'Laki-Laki' :
                    'Perempuan' }}</p>
            </div>
            <div class="flex justify-center items-start w-full">
                <p class="text-xs sm:text-base w-1/3">Sekolah</p>
                <p class="uppercase text-xs sm:text-base w-2/3">: {{ $murid->murid->sekolah->nama_sekolah}}</p>
            </div>

        </div>
        <p class="text-sm md:text-base font-semibold mt-4">Kecenderungan menjadi Korban Bullying</p>
        <div class="flex gap-8 md:gap-14 ">
            <div class="nilai">
                <p class="text-sm font-medium md:text-base">Nilai Anda</p>
                <h2 class="text-center font-semibold text-2xl">
                    @if ($murid->skor_total_korban >= 46)
                    <span class="text-red-500">
                        {{ $murid->skor_total_korban }}
                    </span>
                    @elseif ($murid->skor_total_korban >= 35 && $murid->skor_total_korban < 46) <span
                        class="text-red-500">
                        {{ $murid->skor_total_korban }}
                        </span>
                        @elseif ($murid->skor_total_korban >= 24 && $murid->skor_total_korban < 35) <span
                            class="text-yellow-400">
                            {{ $murid->skor_total_korban }}
                            </span>
                            @else
                            <span class="text-green-400">
                                {{ $murid->skor_total_korban }}
                            </span>
                            @endif
                </h2>
            </div>
            <div class="rentan">
                <h1>Rentang Nilai : </h1>
                <div class="flex  md:gap-4">
                    <div class="left">
                        <p class="text-sm whitespace-nowrap">Skor 14 - 23</p>
                        <p class="text-sm  whitespace-nowrap">Skor 24 - 34</p>
                        <p class="text-sm  whitespace-nowrap">Skor 35 - 45</p>
                        <p class="text-sm  whitespace-nowrap">Skor 46 - 56</p>
                    </div>
                    <div class="right">
                        <p class="text-sm text-green-400"> : Berpontesi Rendah</p>
                        <p class="text-sm text-yellow-400"> : Berpotensi Sedang</p>
                        <p class="text-sm text-red-800"> : Berpotensi Tinggi</p>
                        <p class="text-sm text-red-800"> : Berpotensi Sangat Tinggi</p>
                    </div>
                </div>
            </div>
        </div>

        <p class="text-sm md:text-base font-semibold mt-4">Kecenderungan menjadi Pelaku Bullying</p>
        <div class="flex gap-8 md:gap-14">
            <div class="nilai">
                <p class="text-sm  whitespace-nowrap font-medium md:text-base">Nilai Anda</p>
                <h2 class="text-center font-semibold text-2xl">
                    @if ($murid->skor_total_pelaku >= 46)
                    <span class="text-red-500">
                        {{ $murid->skor_total_pelaku }}
                    </span>
                    @elseif ($murid->skor_total_pelaku >= 35 && $murid->skor_total_pelaku < 46) <span
                        class="text-red-500">
                        {{ $murid->skor_total_pelaku }}
                        </span>
                        @elseif ($murid->skor_total_pelaku >= 24 && $murid->skor_total_pelaku < 35) <span
                            class="text-yellow-400">
                            {{ $murid->skor_total_pelaku }}
                            </span>
                            @else
                            <span class="text-green-400">
                                {{ $murid->skor_total_pelaku }}
                            </span>
                            @endif
                </h2>
            </div>
            <div class="rentan">
                <h1>Rentang Nilai : </h1>
                <div class="flex ">
                    <div class="left">
                        <p class="text-sm whitespace-nowrap">Skor 14 - 23</p>
                        <p class="text-sm  whitespace-nowrap">Skor 24 - 34</p>
                        <p class="text-sm  whitespace-nowrap">Skor 35 - 45</p>
                        <p class="text-sm  whitespace-nowrap">Skor 46 - 56</p>
                    </div>
                    <div class="right">
                        <p class="text-sm text-green-400"> : Berpontesi Rendah</p>
                        <p class="text-sm text-yellow-400"> : Berpotensi Sedang</p>
                        <p class="text-sm text-red-800"> : Berpotensi Tinggi</p>
                        <p class="text-sm text-red-800"> : Berpotensi Sangat Tinggi</p>
                    </div>
                </div>
            </div>
        </div>

        <h1 class="mt-4 text-sm">Interpretasi :</h1>
        <p class="text-sm sm:text-1xl mb-1"> {{ $murid->murid->nama_murid }} memiliki
            kecenderungan menjadi Korban bullying yang
            @if ($murid->skor_total_korban >= 35)
            <span class="text-red-500">Tinggi</span> Anda termasuk dalam kategori orang yang berpotensi
            tinggi menjadi korban Bullying. Anda cenderung mengalami tindakan-tindakan yang mengarah pada
            perilaku kekerasan dan membuat anda tersiksa.
            @elseif ($murid->skor_total_korban >= 24 && $murid->skor_total_korban < 35) <span class="text-yellow-400">
                Sedang</span> Anda termasuk dalam kategori orang yang
                berpotensi sedang menjadi korban Bullying. Anda cenderung mengalami tindakan-tindakan yang
                mengarah pada perilaku kekerasan dan membuat anda tersiksa
                @else
                <span class="text-green-400">Rendah</span> Anda termasuk dalam kategori orang yang berpotensi
                Rendah menjadi korban Bullying. Anda terkadang mengalami tindakan-tindakan yang membuat anda
                tersakiti.
                @endif
        </p>
        <p class="text-sm sm:text-1xl mb-1">
            Dan
            @if ($murid->skor_total_pelaku >= 35)
            Anda berpotensi <span class="text-red-600">Tinggi</span> menjadi pelaku
            bullying. Anda cenderung untuk melakukan Tindakan-tindakan yang mengarah pada perilaku kekerasan
            sehingga membuat korban anda merasa tersakiti dan tersiksa
            @elseif ($murid->skor_total_pelaku >= 24 && $murid->skor_total_pelaku < 35) Anda berpotensi <span
                class="text-yellow-400">Sedang</span> menjadi pelaku
                bullying. Sebagian Tindakan anda mencerminkan perilaku bullying yang dapat membuat korban anda
                merasa tersakiti.
                @else
                anda berpotensi <span class="text-green-400">Rendah</span> menjadi pelaku bullying.
                Sebagian Tindakan anda mencerminkan perilaku bullying tetapi masih dalam taraf rendah
                @endif
        </p>

        <h1 class="mt-4 text-sm">Rekomendasi : </h1>
        <p class="text-sm">
            @if ($murid->skor_total_korban >= 35)
            Karena anda termasuk dalam kategori berpotensi <span class="text-red-500">Tinggi</span> menjadi
            Korban bullying, sebaiknya anda segera temui konselor anda dan mengkonsultasikan hal ini kepada
            konselor
            @elseif ($murid->skor_total_korban >= 24 && $murid->skor_total_korban < 35) Karena anda termasuk dalam
                kategori berpotensi <span class="text-yellow-400">Sedang</span>
                menjadi Korban bullying, anda dapat menemui konselor anda dan mengkonsultasikan hal ini kepada
                konselor
                @else
                Karena anda termasuk dalam kategori berpotensi <span class="text-green-400">Rendah</span> menjadi Korban
                bullying, untuk
                lebih jelasnya silahkan menemui dan konsultasikan hal ini dengan konselor anda.
                @endif
        </p>
        <p class="text-sm">Dan</p>
        <p class="text-sm">
            @if ($murid->skor_total_pelaku >= 35)
            Karena anda termasuk dalam kategori berpotensi <span class="text-red-500">Tinggi</span> menjadi
            Pelaku bullying, sebaiknya anda segera temui konselor anda dan mengkonsultasikan hal ini kepada
            konselor
            @elseif ($murid->skor_total_pelaku >= 24 && $murid->skor_total_pelaku < 35) Karena anda termasuk dalam
                kategori berpotensi <span class="text-yellow-400">Sedang</span>
                menjadi Pelaku bullying, anda dapat menemui konselor anda dan mengkonsultasikan hal ini kepada
                konselor
                @else
                Karena anda termasuk dalam kategori berpotensi <span class="text-green-400">Rendah</span> menjadi
                Pelaku bullying, untuk
                lebih jelasnya silahkan menemui dan konsultasikan hal ini dengan konselor anda.
                @endif
        </p>
        @else
        <h1 class="text-center text-2xl">Silahkan Mengisi Angket Terlebih Dahulu</h1>
        @endif
    </div>
</div>
@if ($murid)
<script src="{{ asset('js/pdf.js') }}"></script>
@endif
@endsection