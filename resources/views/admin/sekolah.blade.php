@extends('layout.main')
@section('content')
<h1 class="text-2xl sm:text-3xl">Sekolah</h1>

{{-- toast --}}
@if (session('successDeleteSekolah'))
<div id="toast-warning"
    class="flex absolute items-center top-20 right-10 w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
    role="alert">
    <div
        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
        </svg>
        <span class="sr-only">Warning icon</span>
    </div>
    <div class="ml-3 text-sm font-normal">{{ session('successDeleteSekolah') }}</div>
    <button type="button"
        class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
        data-dismiss-target="#toast-warning" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>
@endif

{{-- toast --}}
@if (session('successEditSekolah'))
<div id="toast-success"
    class="flex absolute top-20 right-10 items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow "
    role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg ">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
        </svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ml-3 text-sm font-normal">{{ session('successEditSekolah') }}</div>
    <button type="button"
        class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 "
        data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>
@endif

{{-- search --}}
<div class="flex justify-start items-center gap-4 mt-10">
    <form action="" method="get" class="md:w-1/2 w-full">
        <label for="default-search"
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input name="search" type="search" @if (request('search')) value="{{ request('search') }}" @endif
                id="default-search"
                class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Cari Sekolah">
            <button type="submit"
                class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>
</div>


<div class="mt-8 w-full overflow-x-auto overflow-y-auto">

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @if ($dataSekolah->isNotEmpty())
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-white uppercase bg-blue-500 ">
                <tr class="text-center">
                    <th scope="col" class="px-6 py-3">
                        Sekolah
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NPSN
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span>Links</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataSekolah as $sekolah)
                <tr class="bg-white border-b  hover:bg-gray-50 text-center">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        <span class="sm:text-sm md:text-md uppercase">{{ $sekolah->nama_sekolah }}</span>
                    </th>
                    <td class="px-6 py-4">
                        <span class="sm:text-sm md:text-md">{{ $sekolah->npsn }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="sm:text-sm md:text-md">{{ $sekolah->alamat_sekolah }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="sm:text-sm md:text-md">{{ $sekolah->status }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center items-center">
                            {{-- <a href="{{ route('admin.editSekolah', $sekolah->id) }}"
                                class="font-medium text-blue-600 mx-2 hover:underline">Edit
                            </a>
                            <form action="{{ route('admin.hapusSekolah', $sekolah->id) }}" method="POST" class="inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit"
                                    onclick="return confirm('Apakah Anda Ingin Menghapus Pertanyaan Ini ? \nAnda Juga Akan Menghapus Semua Data Terkait Pertanyaan Ini')"
                                    class="font-medium text-red-600 mx-2 hover:underline">Delete</button>
                            </form> --}}
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h1 class="text-center text-2xl font-bold text-red-600 mt-20">Sekolah Tidak ditemukan</h1>
        @endif
        <div class="flex justify-center items-center mt-6 paginate">
            {{ $dataSekolah->links() }}
        </div>
    </div>

</div>


</div>
@endsection