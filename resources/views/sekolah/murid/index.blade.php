@extends('layout.pages')
@section('title', 'Siswa Survey')
@section('content')
<nav class="bg-[#0090D4] border-gray-200 dark:bg-gray-900 fixed w-screen z-10">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="{{route('index')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="{{asset('assets/img/blue-logo.png')}}" class="h-8" alt="Flowbite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Safe Schools</span>
      </a>
      <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="{{route('viewSekolah')}}" class="block py-2 px-3 text-white md:hover:text-blue-600 duration-300 rounded md:bg-transparent md:text-gray-50 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
          </li>
          <li>
            <a href="{{route('logout')}}" class="block py-2 px-3 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 duration-300 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<div class="w-full min-h-screen  overflow-x-hidden scroll-smooth pt-10 ">
    <div
        class="section-1 max-w-screen-xl mx-auto px-4 flex flex-col  md:justify-between md:flex-row-reverse md:gap-4 md:px-8 lg:px-10 lg:justify-around lg:gap-0 mt-20">
        <div class="flex justify-center items-center">
            <img src="{{asset('assets/img/bahaya-bully.png')}}" alt="" srcset="" class="w-3/4 md:w-10/12 lg:mr-24">
        </div>
        <div class="w-full md:w-6/12">
            <h1 class="text-xl font-semibold mt-8 lg:text-2xl"><span class="text-red-400">Bahaya</span> Bullying</h1>
            <p class="text-base mt-2 lg:text-lg">Bullying bukan sekadar tindakan yang tidak menyenangkan, itu adalah
                ancaman serius yang menghancurkan kesehatan mental, emosional, dan fisik. Dari ejekan verbal hingga
                intimidasi online, dampaknya dapat terasa jauh dan luas. Dalam ketidakpastian dan rasa takut, korban
                sering kali merasa terisolasi, kehilangan kepercayaan diri, bahkan mengalami gangguan psikologis yang
                berkepanjangan.
        </div>
    </div>
    <div
        class="section-2 max-w-screen-xl mx-auto  px-4  flex flex-col md:justify-between md:flex-row md:gap-8 md:px-8 mt-10 lg:justify-around">
        <div class="flex justify-center items-center">
            <img src="{{asset('assets/img/stop-bully.png')}}" alt="" srcset="" class="w-full lg:scale-125">
        </div>
        <div class="w-full md:w-5/12 lg:w-4/12">
            <h1 class="text-xl font-semibold mt-4 lg:text-2xl"><span class="text-red-400">Ayo Lawan</span> Aksi Bullying
            </h1>
            <p class="text-base mt-2 lg:text-lg">Tidak ada yang diuntungkan dari aksi bullying. Setiap kata kasar,
                ejekan, atau tindakan intimidasi adalah hal yang tidak baik. <span class="text-red-400">"Ayo
                    Lawan!"</span> Kami percaya bahwa dengan bersatu, kita dapat memerangi aksi buruk ini.
        </div>
    </div>

    <div
        class="section-3 max-w-screen-xl mx-auto mt-20 px-4 flex flex-col md:justify-between md:flex-row-reverse md:gap-8 lg:justify-around">
        <div class="flex justify-center items-center">
            <img src="{{asset('assets/img/smp-index.png')}}" alt="" srcset="" class="w-full rounded-3xl">
        </div>
        <div class="w-full md:w-5/12 ">
            <p class="text-base text-center mt-8 font-semibold lg:text-lg">“Saling hormat bukan hanya sebuah kebiasaan,
                tetapi pilihan sadar untuk menciptakan masyarakat yang adil dan penuh kasih. Saat kita menghargai
                perbedaan dan mendukung satu sama lain, kita membuka pintu untuk perdamaian sejati. Mari bersama-sama
                menjadikan rasa hormat sebagai tonggak utama dalam setiap interaksi kita, karena di dalamnya terletak
                kunci untuk menciptakan dunia yang indah bersama”
        </div>
    </div>
    <div class="section-4 w-screen  mt-20 bg-blue-100 pt-6 md:pt-10">
        <h1 class="text-base text-center font-semibold whitespace-nowrap mb-5 md:text-lg">Perjalanan Melawan Bullying
            dalam Video Pendek</h1>
        <div class="mx-auto max-w-screen-xl grid grid-cols-1 md:grid-cols-2 justify-center items-center md:gap-10">
            <div class="flex justify-center md:justify-end items-center ">
                <iframe class="lg:max-w-screen-md aspect-video rounded-xl mb-10 md:w-3/4"
                        src="https://www.youtube.com/embed/r8tCRia5-pc" frameborder="0" allowfullscreen>
                </iframe>

            </div>
            <div class="flex justify-center md:justify-start items-center ">
                <iframe class="lg:max-w-screen-md aspect-video rounded-xl mb-10 md:w-3/4"
                        src="https://www.youtube.com/embed/xe7DMppV-po" frameborder="0" allowfullscreen>
                </iframe>

            </div>
        </div>
        <div class="flex justify-center items-center px-4 gap-8">
            <div class="w-full md:w-1/4 ">
                <a href="{{ route('viewSurvey') }}"
                    class="flex justify-center items-center font-semibold bg-blue-500 w-full py-4 mt-8 mb-14 rounded-xl text-white hover:bg-[#0090D4] transition-colors duration-300 ease-in-out cursor-pointer">
                    <span>
                        Mulai Survey
                    </span>
                </a>
            </div>
            @if ($murid)
            <div class="w-full md:w-1/4 ">
                <a href="{{ route('murid.hasilpelaku') }}"
                    class="flex justify-center items-center font-semibold bg-blue-500 w-full py-4 mt-8 mb-14 rounded-xl text-white hover:bg-[#0090D4] transition-colors duration-300 ease-in-out cursor-pointer">
                    <span>
                        Back to Hasil Survey
                    </span>
                </a>
            </div>
            @endif
        </div>

    </div>
</div>
@endsection