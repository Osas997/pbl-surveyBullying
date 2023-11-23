@extends('layout.pages')
@section('title','Print Chart')
@section('content')
    <p class="mb-4">Hasil Survey Murid <span class="uppercase">{{$namaSekolah}}</span> </p>
    @if ($dataSiswa->isNotEmpty())    
    <table class="w-full text-sm text-left text-gray-500 rounded-lg">
        <thead class="text-xs text-white uppercase bg-blue-500 rounded-lg">
           <tr>
              <th scope="col" class="px-3 py-1">
                 Nama Murid
              </th>
              <th scope="col" class="px-3 py-1">
                 Skor Pelaku
              </th>
              <th scope="col" class="px-3 py-1">
                 Interpretasi
              </th>
              <th scope="col" class="px-3 py-1">
                 Skor Korban
              </th>
              <th scope="col" class="px-3 py-1">
                 Interpretasi
              </th>
           </tr>
        </thead>
        <tbody>
           @foreach ($dataSiswa as $murid)
           <tr class="bg-white border-b hover:bg-gray-50 ">
              <td class="px-3 py-1">
                 <span class="sm:text-sm md:text-md text-center">{{$murid->nama_murid}}</span>
              </td>
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
    {{-- <div class="container">
    
        @if ($dataSiswa->isNotEmpty())
        <table>
            <thead>
                <tr>
                    <th>Nama Murid</th>
                    <th>Skor Pelaku</th>
                    <th>Interpretasi</th>
                    <th>Skor Korban</th>
                    <th>Interpretasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataSiswa as $murid)
                <tr>
                    <td>
                        {{$murid->nama_murid}}
                    </td>
                    <td>
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
                    </td>
                    <td>
                        <span>
                            Memiliki kecenderungan menjadi pelaku bullying
                            @if ($murid->surveyRespon->skor_total_pelaku >= 46)
                            Sangat Tinggi
                            @elseif ($murid->surveyRespon->skor_total_pelaku >= 35 &&
                            $murid->surveyRespon->skor_total_pelaku < 46) Tinggi @elseif ($murid->
                                surveyRespon->skor_total_pelaku >= 24 && $murid->surveyRespon->skor_total_pelaku < 35)
                                    Sedang @else Rendah @endif </span>
                    </td>
                    <td>
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
                    </td>
                    <td>
                        <span>
                            Memiliki kecenderungan menjadi korban bullying
                            @if ($murid->surveyRespon->skor_total_korban >= 46)
                            Sangat Tinggi
                            @elseif ($murid->surveyRespon->skor_total_korban >= 35 &&
                            $murid->surveyRespon->skor_total_korban < 46) Tinggi @elseif ($murid->
                                surveyRespon->skor_total_korban >= 24 && $murid->surveyRespon->skor_total_korban < 35)
                                    Sedang @else Rendah @endif </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else --}}
        {{-- Belum Ada Data
        @endif
    </div> --}}

    <script>
        window.addEventListener("load", function () {
            window.print();
        });
    </script>
</body>

</html>