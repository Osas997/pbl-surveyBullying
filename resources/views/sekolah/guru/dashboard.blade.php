@extends('layout.main')
@section('content')
<div class="relative bg-indigo-200 w-full  p-4 sm:p-6 rounded-sm overflow-hidden mb-8 ">
   <!-- Background illustration -->
   <div class="absolute right-0 top-0 -mt-4 mr-16 pointer-events-none hidden xl:block" aria-hidden="true">
      <svg width="319" height="198" xmlns:xlink="http://www.w3.org/1999/xlink">
         <defs>
            <path id="welcome-a" d="M64 0l64 128-64-20-64 20z" />
            <path id="welcome-e" d="M40 0l40 80-40-12.5L0 80z" />
            <path id="welcome-g" d="M40 0l40 80-40-12.5L0 80z" />
            <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="welcome-b">
               <stop stop-color="#A5B4FC" offset="0%" />
               <stop stop-color="#818CF8" offset="100%" />
            </linearGradient>
            <linearGradient x1="50%" y1="24.537%" x2="50%" y2="100%" id="welcome-c">
               <stop stop-color="#4338CA" offset="0%" />
               <stop stop-color="#6366F1" stop-opacity="0" offset="100%" />
            </linearGradient>
         </defs>
         <g fill="none" fill-rule="evenodd">
            <g transform="rotate(64 36.592 105.604)">
               <mask id="welcome-d" fill="#fff">
                  <use xlink:href="#welcome-a" />
               </mask>
               <use fill="url(#welcome-b)" xlink:href="#welcome-a" />
               <path fill="url(#welcome-c)" mask="url(#welcome-d)" d="M64-24h80v152H64z" />
            </g>
            <g transform="rotate(-51 91.324 -105.372)">
               <mask id="welcome-f" fill="#fff">
                  <use xlink:href="#welcome-e" />
               </mask>
               <use fill="url(#welcome-b)" xlink:href="#welcome-e" />
               <path fill="url(#welcome-c)" mask="url(#welcome-f)" d="M40.333-15.147h50v95h-50z" />
            </g>
            <g transform="rotate(44 61.546 392.623)">
               <mask id="welcome-h" fill="#fff">
                  <use xlink:href="#welcome-g" />
               </mask>
               <use fill="url(#welcome-b)" xlink:href="#welcome-g" />
               <path fill="url(#welcome-c)" mask="url(#welcome-h)" d="M40.333-15.147h50v95h-50z" />
            </g>
         </g>
      </svg>
   </div>

   <!-- Content -->
   <div class="relative">
      <h1 class="text-2xl md:text-3xl text-slate-800 font-bold mb-1">Welcome Back Guru {{
         auth('sekolah')->user()->nama_sekolah }} 👋
      </h1>
      <p class="lg:w-8/12 text-slate-800 ">Kami sangat senang melihat Anda kembali ke dashboard admin kami. Dengan tekad
         bersama, kita akan terus berjuang untuk mengatasi permasalahan serius tentang bullying</p>
   </div>

</div>

