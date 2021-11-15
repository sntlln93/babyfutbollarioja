@extends('web.welcome.welcome_partial')

@section('styles')
<style>
    .scoreboard th:first-child,
    .scoreboard td:first-child {
        position: sticky;
        left: 0px;
        z-index: 1;
        width: 200px;
    }

    .scoreboard tr:nth-child(odd)>td {
        background-color: #222;
    }

    .scoreboard tr:nth-child(even)>td {
        background-color: #222;
    }

    .scoreboard tr:nth-child(odd)>th {
        background-color: #121212;
    }
</style>

@section('tournament_info')
@include('web.welcome._hero')
<div class="dark-home">
    <div class="container">
        <div class="row">
            <!-- Left Content - Tabs and Carousel -->
            <div class="col-xl-9 col-md-12">
                <!-- Nav Tabs -->
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#statistics" data-toggle="tab">Estadísticas</a></li>
                    <li><a href="#groups" data-toggle="tab">Tabla de posiciones</a></li>
                </ul>
                <!-- End Nav Tabs -->

                <!-- Content Tabs -->
                <div class="tab-content">
                    <div class="mb-2" id="categoryToggle">
                        @foreach ($tournament->categories as $category)
                        <button class="category__filter {{ $loop->index === 0 ? " category__filter--active" : ""
                            }}">CAT.
                            {{ $category->name }}</button>
                        @endforeach
                    </div>
                    <!-- Tab Theree - statistics -->
                    <div class="tab-pane active pb-5" id="statistics">
                        <div class="row">
                            <!-- Club Ranking -->
                            <div class="col-lg-4">
                                <div class="club-ranking">
                                    <h5><a href="#">Posiciones</a></h5>
                                    <div class="info-ranking">
                                        <ul>
                                            @foreach ($scoreboard as $row)
                                            <li>
                                                <span class="position">
                                                    {{ $loop->iteration }}
                                                </span>
                                                <a href="single-team.html">
                                                    <img src="{{ asset('storage/'.$row['team']->logo) }}" alt="">
                                                    {{ $row['team']->name }}
                                                </a>
                                                <span class="points">
                                                    {{ $row['points'] }}
                                                </span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Club Ranking -->

                            <!-- recent-results -->
                            <div class="col-lg-4">
                                <div class="recent-results">
                                    <h5><a href="group-list.html">Partidos recientes</a></h5>
                                    <div class="info-results">
                                        <ul>
                                            @foreach ($recentGames as $game)
                                            <li>
                                                <span class="head">
                                                    {{ $game->name }}
                                                </span>

                                                <div class="goals-result d-flex flex-column justify-content-around">
                                                    <h5 class="text-center">{{ $game->group }}</h5>
                                                    <div class="goals-result align-items-center py-0">
                                                        <img style="width: 4em ;"
                                                            src="{{ asset('storage/'.$game->local->logo) }}" alt="">

                                                        <span class="goals">
                                                            <b>{{ $game->local_score }}</b> - <b>{{ $game->away_score
                                                                }}</b>
                                                        </span>

                                                        <img style="width: 4em ;"
                                                            src="{{ asset('storage/'.$game->away->logo) }}" alt="">
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end recent-results -->

                            <!-- Top player -->
                            <div class="col-lg-4">
                                <div class="player-ranking">
                                    <h5><a href="group-list.html">Goleadores</a></h5>
                                    <div class="info-player">
                                        <ul>
                                            @foreach ($topScorers as $scorer)
                                            <li>
                                                <span class="position">
                                                    {{ $loop->iteration }}
                                                </span>
                                                <a href="single-team.html">
                                                    <img src="{{ asset('storage/'.$scorer->logo) }}" alt="">
                                                    {{ $scorer->player->name }}
                                                </a>
                                                <span class="points">
                                                    {{ $scorer->goals }}
                                                </span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Top player -->
                        </div>
                    </div>
                    <!-- Tab Theree - statistics -->

                    <!-- Tab One - Groups List -->
                    <div class="tab-pane pb-5" id="groups">
                        <h5 class="h5 text-white">Tabla de posiciones</h5>
                        <table class="table-responsive mb-2 text-white scoreboard" style="background-color: #222">
                            <thead>
                                <tr>
                                    <th class="text-white">Equipo</th>
                                    <th class="text-white">PJ</th>
                                    <th class="text-white">G</th>
                                    <th class="text-white">E</th>
                                    <th class="text-white">P</th>
                                    <th class="text-white">GF</th>
                                    <th class="text-white">GC</th>
                                    <th class="text-white">DG</th>
                                    <th class="text-white">Pts</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($scoreboard as $row)
                                <tr>
                                    <td>
                                        <span class="mr-2">{{ $loop->iteration }}</span>
                                        {{ $row['team']->name}}
                                    </td>
                                    <td>{{ $row['gp'] }}</td>
                                    <td>{{ $row['w'] }}</td>
                                    <td>{{ $row['d'] }}</td>
                                    <td>{{ $row['l'] }}</td>
                                    <td>{{ $row['gf'] }}</td>
                                    <td>{{ $row['ga'] }}</td>
                                    <td>{{ $row['gd'] }}</td>
                                    <td>{{ $row['points'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <div class="row px-4"
                            style="display: grid; grid-template-columns: repeat(auto-fill, minmax(15rem, 1fr));">
                            @foreach ($nextGames as $game)
                            <div class="card bg-dark px-0 mx-2 mb-2 border-0">
                                <div class="card-header text-white" style="background-color: #121212">{{ $game->name }}
                                </div>
                                <div class="card-body text-center" style="background-color: #222">
                                    <h5 class="text-center text-white">{{ $game->group }}</h5>
                                    <div class="d-flex justify-content-around align-items-center">
                                        <img style="width: 5em ;" src="{{ asset('storage/'.$game->local->logo) }}"
                                            alt="">

                                        <span class="badge badge-dark" style="background-color: #121212; padding: 1em;">
                                            <b>vs</b>
                                        </span>

                                        <img style="width: 5em ;" src="{{ asset('storage/'.$game->away->logo) }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div> --}}
                    </div>
                    <!-- End Tab One - Groups List -->
                </div>
                <!-- Content Tabs -->
            </div>
            <!-- Left Content - Tabs and Carousel -->

            <!-- Right Content - Content Counter -->
            {{-- <div class="col-xl-3 col-md-12">
                <img src="{{ asset('chilecito_v.png') }}" alt="" class="img-hover">
                <!-- Content Counter -->
            </div> --}}
            <!-- End Right Content - Content Counter -->
        </div>
    </div>
</div>
@endsection