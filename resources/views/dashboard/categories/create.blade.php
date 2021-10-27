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
                    @foreach (config('allowed_years') as $year) <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="years{{ $loop->index }}" name="years[]"
                            value="{{ $year }}">
                        <label class="form-check-label" for="years{{ $loop->index }}">{{ $year }}</label>
                    </div>
                    @endforeach
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