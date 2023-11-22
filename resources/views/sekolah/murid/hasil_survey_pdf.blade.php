<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   {{-- <style>
      .main {
         position: relative;
         height: 100%;
      }

      .container {
         margin-right: auto;
         margin-left: auto;
         padding-right: 1.5rem;
         padding-left: 1.5rem;
      }

      .mx-auto {
         margin-right: auto;
         margin-left: auto;
      }

      .px-4 {
         padding-right: 1rem;
         padding-left: 1rem;
      }

      .py-8 {
         padding-top: 2rem;
         padding-bottom: 2rem;
      }

      .text-center {
         text-align: center;
      }

      .font-semibold {
         font-weight: 600;
      }

      .mb-4 {
         margin-bottom: 1rem;
      }

      .flex {
         display: flex;
      }

      .gap-10 {
         gap: 2.5rem;
      }

      .left {
         margin-right: 2.5rem;
      }

      .right {
         margin-left: 2.5rem;
      }

      .text-xl {
         font-size: 1.25rem;
      }

      .mt-4 {
         margin-top: 1rem;
      }

      .nilai {
         display: flex;
         flex-direction: column;
         align-items: center;
      }

      .font-medium {
         font-weight: 500;
      }

      .text-base {
         font-size: 1rem;
      }

      .text-4xl {
         font-size: 2.25rem;
      }

      .rentan {
         margin-left: auto;
      }

      .text-yellow-400 {
         color: #f59e0b;
      }

      .text-green-400 {
         color: #10b981;
      }

      .text-red-500 {
         color: #ef4444;
      }

      .text-red-800 {
         color: #dc2626;
      }

      .text-base {
         font-size: 1rem;
      }

      .sm-text-1xl {
         font-size: 1.25rem;
      }

      .mt-4 {
         margin-top: 1rem;
      }
   </style> --}}
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
   <div class="container">
      <span>p</span>
      <span>p</span>
      {{-- <div class="row">
         <div class="col-2">
            <h1 class="judul">p</h1>
         </div>
         <div class="col-2">
            <h1 class="judul">p</h1>
         </div>
      </div> --}}
   </div>
   {{-- <main class="relative h-full ">
      <div class="container mx-auto px-4 py-8">
         @if ($murid)
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
                     @elseif ($murid->skor_total_korban >= 35 && $murid->skor_total_korban < 46) <span
                        class="text-red-500">
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
                     @elseif ($murid->skor_total_pelaku >= 35 && $murid->skor_total_pelaku < 46) <span
                        class="text-red-500">
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
               kecenderungan menjadi Korban bullying yang
               @if ($murid->skor_total_korban >= 35)
               <span class="text-red-500">Tinggi</span> Anda termasuk dalam kategori orang yang berpotensi
               tinggi menjadi korban Bullying. Anda cenderung mengalami tindakan-tindakan yang mengarah pada
               perilaku kekerasan dan membuat anda tersiksa.
               @elseif ($murid->skor_total_korban >= 24 && $murid->skor_total_korban < 35) <span
                  class="text-yellow-400">
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

            <h1 class="mt-4">Rekomendasi : </h1>
            <p>
               @if ($murid->skor_total_korban >= 35)
               Karena anda termasuk dalam kategori berpotensi <span class="text-red-500">Tinggi</span> menjadi
               Korban bullying, sebaiknya anda segera temui konselor anda dan mengkonsultasikan hal ini kepada
               konselor
               @elseif ($murid->skor_total_korban >= 24 && $murid->skor_total_korban < 35) Karena anda termasuk dalam
                  kategori berpotensi <span class="text-yellow-400">Sedang</span>
                  menjadi Korban bullying, anda dapat menemui konselor anda dan mengkonsultasikan hal ini kepada
                  konselor
                  @else
                  Karena anda termasuk dalam kategori berpotensi <span class="text-green-400">Rendah</span>
                  menjadi
                  Korban
                  bullying, untuk
                  lebih jelasnya silahkan menemui dan konsultasikan hal ini dengan konselor anda.
                  @endif
            </p>
            <p>Dan</p>
            <p>
               @if ($murid->skor_total_pelaku >= 35)
               Karena anda termasuk dalam kategori berpotensi <span class="text-red-500">Tinggi</span> menjadi
               Pelaku bullying, sebaiknya anda segera temui konselor anda dan mengkonsultasikan hal ini kepada
               konselor
               @elseif ($murid->skor_total_pelaku >= 24 && $murid->skor_total_pelaku < 35) Karena anda termasuk dalam
                  kategori berpotensi <span class="text-yellow-400">Sedang</span>
                  menjadi Pelaku bullying, anda dapat menemui konselor anda dan mengkonsultasikan hal ini kepada
                  konselor
                  @else
                  Karena anda termasuk dalam kategori berpotensi <span class="text-green-400">Rendah</span>
                  menjadi
                  Pelaku bullying, untuk
                  lebih jelasnya silahkan menemui dan konsultasikan hal ini dengan konselor anda.
                  @endif
            </p>
            @else
            <h1 class="text-center text-2xl">Silahkan Mengisi Angket Terlebih Dahulu</h1>
            @endif
         </div>
      </div>
   </main> --}}
</body>

</html>