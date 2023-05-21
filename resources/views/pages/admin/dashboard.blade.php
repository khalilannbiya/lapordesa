@extends('layouts.admin')

@section('title')
<title>Dashboard Staff</title>
@endsection

@section('title-page')
<h2 class="my-6 text-lg font-semibold text-gray-700 dark:text-gray-200">
    Dashboard
</h2>
@endsection

@section('content')
<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">

    {{-- Card --}}
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="px-3 py-2 mr-4 text-red-500 bg-red-100 rounded-full p- dark:text-red-100 dark:bg-red-500">
            <i class="text-xl ti ti-book-upload"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Belum Diproses
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $unprocessedCount }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div
            class="px-3 py-2 mr-4 text-yellow-500 bg-yellow-100 rounded-full p- dark:text-yellow-100 dark:bg-yellow-500">
            <i class="text-xl ti ti-loader"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Aduan Diproses
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $processingCount }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="px-3 py-2 mr-4 text-green-500 bg-green-100 rounded-full p- dark:text-green-100 dark:bg-green-500">
            <i class="text-xl ti ti-circle-check"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Aduan Selesai
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $completedCount }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div
            class="px-3 py-2 mr-4 text-orange-500 bg-orange-100 rounded-full p- dark:text-orange-100 dark:bg-orange-500">
            <i class="text-xl ti ti-books"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Total Aduan
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $totalCount }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="px-3 py-2 mr-4 text-sky-500 bg-sky-100 rounded-full p- dark:text-sky-100 dark:bg-sky-500">
            <i class="ti ti-users text-xl"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Jumlah Pelapor
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $totalComplainant }}
            </p>
        </div>
    </div>

    {{-- Card --}}
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div
            class="px-3 py-2 mr-4 text-purple-500 bg-purple-100 rounded-full p- dark:text-purple-100 dark:bg-purple-500">
            <i class="ti ti-category text-xl"></i>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Jumlah Kategori
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $totalCategory }}
            </p>
        </div>
    </div>
</div>
@endsection