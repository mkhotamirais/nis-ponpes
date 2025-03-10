<x-layout :title="$extracurricular->name" :description="config('common.meta.ekstrakulikuler.description')">
    <x-section-hero title="Ekstrakulikuler {{ $extracurricular->name }}" :description="config('common.home.extracurricular.description')" />
    <section class="py-12">
        <div class="container">
            <article class="pb-12">
                {!! $extracurricular->detail !!}
            </article>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-1 lg:gap-4">
                @foreach ($extracurricular->extracurricularimages as $image)
                    <a href="{{ asset('storage/' . $image->image_path) }}">
                        <img src="{{ asset('storage/' . $image->image_path) }}"
                            alt="{{ $extracurricular->name ?? 'carrental image' }}"
                            class="w-full h-full object-cover origin-center rounded-lg">
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
