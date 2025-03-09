<x-layout>
    <x-section-hero title="Ekstrakulikuler" :description="config('common.home.ekstrakulikuler.description')" />
    <section class="py-12">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                @foreach (config('common.ekstrakulikuler.items') as $item)
                    <x-card-ekstrakulikuler :item="$item" />
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
