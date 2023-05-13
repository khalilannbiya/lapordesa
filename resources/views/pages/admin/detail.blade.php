@extends('layouts.admin')

@section('title')
<title>Detail Aduan</title>
@endsection

@section('title-page')
Detail Aduan
@endsection

@section('content')
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Name</span>
        <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            value="{{ $complaint->user->name }}" disabled />
    </label>
    <label class=" mt-4 block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Email</span>
        <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            value="{{ $complaint->user->email }}" disabled />
    </label>
    <label class=" mt-4 block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Alamat</span>
        <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            value="{{ $complaint->user->address }}" disabled />
    </label>
    <label class=" mt-4 block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Nomer Telepon</span>
        <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            value="{{ $complaint->user->phone }}" disabled />
    </label>
    <label class=" mt-4 block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Judul Aduan</span>
        <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            value="{{ $complaint->title }}" disabled />
    </label>
    <label class=" mt-4 block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Status Aduan</span>
        <input
            class="block capitalize w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            value="{{ $complaint->status }}" disabled />
    </label>
    <label class=" mt-4 block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Kategori Aduan</span>
        <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            value="{{ $complaint->category->category }}" disabled />
    </label>
    <label class=" mt-4 block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Dikirim Pada</span>
        <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            value="{{ $complaint->created_at->format('H:i, d-m-Y') }}" disabled />
    </label>
</div>
<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Bukti Foto
</h4>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <img class="w-48"
            src="{{ $complaint->photo_url ? Storage::url($complaint->photo_url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
            alt="Bukti Foto">
    </div>
</div>
<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Isi Pengaduan
</h4>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <p class="text-white">
            {{ $complaint->body }}
        </p>
    </div>
</div>
<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Respon Aparat
</h4>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <p class="text-white">
            {{ $complaint->response ? $complaint->response : 'Belum ada response' }}
        </p>
    </div>
</div>
@endsection