@extends('layouts.frontend')

@section('title')
@guest
<title>LaporDesa</title>
@endguest
@auth
<title>Detail Aduan | LaporDesa</title>
@endauth
@endsection

@section('content')
{{-- Jumbotron --}}
<section
    class="flex flex-col justify-center items-center relative overflow-x-hidden gap-7 lg:gap-8 px-6 md:px-10 lg:px-24 2xl:px-48 h-screen">

    {{-- Show Status Complaint --}}
    @include('components.frontend.conditional-statement.show-status-detail')

    <h1 class="detail-title font-bold text-center text-3xl md:text-5xl xl:text-6xl leading-10 md:leading-normal">
        {{ $complaint->title }}</h1>
    <h6
        class="px-3 py-1 text-davys-grey border border-davys-grey rounded-sm text-xs md:text-base lg:text-lg font-medium">
        {{ $complaint->category->category }}
    </h6>
    <p class="font-bold text-xs md:text-base lg:text-lg text-davys-grey">{{ $complaint->created_at->format('H:i, d-m-Y')
        }}</p>
    <img class="absolute w-2/3 md:w-96 xl:w-[32rem] left-[-30%] md:-left-32 xl:-left-72 top-[3%] md:top-14 xl:top-2 -z-10"
        src="{{ asset('assets/icons/vector-1.png') }}" alt="Icon">
    <img class="absolute w-1/4 md:w-44 xl:w-[10rem] right-[-8%] md:-right-12 bottom-[7%] -z-10"
        src="{{ asset('assets/icons/stars.png') }}" alt="">
</section>

{{-- Photo Evidence --}}
<section class="lg:px-24 2xl:px-48 bg-white">
    <img class="w-full aspect-video object-cover object-center"
        src="{{ $complaint->photo_url ? Storage::url($complaint->photo_url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
        alt="Bukti Foto">
</section>

{{-- Information Detail Section --}}
<section class="px-6 md:px-10 lg:px-24 2xl:px-48 pt-16 pb-10 md:pt-28 md:pb-16 lg:pt-36 lg:pb-20 bg-white">
    <h2 class="text-center text-2xl md:text-4xl font-bold">Detail Informasi</h2>
    <div
        class="xl:flex xl:gap-5 py-8 md:py-12 xl:py-20 px-5 md:px-10 xl:px-14 mt-5 md:mt-11 xl:mt-20 rounded-md border border-davys-grey xl:shadow-[10px_10px_0px_#cd4631]">
        <div class="xl:w-80">
            <div class="text-sm md:text-lg mb-5">
                <label xl:mb-4 class="font-bold mb-2 block">Nama</label>
                <p class="font-medium text-davys-grey">{{ $complaint->user->name }}</p>
            </div>
            <div class="text-sm md:text-lg mb-5 md:mb-7 xl:mb-4">
                <label class="font-bold mb-2 block">Email</label>
                <p class="font-medium text-davys-grey">{{ $complaint->user->email }}</p>
            </div>
            <div class="text-sm md:text-lg mb-5 md:mb-7 xl:mb-4">
                <label class="font-bold mb-2 block">Alamat</label>
                <p class="font-medium text-davys-grey">{{ $complaint->user->address }}</p>
            </div>
            <div class="text-sm md:text-lg mb-5 md:mb-7 xl:mb-4">
                <label class="font-bold mb-2 block">Nomer Telepon</label>
                <p class="font-medium text-davys-grey">{{ $complaint->user->phone }}</p>
            </div>
            <div class="text-sm md:text-lg mb-5 md:mb-7 xl:mb-4">
                <label class="font-bold mb-2 block">Judul Aduan</label>
                <p class="font-medium text-davys-grey">{{ $complaint->title }}</p>
            </div>
        </div>
        <div>
            <div class="text-sm md:text-lg mb-5 md:mb-7 xl:mb-4">
                <label class="font-bold mb-2 block">Status Aduan</label>
                <p class="font-medium text-davys-grey capitalize">{{ $complaint->status }}</p>
            </div>
            <div class="text-sm md:text-lg mb-5 md:mb-7 xl:mb-4">
                <label class="font-bold mb-2 block">Kategori</label>
                <p class="font-medium text-davys-grey">{{ $complaint->category->category }}</p>
            </div>
            <div class="text-sm md:text-lg mb-5 md:mb-7 xl:mb-4">
                <label class="font-bold mb-2 block">Kode Unik</label>
                <p class="font-medium text-davys-grey">{{ $complaint->unic_code }}</p>
            </div>
            <div class="text-sm md:text-lg">
                <label class="font-bold mb-2 block">Dikirim Pada</label>
                <p class="font-medium text-davys-grey">{{ $complaint->created_at->format('H:i, d-m-Y')
                    }}</p>
            </div>
        </div>
    </div>
</section>

<div class="px-6 md:px-10 lg:px-24 2xl:px-48">
    <hr class="border border-davys-grey opacity-30">
</div>

{{-- Complaint Section --}}
<section class="px-6 md:px-10 lg:px-24 2xl:px-48 py-10 md:py-16 lg:py-20 bg-white">
    <h2 class="text-center text-2xl md:text-4xl font-bold">Isi Pengaduan</h2>
    <div class="mt-5 md:mt-11 xl:mt-20">
        <p class="text-sm md:text-base leading-normal font-medium text-davys-grey">{{ $complaint->body }}</p>
    </div>
</section>

<div class="px-6 md:px-10 lg:px-24 2xl:px-48">
    <hr class="border border-davys-grey opacity-30">
</div>

{{-- Feddback Message Section --}}
<section class="px-6 md:px-10 lg:px-24 2xl:px-48 py-10 md:py-16 lg:py-20 bg-white">
    <h2 class="text-center text-2xl md:text-4xl font-bold">Pesan Tanggapan</h2>
    <div
        class="flex flex-col gap-2 md:gap-3 lg:gap-5 items-center px-3 md:px-4 lg:px-6 xl:px-14 py-7 md:py-10 lg:py-16 xl:py-20 rounded-md mt-5 md:mt-11 xl:mt-20 bg-champagne">
        <i class="ti ti-quote text-3xl md:text-4xl font-bold text-vermillion"></i>
        <p class="text-center text-davys-grey font-medium text-sm md:text-base leading-normal">{{ $complaint->response ?
            $complaint->response : 'Mohon maaf, belum ada tanggapan'
            }}</p>
    </div>
    <div class="flex justify-center mt-5 md:mt-11 xl:mt-20">
        <a href="#"
            class="px-4 md:px-9 py-2 md:py-3 text-sm md:text-xl lg:text-lg bg-black text-white border-2 border-black active:border-vermillion active:bg-vermillion active:shadow-xl rounded-md lg:hover:bg-vermillion lg:hover:border-vermillion lg:hover:shadow-xl lg:transition-all lg:duration-500 lg:hover:transition-all lg:hover:duration-500">Cetak
            ke PDF</a>
    </div>
</section>
@endsection