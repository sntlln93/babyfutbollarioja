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
                    <label for="name">Escudo</label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" name="shield"
                                class="custom-file-input @error('shield') border-danger @enderror" id="shield" required>
                            <label id="file_inner" class="custom-file-label" for="shield">Elegí el escudo</label>
                        </div>
                    </div>
                    <span class="invalid-feedback" role="alert">
                        <strong>Este campo es obligatorio</strong>
                    </span>
                    @error('shield')
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
    const fileInput = document.getElementById("shield");

        fileInput.addEventListener("change", () => {
            const file_name = fileInput.value.replace(/^.*?([^\\\/]*)$/, '$1');
            document.getElementById("file_inner").innerText = file_name;
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
@endsection