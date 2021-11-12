@extends('dashboard.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $tournament->name }}</h1>
    <small class="mb-0 text-gray-800">{{ Str::upper($tournament->type) }}
        [{{ Str::upper($tournament->double_game ? "Doble partido" : "Partido único") }}]</small>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
    <div class="card-header">
        <h4 class="m-0 font-weight-bold text-primary">Clubes participantes
            @if(!$tournament->games->count() > 0)
            <a href="{{ route('tournaments.add-teams-form', ['tournament' => $tournament->id]) }}"
                class="btn btn-sm btn-success"><i class="fas fa-plus"></i></a>
            @endif
        </h4>
        <p class="m-0 text-muted">Categorías
            @foreach ($tournament->categories as $category)
            <span class="badge badge-info badge-sm">{{ $category->name }}</span>
            @endforeach
        </p>
    </div>
    <div class="card-body clubs">
        @if($tournament->clubs)
        @forelse ($tournament->clubs as $club)
        <div>
            <img src="{{ asset('storage/'.$club->logo) }}" alt="{{ $club->name }}">
        </div>
        @empty
        <p>No hay clubes registrados</p>
        @endforelse
        @endif
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr class="card-header py-3">
                <th colspan="7">
                    <h4 class="m-0 font-weight-bold text-primary">Fixture</h4>
                </th>
            </tr>
            @if($tournament->games->count() > 0)
            <tr class="bg-white">
                <th colspan="7">
                    @foreach ($tournament->categories as $category)
                    <button class="filterBtn" data-filter-category="{{ $category->id }}">{{ 'CAT '. $category->name
                        }}</button>
                    @endforeach
                </th>
            </tr>
            <tr class="bg-white">
                <th colspan="7">
                    @foreach ($dates as $date)
                    <button class="filterBtn" data-filter-date="{{ $date }}">{{ $date }}</button>
                    @endforeach
                </th>
            </tr>
            @endif
            <tr class="text-center">
                <th>#</th>
                <th>Categoría</th>
                <th>Fecha</th>
                <th>Partido</th>
                <th>Resultado</th>
                <th>Finalizar</th>
                <th>Ver</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($games as $game)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $game->category->name }}</td>
                <td>{{ $game->group }}</td>
                <td>{{ $game->name }}</td>
                <td>
                    @if(is_int($game->local_score) && is_int($game->away_score))
                    <h4><span class="badge badge-success">
                            {{ $game->local_score }} - {{ $game->away_score }}
                        </span></h4>
                    @else
                    <span class="badge badge-warning">
                        <i class="fas fa-clock"></i>
                        Pendiente
                    </span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('games.end-form', ['game' => $game->id]) }}"
                        class="btn btn-sm btn-primary {{ is_int($game->local_score) && is_int($game->away_score) ? 'disabled' : '' }}">
                        <i class="fas fa-futbol"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('games.show', ['game' => $game->id]) }}" class="btn btn-sm btn-info"><i
                            class="fas fa-eye"></i></a>
                </td>
            </tr>
            @empty
            <tr class="bg-white">
                <td colspan="7" class="text-center">Este torneo aún no tiene un fixture. Crea uno <a
                        href="{{ route('tournaments.add-fixture-form', ['tournament' => $tournament->id]) }}">acá</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection

@section('styles')
<style>
    .clubs {
        display: flex;
    }

    .clubs>* {
        margin: 1em;
    }

    .clubs img {
        width: auto;
        height: 75px;
    }
</style>
<style>
    .filterBtn {
        background-color: #fff;
        border: 1px solid rgba(204, 204, 204, 0.8);
        border-radius: 2em;
        color: #000;
        padding: 5px 10px;
        text-align: center;
        outline: none;
    }

    .filterBtn:focus {
        outline: none;
    }

    .filterBtn:hover,
    .filterBtn--selected {
        background-color: #2E59D9;
        color: #fff;
        font-weight: bold;
        border: 1px solid rgba(204, 204, 204, 0.8);
    }

    td:nth-child(5),
    td:nth-child(6),
    td:nth-child(7) {
        text-align: center;
    }
</style>
@endsection

@section('scripts')
<script>
    let categoryFilter = "";
    let dateFilter = "";
    const filterUrl = "{{ route('tournaments.filter', ['tournament' => $tournament->id]) }}";
    const endGameUrl = "{{ route('games.end', ['game' => ':game']) }}";
    const showGameUrl = "{{ route('games.show', ['game' => ':game']) }}";

    const showLoading = (isLoading, element) => {
        if(isLoading) {
            element.innerHTML = `<tr class="bg-white"><td colspan="7" class="text-center"><div class="spinner-border text-success"></div></td></tr>`;
        } else {
            element.querySelector('tr').remove();
        }
    }

    const createColumn = (text) => {
        const column = document.createElement('td');
        column.innerHTML = text;

        return column;
    }

    const createRow = (game, index) => {
        //order, category, group, name, result, btn, btn
        const row = document.createElement('tr');
        const resultBadge = `<h4><span class="badge badge-success">${game.local_score} - ${game.away_score}</span></h4>`;
        const pendingBadge = `<span class="badge badge-warning"><i class="fas fa-clock"></i> Pendiente</span>`;
        row.appendChild(createColumn(index + 1));
        row.appendChild(createColumn(game.category.name));
        row.appendChild(createColumn(game.group));
        row.appendChild(createColumn(game.name));
        row.appendChild(createColumn(Number.isInteger(game.local_score) && Number.isInteger(game.away_score) ? resultBadge : pendingBadge)); 
        row.appendChild(createColumn(`<a href="${endGameUrl.replace(':game', game.id)}/" class="btn btn-sm btn-primary"><i class="fas fa-futbol"></i></a>`));
        row.appendChild(createColumn(`<a href="${showGameUrl.replace(':game', game.id)}/" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>`));

        return row;
    }

    const renderGames = (games) => {
        const table = document.querySelector('tbody');
        showLoading(true, table);

        games.forEach((game, index) => {
            table.appendChild(createRow(game, index));
        });
        
        showLoading(false, table);
    }

    const onFilterApplied = (filter) => {
        let selector;
        if(filter.getAttribute('data-filter-category')){
            selector = 'data-filter-category';
            categoryFilter = filter.getAttribute('data-filter-category')
        }
        
        if(filter.getAttribute('data-filter-date')){
            selector = 'data-filter-date';
            dateFilter = filter.getAttribute('data-filter-date')
        }
        const filters = document.querySelectorAll(`button[${selector}]`);
        filters.forEach(filter => filter.classList.remove('filterBtn--selected'));

        fetch(filterUrl + '?category=' + categoryFilter + '&group=' + dateFilter)
        .then(response => response.json())
        .then(games => {
            filter.classList.add('filterBtn--selected');
            renderGames(Object.values(games));
        })
        .catch(error => console.error(error));
    }

    document.addEventListener('click', event => {
        if (event.target.matches('.filterBtn')) {
            onFilterApplied(event.target);
        }
    });
</script>
@endsection