<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- Title --}}
    @yield('title')

    @include('components.admin.style')
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        {{-- Sidebar --}}
        @include('components.admin.sidebar')
        <div class="flex flex-col flex-1 w-full">

            {{-- Navbar --}}
            @include('components.admin.navbar')

            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Dashboard
                    </h2>
                    {{-- Content --}}
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    @include('components.admin.script')
</body>

</html>