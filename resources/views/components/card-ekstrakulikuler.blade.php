@props([
    'item' => [],
])

<div class="rounded-md overflow-hidden shadow-md bg-white flex flex-col">
    <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}"
        onload="this.classList.remove('bg-gray-300', 'animate-pulse')"
        class="animate-pulse bg-gray-300 h-64 object-cover object-center w-full">
    <h2 class="px-4 pt-4 pb-2 text-center capitalize text-green-600 font-bold text-lg">{{ $item['name'] }}
    </h2>
    <p class="text-gray-500 grow px-4 text-center">{{ $item['description'] }}</p>
    <a href="{{ route('ekstrakulikuler-detail', ['name' => $item['name']]) }}"
        class="btn !py-2 my-4 font-semibold mx-auto w-fit">Selengkapnya</a>
</div>
