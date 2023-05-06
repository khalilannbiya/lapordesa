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
    <div class="mt-5 md:mt-7">
        <h5 class="text-xs md:text-sm text-davys-grey text-center font-semibold leading-relaxed">Pelajari cara
            mengajukan aduan
            dengan efektif - <span class="open-modal-button cursor-pointer text-vermillion underline">lihat
                panduan kami
                sekarang!</span></h5>
    </div>
    <form action="{{ route('complainant.complaints.store') }}" method="POST"
        class="mt-5 md:mt-7 lg:mt-8 lg:px-32 xl:px-40" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title" class="font-bold">Judul Aduan <span class="text-vermillion">*</span></label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder=" Masukan Judul Aduan"
                class="mt-2 w-full rounded transition duration-500 ease-in-out ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-vermillion focus:border-transparent">
            @error('title')
            <p class="font-medium text-sm mt-2 text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-4">
            <label for="category" class="font-bold">Kategori Aduan <span class="text-vermillion">*</span></label>
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
            <label for="body" class="font-bold">Isi Aduan <span class="text-vermillion">*</span></label>
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

    {{-- Modal section for complaint filling guidelines --}}
    <div id="modalGuidelines"
        class="modal invisible opacity-0 transition-all duration-500 ease-in-out z-20 fixed w-screen h-screen top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-screen bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <!-- your modal content -->
            <div class="modal-content py-4 text-left px-6">
                <div class="flex justify-between items-center pb-3">
                    <p class="text-xl font-bold">Panduan Pengisian</p>
                    <div class="modal-close cursor-pointer">
                        <i class="ti ti-x text-2xl font-bold"></i>
                    </div>
                </div>

                <div class="modal-body h-96 overflow-y-scroll">
                    <section>
                        <h2 class="text-vermillion font-semibold text-lg">Apa itu Pengaduan ?</h2>
                        <p class="mt-2 text-sm font-medium leading-relaxed">
                            Pengaduan adalah tindakan atau proses melaporkan atau menyampaikan keluhan atau masalah
                            kepada
                            pihak yang berwenang atau terkait. Pengaduan biasanya dilakukan oleh masyarakat atau
                            individu
                            yang merasa dirugikan atau tidak puas terhadap suatu hal, baik itu terkait dengan pelayanan
                            publik, produk atau layanan yang diberikan oleh suatu instansi atau perusahaan, maupun
                            perilaku
                            dari orang atau pihak tertentu. Tujuan pengaduan adalah untuk meminta tindakan atau
                            perbaikan
                            atas masalah yang disampaikan agar dapat diatasi dan tidak merugikan pihak yang terkena
                            dampak
                            dari masalah tersebut.</p>
                    </section>
                    <section class="mt-4">
                        <h2 class="text-vermillion font-semibold text-lg leading-normal">Pastikan hal-hal berikut ini
                            sebelum melapor :
                        </h2>
                        <ol class="list-decimal mt-2 text-sm font-medium leading-relaxed pl-6 text-davys-grey">
                            <li>Laporan yang Anda berikan memiliki kaitan erat dengan kinerja pemerintah.</li>
                            <li>Laporan yang Anda berikan wajib didalam wilayah jangkauan Desa Lemahmulya.</li>
                            <li class="mt-1">Menyampaikan pesan dengan bahasa Indonesia yang benar dan baik.</li>
                            <li class="mt-1">Bukan merupakan ujaran kebencian, SARA, dan caci maki.</li>
                            <li class="mt-1">Bukan merupakan laporan yang sudah disampaikan dan masih dalam proses
                                penanganan.</li>
                        </ol>
                    </section>
                    <section class="mt-4">
                        <h2 class="text-vermillion font-semibold text-lg leading-normal">Perhatikan kolom-kolom yang
                            wajib atau opsional untuk diisi.
                        </h2>
                        <h6 class="mt-3 font-semibold text-davys-grey">Kolom Wajib: </h6>
                        <ol class="list-decimal mt-2 text-sm font-medium leading-relaxed pl-6 text-davys-grey">
                            <li><span class="text-vermillion font-semibold">Judul Aduan</span>: Merupakan kesimpulan
                                dari suatu
                                permasalahan , inti dari suatu laporan yang disampaikan.</li>
                            <li><span class="mt-1 text-vermillion font-semibold">Kategori Aduan</span>: Kategori yang
                                sesuai dengan laporan yang diadukan.</li>
                            <li><span class="mt-1 text-vermillion font-semibold">Isi Aduan</span>: Menceritakan
                                kronologis kejadian yang ingin dikeluhkan (Lebih detail, akan lebih baik).</li>
                        </ol>
                        <h6 class="mt-3 font-semibold text-davys-grey">Kolom Opsional: </h6>
                        <ol class="list-decimal mt-2 text-sm font-medium leading-relaxed pl-6 text-davys-grey">
                            <li><span class="mt-1 text-vermillion font-semibold">Bukti Foto</span>: Data dukungan berupa
                                bukti gambar.</li>
                        </ol>
                    </section>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection

@push('script')
<script>
    const modalGuidelines = document.querySelector('.modal');
    const openModalButtons = document.querySelectorAll('.open-modal-button');
    const closeModalButtons = document.querySelectorAll('.modal-close');
    const overlay = document.querySelector('.modal-overlay');

  openModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        modalGuidelines.classList.add('visible');
        modalGuidelines.classList.add('opacity-100');
        modalGuidelines.classList.remove('invisible');
        modalGuidelines.classList.remove('opacity-0');
    })
  })

  closeModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        modalGuidelines.classList.remove('visible');
        modalGuidelines.classList.remove('opacity-100');
        modalGuidelines.classList.add('invisible');
        modalGuidelines.classList.add('opacity-0');
    })
  })

</script>
@endpush