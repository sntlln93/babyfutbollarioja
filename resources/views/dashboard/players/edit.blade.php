@extends('dashboard.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Modificar jugador</h1>
</div>

<div class="row">
    <div class="col-sm-12 col-md-8 mx-auto">
        <form action="{{ route('players.update', ['player' => $player->id]) }}" method="POST" class="needs-validation"
            novalidate>
            @csrf
            @method('put')

            <div class="form-row mb-2">
                <div class="col-sm-12">
                    <label for="lastname">Apellido</label>
                    <input type="text" class="form-control @error('lastname') border-danger @enderror" id="lastname"
                        name="lastname" placeholder="Apellidos" value="{{ $player->lastname ?? old('lastname') }}"
                        required>
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
                        placeholder="Nombres" value="{{ $player->name ?? old('name') }}" required>
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
                        placeholder="DNI" value="{{ $player->dni ?? old('dni') }}" required>
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

            <button class="my-3 btn btn-primary w-100" type="submit">Guardar torneo</button>
        </form>
    </div>
</div>

@endsection

@section('scripts')
@include('dashboard._partials.validation')
@endsection