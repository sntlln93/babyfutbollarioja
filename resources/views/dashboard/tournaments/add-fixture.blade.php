@extends('dashboard.layouts.app')

@php
$clubsLength = count($tournament->clubs);
$doubleGame = $tournament->double_game + 1;
$datesLength = ($clubsLength % 2 === 0)
? ($clubsLength - 1) * $doubleGame
: $clubsLength * $doubleGame;

@endphp

@section('styles')
<style>
    .dateBtn {
        background-color: #fff;
        border: 1px solid rgba(204, 204, 204, 0.8);
        border-radius: 2em;
        color: #000;
        padding: 5px 10px;
        text-align: center;
        margin: .2em;
        outline: none;
    }

    .dateBtn:focus {
        outline: none;
    }

    .dateBtn:hover,
    .dateBtn--selected {
        background-color: #2E59D9;
        color: #fff;
        font-weight: bold;
        border: 1px solid rgba(204, 204, 204, 0.8);
    }
</style>
@endsection

@section('content')
<!-- Page Heading -->
<div class=" d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Agregar fixture a Torneo {{ $tournament->name }}</h1>
</div>

<form action="{{ route('tournaments.add-fixture', ['tournament' => $tournament->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="_games_count"
        value="{{ $clubsLength % 2 === 0 ? $clubsLength / 2 : ($clubsLength - 1) / 2 }}">
    <input type="hidden" name="_dates_count" value="{{ $datesLength }}">
    <div id="hidden-inputs">
    </div>

    <div class="card mb-3">
        <div class="card-header">
            @for ($i = 1; $i <= $datesLength; $i++) <button id="dateBtn{{ $i }}"
                class="dateBtn {{ $i === 1 ? 'dateBtn--selected' : '' }}">Fecha {{ $i
                }}</button>
                @endfor
        </div>

        <div class="card-body">
            <div id="gamesContainer">
            </div>
        </div>
    </div>

    @if($errors->any())
    <div class="mt-3 alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <button class="btn btn-primary w-100" type="submit">Confirmar fixture</button>
</form>

@endsection

@section('scripts')
<script>
    const datesLength = {{ $datesLength }};
    const gamesContainer = document.getElementById('gamesContainer');
    const clubs = @json($tournament->clubs);
    const categories = @json($tournament->categories);

    const fillTeams = (teams) => {
        const selectables = document.createElement('select');
        selectables.classList.add('custom-select');
        selectables.innerHTML = `<option value="">Seleccione un equipo</option>`;

        teams.forEach(team => {
            const option = document.createElement('option');
            option.value = team.id;
            option.innerText = team.name;
            selectables.appendChild(option);
        });

        return selectables;
    }

    const displayGames = (date, teams, dateContainer) => {
        let games = [];
        const selectables = fillTeams(teams);
        selectables.dataset.date = date;
        const versusSpan = document.createElement('span');
        versusSpan.innerText = ' vs ';
        versusSpan.classList ='badge badge-success mx-2 px-2 d-flex align-items-center';

        let teamsLength = teams.length;
        let gamesLength = teamsLength % 2 === 0 ? teamsLength / 2 : (teamsLength - 1) / 2;

        for (let i = 1; i <= gamesLength; i++) {
            const game = document.createElement('div');
            game.dataset.gameOrder = i;
            game.classList = 'd-flex my-2';
            
            const localSelectable = selectables.cloneNode(true);            
            localSelectable.dataset.condition = 'local';
            const awaySelectable = selectables.cloneNode(true);            
            awaySelectable.dataset.condition = 'away';

            game.appendChild(localSelectable);
            game.appendChild(versusSpan.cloneNode(true));
            game.appendChild(awaySelectable);
            
            dateContainer.appendChild(game);
        }
    }
    
    const displayDates = (teams) => {
        for(let i = 1; i <= datesLength; i++) {
            const dateContainer = document.createElement('div');
            dateContainer.classList = (i === 1) ? 'dateContainer' : 'dateContainer d-none';
            dateContainer.id = `date${i}`;

            const games = displayGames(i, teams, dateContainer);
            gamesContainer.appendChild(dateContainer);
        };
    }

    const handleDateNavigation = (dateBtn) => {
        const dates = document.querySelectorAll('.dateContainer');

        document.querySelector('.dateBtn--selected').classList.remove('dateBtn--selected');
        dateBtn.classList.add('dateBtn--selected');

        dates.forEach(date => {
            date.classList.add('d-none');
        });

        const displayableDate = document.getElementById(`date${dateBtn.id.replace('dateBtn', '')}`);
        displayableDate.classList.remove('d-none');
    }

    document.addEventListener('click', e => {
        const target = e.target;
        if(target.classList.contains('dateBtn')) {
            e.preventDefault();
            handleDateNavigation(target);
        }
    }); 

    const createGameInputs = (name, clubId) => {
        const hiddenInputs = document.querySelector('#hidden-inputs');

        categories.forEach(category => {
            const categorizedName = name.replace('dates[', `games[${category.id}][`)
            let input = document.querySelector(`input[name="${categorizedName}"]`);
            if(!input) {
                input = document.createElement('input');
                input.type = 'hidden';
                input.name = categorizedName;
                input.value = clubId;
            } else {
                input.value = clubId;
            }

            hiddenInputs.appendChild(input);
        });
    }

    const handleSelection = (event) => {

        const select = event.target;
        const date = select.dataset.date;
        const clubId = select.value;
        const gameOrder = select.parentElement.dataset.gameOrder;
        const condition = select.dataset.condition;

        const name = `dates[${date}][${gameOrder}][${condition}]`;

        createGameInputs(name, clubId);
    }

    document.addEventListener('change', (event) => {
        if(event.target.tagName === 'SELECT'){
            handleSelection(event);
        }
    });

    displayDates(clubs);
    
</script>
@endsection