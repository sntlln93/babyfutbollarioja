@section('hero')
<div class="item-slider" style="background:url({{ asset('storage/'.$tournament->photo) }});">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="info-slider">
                    <h1>{{ $tournament->name }}</h1>
                    <p>Jugá con nosotros, nos jugamos por vos.</p>
                </div>
                @if($tournament->clubs)
                <div class="clubs">
                    @foreach ($tournament->clubs as $club)
                    <div class="clubs__logo">
                        <img src="{{ asset('storage/'.$club->logo) }}" alt="">
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection