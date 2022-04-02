@extends('web.welcome.welcome_partial')

@section('hero')
<div class="item-slider" style="background:url({{ asset('img/default-bg.jpg') }});">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="info-slider">
                    <h1>Torneos 2022</h1>
                    <p>Jugá con nosotros, nos jugamos por vos.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection