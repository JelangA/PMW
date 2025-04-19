@extends('layouts.frontend')

@section('section-content')
    @foreach($Workshop as $RW)
        <div class="grid lg:grid-cols-3 lg:gap-4 md:grid-cols-2 lg:pt-44 pt-36 pb-10 px-10 lg:px-30 md:px-10 border-b-2 border-gray-100 overlay min-h-screen">
            <div data-aos="fade-right" class="flex flex-col lg:col-span-2 flex-grow gap-y-3 lg:px-20 md:px-0 px-2 md:text-left lg:text-left lg:w-full">
                <p class="font-black text-black text-3xl leading-tight">{{ $RW->title }}</p>

                <img src="{{ Storage::url($RW->image) }}" alt="">

                <p class="text-xl font-semibold">Deskripsi</p>
                <p class="text-secondary-dark text-sm lg:text-[17px] leading-7">{!! $RW->desc !!}</p>
            </div>
            <div class="lg:w-full w-auto lg:pt-0 md:pt-0 pt-5 px-2 lg:flex lg:flex-col" data-aos="fade-left">
                <p class="text-xl font-semibold">Keikutsertaan</p>
                
                <form action="{{ route('workshop.registration') }}" method="POST">
                    @csrf"

                    <input type="text" id="workshop" name="workshop" value="{{ $RW->id }}" hidden>
                    <div class="mb-4">
                        <label for="countries" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                        <select class="selectpicker" id="user" name="user" style="width: 100%"  data-placeholder="Select a city..." data-allow-clear="false" title="-- Silahkan Pilih Nama Anda --">
                            <option hidden selected>-- Pilih Nama Anda --</option>
                            @foreach ($Data as $ReadData)
                                <option value="{{ $ReadData->id }}">{{ $ReadData->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4 place-self-center md:place-self-start lg:place-self-start">
                        <button type="submit" class="bg-blue-700 hover:bg-blue-800 px-7 mt-2 py-3 text-center text-white font-bold w-44 rounded-md text-sm">Daftar</button>
                    </div>
                </form>
                
                <p class="text-xl font-semibold mt-6">Jadwal Pelaksanaan</p>
                <p class="text-lg  mt-2">Mulai   : 12 Januari 2023 09.00</p>
                <p class="text-lg  mt-2">Selesai : 12 Januari 2024 09.00</p>
            </div>
        </div>
    @endforeach
@endsection