<li>
    <a href="{{ route('web.index') }}">Inicio</a>
</li>

@if($tournaments->count() > 0)

<li class="current">
    <a href="{{ route('web.tournaments')}}">Torneos</a>
    <ul class="sub-current">
        @foreach ($tournaments as $tournament)
        <li>
            <a href="{{ route('web.tournament', ['tournament' => $tournament->id])}}">{{ $tournament->name }}</a>
        </li>
        @endforeach
    </ul>
</li>
@endif

<li>
    <a href="{{ route('web.sponsors') }}">Auspiciantes</a>
</li>

<li>
    <a href="{{ route('web.about-us') }}">Quiénes somos</a>
</li>