<x-layout>
    {{-- hero --}}
    <section class="py-12">
        <div class="container">
            <div class="py-16 flex flex-col gap-4 justify-center items-center text-center">
                <h1 class="text-4xl lg:text-5xl leading-snug font-bold">Selamat Datang di<br /> Pondok Pesantren Nurul
                    Iman</br />
                    Sindangkerta</h1>
                <p class="text-xl italic font-semibold">
                    <q>{{ config('common.common.moto') }}</q>
                </p>
                <div class="flex gap-2 items-center py-8">
                    <button class="btn">Daftar</button>
                    <button class="btn">Tentang Pondok</button>
                </div>
            </div>
        </div>
    </section>
    <hr>
    {{-- sambutan pengasuh --}}
    <section class="py-12">
        <div class="container">
            <h2 class="title">Sambutan Pengasuh</h2>
        </div>
    </section>
    <hr>
    {{-- prestasi --}}
    <section class="py-12">
        <div class="container">
            <h2 class="title">Prestasi</h2>
        </div>
    </section>
    <hr>
    {{-- ekstrakulikuler --}}
    <section class="py-12">
        <div class="container">
            <h2 class="title">Ekstrakulikuler</h2>
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
    <section class="py-6">
        <div class="container">
            <div class="flex flex-col lg:flex-row justify-between italic items-center text-center gap-8">
                <h2 class="title">Ayo mondok di Ponpes Nurul Iman Sindangkerta</h2>
                <a href="{{ route('kontak') }}" class="btn w-fit">Daftar</a>
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
