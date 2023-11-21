@extends('layout.pages')
@section('title','Hasil Survey Korban')
@section('content')
<div class="w-full bg-[#0090D4] min-h-screen overflow-x-hidden scroll-smooth ">
   <div class="w-full  md:w-8/12 mx-auto px-10 mt-10">
      <div class="w-full bg-white mx-auto p-8 rounded shadow-md">
         <a href="{{route('guru.murid')}}">
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
         <div class="px-20">
            <div class="flex justify-around">
               <a href="{{route('guru.hasilPelaku', $murid->murid->id )}}">
                  <div
                     class="text-black w-[120px] md:w-[240px] flex justify-center items-center py-4 mt-8 mb-14 rounded-lg hover:text-white hover:bg-blue-500 transition-colors duration-300 ease-in-out">
                     <span>
                        Pelaku
                     </span>
                  </div>
               </a>

               <a href="{{route('guru.hasilKorban', $murid->murid->id )}}">
                  <div
                     class="@if(Request::is('guru/hasil-korban/*')) bg-blue-500 @endif text-white w-[120px] md:w-[240px] flex justify-center items-center py-4 mt-8 mb-14 rounded-lg">
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
         {{-- print --}}
         <div class="flex justify-center items-center">
            <a href="{{route('guru.printHasilKorban',$murid->murid->id)}}" target="_blank"
               class="bg-blue-500 w-[60px] md:w-[180px]  flex justify-center items-center py-4 mt-8 mb-14 rounded-lg text-white hover:bg-[#0090D4] transition-colors duration-300 ease-in-out">
               <span>
                  Print
               </span>
            </a>
         </div>
      </div>
   </div>

</div>
@endsection