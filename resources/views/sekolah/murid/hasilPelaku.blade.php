@extends('layout.pages')
@section('title', 'Hasil Survey Pelaku')
@section('content')

<div class="w-full bg-[#0090D4] min-h-screen overflow-x-hidden scroll-smooth ">
    <div class="w-full  md:w-8/12 mx-auto px-10 mt-10">
        <div class="w-full bg-white mx-auto p-8 rounded shadow-md">

            <a href="{{ route('murid.welcome') }}">
                <div class="flex justify-start items-center gap-1">
                    <div class="w-7 h-7">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M16.1795 3.26875C15.7889 2.87823 15.1558 2.87823 14.7652 3.26875L8.12078 9.91322C6.94952 11.0845 6.94916 12.9833 8.11996 14.155L14.6903 20.7304C15.0808 21.121 15.714 21.121 16.1045 20.7304C16.495 20.3399 16.495 19.7067 16.1045 19.3162L9.53246 12.7442C9.14194 12.3536 9.14194 11.7205 9.53246 11.33L16.1795 4.68297C16.57 4.29244 16.57 3.65928 16.1795 3.26875Z"
                                    fill="#0F0F0F"></path>
                            </g>
                        </svg>
                    </div>
                    <span class="font-semibold">Back</span>
                </div>
            </a>
            @if ($murid)
            <div class="mt-10 mb-12">
                <div class="flex justify-center items-center flex-col md:flex-row gap-4">

                    <a href="{{ route('murid.hasilpelaku') }}"
                        class="bg-blue-500 w-full md:w-[240px] flex justify-center items-center py-4  rounded-lg text-white hover:bg-[#0090D4]">
                        Pelaku
                    </a>
                    <a href="{{ route('murid.hasilkorban') }}"
                        class=" w-full md:w-[240px]  flex justify-center items-center py-4  rounded-lg text-black hover:text-white hover:bg-blue-500 duration-300 ease-in-out">
                        Korban
                    </a>

                </div>
            </div>
            {{-- header logo --}}
            <div class="grid grid-cols-4 justify-center items-center mb-10">
                <div class="w-full flex justify-center items-center">
                    <img src="{{asset('assets/img/uniba.png')}}" alt="" srcset=""
                        class="w-8 h-8 md:w-10 md:h-10 lg:w-20 lg:h-20">
                </div>
                <h1 class="text-[8px]  md:text-xs lg:text-base text-center col-span-2">PENELITIAN DOSEN PEMULA,
                    KEMENTRIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI BIMBINGAN DAN KONSELING</h1>
                <div class="w-full flex justify-center items-center">
                    <img src="{{asset('assets/img/kemdigbud.png')}}" alt="" srcset=""
                        class="w-8 h-8 md:w-10 md:h-10 lg:w-20 lg:h-20">
                    <img src="{{asset('assets/img/ristekdikti.png')}}" alt="" srcset=""
                        class="w-8 h-8 md:w-10 md:h-10 lg:w-20 lg:h-20">
                </div>
            </div>
            {{-- <h1 class="font-semibold text-lg md:text-xl mb-6">Pelaku</h1> --}}
            <h1 class="text-center font-semibold text-base mb-4">Hasil Inventory Potensi Menjadi Pelaku Bullying
            </h1>
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
                    <p class="uppercase text-xs sm:text-base w-2/3">: {{ $murid->murid->jenis_kelamin == 'L' ?
                        'Laki-Laki' : 'Perempuan' }}</p>
                </div>
                <div class="flex justify-center items-start w-full">
                    <p class="text-xs sm:text-base w-1/3">Sekolah</p>
                    <p class="uppercase text-xs sm:text-base w-2/3">: {{ $murid->murid->sekolah->nama_sekolah}}</p>
                </div>

            </div>

            <div class="flex justify-center items-center flex-col gap-2 mt-4">
                <p class="text-center font-medium text-sm md:text-base">Nilai Anda</p>
                <h2 class="text-center font-semibold text-3xl md:text-4xl">
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
            <h1 class="text-sm">Rentang Nilai : </h1>
            <div class="flex gap-1 flex-col">
                <div class="flex justify-center items-start w-full ">
                    <p class="font-medium text-xs sm:text-base whitespace-nowrap w-1/3">Skor 14 - 23</p>
                    <p class="font-medium text-xs sm:text-base  text-green-400 w-2/3"> : Berpontesi Rendah</p>
                </div>
                <div class="flex justify-center items-start w-full ">
                    <p class="font-medium text-xs sm:text-base whitespace-nowrap w-1/3">Skor 24 - 34</p>
                    <p class="font-medium text-xs sm:text-base  text-yellow-400 w-2/3"> : Berpotensi Sedang</p>
                </div>
                <div class="flex justify-center items-start w-full ">
                    <p class="font-medium text-xs sm:text-base whitespace-nowrap w-1/3">Skor 35 - 45</p>
                    <p class="font-medium text-xs sm:text-base  text-red-400 w-2/3"> : Berpotensi Tinggi</p>
                </div>
                <div class="flex justify-center items-start w-full ">
                    <p class="font-medium text-xs sm:text-base whitespace-nowrap w-1/3">Skor 46 - 56</p>
                    <p class="font-medium text-xs sm:text-base  text-red-400 w-2/3"> : Berpotensi Sangat Tinggi</p>
                </div>
        </div>

            <h1 class="mt-4">Interpretasi :</h1>
            <p class="text-sm sm:text-base mb-1"> {{ $murid->murid->nama_murid }} memiliki
                kecenderungan menjadi pelaku bullying yang
                @if ($murid->skor_total_pelaku >= 35)
                <span class="text-red-500">Tinggi</span> Dan anda berpotensi tinggi menjadi pelaku
                bullying. Anda cenderung untuk melakukan Tindakan-tindakan yang mengarah pada perilaku kekerasan
                sehingga membuat korban anda merasa tersakiti dan tersiksa
                @elseif ($murid->skor_total_pelaku >= 24 && $murid->skor_total_pelaku < 35) <span
                    class="text-yellow-400">Sedang</span> Dan anda berpotensi sedang menjadi pelaku
                    bullying. Sebagian Tindakan anda mencerminkan perilaku bullying yang dapat membuat korban anda
                    merasa tersakiti.
                    @else
                    <span class="text-green-400">Rendah</span> Dan anda berpotensi rendah menjadi pelaku bullying.
                    Sebagian Tindakan anda mencerminkan perilaku bullying tetapi masih dalam taraf rendah
                    @endif
            </p>

            <h1 class="mt-4">Rekomendasi : </h1>
            <p class="text-sm sm:text-base">
                @if ($murid->skor_total_pelaku >= 35)
                Karena anda termasuk dalam kategori berpotensi <span class="text-red-500">Tinggi</span> menjadi
                Pelaku bullying, sebaiknya anda segera temui konselor anda dan mengkonsultasikan hal ini kepada
                konselor
                @elseif ($murid->skor_total_pelaku >= 24 && $murid->skor_total_pelaku < 35) Karena anda termasuk dalam
                    kategori berpotensi <span class="text-yellow-400">Sedang</span>
                    menjadi Pelaku bullying, anda dapat menemui konselor anda dan mengkonsultasikan hal ini kepada
                    konselor
                    @else
                    Karena anda termasuk dalam kategori berpotensi <span class="text-green-400">Rendah</span>, untuk
                    lebih jelasnya silahkan menemui dan konsultasikan hal ini dengan konselor anda.
                    @endif
            </p>

            {{-- print --}}
            <div class="flex justify-center items-center gap-4 mt-10 flex-col md:flex-row">
                <a href="{{ route('murid.hasil.print') }}" target="_blank"
                    class="bg-blue-500 w-full md:w-[180px]  flex justify-center items-center py-4  rounded-lg text-white hover:bg-[#0090D4] transition-colors duration-300 ease-in-out">
                    <span>
                        Lihat Hasil
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