<x-layout>
    <x-section-hero title="Berita" :description="config('common.home.newsarticles.description')" />
    <section class="py-12">
        <div class="container">
            <article class="grid grid-cols-1 gap-8">
                @foreach ($newsarticles as $item)
                    <x-card-newsarticle :item="$item"></x-card-newsarticle>
                @endforeach
            </article>
            <div class="max-w-3xl mt-8">
                {{ $newsarticles->links() }}
            </div>
        </div>
    </section>
</x-layout>
