@extends('layout.pages')
@section('title', 'Data Diri')
@section('content')

<div class="bg-[#0090D4] w-screen h-screen overflow-x-hidden ">
   <div class=" w-full sm:cointainer">
      <div class="flex justify-center items-center">
         <div
            class="sm:bg-white bg-gray-100 w-screen h-screen px-16 flex flex-col items-center justify-center sm:my-6 sm:max-w-[550px] sm:rounded-[40px] sm:h-full py-16">
            <h2 class="text-start font-semibold text-3xl text-black">Data Diri Siswa</h2>
            <p class="text-start font-medium text-sm mb-8 text-gray-800">Masukan Data Diri Siswa Dengan Benar</p>
            <form action="{{ route('murid.signup') }}" method="POST">
               @csrf
               <div class="form-group min-w-[280px] sm:min-w-[330px] mb-4">
                  <p class="font-semibold text-black mb-1">Nama Murid</p>
                  <input autocomplete="off" type="text" placeholder="Masukan Nama Murid" name="nama_murid" class="input input-bordered bg-transparent rounded-md
                            @error('nama_murid')
                            border-red-600 @else border-[#0090D4]
                            @enderror 
                            w-full max-w-xs border-2  focus:border-[#0090D4] focus:outline-none text-black "
                     value="{{old('nama_murid')}}" />
               </div>
               @error('nama_murid')
               <div class="mt-2">
                  <p class="text-red-500 text-sm italic">{{ $message }}</p>
               </div>
               @enderror
               <div class="form-group min-w-[280px] sm:min-w-[330px] mb-4">
                  <p class="font-semibold text-black mb-1">NISN</p>
                  <input autocomplete="off" type="text" placeholder="Masukan NISN" name="nisn" class="input input-bordered bg-transparent rounded-md
                            @error('nisn')
                            border-red-600 @else border-[#0090D4]
                            @enderror 
                            w-full max-w-xs border-2  focus:border-[#0090D4] focus:outline-none text-black "
                     value="{{old('nisn')}}" />
               </div>
               @error('nisn')
               <div class="mt-2">
                  <p class="text-red-500 text-sm italic">{{ $message }}</p>
               </div>
               @enderror
               <div class="form-group min-w-[280px] sm:min-w-[330px] mb-4">
                  <p class="font-semibold text-black mb-1">Kelas</p>
                  <input autocomplete="off" type="text" placeholder="Masukan Kelas" name="kelas" class="input input-bordered bg-transparent rounded-md
                            @error('kelas')
                            border-red-600 @else border-[#0090D4]
                            @enderror 
                            w-full max-w-xs border-2  focus:border-[#0090D4] focus:outline-none text-black "
                     value="{{old('kelas')}}" />
               </div>
               @error('kelas')
               <div class="mt-2">
                  <p class="text-red-500 text-sm italic">{{ $message }}</p>
               </div>
               @enderror
               <div class="form-group mt-4 min-w-[280px] sm:min-w-[330px]">
                  <p class="font-semibold text-black mb-1 ">Jenis Kelamin</p>
                  <select name="jenis_kelamin" class="bg-transparent w-full max-w-xs border-2 focus:border-[#0090D4] focus:outline-none text-black   rounded-md
                  @error('alamat_sekolah')
                  border-red-600 @else border-[#0090D4]
                  @enderror ">
                     <option value="l">Laki-laki</option>
                     <option value="p">Perempuan</option>
                  </select>
               </div>
               <button type="submit"
                  class="block bg-blue-500 w-full py-4 mt-8 mb-14 rounded-full text-white hover:bg-[#0090D4] transition-colors duration-300 ease-in-out">Kirim</button>

            </form>
         </div>
      </div>
   </div>
</div>


{{-- <form action="{{ route('murid.signup') }}" method="POST">
   @csrf
   <input type="text" name="nama_murid" placeholder="Nama Murid">
   <input type="text" name="nisn" placeholder="NISN">
   <input type="text" name="kelas" placeholder="Kelas">
   <select name="jenis_kelamin" id="">
      <option value="laki-laki">Laki-laki</option>
      <option value="perempuan">Perempuan</option>
   </select>
   <button class="text-indigo-600" type="submit">Daftar</button>
</form> --}}
@endsection