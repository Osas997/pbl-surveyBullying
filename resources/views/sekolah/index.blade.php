@extends('layout.pages')
@section('title', 'Masuk')
@section('content')
    <div class="flex justify-center items-center h-screen bg-[#0090D4] overflow-x-hidden">
        <div class="flex flex-col items-center">
            <h1 class="text-3xl font-semibold text-white text-center">Selamat Datang di Sekolah </h1>
            <h1 class="text-3xl font-semibold text-white text-center mb-6">{{ strtoupper(auth('sekolah')->user()->nama_sekolah) }}</h1>

            <h1 class="text-1xl text-slate-100 mb-4 ">Silahkan Pilih Login Sebagai</h1>
            
            <div class="flex justify-center items-center gap-10">
                <div class="w-100 bg-white rounded-2xl p-4">
                    <div class="flex justify-center items-center flex-col">
                        <div class="w-32 h-auto">
                           <img src="{{asset('assets/img/teacher.png')}}" alt="" srcset="">
                        </div>
                        <p class="font-medium text-xl mt-2 text-gray-800">Guru</p>
                    </div>
                </div>
                <div class="w-100 bg-white rounded-2xl p-4">
                    <div class="flex justify-center items-center flex-col">
                        <div class="w-32 h-auto">
                           <img src="{{asset('assets/img/student.png')}}" alt="" srcset="">
                        </div>
                        <p class="font-medium text-xl mt-2 text-gray-800">Siswa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
