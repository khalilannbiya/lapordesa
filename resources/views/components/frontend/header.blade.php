<header>
    {{-- -- Navbar Before Login -- --}}
    <nav id="navbar"
        class="fixed flex w-full justify-between items-center top-0 left-0 z-10 py-3 md:py-5 lg:py-2 px-6 md:px-10 lg:px-24 2xl:px-48">
        <div class="">
            <a class="" href="#">
                <img class="w-[2.5rem] md:w-16 lg:w-16" src="{{ asset('assets/images/logo.png') }}"
                    alt="Logo LaporDesa" />
            </a>
        </div>
        <ul id="navList"
            class="fixed lg:static flex flex-col lg:flex-row justify-center lg:justify-end items-center gap-5 md:gap-9 lg:gap-7 top-0 right-[-600px] md:right-[-1000px] h-screen lg:h-auto w-3/4 z-20 lg:z-0 bg-pewter-blue lg:bg-transparent lg:text-secondary font-semibold transition-all duration-1000">

            {{-- Before Login --}}
            @guest
            <li>
                <a href="#"
                    class="md:text-lg lg:text-sm hover:text-vermillion transition-all duration-500 active">Beranda</a>
            </li>
            <li>
                <a href="#lacak"
                    class="md:text-lg lg:text-sm hover:text-vermillion transition-all duration-500">Lacak</a>
            </li>
            <li>
                <a href="#about" class="md:text-lg lg:text-sm hover:text-vermillion transition-all duration-500">Tentang
                    Kami</a>
            </li>
            <li>
                <a href="{{ route('register') }}"
                    class="flex justify-center items-center w-32 md:w-40 lg:w-28 h-11 lg:h-9 md:text-lg lg:text-sm border-2 border-black active:border-vermillion active:shadow-xl  lg:hover:shadow-xl lg:hover:border-vermillion lg:transition-all lg:duration-500 lg:hover:transition-all lg:hover:duration-500 active:text-vermillion lg:hover:text-vermillion  rounded-md ">Daftar</a>
            </li>
            <li>
                <a href="{{ route('login') }}"
                    class="flex justify-center items-center w-32 md:w-40 lg:w-28 h-11 lg:h-9 md:text-lg lg:text-sm border-2 border-black active:border-vermillion active:shadow-xl active:bg-vermillion lg:hover:shadow-xl lg:hover:border-vermillion lg:transition-all lg:duration-500 lg:hover:transition-all lg:hover:duration-500 bg-black lg:hover:bg-vermillion rounded-md text-white lg:hover:text-white">Login</a>
            </li>
            @endguest


            @auth
            <li>
                <a href="{{ route('index') }}"
                    class="{{ Route::current()->getName() == 'index' ? 'text-vermillion' : 'text-black' }} md:text-lg lg:text-sm hover:text-vermillion transition-all duration-500 active">Beranda</a>
            </li>

            <li>
                <a href="{{ route('complainant.complaints.create') }}"
                    class="{{ Route::current()->getName() == 'complainant.complaints.create' ? 'text-vermillion' : 'text-black' }} md:text-lg lg:text-sm hover:text-vermillion transition-all duration-500">Buat
                    Aduan</a>
            </li>

            <li>
                <a href="{{ route('complainant.complaints.index') }}"
                    class="{{ Route::current()->getName() == 'complainant.complaints.index' ? 'text-vermillion' : 'text-black' }} md:text-lg lg:text-sm hover:text-vermillion transition-all duration-500">Riwayat</a>
            </li>

            <li>
                <a href="{{ route('profile.show') }}"
                    class="{{ Route::current()->getName() == 'profile.show' ? 'text-vermillion' : 'text-black' }} md:text-lg lg:text-sm hover:text-vermillion transition-all duration-500">Pengaturan</a>
            </li>

            {{-- Logout Button --}}
            <li>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <button type="submit"
                        class="flex justify-center items-center w-32 md:w-40 lg:w-28 h-11 lg:h-9 md:text-lg lg:text-sm border-2 border-black active:border-vermillion active:shadow-xl active:bg-vermillion lg:hover:shadow-xl lg:hover:border-vermillion lg:transition-all lg:duration-500 lg:hover:transition-all lg:hover:duration-500 bg-black lg:hover:bg-vermillion rounded-md text-white lg:hover:text-white">Logout</button>
                </form>
            </li>
            @endauth
        </ul>
        <div class="absolute right-6 z-30 md:right-9 lg:hidden" id="toggle">
            <svg xmlns="http://www.w3.org/2000/svg" id="iconToggle" class="icon icon-tabler icon-tabler-align-justified"
                width="27" height="27" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M4 6l16 0"></path>
                <path d="M4 12l16 0"></path>
                <path d="M4 18l12 0"></path>
            </svg>
        </div>
    </nav>
</header>