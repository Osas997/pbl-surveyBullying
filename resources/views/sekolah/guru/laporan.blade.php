@extends('layout.main')
@section('content')
<div class="flex justify-start items-center gap-5">
   <p class="font-bold text-lg my-0">
      <span class=" md:text-xl">Murid {{ $namaSekolah }}</span>
   </p>
</div>
<div class="my-4 w-full md:w-1/2">
   <form>
      <div class="flex">
         <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your
            Email</label>
         <select id="dropdown" name="filter"
            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-2 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
            <option value="" selected>Filter</option>
            <option value="korbanRendah" @if (request('filter')=='korbanRendah' ) selected @endif>Korban Rendah</option>
            <option value="korbanSedang" @if (request('filter')=='korbanSedang' ) selected @endif>Korban Sedang</option>
            <option value="korbanTinggi" @if (request('filter')=='korbanTinggi' ) selected @endif>Korban Tinggi</option>
            <option value="pelakuRendah" @if (request('filter')=='pelakuRendah' ) selected @endif>Pelaku Rendah</option>
            <option value="pelakuSedang" @if (request('filter')=='pelakuSedang' ) selected @endif>Pelaku Sedang</option>
            <option value="pelakuTinggi" @if (request('filter')=='pelakuTinggi' ) selected @endif>Pelaku Tinggi</option>
         </select>
         <div class="relative w-full">
            <input type="search" name="search" @if (request('search')) value="{{ request('search') }}" @endif
               id="search-dropdown"
               class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
               placeholder="Cari Murid , NISN">
            <button type="submit"
               class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
               <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                  viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
               </svg>
               <span class="sr-only">Search</span>
            </button>
         </div>
      </div>
   </form>

</div>
<div class="">
   <a href="{{ route('guru.printLaporan', ['search' => request('search'), 'filter' => request('filter')]) }}"
      target="_blank"
      class="bg-[#0062CE] btn rounded-lg text-white flex justify-center items-center w-fit px-8 h-10 hover:bg-blue-600 duration-300 ease-in-out mt-4">
      <span>Print</span>
   </a>
</div>

<div class="mt-4 w-full  overflow-x-auto overflow-y-auto rounded-lg">
   <div class="text-slate-400 text-sm">Total Siswa {{ $totalSiswa }}</span>
      @if ($dataSiswa->isNotEmpty())
      <div class="overflow-x-auto shadow-md rounded-lg">
         <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-white uppercase bg-blue-500 dark:bg-gray-700 ">
               <tr>
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
               <tr class="bg-white border-b  hover:bg-gray-50 ">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                     <span class="sm:text-sm md:text-md uppercase">{{ $murid->nama_murid }}</span>
                  </th>
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                     <span class="sm:text-sm md:text-md uppercase">{{ $murid->nisn }}</span>
                  </th>
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                     <span class="sm:text-sm md:text-md uppercase">{{ $murid->kelas }}</span>
                  </th>
                  @if ($murid->surveyRespon)
                  <td class="px-6 py-4">
                     <span class="sm:text-sm md:text-md">{{ $murid->surveyRespon->skor_total_pelaku }}
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
                  <td class="px-6 py-4">
                     <span class="sm:text-sm md:text-md">Memiliki kecenderungan menjadi pelaku bullying
                        @if ($murid->surveyRespon->skor_total_pelaku >= 46)
                        Sangat Tinggi
                     </span>
                     @elseif ($murid->surveyRespon->skor_total_pelaku >= 35 &&
                     $murid->surveyRespon->skor_total_pelaku < 46) Tinggi</span>
                        @elseif ($murid->surveyRespon->skor_total_pelaku >= 24 &&
                        $murid->surveyRespon->skor_total_pelaku < 35) Sedang</span>
                           @else
                           Rendah
                           </span>
                           @endif
                           </span>
                  </td>
                  <td class="px-6 py-4">
                     <span class="sm:text-sm md:text-md">{{ $murid->surveyRespon->skor_total_korban }}
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
                  <td class="px-6 py-4">
                     <span class="sm:text-sm md:text-md">Memiliki kecenderungan menjadi korban bullying
                        @if ($murid->surveyRespon->skor_total_korban >= 46)
                        Sangat Tinggi
                     </span>
                     @elseif ($murid->surveyRespon->skor_total_korban >= 35 &&
                     $murid->surveyRespon->skor_total_korban < 46) Tinggi</span>
                        @elseif ($murid->surveyRespon->skor_total_korban >= 24 &&
                        $murid->surveyRespon->skor_total_korban < 35) Sedang</span>
                           @else
                           Rendah
                           </span>
                           @endif
                           </span>
                  </td>
                  @else
                  <td class="px-6 py-4"></td>
                  <td class="px-6 py-4">
                     Siswa Ini Belum Mengisi Survey
                  </td>
                  <td class="px-6 py-4"></td>
                  <td class="px-6 py-4"></td>
                  @endif
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
      @else
      <h1 class="text-center text-2xl font-bold text-red-600 mt-20">Daftar Murid Tidak ditemukan</h1>
      @endif
   </div>
</div>
@endsection