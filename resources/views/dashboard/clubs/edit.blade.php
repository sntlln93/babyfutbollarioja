@extends('dashboard.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Modificar club</h1>
</div>

<div class="row">
    <div class="col-sm-12 col-md-8 mx-auto">
        <form action="{{ route('clubs.update', ['club' => $club->id]) }}" method="POST" class="needs-validation"
            novalidate>
            @csrf
            @method('put')

            @include('dashboard.clubs._form')

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

@include('dashboard._partials.validation')
@endsection