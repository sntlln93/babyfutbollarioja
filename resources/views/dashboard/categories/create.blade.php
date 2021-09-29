@extends('dashboard.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Nueva categoría</h1>
</div>

<div class="row">
    <div class="col-sm-12 col-md-8 mx-auto">

        <form action="{{ route('categories.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf

            <div class="form-row mb-2">
                <div class="col-sm-12">
                    <label for="name">Nombre de la categoría</label>
                    <input type="text" placeholder="Colocá el año en un formato de 4 dígitos. Ej: 2005, 2009, etc"
                        name="name" class="form-control" value="{{ old('name') }}" required>
                    <span class="invalid-feedback" role="alert">
                        <strong>Este campo es obligatorio</strong>
                    </span>
                    @error('name') <small class="text-danger"><strong>{{ $message }}</strong></small> @enderror
                </div>
            </div>

            <button class="my-3 btn btn-primary w-100" type="submit">Guardar categoría</button>
        </form>
    </div>
</div>

@endsection


@section('scripts')
@include('dashboard._partials.validation')
@endsection