@extends('web.layouts.app')

@section('content')

<div class="section-title single-player" style="background:url({{ asset('storage/'.$tournament->photo) }});">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Torneo {{ $tournament->name }}</h1>
            </div>
        </div>
    </div>
</div>

<section class="content-info">
    <!-- Single Team Tabs -->
    <div class="single-player-tabs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Nav Tabs -->
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#scoreboard" data-toggle="tab">Posiciones</a></li>
                        <li><a href="#teams" data-toggle="tab">Equipos</a></li>
                        <li><a href="#fixture" data-toggle="tab">Fixture</a></li>
                        <li><a href="#scorers" data-toggle="tab">Goleadores</a></li>
                    </ul>
                    <!-- End Nav Tabs -->

                    <!-- Content Tabs -->
                    <div class="tab-content">
                        <!-- Tab One - scoreboard -->
                        <div class="tab-pane active" id="scoreboard">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 class="clear-title">Tabla de posiciones</h3>
                                </div>
                            </div>
                            @include('web.tournaments.partials.scoreboard')
                        </div>
                        <!-- Tab One - scoreboard -->

                        <!-- Tab Theree - teams -->
                        <div class="tab-pane" id="teams">
                            @include('web.tournaments.partials.teams')
                        </div>
                        <!-- Tab Theree - teams -->

                        <!-- Tab Theree - fixture -->
                        <div class="tab-pane" id="fixture">
                            @include('web.tournaments.partials.fixture')
                        </div>
                        <!-- End Tab Theree - fixture -->

                        <!-- Tab Four - scorers -->
                        <div class="tab-pane" id="scorers">
                            @include('web.tournaments.partials.scorers')
                        </div>
                        <!-- End Tab Four - scorers -->
                    </div>
                    <!-- Content Tabs -->
                </div>
            </div>
        </div>
    </div>
    <!-- Single Team Tabs -->
</section>
<!-- End Section Area -  Content Central -->
@endsection

@section('scripts')

{{-- common --}}
<script>
    const URL = "{{ env('APP_URL') }}";
</script>

{{-- teams --}}
<script>
    const tournamentId = "{{ $tournament->id }}";
    const showTeamUrl = "{{ route('web.team.show', ['team' => ':team']) }}";

    const teamsTabBtn = document.querySelector('[href="#teams"]');
    
    const renderTeams = (teams) => {
        const teamsList = document.querySelector('#teamsTabContent');
        teamsList.innerHTML = '';
        teams.forEach(team => {
            const teamItem = document.createElement('div');
            teamItem.classList = "col-md-6 col-lg-4 col-xl-3";
            teamItem.innerHTML = `
                <div class="item-team">
                    <div class="head-team" style="height: 50px">
                    </div>
                    <div class="info-team">
                        <span class="logo-team">
                            <img src="${URL}/storage/${team.club.logo}" alt="logo-team">
                        </span>
                        <h4> ${team.club.name} </h4>
                        <span class="location-team">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            Stadium
                        </span>
                        <span class="group-team">
                            <i class="fa fa-calendar-alt" aria-hidden="true"></i>
                             ${team.category.name} 
                        </span>
                    </div>
                    <a href="${showTeamUrl.replace(':team', team.id)}" class="btn">Ver
                        equipo <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            `;
            teamsList.appendChild(teamItem);
        });
    }

    const onTeamsTabSelected = () => {
        fetch(`${URL}/tournaments/${tournamentId}/teams`)
            .then(response => response.json())
            .then(teams => renderTeams(teams))
            .catch(error => console.error('Error:', error))
    }

    teamsTabBtn.addEventListener('click', onTeamsTabSelected);
</script>

{{-- fixture --}}
<script>
    const fixtureTabBtn = document.querySelector('[href="#fixture"]');
    let games = [];
    const renderFixture = (games) => {
        const table = document.querySelector('#fixtureTabContent');
        table.innerHTML = '';

        games.forEach(game => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>
                    <div class="d-flex align-items-center">
                        <img src="${URL}/storage/${game.local.logo}"
                            alt="${game.local.name}">
                            <strong>${game.local_score ? '('+game.local_score+')' : ''} ${game.local.name} </strong>
                    </div>
                </td>
                <td class="text-center">VS</td>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="${URL}/storage/${game.away.logo}" alt="${game.away.name}">
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

            if(target.dataset.filterDate === '*') {
                renderFixture(games);
            } else {
                const filteredGames = games.filter(game => game.group === target.dataset.filterDate);
                renderFixture(filteredGames);
            }
        }
    });

    const onFixtureTabSelected = () => {
        fetch(`${URL}/tournaments/${tournamentId}/fixture`)
            .then(response => response.json())
            .then(fixtureGames => {
                games = fixtureGames;
                renderFixture(fixtureGames);
            })
            .catch(error => console.error('Error:', error))
    }

    fixtureTabBtn.addEventListener('click', onFixtureTabSelected);
</script>

{{-- scorers --}}
<script>
    const scorersTabBtn = document.querySelector('[href="#scorers"]');

    const renderScorers = (scorers) => {
        const table = document.querySelector('#scorersTabContent');
        table.innerHTML = '';

        scorers.forEach((row, index) => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <tr>
                    <td class="text-left number">
                         ${index+1} 
                    </td>
                    <td class="text-left">
                        <span> ${row.player.name}</span>
                    </td>
                    <td class="text-left">
                        <img src="${URL}/storage/${row.logo} " alt="${row.player.name}">
                        <span> ${row.team}</span>
                    </td>
                    <td> ${row.goals} </td>
                </tr>
            `;
            table.appendChild(tr);
        });
    }

    const onScorersTabSelected = () => {
        fetch(`${URL}/tournaments/${tournamentId}/scorers`)
            .then(response => response.json())
            .then(scorers => renderScorers(scorers))
            .catch(error => console.error('Error:', error))
    }

    scorersTabBtn.addEventListener('click', onScorersTabSelected);
</script>
@endsection