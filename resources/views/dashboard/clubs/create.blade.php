@extends('dashboard.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Nuevo club</h1>
</div>

<div class="row">
    <div class="col-sm-12 col-md-8 mx-auto">
        <form action="{{ route('clubs.store') }}" method="POST" class="needs-validation" novalidate
            enctype="multipart/form-data">
            @csrf

            @include('dashboard.clubs._form')

            <div class="form-row mb-2">
                <div class="col-sm-12">
                    <label class="" for="categories">Categorías</label>
                    <div>
                        @foreach ($categories as $category)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="categories[]" type="checkbox"
                                id="category{{ $category->id }}" value="{{ $category->id }}">
                            <label class="form-check-label" for="category{{ $category->id }}">{{ $category->name
                                }}</label>
                        </div>
                        @endforeach
                    </div>
                    <small id="categoryHelp" class="form-text text-muted">
                        Se creará un equipo por cada categoría seleccionada.
                    </small>
                    @error('categories')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-2">
                <div class="col-sm-12">
                    <label for="name">Escudo</label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" name="logo"
                                class="custom-file-input @error('logo') border-danger @enderror" id="logo" required>
                            <label id="file_inner" class="custom-file-label" for="logo">Elegí el escudo</label>
                        </div>
                    </div>
                    <span class="invalid-feedback" role="alert">
                        <strong>Este campo es obligatorio</strong>
                    </span>
                    @error('logo')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>


            <button class="my-3 btn btn-primary w-100" type="submit">Guardar torneo</button>
        </form>
    </div>
</div>

@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('scripts')

<script>
    const fileInput = document.getElementById("logo");

        fileInput.addEventListener("change", () => {
            const file_name = fileInput.value.replace(/^.*?([^\\\/]*)$/, '$1');
            document.getElementById("file_inner").innerText = file_name;
        });

</script>

@include('dashboard._partials.validation')
@endsection