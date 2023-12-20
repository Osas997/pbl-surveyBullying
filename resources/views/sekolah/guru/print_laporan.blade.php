@extends('layout.pages')
@section('title','Print Laporan')
@section('content')
<p class="mb-4">Hasil Survey Murid <span class="uppercase">{{$namaSekolah}}</span> </p>
@if ($dataSiswa->isNotEmpty())
<table class="w-full text-sm text-left text-gray-500 rounded-lg">
    <thead class="text-xs text-white uppercase bg-blue-500 rounded-lg">
        <tr class="text-gray-900">
            <th scope="col" class="px-6 py-3">
                Nama Murid
            </th>
            <th scope="col" class="px-6 py-3">
                NISN
            </th>
            <th scope="col" class="px-6 py-3">
                Kelas
            </th>
            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                Skor Pelaku
            </th>
            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                Interpretasi
            </th>
            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                Skor Korban
            </th>
            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                Interpretasi
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataSiswa as $murid)
        <tr class="bg-white border-b hover:bg-gray-50 ">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                <span class="sm:text-sm md:text-md uppercase">{{ $murid->nama_murid }}</span>
            </th>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                <span class="sm:text-sm md:text-md uppercase">{{ $murid->nisn }}</span>
            </th>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                <span class="sm:text-sm md:text-md uppercase">{{ $murid->kelas }}</span>
            </th>
            <td class="px-3 py-1">
                <span class="sm:text-sm md:text-md text-center">
                    <span>{{ $murid->surveyRespon->skor_total_pelaku }}
                        @if ($murid->surveyRespon->skor_total_pelaku >= 46)
                        (Sangat Tinggi)
                    </span>
                    @elseif ($murid->surveyRespon->skor_total_pelaku >= 35 &&
                    $murid->surveyRespon->skor_total_pelaku < 46) (Tinggi)</span>
                        @elseif ($murid->surveyRespon->skor_total_pelaku >= 24 &&
                        $murid->surveyRespon->skor_total_pelaku < 35) (Sedang)</span>
                            @else
                            (Rendah)
                </span>
                @endif
                </span>
            </td>
            <td class="px-3 py-1">
                <span class="sm:text-sm md:text-md text-center">
                    <span>
                        Memiliki kecenderungan menjadi pelaku bullying
                        @if ($murid->surveyRespon->skor_total_pelaku >= 46)
                        Sangat Tinggi
                        @elseif ($murid->surveyRespon->skor_total_pelaku >= 35 &&
                        $murid->surveyRespon->skor_total_pelaku < 46) Tinggi @elseif ($murid->
                            surveyRespon->skor_total_pelaku >= 24 && $murid->surveyRespon->skor_total_pelaku < 35)
                                Sedang @else Rendah @endif </span>
                    </span>
            </td>
            <td class="px-3 py-1">
                <span class="sm:text-sm md:text-md text-center">
                    <span>{{ $murid->surveyRespon->skor_total_korban }}
                        @if ($murid->surveyRespon->skor_total_korban >= 46)
                        (Sangat Tinggi)
                    </span>
                    @elseif ($murid->surveyRespon->skor_total_korban >= 35 &&
                    $murid->surveyRespon->skor_total_korban < 46) (Tinggi)</span>
                        @elseif ($murid->surveyRespon->skor_total_korban >= 24 &&
                        $murid->surveyRespon->skor_total_korban < 35) (Sedang)</span>
                            @else
                            (Rendah)
                </span>
                @endif
                </span>
            </td>
            <td class="px-3 py-1">
                <span class="sm:text-sm md:text-md text-center">
                    <span>
                        Memiliki kecenderungan menjadi korban bullying
                        @if ($murid->surveyRespon->skor_total_korban >= 46)
                        Sangat Tinggi
                        @elseif ($murid->surveyRespon->skor_total_korban >= 35 &&
                        $murid->surveyRespon->skor_total_korban < 46) Tinggi @elseif ($murid->
                            surveyRespon->skor_total_korban >= 24 && $murid->surveyRespon->skor_total_korban < 35)
                                Sedang @else Rendah @endif </span>
                    </span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p class="text-2xl">Belum Ada Data </p>
@endif
@endsection

@section('script')
<script>
    window.addEventListener("load", function () {
            window.print();
        });
</script>
@endsection