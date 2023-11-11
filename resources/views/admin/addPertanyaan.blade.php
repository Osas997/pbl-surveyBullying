@extends('layout.main')
@section('content')

<div class="flex justify-start items-center gap-5">
    <div class="w-10 h-10">
        <a href="{{ route('pertanyaan.index') }}">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path
                        d="M14.2893 5.70708C13.8988 5.31655 13.2657 5.31655 12.8751 5.70708L7.98768 10.5993C7.20729 11.3805 7.2076 12.6463 7.98837 13.427L12.8787 18.3174C13.2693 18.7079 13.9024 18.7079 14.293 18.3174C14.6835 17.9269 14.6835 17.2937 14.293 16.9032L10.1073 12.7175C9.71678 12.327 9.71678 11.6939 10.1073 11.3033L14.2893 7.12129C14.6799 6.73077 14.6799 6.0976 14.2893 5.70708Z"
                        fill="#0F0F0F"></path>
                </g>
            </svg>
        </a>
    </div>
    <p class="font-bold text-lg my-0">
        <span class=" md:text-xl">Tambah Pertanyaan</span>
    </p>
</div>
<form action="{{ route('pertanyaan.store') }}" method="post">
    @csrf
    <div class="lg:grid lg:grid-cols-1 lg:place-items-center mt-10">
        <div class="mb-6 lg:w-5/12">
            <label for="nama_pertanyaan" class="block mb-2 text-sm font-medium text-gray-900">Pertanyaan</label>
            <input type="text" autocomplete="off" id="nama_pertanyaan" name="pertanyaan"
                placeholder="Input Pertanyaan .. "
                class="bg-slate-50 border-2 border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>
        <div class="mb-6 lg:w-5/12">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 ">Tipe Pertanyaan</label>
            <select id="status" name="tipe_pertanyaan" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                <option value="korban">Korban Bullying</option>
                <option value="pelaku">Pelaku Bullying</option>
            </select>
        </div>
        <div class="mb-6 lg:w-5/12">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 ">Tipe Pertanyaan</label>
            <select id="status" name="tipe_perilaku" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                <option value="verbal">Verbal</option>
                <option value="fisik">Fisik</option>
                <option value="relational">Relational</option>
            </select>
        </div>
    </div>
    <div class="md:flex md:justify-center md:items-center  md:flex-row md:gap-4 min-w-full md:w-1/2 ">
        <button type="submit"
            class="bg-[#29CE00] rounded-lg flex justify-center items-center gap-3 px-16 h-12 mt-4 hover:bg-green-400 ease-in-out  duration-300 ">
            <span class="text-white whitespace-nowrap  text-md">Submit</span>
        </button>
    </div>
</form>

@endsection