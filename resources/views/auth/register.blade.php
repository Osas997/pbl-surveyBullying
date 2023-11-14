@extends('layout.pages')
@section('title', 'Register')
@section('content')
<div>
   <div class="bg-[#0090D4] w-screen h-screen overflow-x-hidden ">
      <div class=" w-full sm:cointainer">
         <div class="flex justify-center items-center">
            <div
               class="sm:bg-white bg-gray-100 w-screen h-screen px-16 flex flex-col items-center justify-center sm:my-6 sm:max-w-[550px] sm:rounded-[40px] sm:h-full">
               <div class="flex justify-center items-center mt-12 mb-8 ">
                  <img src="{{ asset('assets/img/kemdigbud.png') }}" alt="" srcset="" class="w-16 h-16">
               </div>
               <h2 class="text-center font-semibold text-2xl text-black">Daftarkan Sekolah</h2>
               <p class="text-center font-medium text-sm mb-8 text-gray-800">Masukan Beberapa Infomasi Sekolah
                  dibawah ini </p>
               @if (session()->has('loginError'))
               <div id="alert-2"
                  class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                  role="alert">
                  <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor" viewBox="0 0 20 20">
                     <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                  </svg>
                  <span class="sr-only">Info</span>
                  <div class="ml-3 text-sm font-medium">
                     <span>{{ session('loginError') }}</span>
                  </div>
                  <button type="button"
                     class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                     data-dismiss-target="#alert-2" aria-label="Close">
                     <span class="sr-only">Close</span>
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                     </svg>
                  </button>
               </div>
               @endif

               <form action="{{ route('register') }}" method="post">
                  @csrf
                  <div class="form-group min-w-[280px] sm:min-w-[330px]">
                     <p class="font-semibold text-black mb-1">Nama Sekolah</p>
                     <input autocomplete="off" type="text" placeholder="Masukan Nama Sekolah" name="nama_sekolah" class="input input-bordered bg-transparent rounded-md
                               @error('nama_sekolah')
                               border-red-600 @else border-[#0090D4]
                               @enderror 
                               w-full max-w-xs border-2  focus:border-[#0090D4] focus:outline-none text-black "
                        value="{{ old('nama_sekolah') }}" />
                  </div>
                  @error('nama_sekolah')
                  <div class="">
                     <p class="text-red-500 text-sm italic">{{ $message }}</p>
                  </div>
                  @enderror

                  <div class="form-group mt-4 min-w-[280px] sm:min-w-[330px]">
                     <p class="font-semibold text-black mb-1">NPSN</p>
                     <input type="text" placeholder="Masukan NPSN" name="npsn" class="input input-bordered bg-transparent w-full max-w-xs border-2 focus:border-[#0090D4] focus:outline-none text-black   rounded-md
                           @error('npsn')
                           border-red-600 @else border-[#0090D4]
                           @enderror " value="{{ old('npsn') }}" />
                  </div>
                  @error('npsn')
                  <div class="">
                     <span class="text-red-500 align-start italic text-sm">{{ $message }}</span>
                  </div>
                  @enderror

                  <div class="form-group mt-4 min-w-[280px] sm:min-w-[330px]">
                     <p class="font-semibold text-black mb-1">Alamat Sekolah</p>
                     <input type="text" placeholder="Alamat Sekolah" name="alamat_sekolah" class="input input-bordered bg-transparent w-full max-w-xs border-2 focus:border-[#0090D4] focus:outline-none text-black   rounded-md
                         @error('alamat_sekolah')
                         border-red-600 @else border-[#0090D4]
                         @enderror " value="{{ old('alamat_sekolah') }}" />
                  </div>
                  @error('alamat_sekolah')
                  <div class="">
                     <span class="text-red-500 align-start italic text-sm">{{ $message }}</span>
                  </div>
                  @enderror

                  {{-- Select --}}

                  <div class="form-group mt-4 min-w-[280px] sm:min-w-[330px]">
                     <p class="font-semibold text-black mb-1 ">Status</p>
                     <select name="status" class="bg-transparent w-full max-w-xs border-2 focus:border-[#0090D4] focus:outline-none text-black   rounded-md
                     @error('alamat_sekolah')
                     border-red-600 @else border-[#0090D4]
                     @enderror ">
                        <option value="negeri">negeri</option>
                        <option value="swasta">swasta</option>
                     </select>
                  </div>
                  @error('status')
                  <div class="">
                     <span class="text-red-500 align-start italic text-sm">{{ $message }}</span>
                  </div>
                  @enderror

                  {{-- passowrd --}}
                  <div class="form-group mt-4 min-w-[280px] sm:min-w-[330px]">
                     <p class="font-semibold text-black mb-1">Password</p>
                     <input type="password" placeholder="Password" name="password" class="input input-bordered bg-transparent w-full max-w-xs border-2 focus:border-[#0090D4] focus:outline-none text-black   rounded-md
                         @error('password')
                         border-red-600 @else border-[#0090D4]
                         @enderror " value="{{ old('password') }}" />
                  </div>
                  @error('password')
                  <div class="">
                     <span class="text-red-500 align-start italic text-sm">{{ $message }}</span>
                  </div>
                  @enderror

                  {{-- pin guru --}}
                  <div class="form-group mt-2 min-w-[280px] sm:min-w-[330px]">
                     <p class="font-semibold text-black mb-1">Pin Guru</p>
                     <input type="password" placeholder="Pin Guru" name="pin_guru" class="input input-bordered bg-transparent w-full max-w-xs border-2 focus:border-[#0090D4] focus:outline-none text-black   rounded-md
                         @error('pin_guru')
                         border-red-600 @else border-[#0090D4]
                         @enderror " value="{{ old('pin_guru') }}" />
                  </div>
                  @error('pin_guru')
                  <div class="">
                     <span class="text-red-500 align-start italic text-sm">{{ $message }}</span>
                  </div>
                  @enderror


                  <div class="flex  text-sm mt-2">
                     <p class="mr-1">Sudah Memiliki Akun?</p>
                     <a href="{{ route('login') }}"><span class="text-blue-500 font-medium">login Akun</span></a>
                  </div>
                  <button type="submit"
                     class="block bg-blue-500 w-full py-4 mt-8 mb-14 rounded-full text-white hover:bg-[#0090D4] transition-colors duration-300 ease-in-out">Register</button>

               </form>

            </div>
         </div>
      </div>
   </div>
</div>
{{-- <form action="{{ route('register') }}" method="POST">
   @csrf
   <input type="text" name="nama_sekolah" placeholder="Nama Sekolah">
   <input type="text" name="npsn" placeholder="NPSN">
   <input type="text" name="alamat_sekolah" placeholder="Alamat">
   <select name="status">
      <option value="negeri">negeri</option>
      <option value="swasta">swasta</option>
   </select>
   <input type="password" name="password" placeholder="password">
   <input type="password" name="pin_guru" placeholder="PIN GURU">
   <button type="submit">Register</button>
</form> --}}
</div>
@endsection