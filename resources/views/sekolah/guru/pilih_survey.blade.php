@extends('layout.main')
@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
   <div class="my-4 p-4">
      <span
         class="bg-gray-100 rounded-2xl text-gray-800 text-xl font-medium me-2 px-4 py-2 dark:bg-gray-700 dark:text-purple-400 border border-gray-500">Pilih
         Survey</span>
   </div>
   <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
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
            <th scope="col" class="px-6 py-3">
               Tanggal Survey
            </th>
            <th scope="col" class="px-6 py-3">
               Action
            </th>
         </tr>
      </thead>
      <tbody>
         @foreach ($daftarSurvey as $survey)
         <tr
            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white uppercase">
               {{ $survey->murid->nama_murid }}
            </th>
            <td class="px-6 py-4">
               {{ $survey->murid->nisn }}
            </td>
            <td class="px-6 py-4">
               {{ $survey->murid->kelas }}
            </td>
            <td class="px-6 py-4">
               {{ $survey->murid->created_at->timezone('Asia/Jakarta')->format('d/m/Y H:i:s') }}
            </td>
            <td class="px-6 py-4">
               <a class="sm:text-sm md:text-md text-teal-400"
                  href="{{ route('guru.hasilKorban', $survey->murid->id) }}">
                  Survey Respon</a>
            </td>
         </tr>
         @endforeach

      </tbody>
   </table>
</div>

@endsection