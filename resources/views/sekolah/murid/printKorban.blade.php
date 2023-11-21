@extends('layout.pages')
@section('title','Hasil Survey Korban')
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
        <p class="text-xl font-semibold mt-4" >Kecenderungan menjadi Korban Bullying</p>
        <div class="flex gap-14 ">
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

        <p class="text-xl font-semibold mt-4" >Kecenderungan menjadi Pelaku Bullying</p>
        <div class="flex gap-14">
            <div class="nilai">
                <p class="font-medium text-base">Nilai Anda</p>
                <h2 class="font-semibold text-4xl">{{ $murid->skor_total_pelaku }}</h2>
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
            @elseif ($murid->skor_total_korban >= 24 && $murid->skor_total_korban < 35)
                <span class="text-yellow-300-400">Sedang</span> Anda termasuk dalam kategori orang yang
                berpotensi sedang menjadi korban Bullying. Anda cenderung mengalami tindakan-tindakan yang
                mengarah pada perilaku kekerasan dan membuat anda tersiksa
            @else
                <span class="text-green-400">Rendah</span> Anda termasuk dalam kategori orang yang berpotensi
                Rendah menjadi korban Bullying. Anda terkadang mengalami tindakan-tindakan yang membuat anda
                tersakiti.
            @endif
        </p>
        <p class="text-base sm:text-1xl mb-1">
            @if ($murid->skor_total_pelaku >= 35)
                Dan anda berpotensi tinggi menjadi pelaku
                bullying. Anda cenderung untuk melakukan Tindakan-tindakan yang mengarah pada perilaku kekerasan
                sehingga membuat korban anda merasa tersakiti dan tersiksa
            @elseif ($murid->skor_total_pelaku >= 24 && $murid->skor_total_pelaku < 35)
                <span class="text-yellow-300-400">Sedang</span> Dan anda berpotensi sedang menjadi pelaku
                bullying. Sebagian Tindakan anda mencerminkan perilaku bullying yang dapat membuat korban anda
                merasa tersakiti.
            @else
                <span class="text-green-400">Rendah</span> Dan anda berpotensi rendah menjadi pelaku bullying.
                Sebagian Tindakan anda mencerminkan perilaku bullying tetapi masih dalam taraf rendah
            @endif
        </p>

        <h1 class="mt-4">Rekomendasi : </h1>
        <p>
            @if ($murid->skor_total_korban >= 35)
                Karena anda termasuk dalam kategori berpotensi <span class="text-red-500">Tinggi</span> menjadi
                Korban bullying, sebaiknya anda segera temui konselor anda dan mengkonsultasikan hal ini kepada
                konselor
            @elseif ($murid->skor_total_korban >= 24 && $murid->skor_total_korban < 35)
                Karena anda termasuk dalam kategori berpotensi <span class="text-yellow-300-400">Sedang</span>
                menjadi Korban bullying, anda dapat menemui konselor anda dan mengkonsultasikan hal ini kepada
                konselor
            @else
                Karena anda termasuk dalam kategori berpotensi <span class="text-green-400">Rendah</span>, untuk
                lebih jelasnya silahkan menemui dan konsultasikan hal ini dengan koselor anda.
            @endif
        </p>

    </div>
    <script>
        window.print()
    </script>
    {{-- @else
    belum mengisi survey
    @endif --}}
    @endsection