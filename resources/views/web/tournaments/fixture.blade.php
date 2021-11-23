@extends('web.layouts.app')

@section('styles')
<style>
    .filterBtn {
        background-color: #fff;
        border: 1px solid rgba(204, 204, 204, 0.8);
        border-radius: 2em;
        color: #000;
        padding: 5px 10px;
        text-align: center;
        outline: none;
        cursor: pointer;
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
</style>
@endsection

@section('content')
<section class="content-info">

    <div class="container paddings-mini">
        <div class="row">

            <div class="col-lg-12">
                <h3 class="clear-title">Fixture</h3>
            </div>

            <div class="col-lg-12 mb-2">
                <button class="filterBtn filterBtn--selected" data-filter-date="all">Todos</button>
                @foreach ($dates as $date)
                <button class="filterBtn" data-filter-date="{{ $date }}">{{ $date }}</button>
                @endforeach
            </div>

            <div class="col-lg-12">
                <table class="table-striped table-responsive table-hover">
                    <thead>
                        <tr>
                            <th>Local</th>
                            <th class="text-center">VS</th>
                            <th>Visitante</th>
                            <th>Detalles</th>
                        </tr>
                    </thead>
                    <tbody id="games">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    const games = @json($tournament->games);
    const URL = '{{ env('APP_URL') }}' + '/storage/';

    const render = (games) => {
        const table = document.querySelector('#games');
        table.innerHTML = '';
        games.forEach(game => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>
                    <div class="d-flex align-items-center">
                        <img src="${URL}${game.local.logo}"
                            alt="${game.local.name}">
                            <strong>${game.local_score ? '('+game.local_score+')' : ''} ${game.local.name} </strong>
                    </div>
                </td>
                <td class="text-center">VS</td>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="${URL}${game.away.logo}" alt="${game.away.name}">
                        <strong>${game.away_score ? '('+game.away_score+')' : ''} ${game.away.name}</strong>
                    </div>
                </td>
                <td>
                    ${game.group}
                </td>
            `;
            table.appendChild(tr);
        });
    }

    document.addEventListener('click', (event) => {
        const target = event.target;
        const filterBtns = document.querySelectorAll('.filterBtn');

        if(target.classList.contains('filterBtn')) {
            filterBtns.forEach(btn => {
                btn.classList.remove('filterBtn--selected');
            });
            
            target.classList.add('filterBtn--selected');

            if(target.dataset.filterDate === 'all') {
                render(games);
            } else {
                const filteredGames = games.filter(game => game.group === target.dataset.filterDate);
                render(filteredGames);
            }
        }
    });

    render(games);
</script>
@endsection