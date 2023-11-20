@extends('layout.pages')
@section('title', 'Masuk')
@section('content')
<div class="flex justify-center items-center h-screen bg-[#0090D4] overflow-x-hidden">
    <div class="flex flex-col items-center">
        
        <h1 class="text-3xl font-semibold text-white text-center">Selamat Datang di Sekolah </h1>
        <h1 class="text-3xl font-semibold text-white text-center mb-6">{{
            strtoupper(auth('sekolah')->user()->nama_sekolah) }}</h1>


        <h1 class="text-1xl text-slate-100 mb-4 ">Silahkan Pilih Login Sebagai</h1>
        <div class="flex justify-center items-center gap-10 flex-col md:flex-row">
            <a href="{{route('viewLoginGuru')}}">
                <div
                    class="group bg-white w-[200px] h-[200px] md:w-[240px] md:h-[240px] rounded-2xl p-4 flex justify-center items-center hover:bg-gray-200 transition duration-300 ease-in-out cursor-pointer hover:scale-105">
                    <div class="flex justify-center items-center flex-col">
                        <div class="flex justify-center items-center">
                            <img src="{{ asset('assets/img/teacher.png') }}" alt="" srcset=""
                                class="w-[150px] h-[150px] md:w-[180px] md:h-[180px] ">
                        </div>
                        <p class="font-medium text-xl mt-2 text-gray-800">Guru</p>
                    </div>
                </div>
            </a>

            <a href="{{route('murid.welcome')}}">
                <div
                    class="group bg-white w-[200px] h-[200px] md:w-[240px] md:h-[240px] rounded-2xl p-4 flex justify-center items-center hover:bg-gray-200 transition duration-300 ease-in-out cursor-pointer  hover:scale-105">
                    <div class="flex justify-center items-center flex-col">
                        <div class="flex justify-center items-center mt-3">
                            <img src="{{ asset('assets/img/student.png') }}" alt="" srcset=""
                                class="w-[120px] h-[120px] md:w-[150px] md:h-[150px] ">
                        </div>
                        <p class="font-medium text-xl mt-4 text-gray-800">Siswa</p>
                    </div>
                </div>
            </a>



        </div>
    </div>
</div>
</div>
</div>
@endsection