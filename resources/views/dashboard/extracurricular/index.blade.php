<x-authlayout title="Ekstrakulikuler">
    @if (session('success'))
        <x-flash-msg message="{{ session('success') }}" bg="bg-green-500"></x-flash-msg>
    @endif

    <a href="{{ route('extracurriculars.create') }}" class="btn mb-4">Tambah</a>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($extracurriculars as $item)
            <x-card-extracurricular :item="$item">
                <div class="flex gap-2">
                    <a href="{{ route('extracurriculars.edit', $item->slug) }}"
                        class="btn !bg-green-500 hover:!bg-green-600">Edit</a>
                    <form action="{{ route('extracurriculars.destroy', $item->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" type="submit"
                            class="btn !bg-red-500 hover:!bg-red-600">Hapus</button>
                    </form>
                </div>
            </x-card-extracurricular>
        @endforeach
    </div>
</x-authlayout>
