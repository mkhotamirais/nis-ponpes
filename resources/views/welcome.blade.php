<x-layout>
    {{-- hero --}}
    <section class="relative h-[100vh]">
        <img src="{{ asset('storage/images/hero.jpg') }}" alt="Ponpes Nurul Iman Hero Image"
            class="absolute object-cover object-center bottom-0 z-10 h-full w-full">
        <div
            class="text-center z-20 absolute border w-full bg-[radial-gradient(circle,rgba(0,0,0,0.6)_0%,rgba(0,0,0,0.1)_100%)]">
            <div class="container">
                <div class="h-[100vh] flex flex-col gap-4 justify-center items-center text-center !text-white">
                    <h1 class="text-4xl lg:text-6xl leading-snug font-bold">Selamat Datang di<br /> Pondok Pesantren
                        Nurul
                        Iman</br />
                        Sindangkerta</h1>
                    <p class="text-2xl italic font-semibold">
                        <q>{{ config('common.common.moto') }}</q>
                    </p>
                    <div class="flex flex-col md:flex-row gap-2 items-center py-8">
                        <button class="btn border-2 border-green-500 w-44 lg:py-4 font-semibold text-lg">Daftar</button>
                        <button
                            class="btn w-44 lg:py-4 font-semibold text-lg !bg-transparent border-2 border-green-300 hover:text-green-300">Tentang
                            Pondok</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- sambutan pimpinan --}}
    <section class="py-12 bg-white md:bg-gray-50">
        <div class="container">
            <div class="bg-white p-0 md:p-12">
                <div class="mb-8 text-center">
                    <h2 class="title">{{ config('common.home.speech.title') }}</h2>
                    <h3 class="text-lg">{{ config('common.home.speech.grand-sheikh') }}</h3>
                </div>
                <img src="{{ asset('storage/images/pimpinan_pondok2.jpg') }}" alt=""
                    class="float-left rounded-md mr-4 mb-2 md:w-48 w-full brightness-125">
                <div class="">
                    <p class="mb-2 text-gray-500 font-semibold italic">Assalamualaikum Warahmatullahi
                        Wabarakatuh
                    </p>
                    <p class="mb-2 text-emerald-700 italic"><q>{{ config('common.common.moto2') }}</q>
                    </p>

                    @foreach (array_slice(config('common.home.speech.speech'), 0, 3) as $paragraph)
                        <p class="mb-2 text-gray-500 text-justify">{{ $paragraph }}</p>
                    @endforeach
                    <a href="{{ route('profil.sambutan-pimpinan') }}"
                        class="font-semibold text-green-600 mt-4 inline-block">Selengkapnya</a>
                </div>
            </div>


        </div>
    </section>
    {{-- prestasi --}}
    <section class="py-12">
        <div class="container">
            <h2 class="title">Prestasi</h2>
        </div>
    </section>
    <hr>
    {{-- ekstrakulikuler --}}
    <section class="py-12 bg-green-600">
        <div class="container">
            <div class="text-center mb-8">
                <h2 class="title !text-white">Ekstrakulikuler</h2>
                <p class="text-lg !text-white max-w-lg mx-auto">Kembangkan bakat dan minat santri dengan bimbinang
                    khusus dari pembimbing
                    yang menguasai bidangnya (minta saran tulisan ini)</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                @foreach (array_slice(config('common.ekstrakulikuler.items'), 0, 3) as $item)
                    <x-card-ekstrakulikuler :item="$item" />
                @endforeach
            </div>
            <a href="{{ route('ekstrakulikuler') }}"
                class="btn !bg-white font-semibold !text-green-500 hover:!text-green-600 text-lg mx-auto block w-fit mt-8">Ekstrakulikuler
                Lainnya</a>
        </div>
    </section>
    <hr>
    {{-- artikel dan berita --}}
    <section class="py-12">
        <div class="container">
            <h2 class="title">Artikel & Berita</h2>
        </div>
    </section>
    <hr>
    {{-- ayo daftar --}}
    <section class="py-8 bg-green-600">
        <div class="container">
            <div class="flex flex-col lg:flex-row justify-between italic items-center text-center gap-8">
                <h2 class="text-2xl font-semibold text-white">Ayo mondok di Ponpes Nurul Iman Sindangkerta</h2>
                <a href="{{ route('kontak') }}"
                    class="btn !bg-white hover:!bg-gray-100 !text-black font-semibold">Daftar
                    Mondok</a>
            </div>
        </div>
    </section>
    <hr>
    {{-- fasilitas --}}
    <section class="py-12">
        <div class="container">
            <h2 class="title">Fasilitas</h2>
        </div>
    </section>
</x-layout>
