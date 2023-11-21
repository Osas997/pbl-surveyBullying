@extends('layout.pages')
@section('title','Print Hasil Korban')
@section('content')
<div class="container mx-auto px-4 py-8">
   <div>
      <h1 class="text-center font-semibold text-base mb-4">Hasil Instrumen Assesment Bullying</h1>
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
      <p class="text-xl font-semibold mt-4">Kecenderungan menjadi Korban Bullying</p>
      <div class="flex gap-14 ">
         <div class="nilai">
            <p class="font-medium text-base">Nilai Anda</p>
            <h2 class="text-center font-semibold text-4xl">
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

      <p class="text-xl font-semibold mt-4">Kecenderungan menjadi Pelaku Bullying</p>
      <div class="flex gap-14">
         <div class="nilai">
            <p class="font-medium text-base">Nilai Anda</p>
            <h2 class="text-center font-semibold text-4xl">
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
         kecenderungan menjadi pelaku bullying yang
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
      <p class="text-base sm:text-1xl mb-1">
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