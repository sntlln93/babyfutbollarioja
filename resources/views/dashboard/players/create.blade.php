@extends('dashboard.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Nuevo jugador</h1>
</div>
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
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
                    <input type="number" class="form-control @error('dni') border-danger @enderror" id="dni" name="dni"
                        placeholder="DNI" value="{{ old('dni') }}" pattern="[0-9]{11}" required>
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
                    <input type="date" min="1960-01-01" class="form-control @error('born_in') border-danger @enderror"
                        id="born_in" name="born_in" placeholder="Fecha de nacimiento" value="{{ old('born_in') }}"
                        required>
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
                <div class="col-sm-12">
                    <label for="team_id">Club</label>
                    <select class="custom-select" id="clubs" name="team_id" disabled>
                        <option selected>Elegí el club</option>
                    </select>
                    <span class="invalid-feedback" role="alert">
                        <strong>Este campo es obligatorio</strong>
                    </span>
                    @error('team_id')
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

@section('scripts')

<script>
    const base_url = "{{ env('APP_URL') }}";
    const bornDateInput = document.getElementById("born_in");
    const clubSelect = document.getElementById("clubs");
    const categorySelect = document.getElementById("available_categories");

    const cleanClubs = () => {
        clubSelect.innerHTML = `<option selected>Elegí el club</option>`;
    }

    const createOption = (club) => {
        const option = document.createElement("option");
        option.value = club.id;
        option.text = `${club.name} | Categoría ${club.category}`;
        clubSelect.appendChild(option);
        clubSelect.disabled = false;
    }

    const fillClubs = (clubs) => {
        cleanClubs();
        clubs = Array.isArray(clubs) ? clubs : Object.values(clubs);
       
        clubs.forEach(club => {
            createOption(club);
        });
    }

    const onBornDateChange = () => {
        const bornDate = bornDateInput.value;
        const regex = /^(19|20)\d{2}-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])$/;

        if(regex.test(bornDate)){
            fetch(`${base_url}/dashboard/clubs-by-born-date?born_date=${bornDate}`)
                .then(response => response.json())
                .then(clubs => fillClubs(clubs))
                .catch(error => console.error(error));
        }
    }

    bornDateInput.addEventListener("change", onBornDateChange);

</script>

@include('dashboard._partials.validation')
@endsection