<x-authlayout title="Prestasi">
    <section>
        @if (session('success'))
            <x-flash-msg message="{{ session('success') }}" bg="bg-green-500"></x-flash-msg>
        @endif

        <a href="{{ route('achievements.create') }}" class="btn mb-4">Tambah</a>

        <article class="grid grid-cols-1 gap-2 lg:gap-4">
            @foreach ($achievements as $item)
                <x-card-achievement :item="$item">
                    <div class="flex gap-2">

                        <a href="{{ route('achievements.edit', $item->slug) }}"
                            class="btn !bg-green-500 hover:!bg-green-600">Edit</a>
                        <form action="{{ route('achievements.destroy', $item->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" type="submit"
                                class="btn !bg-red-500 hover:!bg-red-600">Hapus</button>
                        </form>
                    </div>
                </x-card-achievement>
            @endforeach
        </article>
    </section>
</x-authlayout>
