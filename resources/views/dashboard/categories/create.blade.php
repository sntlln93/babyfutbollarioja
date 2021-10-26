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
                    <input type="text" placeholder="Colocá el nombre de la categoría" name="name" class="form-control"
                        value="{{ old('name') }}" required>
                    <span class="invalid-feedback" role="alert">
                        <strong>Este campo es obligatorio</strong>
                    </span>
                    @error('name') <small class="text-danger"><strong>{{ $message }}</strong></small> @enderror
                </div>
            </div>

            <div class="form-row mb-2">
                <label>Años permitidos</label>
                <div class="col-sm-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="free" value="libre">
                        <label class="form-check-label" for="free">Categoría libre</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="years2" name="years[]" value="2004">
                        <label class="form-check-label" for="years2">2004</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="years3" name="years[]" value="2006">
                        <label class="form-check-label" for="years3">2006</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="years4" name="years[]" value="2008">
                        <label class="form-check-label" for="years4">2008</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="years5" name="years[]" value="2010">
                        <label class="form-check-label" for="years5">2010</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="years6" name="years[]" value="2012">
                        <label class="form-check-label" for="years6">2012</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="years7" name="years[]" value="2014">
                        <label class="form-check-label" for="years7">2014</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="years8" name="years[]" value="2016">
                        <label class="form-check-label" for="years8">2016</label>
                    </div>
                    <span class="invalid-feedback" role="alert">
                        <strong>Este campo es obligatorio</strong>
                    </span>
                    @error('years') <small class="text-danger"><strong>{{ $message }}</strong></small> @enderror
                </div>
            </div>
            <button class="my-3 btn btn-primary w-100" type="submit">Guardar categoría</button>
        </form>
    </div>
</div>

@endsection


@section('scripts')
@include('dashboard._partials.validation')

<script>
    const freeCheckbox = document.getElementById('free');
    const yearsCheckboxes = document.querySelectorAll('input[name="years[]"]');

    freeCheckbox.addEventListener('change', () => {
        if (freeCheckbox.checked) {
            yearsCheckboxes.forEach(checkbox => {
                checkbox.checked = false;
            });
        }
    });

    yearsCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            if (checkbox.checked) {
                freeCheckbox.checked = false;
            }
        });
    });
</script>
@endsection