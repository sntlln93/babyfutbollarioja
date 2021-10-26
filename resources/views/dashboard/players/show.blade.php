@extends('dashboard.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="mb-4">
    <h1 class="h3 mb-0 text-gray-800">Información del jugador</h1>
</div>

<!-- Content Row -->
<div class="row justify-content-between">
    <div class="card  player--info">
        <img class="card-img-top" src="{{ asset('storage/' . $player->photo) }}" alt="Card image cap">
        <div class="card-body">
            <small>{{ $player->team ? $player->team->club->name : 'Agente libre' }}</small>
            <h3 class="card-title">{{ $player->full_name }}</h3>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>DNI</b><br> {{ $player->dni }}</li>
                <li class="list-group-item"><b>Fecha de nacimiento</b><br> {{ $player->born_in->format('d/m/Y') }}
                </li>
                @if ($player->details)
                <li class="list-group-item"><b>Posición</b><br> {{ $player->detail->position }}</li>
                <li class="list-group-item"><b>Escuela</b><br> {{ $player->detail->school }}</li>
                <li class="list-group-item"><b>Obra social</b><br> {{ $player->detail->prepaid }}</li>
                @else
                <li class="list-group-item">Parece que todavía falta información para este jugador. <a href="#"
                        class="btn btn-sm btn-primary">Cargar información</a>
                </li>
                @endif
            </ul>
        </div>
    </div>

    <div class="card player--info">
        <div class="card-body">
            <h3 class="card-title">Historial de pases</h3>
            <ul class="list-group list-group-flush">
                @foreach ($player->teams as $team)
                <li class="list-group-item {{ $team->pivot->is_active ? 'active' : '' }}">
                    <b>{{ $team->pivot->created_at->format('d/m/Y') }}</b><br>
                    <div class="d-flex align-items-center">
                        <img class="icon" src="{{ asset('storage/'. $team->club->logo) }}" alt="">
                        {{ $team->club->name }}
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="card player--info">
        <div class="card-body">
            <h3 class="card-title">Eventos del jugador</h3>
            <ul class="list-group list-group-flush">
                @foreach ($player->events as $event)
                <li class="list-group-item">
                    <strong>
                        <p class="text-uppercase mb-0">{{ $event->game?->tournament->name }}</p>
                    </strong>
                    {{ $event->game?->local->club->name }} vs
                    {{ $event->game?->away->club->name }}
                    <img class="icon" src="{{ $event->icon }}" alt="">
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
    .icon {
        height: 1em;
        width: auto;
    }

    .player--info {
        width: 100%;
        margin-bottom: 1em;
    }

    @media (min-width:764px) {
        .player--info {
            width: 30%;
        }
    }
</style>
@endsection