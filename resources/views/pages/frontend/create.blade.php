@extends('layouts.frontend')

@section('title')
@guest
<title>LaporDesa</title>
@endguest
@auth
<title>Buat Aduan | LaporDesa</title>
@endauth
@endsection

@section('content')
<section
    class="px-6 md:px-10 lg:px-24 2xl:px-48 pt-28 pb-16 md:pt-36 md:pb-28 lg:pt-40 lg:pb-36 overflow-x-hidden bg-white">
    <h1 class="text-center text-3xl md:text-4xl lg:text-5xl font-bold">Ayo <span
            class="text-vermillion">Laporkan!!</span>
    </h1>
    <h5 class="font-medium text-center text-xs md:text-sm lg:text-base mt-5 md:mt-7 lg:mt-8 text-davys-grey">
        Kirim aduan
        Anda kepada
        Kami
    </h5>
    <div class="lg:px-32 xl:px-40">
        <hr class="mt-5 md:mt-7 lg:mt-8 border-1 border-davys-grey">
    </div>
    <form action="{{ route('complainant.complaints.store') }}" method="POST"
        class="mt-5 md:mt-7 lg:mt-8 lg:px-32 xl:px-40" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title" class="font-bold">Judul Aduan</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder=" Masukan Judul Aduan"
                class="mt-2 w-full rounded transition duration-500 ease-in-out ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-vermillion focus:border-transparent">
            @error('title')
            <p class="font-medium text-sm mt-2 text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-4">
            <label for="category" class="font-bold">Kategori Aduan</label>
            <select name="category" id="category"
                class="mt-2 w-full rounded transition duration-500 ease-in-out ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-vermillion focus:border-transparent">
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </select>
            @error('category')
            <p class="font-medium text-sm mt-2 text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-4">
            <label for="body" class="font-bold">Isi Aduan</label>
            <textarea name="body" id="body" cols="30" rows="15"
                class="mt-2 w-full rounded transition duration-500 ease-in-out ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-vermillion focus:border-transparent"
                placeholder="Sampaikan aduan Anda disini...">{{ old('body') }}</textarea>
            @error('body')
            <p class="font-medium text-sm mt-2 text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-4">
            <label for="photo" class="font-bold">Bukti Foto <span class="text-vermillion text-xs block">*File
                    bertipe
                    jpg/jpeg/png</span></label>
            <input type="file" name="photo" id="photo" value="{{ old('photo') }}" class=" mt-2">
            @error('photo')
            <p class="font-medium text-sm mt-2 text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-10 flex justify-center">
            <button type="submit"
                class="font-bold lg:text-lg px-5 lg:px-9 py-2 lg:py-3 rounded-md bg-black text-white active:bg-vermillion active:shadow-lg lg:hover:bg-vermillion lg:hover:shadow-lg">Laporkan</button>
        </div>
    </form>
</section>
@endsection