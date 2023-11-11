@extends('layout.pages')
@section('title','Isi Survey')
@section('content')
<div class="w-full min-h-screen overflow-x-hidden scroll-smooth ">
    <div class="w-full md:w-8/12 mx-auto px-10 mt-10">
        <div class="w-full mx-auto bg-white p-8 rounded shadow-md">
            <div class="flex justify-start items-center gap-4">
                <div class="w-6 h-6 md:w-8 md:h-8">
                    <a href="{{ route('murid.signup') }}">
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
                <p class="font-bold text-base my-0">
                    <span class=" md:text-lg uppercase">Isi Survey</span>
                </p>
            </div>
            <form action="{{ route('survey') }}" method="POST">
                @csrf
                @foreach ($dataPertanyaan as $data)
                <span class="text-md font-bold my-4 block">
                    {{ $data->pertanyaan }}

                    @if ($errors->has("survey.{$data->id}.skor"))
                    <div class="alert alert-danger">
                        <ul>
                            <li class="text-base font-normal text-red-400 py-2">Harap menjawab Pertanyaan Ini</li>
                        </ul>
                    </div>
                    @endif
                    <input type="hidden" value="{{ $data->id }}" name="survey[{{ $data->id }}][id_pertanyaan]">
                    <input type="hidden" value="{{ $data->tipe_pertanyaan }}"
                        name="survey[{{ $data->id }}][tipe_pertanyaan]">
                </span>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-4">
                    <label class="cursor-pointer">
                        <input type="radio" id="jawaban" value="1" class="peer sr-only"
                            name="survey[{{ $data->id }}][skor]" @if(old("survey.{$data->id}.skor") == "1") checked
                        @endif/>
                        <div
                            class="w-full max-w-xl rounded-md bg-gray-50 p-5 text-gray-600 ring-2 ring-transparent transition-all hover:shadow shadow-md  
                        peer-checked:bg-blue-500 peer-checked:text-gray-50 peer-checked:ring-blue-500 peer-checked:ring-offset-2  peer-checked:shadow-md peer-checked:shadow-blue-700 ">
                            <div class="flex flex-col gap-1">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-semibold uppercase  peer-checked:text-sky-700">tidak pernah
                                    </p>
                                </div>
                            </div>
                        </div>
                    </label>

                    <label class="cursor-pointer">
                        <input type="radio" id="jawaban" value="2" class="peer sr-only"
                            name="survey[{{ $data->id }}][skor]" @if(old("survey.{$data->id}.skor") == "2") checked
                        @endif />
                        <div
                            class="w-full max-w-xl rounded-md bg-gray-50 p-5 text-gray-600 ring-2 ring-transparent transition-all hover:shadow shadow-md  
                        peer-checked:bg-blue-500 peer-checked:text-gray-50 peer-checked:ring-blue-500 peer-checked:ring-offset-2  peer-checked:shadow-md peer-checked:shadow-blue-700 ">
                            <div class="flex flex-col gap-1">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-semibold uppercase  peer-checked:text-sky-700">jarang</p>
                                </div>
                            </div>
                        </div>
                    </label>

                    <label class="cursor-pointer">
                        <input type="radio" id="jawaban" value="3" class="peer sr-only"
                            name="survey[{{ $data->id }}][skor]" @if(old("survey.{$data->id}.skor") == "3") checked
                        @endif/>
                        <div
                            class="w-full max-w-xl rounded-md bg-gray-50 p-5 text-gray-600 ring-2 ring-transparent transition-all hover:shadow shadow-md  
                        peer-checked:bg-blue-500 peer-checked:text-gray-50 peer-checked:ring-blue-500 peer-checked:ring-offset-2  peer-checked:shadow-md peer-checked:shadow-blue-700 ">
                            <div class="flex flex-col gap-1">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-semibold uppercase  peer-checked:text-sky-700">Sering</p>
                                </div>
                            </div>
                        </div>
                    </label>

                    <label class="cursor-pointer">
                        <input type="radio" id="jawaban" value="4" class="peer sr-only"
                            name="survey[{{ $data->id }}][skor]" @if(old("survey.{$data->id}.skor") == "4") checked
                        @endif/>
                        <div
                            class="w-full max-w-xl rounded-md bg-gray-50 p-5 text-gray-600 ring-2 ring-transparent transition-all hover:shadow shadow-md  
                        peer-checked:bg-blue-500 peer-checked:text-gray-50 peer-checked:ring-blue-500 peer-checked:ring-offset-2  peer-checked:shadow-md peer-checked:shadow-blue-700 ">
                            <div class="flex flex-col gap-1">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-semibold uppercase  peer-checked:text-sky-700">selalu</p>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                @endforeach
                <div class="flex justify-center items-center mt-10">
                    <button id="btn" type="submit" class="bg-blue-500 w-full  text-white px-10 py-3 rounded-lg disabled:hidden
                        hover:bg-blue-400 duration-300 ease-in-out">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/survey.js') }}"></script>
@endsection