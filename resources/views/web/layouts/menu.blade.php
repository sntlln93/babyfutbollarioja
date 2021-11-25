<li>
    <a href="{{ route('web.index') }}">Inicio</a>
</li>

@if(isset($tournaments) && $tournaments->count() > 0)

<li class="current">
    <a href="#">Torneos</a>
    <ul class="sub-current">
        @foreach ($tournaments as $tournament)
        <li>
            <a href="{{ route('web.tournament.show', ['tournament' => $tournament->id])}}">{{ $tournament->name }}</a>
        </li>
        @endforeach
    </ul>
</li>
@endif

<li class="current">
    <a href="#">Reglamentos</a>
    <ul class="sub-current">
        <li>
            <a href="{{ route('web.general.regulation')}}">Reglamento general</a>
        </li>
        {{-- <li>
            <a href="{{ route('web.disciplinary.regulation')}}">Reglamento disciplinario</a>
        </li>
        <li>
            <a href="{{ route('web.game.regulation')}}">Reglamento de juego</a>
        </li> --}}
    </ul>
</li>

<li>
    <a href="{{ route('web.sponsors') }}">Auspiciantes</a>
</li>

<li>
    <a href="{{ route('web.about-us') }}">Quiénes somos</a>
</li>