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
                    <select class="custom-select form-control @error('type_id') invalid-feedback @enderror "
                        name="type_id" required>
                        <option></option>
                        @foreach ($types as $type)
                        <option value="{{ $type->id }}" data-subtext="{{ $type->name }}">
                            {{ $type->name }}</option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback" role="alert">
                        <strong>Este campo es obligatorio</strong>
                    </span>
                    @error('type_id')
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
                                id="category{{ $category->id }}" value="{{ $category->id }}"
                                data-category="{{ $category->name }}">
                            <label class="form-check-label"
                                for="category{{ $category->id }}">{{ $category->name }}</label>
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
                    <label for="photo">Foto</label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" name="photo"
                                class="custom-file-input @error('photo') border-danger @enderror" id="shield" required>
                            <label id="file_inner" class="custom-file-label" for="photo">Elegí una foto. Ésta se
                                mostrará en la página web y funcionara como foto de portada o presentación del
                                torneo</label>
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

            <div id="fixtures"></div>

            <button class="my-3 btn btn-primary w-100" type="submit">Guardar torneo</button>
        </form>
    </div>
</div>

@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
            $('.categories').select2();
        });

</script>

<script>
    (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

</script>

<script>
    const categories = document.querySelectorAll('.form-check-input');
    const fixtures = document.getElementById('fixtures');

    const createFixture = (category) => {
        const fixture = document.createElement('div');
        fixture.id = `fixture${category.id}`;
        fixture.innerText = `Fixture Categoría ${category.name}`;
        fixtures.appendChild(fixture);
    }

    const onCategorySelected = (event) => {
        const category = event.target;
        if(category.checked) {
            createFixture({id: category.value, name: category.dataset.category});
        } else {
            document.getElementById(`fixture${category.value}`).remove();
        }
    }
    
    categories.forEach(category => category.addEventListener('change', onCategorySelected));
</script>
@endsection