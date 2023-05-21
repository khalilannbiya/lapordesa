@extends('layouts.admin')

@section('title')
<title>Data Kategori</title>
@endsection

@section('title-page')
<h2 class="my-6 text-lg font-semibold text-gray-700 dark:text-gray-200">
    Data Kategori
</h2>
@endsection

@section('content')
<div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
    <form class="block mb-4 text-sm" action="{{ route('staff.categories.index') }}" method="get">
        <div class="relative text-gray-500 focus-within:text-purple-600">
            <input id="keyword" name="keyword"
                class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                placeholder="Masukan Kata Kunci Kategori" />
            <button type="submit"
                class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Cari
            </button>
        </div>
    </form>
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Category</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @forelse ($categories as $category)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-sm">
                        {{ $category->id }}
                    </td>
                    <td class="px-4 py-3 capitalize text-sm">
                        {{ $category->category }}
                    </td>
                </tr>
                @empty
                <p class="text-white">Belum ada data</p>
                @endforelse

            </tbody>
        </table>
    </div>
    {{ $categories->links('components.admin.pagination') }}
</div>

@endsection