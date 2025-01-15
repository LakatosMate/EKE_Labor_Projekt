@extends('layouts.app')

@section('title', 'Új bejegyzés létrehozása')

@section('content')
<div class="container rounded bg-white mt-3 mb-3">
    <div class="p-3 py-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-right">Új bejegyzés létrehozása</h2>
        </div>
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-3">
                <div class="col-md-12 mb-3">
                    <label for="title" class="form-label">Cím:</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="short_description" class="form-label">Rövid leírás:</label>
                    <textarea id="short_description" name="short_description" rows="4" class="form-control" placeholder="Pár mondat a bejegyzésről"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Leírás:</label>
                    <textarea id="description" name="description" rows="4" class="form-control"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="image_path" class="form-label">Kép:</label>
                    <div class="input-group">
                        <input type="file" id="image_path" name="image_path" class="form-control">
                        <button class="btn btn-outline-secondary" onclick="previewImage()" type="button">Kép megtekintése</button>
                    </div>
                    <div id="image-preview-container"></div>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="is_published" class="form-label">Publikus:</label>
                    <div class="form-check">
                        <input type="checkbox" id="is_published" name="is_published" value="1" class="form-check-input">
                        <label for="is_published" class="form-check-label">Igen</label>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="date" class="form-label">Dátum:</label>
                    <input type="datetime-local" id="date" name="date" class="form-control" required>
                </div>
                <input type="hidden" name="author_id" value="{{ auth()->id() }}">
            </div>
            <div class="mt-3 text-center">
                <button type="submit" class="btn btn-primary">Létrehozás</button>
            </div>
        </form>
        <script>
            function previewImage() {
                const file = event.target.files ? event.target.files[0] : event.target.previousElementSibling.files[0];
                const previewContainer = document.getElementById("image-preview-container");

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const preview = document.createElement("img");
                        preview.src = e.target.result;
                        preview.style.width = "150px";
                        preview.style.height = "auto";

                        const newLayer = document.createElement("div");
                        newLayer.classList.add("image-preview-layer");
                        newLayer.style.marginTop = "10px";

                        newLayer.appendChild(preview);

                        previewContainer.innerHTML = '';
                        previewContainer.appendChild(newLayer);
                    };

                    reader.readAsDataURL(file);
                }
            }
        </script>
    </div>
</div>
@endsection
