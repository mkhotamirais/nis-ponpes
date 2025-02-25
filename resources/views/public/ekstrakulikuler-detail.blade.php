<x-layout>
    <x-section-hero title="Ekstrakulikuler {{ ucfirst(Request::segment(2)) }}" description="Ekstrakulikuler pondok" />
    <section class="py-12">
        <div class="container">
            <div class="">
                @foreach (config('common.ekstrakulikuler.items') as $item)
                    @if ($item['name'] == Request::segment(2))
                        <div>
                            <h2 class="title capitalize">
                                {{ $item['name'] }}
                            </h2>
                            <div class="space-y-4">
                                <p class="text-3xl border">Nanti di sini carousel / slider (butuh minimal 4 gambar)</p>
                                <p class="text-3xl border">Terus di sini detail ekstrakulikuler, kaya pembimbing,
                                    keterangan
                                    atau informasi lain yang perlu ditampilin</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
