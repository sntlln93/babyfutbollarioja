@extends('web.layouts.app')

@section('content')

<div class="section-title-team">
    <div class="container">
        <div class="row">
            <div class="col-xl-7">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ asset('storage/'.$team->club->logo) }}" alt="{{ $team->club->name }}">
                    </div>

                    <div class="col-md-9">
                        <h1>{{ $team->club->name }} {{ $team->category->name }}</h1>
                        <ul class="general-info">
                            <li>
                                <h6><strong>Partidos jugados:</strong><br> {{ $stats['gp'] }}</h6>
                            </li>
                            <li>
                                <h6><strong>Partidos ganados:</strong><br> {{ $stats['gw'] }}</h6>
                            </li>
                            <li>
                                <h6><strong>Partidos perdidos:</strong><br> {{ $stats['gl'] }}</h6>
                            </li>
                            <li>
                                <h6><strong>Partidos empatados:</strong><br> {{ $stats['gd'] }}</h6>
                            </li>
                            <li>
                                <h6><strong>Goles a favor:</strong><br> {{ $stats['gf'] }}</h6>
                            </li>
                            <li>
                                <h6><strong>Goles en contra:</strong><br> {{ $stats['ga'] }}</h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if($team->photo)
<div class="bg-image-team" style="background:url(img/clubs-teams/colombia.jpg);"></div>
@endif

<section class="content-info">

    <!-- Single Team Tabs -->
    <div class="single-team-tabs">
        <div class="container">
            <div class="row">
                <!-- Left Content - Tabs and Carousel -->
                <div class="col-xl-12 col-md-12">
                    <!-- Nav Tabs -->
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#squad" data-toggle="tab">Plantel</a></li>
                        <li><a href="#fixtures" data-toggle="tab">Fixture</a></li>
                        <li><a href="#results" data-toggle="tab">Resultados</a></li>
                    </ul>
                    <!-- End Nav Tabs -->
                </div>

                <div class="col-lg-12 padding-top-mini">
                    <!-- Content Tabs -->
                    <div class="tab-content">

                        <!-- Tab Two - squad -->
                        <div class="tab-pane active" id="squad">
                            <div class="row">
                                @foreach ($team->players as $player)
                                <div class="col-xl-3 col-lg-6 col-md-6">
                                    <div class="item-player">
                                        <div class="head-player text-center">
                                            <img src="{{ $player->photo }}" alt="location-team">
                                        </div>
                                        <div class="info-player">
                                            <h4>
                                                {{ $player->full_name }}
                                            </h4>
                                            <ul>
                                                <li><strong>Edad:</strong> <span>{{ $player->born_in->age }}</span>
                                                <li><strong>En plantel desde:</strong> <span>{{
                                                        $player->team->pivot->created_at->isoFormat('D [de] MMM [del]
                                                        YYYY') }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="single-player.html" class="btn">Ver jugador <i
                                                class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End Tab Two - squad -->

                        <!-- Tab Theree - fixtures -->
                        <div class="tab-pane mb-5" id="fixtures">
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
                        <!-- End Tab Theree - fixtures -->

                        <!-- Tab Theree - results -->
                        <div class="tab-pane" id="results">
                            <div class="recent-results results-page">
                                <div class="info-results">
                                    <ul id="endedGames">

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Tab Theree - results -->
                    </div>
                    <!-- Content Tabs -->
                </div>
            </div>
        </div>
    </div>
    <!-- Single Team Tabs -->

</section>
@endsection

@section('scripts')
<script>
    const fixturesTab = document.querySelector('[href="#fixtures"]');
    const fixturesTabContent = document.querySelector('#games');
    const URL = '{{ env('APP_URL') }}';
    const teamId = '{{ $team->id }}';

    const renderFixture = (games) => {
        fixturesTabContent.innerHTML = '';
        games.forEach(game => {
            const tr = document.createElement('tr');
            
            tr.innerHTML = `
                <td>
                    <div class="d-flex align-items-center">
                        <img src="${URL}/storage/${game.local.logo}"
                        alt="${game.local.name}">
                        <a href="${URL}/teams/${game.local.id}">
                            <strong>${game.local_score ? '('+game.local_score+')' : ''} ${game.local.name} </strong>
                            </a>
                    </div>
                </td>
                <td class="text-center">VS</td>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="${URL}/storage/${game.away.logo}" alt="${game.away.name}">
                        <a href="${URL}/teams/${game.away.id}">
                        <strong>${game.away_score ? '('+game.away_score+')' : ''} ${game.away.name}</strong>
                        </a>
                    </div>
                </td>
                <td>
                    ${game.tournament.name} - ${game.group}
                </td>
            `;
            fixturesTabContent.appendChild(tr);
        });
    }

    const onFixtureTabSelected = () => {
        fetch(`${URL}/teams/${teamId}/fixture`)
            .then(response => response.json())
            .then(games => renderFixture(games));
    }

    fixturesTab.addEventListener('click', onFixtureTabSelected)
</script>

<script>
    const resultsTab = document.querySelector('[href="#results"]');
    const resultsTabContent = document.querySelector('#endedGames');

    const renderResults = (games) => {
        resultsTabContent.innerHTML = '';
        
        games.forEach(game => {
            const li = document.createElement('li');
            
            li.innerHTML = `
                <a href="${URL}/games/${game.id}">
                    <span class="head">
                        ${game.name} <span class="date">${game.tournament.name} - ${game.group}</span>
                    </span>
                </a>

                <div class="goals-result">
                    <a href="${URL}/teams/${game.local.id}">
                        <img src="${URL}/storage/${game.local.logo}">
                        ${game.local.name}
                    </a>

                    <span class="goals">
                        <b>${game.local_score}</b> - <b>${game.away_score}</b>
                        <a href="${URL}/games/${game.id}" class="btn theme">Ver más</a>
                    </span>

                    <a href="${URL}/teams/${game.away.id}">
                        <img src="${URL}/storage/${game.away.logo}" alt="${game.away.name}">
                        ${game.away.name}
                    </a>
                </div>
            `;
            
            resultsTabContent.appendChild(li);
        });
    }

    const onResultsTabSelected = () => {
        fetch(`${URL}/teams/${teamId}/fixture?ended=true`)
            .then(response => response.json())
            .then(games => renderResults(games));
    }

    resultsTab.addEventListener('click', onResultsTabSelected)
</script>
@endsection