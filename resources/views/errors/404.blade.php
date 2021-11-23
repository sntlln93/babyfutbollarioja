@extends('web.layouts.app')

@section('content')

<section class="container">
    <div class="row">
        <div class="page-error">
            <h1>404 <i class="fa fa-unlink"></i></h1>
            <hr class="tall">
            <p class="lead">La página que estás buscando no existe, si crees que se trata de un error por favor
                contactanos.</p>
            <a href="{{ route('web.index') }}" class="btn btn-lg btn-primary">Volver a {{ env('APP_NAME') }}</a>
        </div>
    </div>
</section>

@endsection