@extends('layout.pages')
@section('title','Print Hasil Survey')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div>

        {{-- header logo --}}
        <div class="grid grid-cols-4 justify-center items-center mb-10">
            <div class="w-full flex justify-center items-center">
                <img src="{{asset('assets/img/uniba.png')}}" alt="" srcset=""
                    class="w-10 h-10 md:w-20 md:h-20 lg:w-40 lg:h-40 ">
            </div>
            <h1 class="text-[8px] md:text-base text-center col-span-2">PENELITIAN DOSEN PEMULA, KEMENTRIAN RISET,
                TEKNOLOGI, DAN PENDIDIKAN TINGGI BIMBINGAN DAN KONSELING</h1>
            <div class="w-full flex justify-center items-center">
                <img src="{{asset('assets/img/kemdigbud.png')}}" alt="" srcset=""
                    class="w-10 h-10 md:w-20 md:h-20 lg:w-40 lg:h-40">
                <img src="{{asset('assets/img/ristekdikti.png')}}" alt="" srcset=""
                    class=" w-10 h-10 md:w-20 md:h-20 lg:w-40 lg:h-40">
            </div>
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
                @elseif ($murid->skor_total_korban >= 35 && $murid->skor_total_korban < 46) <span class="text-red-500">
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
                @elseif ($murid->skor_total_pelaku >= 35 && $murid->skor_total_pelaku < 46) <span class="text-red-500">
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

    <div class="mt-4 w-full  overflow-x-auto overflow-y-auto rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-white uppercase  bg-blue-500  ">
                <tr>
                    <th scope="col" class="pr-6 py-3">
                        Pertanyaan
                    </th>
                    <th scope="col" class="pr-6 py-3">
                        Tipe Pertanyaan
                    </th>
                    <th scope="col" class="pr-6 py-3">
                        Tipe Perilaku
                    </th>
                    <th scope="col" class="py-3">
                        Jawaban
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($murid->jawaban as $jawaban)
                <tr class="bg-white border-b  hover:bg-gray-50 ">
                    <td class="pr-6 py-4">
                        <span class="sm:text-sm md:text-md text-center">{{ $jawaban->pertanyaan->pertanyaan }}</span>
                    </td>
                    <td class="pr-6 py-4">
                        <span class="sm:text-sm md:text-md text-center">{{ $jawaban->pertanyaan->tipe_pertanyaan
                            }}</span>
                    </td>
                    <td class="pr-6 py-4">
                        <span class="sm:text-sm md:text-md text-center">{{ $jawaban->pertanyaan->tipe_perilaku }}</span>
                    </td>
                    <td class="py-4">
                        <span class="sm:text-sm md:text-md ">
                            @if ($jawaban->skor == 4)
                            Selalu
                            @elseif($jawaban->skor == 3)
                            Sering
                            @elseif ($jawaban->skor == 2)
                            Jarang
                            @elseif ($jawaban->skor == 1)
                            Tidak Pernah
                            @endif
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
<script>
    window.print();
    
</script>
{{-- @else
belum mengisi survey
@endif --}}
@endsection