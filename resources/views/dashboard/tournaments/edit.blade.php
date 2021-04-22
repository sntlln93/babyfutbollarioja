@extends('dashboard.layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Modificar torneo</h1>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-8 mx-auto">
            <form action="{{ route('tournaments.update', ['tournament' => $tournament->id]) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('put')

                <div class="form-row mb-2">
                    <div class="col-sm-12">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control @error('name') invalid-feedback @enderror" value="{{ $tournament->name }}" id="name"
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

                <button class="my-3 btn btn-primary w-100" type="submit">Confirmar modificaciones</button>
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
            $('.my-select').select2();
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
