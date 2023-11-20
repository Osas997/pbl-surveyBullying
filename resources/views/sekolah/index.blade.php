@extends('layout.pages')
@section('title', 'Masuk')
@section('content')
<nav class="bg-white border-gray-200 dark:bg-gray-900 fixed w-screen z-10">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="{{route('index')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="{{asset('assets/img/blue-logo.png')}}" class="h-8" alt="Flowbite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Safe Schools</span>
      </a>
      <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="{{route('viewSekolah')}}" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
          </li>
          <li>
            <a href="{{route('logout')}}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
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