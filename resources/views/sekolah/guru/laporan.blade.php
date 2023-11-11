@extends('layout.main')
@section('content')
<div class="flex justify-start items-center gap-5">
   <p class="font-bold text-lg my-0">
      {{-- <span class=" md:text-xl uppercase">Murid {{ $namaSekolah }}</span> --}}
      <span class=" md:text-xl uppercase">Murid {{ $namaSekolah }}</span>
   </p>
</div>
<div class="flex justify-start items-center gap-4 mt-10  ">
   <form action="" method="get" class="md:w-1/2 w-full">
      <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
      <div class="relative">
         <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
               fill="none" viewBox="0 0 20 20">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
         </div>
         <input name="search" type="search" @if (request('search')) value="{{ request('search') }}" @endif
            id="default-search"
            class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Cari Murid">
         <button type="submit"
            class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
      </div>
   </form>
</div>
<div class="">
   <a href="kumis" target="_blank"
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