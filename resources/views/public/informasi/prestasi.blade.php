<x-layout :title="config('common.meta.informasi.prestasi.title')" :description="config('common.meta.informasi.prestasi.description')">
    <x-section-hero title="Prestasi" :description="config('common.home.achievement.description')" />
    <section class="py-12">
        <div class="container">
            <article class="grid grid-cols-1 gap-8">
                @foreach ($achievements as $item)
                    <x-card-achievement :item="$item"></x-card-achievement>
                @endforeach
            </article>
            <div class="max-w-3xl mt-8">
                {{ $achievements->links() }}
            </div>
        </div>
    </section>
</x-layout>
