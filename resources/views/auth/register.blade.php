@extends('layout.pages')
@section('title','Register')
@section('content')
<div>
   <form action="{{ route('register') }}" method="POST">
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
   </form>
</div>
@endsection