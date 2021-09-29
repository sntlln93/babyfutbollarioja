@extends('dashboard.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Modificar torneo</h1>
</div>

<div class="row">
    <div class="col-sm-12 col-md-8 mx-auto">
        <form action="{{ route('tournaments.update', ['tournament' => $tournament->id]) }}" method="POST"
            class="needs-validation" novalidate>
            @csrf
            @method('put')

            <div class="form-row mb-2">
                <div class="col-sm-12">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control @error('name') invalid-feedback @enderror"
                        value="{{ $tournament->name }}" id="name" name="name" placeholder="Nombres"
                        value="{{ old('name') }}" required>
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

            <button class="my-3 btn btn-primary w-100" type="submit">Confirmar modificaciones</button>
        </form>
    </div>
</div>

@endsection

@section('scripts')
@include('dashboard._partials.validation')
@endsection