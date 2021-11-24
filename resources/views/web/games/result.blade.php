@extends('web.layouts.app')

@section('content')
<div class="section-title single-result" style="background: url({{ asset('web/img/locations/3.jpg') }})">
    <div class="container">
        <div class="row">
            <!-- Result Location -->
            <div class="col-lg-12">
                <div class="result-location">
                    <ul>
                        <li>{{ $game->updated_at->isoFormat('DD [de] MMM Y') }}</li>

                        <li>
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            {{ $game->group }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Result Location -->

        <!-- Result -->
        <div class="row">
            <div class="col-md-5 col-lg-5">
                <div class="team">
                    <img style="max-width: 100px" src="{{ asset('storage/'.$game->local->logo) }}" alt="club-logo" />
                    <a href="{{ route('web.team.show', ['team' => $game->local->id]) }}">{{ $game->local->name }}</a>
                    <ul>
                        @foreach ($localEvents as $event)
                        <li>
                            {{ $event->player->name }} {{-- {{ $event->minute }}' --}}
                            <i class="{{ $event->icon }}" aria-hidden="true"></i>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-2 col-lg-2">
                <div class="result-match">{{ $game->local_score }} : {{ $game->away_score }}</div>
            </div>

            <div class="col-md-5 col-lg-5">
                <div class="team right">
                    <a href="{{ route('web.team.show', ['team' => $game->away->id]) }}">{{ $game->away->name }}</a>
                    <img style="max-height: 100px; max-width:100px;" src="{{ asset('storage/'.$game->away->logo) }}"
                        alt="club-logo" />
                    <ul>
                        @foreach ($awayEvents as $event)
                        <li>
                            <i class="{{ $event->icon }}" aria-hidden="true"></i>
                            {{ $event->player->name }} {{-- {{ $event->minute }}' --}}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Result -->

        {{-- <div class="row">
            <div class="col-lg-12">
                <div class="timeline-result">
                    <div class="team-timeline">
                        <img src="img/clubs-logos/colombia.png" alt="club-logo" />
                        <a href="single-team.html">Col</a>
                    </div>
                    <ul class="timeline">
                        <li class="card-result bottom goal" style="left: 10%" data-placement="top" data-trigger="hover"
                            data-toggle="popover" title="Goal" data-content="10. James Rodriguez">
                            10'
                        </li>

                        <li class="card-result top change" style="left: 20%" data-placement="bottom"
                            data-trigger="hover" data-toggle="popover" title="Player Change"
                            data-content="10. James Rodriguez for 9. Falcao Garcia">
                            20'
                        </li>

                        <li class="card-result top red" style="left: 31%" data-placement="bottom" data-trigger="hover"
                            data-toggle="popover" title="Yellow card" data-content="10. James Rodriguez">
                            31'
                        </li>

                        <li class="card-result top goal" style="left: 40%" data-placement="bottom" data-trigger="hover"
                            data-toggle="popover" title="Goal" data-content="10. James Rodriguez">
                            40'
                        </li>

                        <li class="card-result top yellow" style="left: 65%" data-placement="bottom"
                            data-trigger="hover" data-toggle="popover" title="Yellow card"
                            data-content="10. James Rodriguez">
                            65'
                        </li>

                        <li class="card-result bottom yellow" style="left: 50%" data-placement="top"
                            data-trigger="hover" data-toggle="popover" title="Yellow card"
                            data-content="10. James Rodriguez">
                            50'
                        </li>

                        <li class="card-result top red" style="left: 65%" data-placement="bottom" data-trigger="hover"
                            data-toggle="popover" title="Yellow card" data-content="10. James Rodriguez">
                            65'
                        </li>

                        <li class="card-result bottom yellow" style="left: 80%" data-placement="top"
                            data-trigger="hover" data-toggle="popover" title="Yellow card"
                            data-content="10. James Rodriguez">
                            80'
                        </li>

                        <li class="card-result top goal" style="left: 90%" data-placement="bottom" data-trigger="hover"
                            data-toggle="popover" title="Goal" data-content="10. James Rodriguez">
                            90'
                        </li>
                    </ul>
                    <div class="team-timeline">
                        <img src="img/clubs-logos/arg.png" alt="club-logo" />
                        <a href="single-team.html">Arg</a>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
<!-- End Section Title -->
@endsection