@extends('layout.pages')
@section('title', 'Data Diri')
@section('content')
<h1>Hello Wolrd</h1>
<form action="{{ route('murid.signup') }}">
   @csrf
   <input type="text" name="nama_murid" placeholder="Nama Murid">
   <input type="text" name="nisn" placeholder="NISN">
   <input type="text" name="kelas" placeholder="Kelas">
   <select name="jenis_kelamin" id="">
      <option value="laki-laki">Laki-laki</option>
      <option value="perempuan">Perempuan</option>
   </select>
   <button class="text-indigo-600" type="submit">Daftar</button>
</form>
@endsection