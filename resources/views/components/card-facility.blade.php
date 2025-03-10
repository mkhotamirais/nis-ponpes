@props(['item' => []])

<div class="">
    <figure class="figure">
        <a href="{{ $item->image ? asset('storage/' . $item->image) : asset('storage/logo/logo-nurul-iman-big.png') }}">
            <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('storage/logo/logo-nurul-iman-big.png') }}"
                alt="{{ $item->caption }}" loading="lazy"
                class="{{ $item->image ? 'object-cover' : 'object-contain scale-90' }} rounded-lg h-48 w-full z-40">
        </a>
        <figcaption class="figure-caption text-center text-lg text-gray-600 italic first-letter:capitalize">
            {{ $item->caption }}
        </figcaption>
    </figure>

    {{ $slot }}
</div>
