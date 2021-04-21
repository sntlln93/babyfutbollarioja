<li>
    <a href="{{ route('web.index') }}">Inicio</a>
</li>

<li class="current">
    <a href="{{ route('web.tournaments')}}">Torneos</a>
    <ul class="sub-current">
        <li>
            <a href="{{ route('web.tournament', ['tournament' => 1])}}">Regional</a>
        </li>
        <li>
            <a href="{{ route('web.tournament', ['tournament' => 2])}}">Federal</a>
        </li>
    </ul>
</li>

<li>
    <a href="{{ route('web.sponsors') }}">Auspiciantes</a>
</li>

<li>
    <a href="{{ route('web.about-us') }}">Quiénes somos</a>
</li>