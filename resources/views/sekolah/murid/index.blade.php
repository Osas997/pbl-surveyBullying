@extends('layout.pages')
@section('title', 'Siswa Survey')
@section('content')
    <div class="w-full min-h-screen  overflow-x-hidden scroll-smooth pt-10 ">
        <div class="section-1 max-w-screen-xl mx-auto px-4 flex flex-col  md:justify-between md:flex-row-reverse md:gap-4 md:px-8 lg:px-10 lg:justify-around lg:gap-0">
            <div class="flex justify-center items-center">
                <img src="{{asset('assets/img/bahaya-bully.png')}}" alt="" srcset="" class="w-3/4 md:w-10/12 lg:mr-24">        
            </div>
            <div class="w-full md:w-6/12">
                <h1 class="text-xl font-semibold mt-8 lg:text-2xl"><span class="text-red-400">Bahaya</span> Bullying</h1>
                <p class="text-base mt-2 lg:text-lg">Bullying bukan sekadar tindakan yang tidak menyenangkan, itu adalah ancaman serius yang menghancurkan kesehatan mental, emosional, dan fisik. Dari ejekan verbal hingga intimidasi online, dampaknya dapat terasa jauh dan luas. Dalam ketidakpastian dan rasa takut, korban sering kali merasa terisolasi, kehilangan kepercayaan diri, bahkan mengalami gangguan psikologis yang berkepanjangan.
            </div>
        </div>
        <div class="section-2 max-w-screen-xl mx-auto  px-4  flex flex-col md:justify-between md:flex-row md:gap-8 md:px-8 mt-10 lg:justify-around">
            <div class="flex justify-center items-center">
                <img src="{{asset('assets/img/stop-bully.png')}}" alt="" srcset="" class="w-full lg:scale-125">        
            </div>
            <div class="w-full md:w-5/12 lg:w-4/12">
                <h1 class="text-xl font-semibold mt-4 lg:text-2xl"><span class="text-red-400">Ayo Lawan</span> Aksi Bullying</h1>
                <p class="text-base mt-2 lg:text-lg">Tidak ada yang diuntungkan dari aksi bullying. Setiap kata kasar, ejekan, atau tindakan intimidasi adalah hal yang tidak baik. <span class="text-red-400">"Ayo Lawan!"</span>  Kami percaya bahwa dengan bersatu, kita dapat memerangi aksi buruk ini. 
            </div>
        </div>
        
        <div class="section-3 max-w-screen-xl mx-auto mt-20 px-4 flex flex-col md:justify-between md:flex-row-reverse md:gap-8 lg:justify-around">
            <div class="flex justify-center items-center">
                <img src="{{asset('assets/img/smp-index.png')}}" alt="" srcset="" class="w-full rounded-3xl">        
            </div>
            <div class="w-full md:w-5/12 ">
                <p class="text-base text-center mt-8 font-semibold lg:text-lg">“Saling hormat bukan hanya sebuah kebiasaan, tetapi pilihan sadar untuk menciptakan masyarakat yang adil dan penuh kasih. Saat kita menghargai perbedaan dan mendukung satu sama lain, kita membuka pintu untuk perdamaian sejati. Mari bersama-sama menjadikan rasa hormat sebagai tonggak utama dalam setiap interaksi kita, karena di dalamnya terletak kunci untuk menciptakan dunia yang indah bersama”
            </div>
        </div>
        <div class="section-4 w-screen  mt-20 bg-blue-100 pt-6 md:pt-10">
            <h1 class="text-base text-center font-semibold whitespace-nowrap mb-5 md:text-lg">Perjalanan Melawan Bullying dalam Video Pendek</h1>
            <div class="flex justify-center items-center">
                <iframe class="lg:max-w-screen-md aspect-video rounded-xl mb-10 md:w-3/4" src="https://www.youtube.com/embed/QhNpc3S7nFg" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="flex justify-center items-cente px-4">
                <div class="w-full md:w-1/4 ">
                    <a href="{{ route('viewSurvey') }}" class="flex justify-center items-center font-semibold bg-blue-500 w-full py-4 mt-8 mb-14 rounded-xl text-white hover:bg-[#0090D4] transition-colors duration-300 ease-in-out cursor-pointer">
                        <span>
                            Mulai Survey 
                        </span>
                    </a>
                </div>
            </div>
            
        </div>
    </div>
@endsection
