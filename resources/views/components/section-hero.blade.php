@props([
    'title' => 'Hero',
    'description' => 'Description',
])

<section>
    <div class="container">
        <div class="h-40 flex flex-col items-center justify-center border-b text-center">
            <h1 class="title">{{ $title }}</h1>
            <p class="text-gray-500 mt-2">{{ $description }}</p>
        </div>
    </div>
</section>
