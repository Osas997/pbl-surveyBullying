@extends('layout.pages')
@section('title','Hasil Survey Pelaku')
@section('content')
<div class="w-full bg-[#0090D4] min-h-screen overflow-x-hidden scroll-smooth ">
    <div class="w-full  md:w-8/12 mx-auto px-10 mt-10">
        <div class="w-full bg-white mx-auto p-8 rounded shadow-md">
            <div class="px-20">
                <div class="flex justify-between">

                    <a href="{{route('murid.hasilpelaku')}}">
                        <div class="bg-blue-500 w-[120px] md:w-[240px] flex justify-center items-center py-4 mt-8 mb-14 rounded-lg text-white hover:underline">
                            <span>
                                Pelaku
                            </span>
                        </div>
                    </a>
                    <a href="{{route('murid.hasilkorban')}}">
                        
                        <div class=" w-[120px] md:w-[240px]  flex justify-center items-center py-4 mt-8 mb-14 rounded-lg text-black hover:underline">
                            <span>
                                Korban
                            </span>
                        </div>
                    </a>
                    
                </div>
            </div>
            {{-- <h1 class="font-semibold text-lg md:text-xl mb-6">Pelaku</h1> --}}
            <h1 class="text-center font-semibold text-base mb-4">Hasil Inventory Potensi Menjadi Pelaku Bullying</h1>
            <div class="flex gap-10">
                <div class="left">
                    <p>Nama</p>
                    <p>Kelas</p>
                    <p>Sekolah</p>
                    <p>Tanggal Lahir</p>
                </div>
                <div class="right">
                    <p>: Paijo</p>
                    <p>: XII B</p>
                    <p>: SMP 1 Banyuwangi</p>
                    <p>: 12 September 2005</p>
                </div>
            </div>
            <div class="flex justify-center items-center flex-col gap-2 mt-4">
                <p class="text-center font-medium text-base">Nilai Anda</p>
                <h2 class="text-center font-semibold text-4xl">30</h2>
            </div>
            <h1>Rentang Nilai : </h1>
            <div class="flex gap-4">
                <div class="left">
                    <p class="font-medium">Skor 30 - 74,5</p>
                    <p class="font-medium" >Skor 75 - 120</p>
                </div>
                <div class="right">
                    <p class="font-medium text-green-400"> : Berpontesi Rendah</p>
                    {{-- jika nilai sedang --}}
                    {{-- <p class="font-medium text-amber-400"> : Berpontesi Sedang</p> --}}
                    {{-- jika nilai tinggi --}}
                    {{-- <p class="font-medium text-red-500"> : Berpontesi Tinggi</p> --}}
                    <p class="font-medium"> : Berpotensi Tinggi</p>
                </div>
            </div>
         
            <h1 class="mt-4">Interpretasi :</h1>
            <p class="font-medium">Anda Termasuk dalam kategory siswa yang berpotensi rendah menjadi pelaku bully <br>
                Sebagian tindakan anda mencerminkan pelaku bully, tetapi masih dalam taraf rendah</p>

            <h1 class="mt-4">Rekomendasi : </h1>
            <p class="font-medium">Karena Anda termasuk dalam kategori potensi rendah, untuk lebih jelasnya silahkan temui dan konsultasi
                hal ini dengan konselor anda</p>
            
            {{-- print --}}
            <div class="flex justify-center items-center">
                <a href="{{route('murid.hasilpelaku.print')}}">
                    <div
                        class="bg-blue-500 w-[60px] md:w-[180px]  flex justify-center items-center py-4 mt-8 mb-14 rounded-lg text-white hover:bg-[#0090D4] transition-colors duration-300 ease-in-out">
                        <span>
                            Print
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>

</div>
@endsection