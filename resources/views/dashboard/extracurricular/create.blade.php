<x-authlayout title="Buat Ekstrakulikuler Baru">
    {{-- session message --}}
    @if (session('success'))
        <x-flash-msg message="{{ session('success') }}"></x-flash-msg>
    @endif

    <form action="{{ route('extracurriculars.store') }}" method="POST" class="mt-8" enctype="multipart/form-data">
        @csrf

        {{-- Name --}}
        <div class="mb-4">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="input @error('name') !ring-red-500 @enderror">
            @error('name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        {{-- detail --}}
        <div class="mb-4">
            <label for="detail">Detail</label>
            <textarea name="detail" id="detail" cols="30" rows="5"
                class="input @error('detail') !ring-red-500 @enderror">{{ old('detail') }}</textarea>
            @error('detail')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        {{-- banner --}}
        <div class="mb-3">
            <label for="banner">Banner</label>
            <input type="file" name="banner" id="banner" class="input @error('banner') !ring-red-500 @enderror">
            @error('banner')
                <p class="error">{{ $message }}</p>
            @enderror
            <div id="preview-container" class="mt-2 hidden">
                <img id="image-preview" src="" class="w-40 h-auto rounded shadow-md">
                <button type="button" id="remove-image"
                    class="text-red-500 hover:underline text-sm mt-1">Remove</button>
            </div>
        </div>

        <div class="mb-4">
            <label for="images">Extracurricular Images</label>
            <input class="input" type="file" id="images" name="images[]" multiple accept="image/*"
                onchange="previewImages(event, 'preview-container-create')">
            <div id="preview-container-create" class="mb-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-2">
            </div>

            @error('images.*')
                <div>{{ $message }}</div>
            @enderror
        </div>

        {{-- submit --}}
        <button type="submit"
            class="bg-orange-500 hover:bg-orange-600 transition py-2 px-6 rounded-full text-white">Create</button>
    </form>

    <script>
        ClassicEditor
            .create(document.querySelector('#detail'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const fileInput = document.getElementById("banner");
            const previewContainer = document.getElementById("preview-container");
            const imagePreview = document.getElementById("image-preview");
            const removeButton = document.getElementById("remove-image");

            fileInput.addEventListener("change", function() {
                const file = this.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        previewContainer.classList.remove("hidden");
                    };

                    reader.readAsDataURL(file);
                }
            });

            removeButton.addEventListener("click", function() {
                fileInput.value = ""; // Reset file input
                imagePreview.src = "";
                previewContainer.classList.add("hidden");
            });
        });
    </script>
</x-authlayout>
