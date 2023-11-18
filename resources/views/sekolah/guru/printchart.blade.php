@extends('layout.pages')
@section('title','Print Chart')

@section('content')
<div
   class="relative bg-blue-200 w-full flex justify-center items-center flex-col gap-10 p-4 sm:p-6 rounded-sm overflow-hidden mb-8 ">
   <div class="flex justify-center items-center">
      <button id="btn-print"
         class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 cursor-pointer rounded">Print</button>
   </div>
   {{-- pie chart --}}
   <div id="pie-chart-grid" class="grid md:grid-cols-2 gap-8">
      <div class=" max-w-full bg-white rounded-lg dark:bg-gray-800 p-4 md:p-6 shadow-lg">
         <div class="flex justify-between items-start w-full">
            <div class="flex-col items-center">
               <div class="flex items-center mb-1">
                  <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white mr-1">Korban</h5>
                  <div data-popover id="chart-info" role="tooltip"
                     class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                     <div data-popper-arrow></div>
                  </div>
               </div>

            </div>
         </div>
         {{-- Chart pie --}}
         <div class="py-6" id="pie-chart"></div>

      </div>

      <div class=" max-w-full bg-white rounded-lg  dark:bg-gray-800 p-4 md:p-6 shadow-lg">
         <div class="flex justify-between items-start w-full">
            <div class="flex-col items-center">
               <div class="flex items-center mb-1">
                  <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white mr-1">Pelaku</h5>
                  <div data-popover id="chart-info" role="tooltip"
                     class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                     <div data-popper-arrow></div>
                  </div>
               </div>

            </div>
         </div>
         {{-- Chart pie --}}
         <div class="py-6" id="pie-chart1"></div>

      </div>

   </div>
   <div class="max-w-full w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
      <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
         <div class="flex items-center">
            <div>
               <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">Persentase Perilaku
                  Perundungan</h5>
               <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Persentase Perilaku Perundungan
                  Berdasarkan Soal Yang Dipilih Saat Survey</p>
            </div>
         </div>
         <div>
         </div>
      </div>

      <div id="print-column-chart" class="">
         <div id="column-chart"></div>
      </div>
      <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">

      </div>
      <div class="mt-8 w-full  overflow-x-auto overflow-y-auto rounded-lg">
         <p class="text-sm font-normal text-gray-500 dark:text-gray-400">
            Berdasarkan Jumlah Jawaban Yang Dipilih Saat Survey</p>
         <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-white uppercase  bg-blue-500  ">
               <tr>
                  <th scope="col" class="px-6 py-3">
                     Soal
                  </th>
                  <th scope="col" class="px-6 py-3">
                     Pertanyaan
                  </th>
                  <th scope="col" class="px-6 py-3">
                     <span>Tipe Perilaku</span>
                  </th>
                  <th scope="col" class="px-6 py-3">
                     <span>Banyak Jawaban</span>

                  </th>
               </tr>
            </thead>
            <tbody>
               @foreach ($tipePelaku as $tipe)
               <tr class="bg-white border-b  hover:bg-gray-50 ">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                     <span>{{ $loop->iteration }}</span>
                  </th>
                  <td class="px-6 py-4">
                     <span class="sm:text-sm md:text-md text-center">{{ $tipe->pertanyaan }}</span>
                  </td>
                  <td class="px-6 py-4">
                     <span class="sm:text-sm md:text-md text-center">{{ $tipe->tipe_perilaku }}</span>
                  </td>
                  <td class="px-6 py-4">
                     <span class="sm:text-sm md:text-md text-center">{{ $tipe->jawaban_count }}
                        Jawaban</span>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>

         <h1 class="text-xl mt-8 mb-4 font-semibold text-center">
            Perilaku Bullying Yang Sering Dipilih Siswa
         </h1>
         <ul>
            @php
            $indexiteration = 1;
            @endphp
            @if ($pertanyaanTerbanyak == null || $pertanyaanTerbanyak->jawaban_count == 0)
            <p class="text-center">Tidak Ada Jawaban Dipilih</p>
            @else
            @foreach ($tipePelaku as $tipe)
            @if ($tipe->jawaban_count == $pertanyaanTerbanyak->jawaban_count)
            <div class="flex items-center gap-4 ">
               <li>{{$indexiteration++}}</li>
               <li>{{ $tipe->pertanyaan }} Dengan {{ $tipe->jawaban_count }} Jawaban </li>
            </div>
            @endif
            @endforeach
            @endif
         </ul>
      </div>

   </div>
</div>
@endsection

@section('script')
<script>
   const korbanSangatTinggi = @json($korbanSangatTinggi);
        const korbanTinggi = @json($korbanTinggi);
        const korbanSedang = @json($korbanSedang);
        const korbanRendah = @json($korbanRendah);

        const pelakuSangatTinggi = @json($pelakuSangatTinggi);
        const pelakuTinggi = @json($pelakuTinggi);
        const pelakuSedang = @json($pelakuSedang);
        const pelakuRendah = @json($pelakuRendah);

        const tipePelaku = @json($tipePelaku);  
</script>
<script src="{{ asset('js/chart.js') }}"></script>
<script src="{{ asset('js/printchart.js') }}"></script>
@endsection