<x-authlayout title="Edit Ekstrakulikuler">
    {{-- Session Messages --}}
    @if (session('success'))
        <x-flash-msg message="{{ session('success') }}"></x-flash-msg>
    @endif

    <form action="{{ route('extracurriculars.update', $extracurricular) }}" method="POST" class="mt-8"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div class="mb-4">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $extracurricular->name }}"
                class="input @error('name') !ring-red-500 @enderror">
            @error('name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        {{-- detail --}}
        <div class="mb-4">
            <label for="detail">Detail</label>
            <textarea name="detail" id="detail" cols="30" rows="5"
                class="input @error('detail') !ring-red-500 @enderror">{{ $extracurricular->detail }}</textarea>
            @error('detail')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <script>
            ClassicEditor
                .create(document.querySelector('#detail'))
                .catch(error => {
                    console.error(error);
                });
        </script>

        {{-- current cover photo if exist --}}
        @if ($extracurricular->banner)
            <label>Current banner</label>
            <figure class="h-40 w-64 rounded-md mb-4 overflow-hidden">
                <img src="{{ asset('storage/' . $extracurricular->banner) }}"
                    alt="{{ $extracurricular->name ?? 'carrental image' }}" width="400" height="400"
                    class="w-full h-full object-cover origin-center">
            </figure>
        @endif

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

        {{-- Current Images --}}
        @if ($extracurricular->extracurricularimages->count() > 0)
            <div class="mb-4">
                <label>Current Images</label>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-2">
                    @foreach ($extracurricular->extracurricularimages as $image)
                        <div>
                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                alt="{{ $extracurricular->name ?? 'image' }}"
                                class="w-full h-32 object-cover object-center rounded-lg">
                            <label>
                                <input type="checkbox" name="delete_images[]" value="{{ $image->id }}">
                                Delete
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Tour Images --}}
        <div class="mb-4">
            <label for="images">Add Tour Images</label>
            <input class="input" type="file" id="images" name="images[]" multiple accept="image/*"
                onchange="previewImages(event, 'preview-container-update')">
            @error('images.*')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div id="preview-container-update" class="mb-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-2">
        </div>

        {{-- submit --}}
        <button type="submit"
            class="bg-orange-500 hover:bg-orange-600 transition py-2 px-6 rounded-full text-white">Save</button>
    </form>

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
