@extends('layout.pages')
@section('title','Safe Schools')
@section('content')
<div class="w-screen h-screen overflow-x-hidden scroll-smooth">
    <div class=" ">
        {{-- nav --}}
        <nav class="bg-[#0090D4] border-gray-200 ">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="" class="flex items-center ">
                    <img src="{{ asset('assets/img/white-logo.png') }}" class="h-7 mr-3" alt="Survey Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Safe Schools</span>
                </a>
                <div class="flex md:order-2 md:ml-14">
                    <a href="{{ route('login') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</a>
                    <button data-collapse-toggle="navbar-cta" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-cta" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                    <ul
                        class="flex flex-col p-4 md:p-0 mt-4 font-medium border rounded-lg md:flex-row md:justify-between md:space-x-8 md:mt-0 md:border-0  ">
                        <li>
                            <a href="#home"
                                class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:font-semibold md:p-0 "
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#offer"
                                class="block py-2 pl-3 pr-4 text-white rounded md:font-normal hover:bg-sky-600 md:hover:bg-transparent md:hover:text-blue-800 duration-300 ease-in-out md:p-0">Offer</a>
                        </li>
                        <li>
                            <a href="#about"
                                class="block py-2 pl-3 pr-4 text-white rounded md:font-normal hover:bg-sky-600 md:hover:bg-transparent md:hover:text-blue-800 duration-300 ease-in-out md:p-0">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        {{-- Hero --}}
        <section class=" px-4 py-10 bg-[#0090D4]  w-full " id="home">
            <div class="max-w-screen-xl  mx-auto p-4">
                <div class="flex justify-center items-start ">
                    <div class="flex-1">
                        <h1 class="text-3xl text-white font-semibold 
                        md:text-xl
                        lg:text-3xl
                        xl:text-[2.75rem] xl:leading-[3rem]">Tingkatkan Lingkungan Aman dan Bebas Perundungan Bersama
                            Kami!</h1>
                        <div class="w-3/4">
                            <p class="text-base text-white font-normal mt-4 
                            md:text-sm
                            lg:text-base
                            xl:text-lg">"Mari bersama-sama menciptakan lingkungan yang aman dan bebas dari
                                perundungan."</p>
                        </div>
                        <a href="">
                            <div class=" w-1/2 flex justify-center items-center gap-2 text-white cursor-pointer duration-300 ease-in-out bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xl px-5 py-2 text-center sm:text-lg sm:px-4 sm:py-1 mt-4
                            sm:w-4/12 
                            md:w-5/12
                            lg:w-4/12
                            xl:w-4/12">
                                <span class="whitespace-nowrap
                                md:text-sm">Ayo Survey</span>
                                <div class="w-8 h-8">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        stroke="#ffffff">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M6 12H18M18 12L13 7M18 12L13 17" stroke="#ffffff" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <h1 class="text-lg text-white font-normal mt-4">Responded</h1>
                        <p class=" text-3xl font-semibold text-white"> 164+ <span
                                class="text-2xl font-normal">Siswa</span></p>

                    </div>
                    <div class="hidden md:flex justify-center items-center flex-1 ">
                        <img src="{{asset('assets/img/smp.jpg')}}" alt="" srcset=""
                            class="lg:w-[450px] xl:w-[550px] rounded-2xl ">
                    </div>
                </div>
            </div>
        </section>
        {{-- Card --}}
        <section class="pt-10 px-4 pb-10 bg-white" id="offer">
            <div class="max-w-screen-xl  mx-auto p-4 ">
                <h1 class="text-center text-black font-semibold text-3xl mb-8">Apa Yang Kami Berikan</h1>
                <div class="grid grid-col-1 sm:grid-cols-2 justify-center items-center gap-4 ">
                    <div class="flex justify-center items-center h-full w-full  mb-4">
                        <img src="{{asset('assets/img/bk-vector.jpg')}}" alt="" srcset=""
                            class="w-10/12 h-auto sm:w-full md:w-full lg:w-9/12 xl:w-8/12">
                    </div>
                    <div class="w-full lg:w-9/12">
                        <h1 class="text-xl text-black font-semibold mb-2">Bangun Keamanan dan Kenyamanan Belajar di
                            Sekolah Bersama Guru BK </h1>
                        <p class="text-base text-gray-500">Keamanan dan kenyamanan adalah pondasi penting dalam
                            lingkungan belajar. Temukan bagaimana hubungan erat antara konseling dan guru BK dapat
                            membantu menciptakan sekolah yang aman dan nyaman bagi semua siswa. Tolak Perundungan
                            Bersama-sama</p>
                    </div>
                </div>

            </div>
        </section>
        {{-- card join --}}
        <section class="px-4 pb-10 bg-white" id="about">
            <div class="max-w-screen-xl  mx-auto p-4 flex justify-center items-center">
                <div class="w-full px-4 py-8 text-center bg-[#0062CE] rounded-[32px] border border-gray-200 shadow sm:p-10
                lg:w-5/6
                lg:py-16">
                    <h5 class="mb-4 text-3xl font-bold text-white 
                    md:text-xl">Join Our Survey</h5>
                    <p class="mb-6 text-base text-gray-100 sm:text-lg
                    md:text-base ">"Tolak Perundungan: Bersama-sama Kita Hentikan Tindakan Merugikan Ini!"</p>
                    <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('login') }}" class="w-1/2  bg-white hover:bg-slate-100  focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 
                        md:w-5/12">
                            <p class="text-base text-[#0062CE] font-semibold">Login Now</p>
                        </a>
                    </div>
                </div>
            </div>

        </section>

        {{-- Footer --}}
        <footer class="bg-slate-900 px-4 py-6 ">
            <div class="max-w-screen-xl  mx-auto p-4">
                <h1 class="text-white text-2xl mb-8 
                md:text-xl
                lg:text-2xl">Survey App</h1>
                <h1 class="text-white text-xl text-center mb-3 
                md:text-lg
                lg:text-xl">Bebaskan Perundungan Bersama Kami</h1>
                <p class="text-slate-100 text-base text-center mb-10
                lg:text-lg">"Mari bersama-sama menciptakan lingkungan yang aman dan bebas dari perundungan."</p>
                <p class=" text-slate-300 text-xs text-center
                lg:text-sm">© 2023 SurveyApp. All Rights Reserved. </p>
            </div>
        </footer>
    </div>

    @endsection




    {{-- <input type="hidden" value="1" name="survey[0][pertanyaan]">
    <input type="text" name="survey[0][jawaban]">

    <input type="hidden" value="1" name="survey[1][pertanyaan]"> --}}
    {{-- <input type="text" name="survey[1][jawaban]"> --}}
    {{-- <input type="file" name="exel">

    <button type="submit">kirim</button>
    </form> --}}