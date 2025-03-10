@props(['item' => []])

<div class="">
    <figure class="bg-white rounded-lg overflow-hidden">
        <img src="{{ $item->banner ? asset('storage/' . $item->banner) : asset('storage/images/ponpes-nis-logo.png') }}"
            alt="{{ $item->caption }}" loading="lazy"
            class="{{ $item->banner ? 'object-cover' : 'object-contain scale-90' }} h-48 w-full z-40">
        <a href="{{ route('extracurriculars.show', $item) }}" class="">
            <figcaption
                class="figure-caption text-center text-xl font-bold text-green-600 first-letter:capitalize leading-loose">
                {{ $item->name }}
            </figcaption>
        </a>
    </figure>

    {{ $slot }}
</div>
