@extends('dashboard.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Nuevo torneo</h1>
</div>

<div class="row">
    <div class="col-sm-12 col-md-8 mx-auto">
        <form action="{{ route('tournaments.store') }}" method="POST" class="needs-validation"
            enctype="multipart/form-data" novalidate>
            @csrf

            <div class="form-row mb-2">
                <div class="col-sm-12">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control @error('name') invalid-feedback @enderror" id="name"
                        name="name" placeholder="Nombres" value="{{ old('name') }}" required>
                    <span class="invalid-feedback" role="alert">
                        <strong>Este campo es obligatorio</strong>
                    </span>
                    @error('name')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-2">
                <div class="col-sm-12">
                    <label for="type_id">Tipo</label>
                    <select class="custom-select form-control @error('type_id') invalid-feedback @enderror" name="type"
                        required>
                        <option></option>
                        @foreach (config('types') as $type)
                        <option value="{{ $type }}" @if(old('type', null)==$type) selected @endif>
                            {{ Str::title($type) }}</option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback" role="alert">
                        <strong>Este campo es obligatorio</strong>
                    </span>
                    @error('type')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-2">
                <div class="col-sm-12">
                    <label>Doble partido</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="double_game" id="double_game" type="checkbox"
                                value="1">
                            <label class="form-check-label" for="double_game">Sí</label>
                        </div>
                    </div>
                    @error('double_game')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-2">
                <div class="col-sm-12">
                    <label for="categories">Categorías participantes</label>
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
                    @error('categories')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-2">
                <div class="col-sm-12">
                    <label for="categories">Visibilidad</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="is_active" type="checkbox" id="isActive" value="1">
                            <label class="form-check-label" for="isActive">Mostrar en la página principal</label>
                        </div>
                    </div>

                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="is_public" type="checkbox" id="isPublic" value="1"
                                checked>
                            <label class="form-check-label" for="isPublic">Torneo público</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row mb-2" id="photoContainer">
                <div class="col-sm-12">
                    <label for="photo">Foto (<small>Ésta se
                            mostrará en la página web y será lo primero ue vean los visitantes de la
                            página.</small>)</label>

                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" name="photo"
                                class="custom-file-input @error('photo') border-danger @enderror">
                            <label id="file_inner" class="custom-file-label" for="photo">Elegí una foto.</label>
                        </div>
                    </div>
                    <span class="invalid-feedback" role="alert">
                        <strong>Este campo es obligatorio</strong>
                    </span>
                    @error('photo')
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

@section('scripts')
@include('dashboard._partials.validation')

<script>
    const isActive = document.getElementById('isActive');
    const isPublic = document.getElementById('isPublic');

    isPublic.addEventListener('change', () => {
        isActive.checked = isPublic.checked ? isActive.checked : false;
    });

    isActive.addEventListener('change', () => {
        isPublic.checked = isActive.checked ? true : isPublic.checked;
    });
</script>
@endsection