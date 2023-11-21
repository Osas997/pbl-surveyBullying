@extends('layout.pages')
@section('title','Print Hasil Korban')
@section('content')
<div class="container mx-auto px-4 py-8">
   <div>
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
            <h2 class="font-semibold text-4xl">{{ $murid->skor_total_korban }}</h2>
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
         kecenderungan menjadi Korban bullying yang
         @if ($murid->skor_total_korban >= 46)
         <span class="text-red-400">Sangat Tinggi</span>. Hal ini dapat disebabkan oleh beberapa faktor,
         seperti kepercayaan diri, kemampuan sosial, atau dukungan dari orang-orang terdekat.
         @elseif ($murid->skor_total_korban >= 35 && $murid->skor_total_korban < 46) <span class="text-yellow-400">
            Tinggi</span>. Hal ini dapat disebabkan oleh beberapa faktor, seperti
            kepercayaan diri, kemampuan sosial, atau dukungan dari orang-orang terdekat.
            @elseif ($murid->skor_total_korban >= 24 && $murid->skor_total_korban < 35) <span class="text-teal-400">
               Sedang</span>. Hal ini dapat disebabkan oleh beberapa faktor,
               seperti kepercayaan diri, kemampuan sosial, atau dukungan dari orang-orang terdekat.
               @else
               <span class="text-green-400">Rendah</span>. Hal ini dapat disebabkan oleh beberapa faktor,
               seperti kepercayaan diri, kemampuan sosial, atau dukungan dari orang-orang terdekat.
               @endif
      </p>

      <div class="mt-4 w-full  overflow-x-auto overflow-y-auto rounded-lg">
         <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-white uppercase  bg-blue-500  ">
               <tr>
                  <th scope="col" class="px-6 py-3">
                     Pertanyaan
                  </th>
                  <th scope="col" class="px-6 py-3">
                     Tipe Pertanyaan
                  </th>
                  <th scope="col" class="px-6 py-3">
                     Tipe Perilaku
                  </th>
                  <th scope="col" class="px-6 py-3">
                     Jawaban
                  </th>
               </tr>
            </thead>
            <tbody>
               @foreach ($murid->jawaban as $jawaban)
               @if ($jawaban->pertanyaan->tipe_pertanyaan == "korban")
               <tr class="bg-white border-b  hover:bg-gray-50 ">
                  <td class="px-6 py-4">
                     <span class="sm:text-sm md:text-md text-center">{{ $jawaban->pertanyaan->pertanyaan }}</span>
                  </td>
                  <td class="px-6 py-4">
                     <span class="sm:text-sm md:text-md text-center">{{ $jawaban->pertanyaan->tipe_pertanyaan
                        }}</span>
                  </td>
                  <td class="px-6 py-4">
                     <span class="sm:text-sm md:text-md text-center">{{ $jawaban->pertanyaan->tipe_perilaku }}</span>
                  </td>
                  <td class="px-6 py-4">
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
               @endif
               @endforeach
            </tbody>
         </table>
      </div>


   </div>
   <script>
      window.print();
    
   </script>
   {{-- @else
   belum mengisi survey
   @endif --}}
   @endsection