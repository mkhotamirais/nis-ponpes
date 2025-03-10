<x-layout :title="config('common.meta.fasilitas.title')" :description="config('common.meta.fasilitas.description')">
    <x-section-hero title="Fasilitas" :description="config('common.home.facilities.description')" />
    <section class="py-12">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($facilities as $facility)
                    <x-card-facility :item="$facility"></x-card-facility>
                @endforeach
            </div>
            <div class="mt-8">
                {{ $facilities->links() }}
            </div>
        </div>
    </section>
</x-layout>
