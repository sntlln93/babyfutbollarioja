<li>
    <a href="{{ route('index') }}">Inicio</a>
</li>

<li class="current">
    <a href="{{ route('tournaments.index')}}">Torneos</a>
    <ul class="sub-current">
        <li>
            <a href="{{ route('tournaments.show', ['id' => 1])}}">Regional</a>
        </li>
        <li>
            <a href="{{ route('tournaments.show', ['id' => 2])}}">Federal</a>
        </li>
    </ul>
</li>

<li>
    <a href="{{ route('sponsors') }}">Auspiciantes</a>
</li>

<li>
    <a href="{{ route('about-us') }}">Quiénes somos</a>
</li>