<div class="grid grid-cols-1 justify-center items-center gap-4">
   <div class="grid grid-cols-1  gap-4">
      <div class="bg-blue-400 w-full rounded-xl px-4 py-4 shadow-md flex justify-start items-center">
         <div class="flex justify-start items-center gap-2">
            <div class="w-24 h-24">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.002 512.002"
                  style="enable-background:new 0 0 512.002 512.002" xml:space="preserve">
                  <path style="fill:#50000f" d="m126.589 311.35 132.327-54.493 124.391 55.725z" />
                  <path style="fill:#50000f"
                     d="M126.589 311.35s5.061 40.853-24.364 40.853c0 0-6.095 25.034 16.504 40.576h273.535c22.6-15.542 16.504-40.576 16.504-40.576-29.424 0-24.364-40.853-24.364-40.853" />
                  <path style="fill:#4bcdb2"
                     d="M183.148 360.98h-6.679c-52.89 13.823-92.219 62.149-92.219 119.214v25.8h347.252v-25.8c0-57.064-39.325-105.389-92.213-119.213l-6.682-.001H183.148z" />
                  <path style="fill:#ff6243"
                     d="M312.191 380.274c0 29.997-24.317 54.314-54.314 54.314s-54.314-24.317-54.314-54.314v-34.278h108.629v34.278h-.001z" />
                  <ellipse style="fill:#ffd422" cx="258.908" cy="457.08" rx="15.997" ry="22.497" />
                  <path style="fill:#d3fdf9"
                     d="M183.04 360.981h-6.679c-13.857 3.621-26.781 9.615-38.313 17.51v127.504l32.811-20.277 32.811 20.277V360.981h-20.63zM339.181 360.982l-6.682-.001h-20.416v145.015l32.811-20.277 32.811 20.277v-127.36c-11.584-7.967-24.583-14.01-38.524-17.654z" />
                  <path style="fill:#ff7956"
                     d="M145.711 179.691V277.52c0 61.692 50.474 112.166 112.166 112.166s112.166-50.474 112.166-112.166V179.691H145.711z" />
                  <path style="fill:#ff6243"
                     d="M369.817 208.754c21.12 0 38.241 17.122 38.241 38.241s-17.122 38.241-38.241 38.241v-76.482z" />
                  <path style="fill:#ff7956"
                     d="M145.711 285.238c-21.12 0-38.241-17.122-38.241-38.241s17.122-38.241 38.241-38.241v76.482z" />
                  <path style="fill:#4bcdb2"
                     d="M376.33 88.718v86.916a4.055 4.055 0 0 1-4.055 4.055H142.211a4.055 4.055 0 0 1-4.055-4.055V88.718H376.33z" />
                  <path style="fill:#fff5cc"
                     d="M290.734 279.402c3.737 0 6.559 3.389 5.891 7.068-3.329 18.377-19.412 32.314-38.749 32.314s-35.42-13.937-38.749-32.314c-.666-3.677 2.154-7.068 5.892-7.068h65.715z" />
                  <path style="fill:#328777"
                     d="M138.789 88.238v19.069l115.038 38.653c2.627.883 5.471.883 8.098 0l115.038-38.653V88.238H138.789z" />
                  <path style="fill:#3eac92"
                     d="m409.373 77.617-148.08 49.756a12.709 12.709 0 0 1-8.098 0L105.113 77.617c-3.731-1.254-3.886-6.473-.235-7.947l147.61-59.537a12.706 12.706 0 0 1 9.51 0l147.61 59.537c3.651 1.472 3.496 6.693-.235 7.947z" />
                  <path style="fill:#ff6243"
                     d="M324.524 180.24V278.069c0 53.47-37.921 98.505-88.196 109.561a111.65 111.65 0 0 0 21.322 2.056c61.692 0 112.166-50.474 112.166-112.166V179.691" />
                  <path style="fill:#50000f"
                     d="M402.945 390.404c16.825-17.889 11.6-40.516 11.337-41.599a7.604 7.604 0 0 0-7.388-5.805c-5.094 0-8.825-1.454-11.403-4.444-4.932-5.718-5.347-16.167-4.946-22.069 7.074-3.41 11.979-10.629 11.979-18.993 0-6.17-2.679-11.712-6.915-15.573 11.035-8.379 18.176-21.631 18.176-36.525 0-22.61-16.455-41.436-38.015-45.163v-14.659c3.571-.625 6.287-3.732 6.287-7.482V92.586l27.86-9.361c4.751-1.596 7.916-5.864 8.064-10.875.148-5.01-2.759-9.457-7.406-11.332L262.967 1.482a20.226 20.226 0 0 0-15.199 0L100.157 61.019c-4.647 1.876-7.554 6.322-7.406 11.333.148 5.01 3.314 9.278 8.064 10.875l27.86 9.361v85.505a7.603 7.603 0 0 0 7.554 7.602v14.5c-21.671 3.635-38.241 22.515-38.241 45.203 0 14.893 7.143 28.145 18.176 36.525-4.236 3.861-6.915 9.402-6.915 15.573 0 6.758 3.207 12.768 8.166 16.632.249 6.755-.538 18.315-5.991 24.46-2.674 3.012-6.192 4.414-11.075 4.414a7.603 7.603 0 0 0-7.388 5.805c-.276 1.132-5.981 25.886 13.877 44.09-20.149 23.2-32.068 53.353-32.068 85.702v25.799c0 4.2 3.403 7.604 7.604 7.604h347.253c4.2 0 7.604-3.404 7.604-7.604v-25.801c-.001-33.52-12.796-64.683-34.286-88.193zm-259.062-9.487a115.756 115.756 0 0 1 31.703-13.932h2.709a120.368 120.368 0 0 0 15.8 11.433c-.003.085-.013.169-.013.255 0 1.665.085 3.308.215 4.939v107.143l-21.21-13.107a7.598 7.598 0 0 0-7.994 0l-21.211 13.108v-109.84l.001.001zm7.555-155.484c11.277-4.365 37.737-16.15 51.956-35.227 15.635 12.96 58.33 37.701 157.171 38.88v46.837c0 30.501-13.129 57.99-34.03 77.121-.613.408-1.165.9-1.636 1.464-18.413 16.163-42.529 25.978-68.897 25.978-17.955 0-34.866-4.55-49.645-12.557a7.612 7.612 0 0 0-1.604-.893 105.04 105.04 0 0 1-17.641-12.522 7.598 7.598 0 0 0-1.646-1.473c-20.899-19.131-34.028-46.619-34.028-77.118v-50.49zm105.598 215.159c3.962 0 8.394 6.368 8.394 14.89s-4.432 14.891-8.394 14.891-8.394-6.368-8.394-14.891c0-8.522 4.432-14.89 8.394-14.89zM256 425.385c-23.095 0-42.317-16.852-46.045-38.903 14.183 5.929 29.737 9.21 46.045 9.21s31.862-3.281 46.045-9.21c-3.727 22.051-22.95 38.903-46.045 38.903zm-86.909 67.672 6.043 3.735h-12.086l6.043-3.735zm40.414-73.559c7.47 8.497 17.216 14.945 28.287 18.358-2.75 4.924-4.359 10.99-4.359 17.626 0 16.878 10.368 30.099 23.601 30.099 13.234 0 23.601-13.221 23.601-30.099 0-6.898-1.734-13.184-4.685-18.207 10.456-3.57 19.654-9.858 26.758-18.025v77.541h-93.206v-77.293h.003zm137.617 58.153a7.598 7.598 0 0 0-7.994 0l-21.211 13.108V378.41a120.406 120.406 0 0 0 15.787-11.425l2.714.001a115.717 115.717 0 0 1 31.914 14.07v109.7l-21.21-13.105zm2.046 19.141h-12.086l6.044-3.735 6.042 3.735zm50.886-139.212c.128 5.52-.993 14.46-8.032 22.188a130.78 130.78 0 0 0-45.409-25.609c9.906-11.459 17.679-24.809 22.7-39.428a21.01 21.01 0 0 0 5.933 2.927c-.293 7.891.601 21.36 8.683 30.777 4.115 4.795 9.611 7.896 16.125 9.145zm-18.623-54.201a5.893 5.893 0 0 1-5.886-5.886c0-3.246 2.64-5.886 5.886-5.886s5.886 2.64 5.886 5.886a5.893 5.893 0 0 1-5.886 5.886zm17.147-57.983c0 14.188-9.695 26.151-22.807 29.621v-59.24c13.113 3.468 22.807 15.432 22.807 29.619zM253.457 15.586a5.082 5.082 0 0 1 3.821 0l139.156 56.127-139.442 46.852a5.122 5.122 0 0 1-3.251 0L198.39 99.968l59.996-25.966a7.602 7.602 0 0 0 3.958-9.998c-1.668-3.855-6.148-5.628-9.998-3.958l-75.511 32.68-38.294-12.867h-.001l-24.24-8.144 139.157-56.129zM169.8 106.404v24.748c-3.894 2.505-6.481 6.869-6.481 11.843 0 7.778 6.305 14.084 14.084 14.084s14.084-6.305 14.084-14.084c0-4.975-2.586-9.338-6.481-11.843v-19.638l63.888 21.466c2.088.701 4.28 1.052 6.472 1.052s4.384-.352 6.47-1.052l105.013-35.284v72.791H143.883V97.696l25.917 8.708zm-33.57 109.31V275.079c-13.228-3.39-23.034-15.413-23.034-29.682s9.806-26.292 23.034-29.683zm-5.886 87.665a5.893 5.893 0 0 1-5.886-5.886 5.892 5.892 0 0 1 5.886-5.886 5.892 5.892 0 0 1 5.886 5.886 5.893 5.893 0 0 1-5.886 5.886zm-23.158 54.168c6.22-1.253 11.553-4.273 15.652-8.913 7.785-8.809 9.605-21.462 9.818-30.181a20.94 20.94 0 0 0 9.983-3.856 119.82 119.82 0 0 0 22.747 39.561 130.767 130.767 0 0 0-47.915 27.841c-9.077-8.197-10.43-18.41-10.285-24.452zm-17.208 121.05c0-33.748 14.695-64.781 38.698-86.203v104.399H89.978v-18.196zm332.044 18.195h-38.483V394.461c.168.351.357.695.584 1.026a7.579 7.579 0 0 0 5.789 3.268c20.073 20.986 32.11 49.3 32.11 79.84v18.197z" />
                  <circle style="fill:#50000f" cx="212.908" cy="241.41" r="11.01" />
                  <circle style="fill:#50000f" cx="299.098" cy="241.41" r="11.01" />
                  <path style="fill:#50000f"
                     d="M295.382 270.199h-78.763a7.603 7.603 0 0 0-7.604 7.604c0 25.908 21.078 46.986 46.986 46.986s46.986-21.078 46.986-46.986a7.605 7.605 0 0 0-7.605-7.604zM256 309.581c-14.902 0-27.441-10.312-30.858-24.174h61.716c-3.416 13.862-15.956 24.174-30.858 24.174z" />
               </svg>
            </div>
            <div class="">
               <p class="text-white text-lg">Jumlah Aktif Murid <span class="uppercase">{{
                     $jumlahMurid }} </span></p>
               <h1 class="text-white font-bold text-3xl lg:text-4xl">{{ $jumlahMurid }}</h1>
            </div>
         </div>
      </div>

   </div>

   <div class="grid grid-cols-1 gap-4">
      {{-- card --}}
      {{-- korban --}}
      <div class="grid grid-cols-1 gap-6">

         <div class="bg-blue-100 rounded-xl  py-4 px-4 shadow-md">
            <h1 class="text-gray-900 font-bold text-lg mb-2">Korban Perundungan</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
               <div class="bg-red-400 w-full rounded-xl px-4 py-6 shadow-md">
                  <p class="text-white">Jumlah Korban Sangat Tinggi</p>
                  <h1 class="text-white font-bold text-4xl lg:text-5xl">{{ $korbanSangatTinggi }}</h1>
               </div>
               <div class="bg-orange-400 w-full rounded-xl px-4 py-6 shadow-md">
                  <p class="text-white">Jumlah Korban Tinggi</p>
                  <h1 class="text-white font-bold text-4xl lg:text-5xl"> {{ $korbanTinggi }} </h1>
               </div>
               <div class="bg-amber-400 w-full rounded-xl px-4 py-6 shadow-md">
                  <p class="text-white">Jumlah Korban Sedang</p>
                  <h1 class="text-white font-bold text-4xl lg:text-5xl">{{ $korbanSedang }}</h1>
               </div>
               <div class="bg-green-400 w-full rounded-xl px-4 py-6 shadow-md">
                  <p class="text-white">Jumlah Korban Rendah</p>
                  <h1 class="text-white font-bold text-4xl lg:text-5xl">{{ $korbanRendah }}</h1>
               </div>
            </div>
         </div>


         {{-- Pelaku --}}
         <div class="bg-blue-100 rounded-xl  py-4 px-4 shadow-md">
            <h1 class="text-gray-900 font-bold text-lg mb-2">Pelaku Perundungan</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
               <div class="bg-red-400 w-full rounded-xl px-4 py-6 shadow-md">
                  <p class="text-white">Jumlah Pelaku Sangat Tinggi</p>
                  <h1 class="text-white font-bold text-4xl lg:text-5xl">{{ $pelakuSangatTinggi }}</h1>
               </div>
               <div class="bg-orange-400 w-full rounded-xl px-4 py-6 shadow-md">
                  <p class="text-white">Jumlah Pelaku Tinggi</p>
                  <h1 class="text-white font-bold text-4xl lg:text-5xl">{{ $pelakuTinggi }}</h1>
               </div>
               <div class="bg-amber-400 w-full rounded-xl px-4 py-6 shadow-md">
                  <p class="text-white">Jumlah Pelaku Sedang</p>
                  <h1 class="text-white font-bold text-4xl lg:text-5xl">{{ $pelakuSedang }}</h1>
               </div>
               <div class="bg-green-400 w-full rounded-xl px-4 py-6 shadow-md">
                  <p class="text-white">Jumlah Pelaku Rendah</p>
                  <h1 class="text-white font-bold text-4xl lg:text-5xl">{{ $pelakuRendah }}</h1>
               </div>
            </div>
         </div>
      </div>
   </div>

   {{-- pie chart --}}
   <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
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


      <div id="column-chart"></div>
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

         <h1 class="text-xl py-4 font-semibold text-center">
            Perilaku Bullying Yang Sering Dipilih Siswa
         </h1>
         <ul>
            @if ($pertanyaanTerbanyak->jawaban_count == 0)
            <p class="text-center">Tidak Ada Jawaban Dipilih</p>
            @else
            @foreach ($tipePelaku as $tipe)
            @if ($tipe->jawaban_count == $pertanyaanTerbanyak->jawaban_count)
            <li>{{ $tipe->pertanyaan }} Dengan {{ $tipe->jawaban_count }} Jawaban </li>
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
@endsection