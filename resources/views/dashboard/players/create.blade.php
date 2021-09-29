@extends('dashboard.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Nuevo jugador</h1>
</div>

<div class="row">
    <div class="col-sm-12 col-md-8 mx-auto">
        <form action="{{ route('players.store') }}" method="POST" class="needs-validation" novalidate
            enctype="multipart/form-data">
            @csrf

            <div class="form-row mb-2">
                <div class="col-sm-12">
                    <label for="lastname">Apellido</label>
                    <input type="text" class="form-control @error('lastname') border-danger @enderror" id="lastname"
                        name="lastname" placeholder="Apellidos" value="{{ old('lastname') }}" required>
                    <span class="invalid-feedback" role="alert">
                        <strong>Este campo es obligatorio</strong>
                    </span>
                    @error('lastname')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-2">
                <div class="col-sm-12">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control @error('name') border-danger @enderror" id="name" name="name"
                        placeholder="Nombres" value="{{ old('name') }}" required>
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
                    <label for="dni">DNI</label>
                    <input type="text" class="form-control @error('dni') border-danger @enderror" id="dni" name="dni"
                        placeholder="DNI" value="{{ old('dni') }}" required>
                    <span class="invalid-feedback" role="alert">
                        <strong>Este campo es obligatorio</strong>
                    </span>
                    @error('dni')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-2">
                <div class="col-sm-12">
                    <label for="born_in">Fecha de nacimiento</label>
                    <input type="date" class="form-control @error('born_in') border-danger @enderror" id="born_in"
                        name="born_in" placeholder="Fecha de nacimiento" value="{{ old('born_in') }}" required>
                    <span class="invalid-feedback" role="alert">
                        <strong>Este campo es obligatorio</strong>
                    </span>
                    @error('born_in')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-2">
                <div class="col-sm-12">
                    <label for="photo">Foto <small><i>(OPCIONAL)</i></small></label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" name="photo"
                                class="custom-file-input @error('photo') border-danger @enderror" id="photo">
                            <label id="file_inner" class="custom-file-label" for="photo">Elegí un foto para este
                                jugador</label>
                        </div>
                    </div>
                    @error('photo')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-2">
                <div class="col-sm-12 col-md-8">
                    <label for="club_id">Club</label>
                    <select class="custom-select" id="clubs" name="club_id" disabled>
                        <option selected>Elegí el club</option>
                        @foreach ($clubs as $club)
                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback" role="alert">
                        <strong>Este campo es obligatorio</strong>
                    </span>
                    @error('club_id')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-sm-12 col-md-4">
                    <label for="category_id">Categoría</label>
                    <select class="custom-select" id="available_categories" name="category_id" disabled>
                        <option selected>Elegí la categoría</option>
                    </select>

                    <span class="invalid-feedback" role="alert">
                        <strong>Este campo es obligatorio</strong>
                    </span>
                    @error('category_id')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <button class="my-3 btn btn-primary w-100" type="submit">Guardar jugador</button>
        </form>
    </div>
</div>

@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('scripts')

<script>
    const base_url = "{{ env('APP_URL') }}";
    const bornDateInput = document.getElementById("born_in");
        const clubSelect = document.getElementById("clubs");
        const categorySelect = document.getElementById("available_categories");

        const token = document.getElementsByName("_token")[1].value;

        const clearSelects = () => {

            Array.from(clubSelect.childNodes).forEach(option => {
                option.selected = false;
            })

            clubSelect.disabled = false;
            categorySelect.disabled = false;
        }

        const drawCategories = (categories) => {
            categorySelect.disabled = false;

            Array.from(categorySelect.childNodes).forEach(option => {
                categorySelect.removeChild(option);
            })
            const placeholderOption = document.createElement('option');
            placeholderOption.innerText = "Elegí la categoría";
            categorySelect.appendChild(placeholderOption);

            Array.from(categories).forEach(category => {
                const categoryOption = document.createElement('option');
                categoryOption.value = category.id;
                categoryOption.innerText = category.name;
                categorySelect.appendChild(categoryOption);
            });
        }

        const getCategories = () => {
            clubSelect.disabled = false;
            fetch(`${base_url}/dashboard/players-category`, {
                method: 'POST',
                body: JSON.stringify({
                    'born_in': bornDateInput.value,
                    "_token": token
                }),
                headers: {
                    'Content-type': 'application/json'
                }
            }).then(response => {
                if (response.ok) {
                    return response.json();
                }
                return Promise.reject(response);
            }).then(data => {
                drawCategories(data);
            }).catch(error => {
                console.error(error);
            });
        }

        bornDateInput.addEventListener("change", clearSelects);

        clubSelect.addEventListener("change", getCategories);

</script>

@include('dashboard._partials.validation')
@endsection