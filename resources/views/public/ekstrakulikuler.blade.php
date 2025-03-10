<x-layout :title="config('common.meta.ekstrakulikuler.title')" :description="config('common.meta.ekstrakulikuler.description')">
    <x-section-hero title="Ekstrakulikuler" :description="config('common.home.extracurricular.description')" />
    <section class="py-12">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                @foreach ($extracurriculars as $item)
                    <x-card-extracurricular :item="$item"></x-card-extracurricular>
                @endforeach
            </div>
            {{-- <div class="mt-8">
                {{ $extracurriculars->links() }}
            </div> --}}
        </div>
    </section>
</x-layout>
