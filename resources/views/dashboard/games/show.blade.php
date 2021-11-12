@extends('dashboard.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detalles de partido</h1>
</div>

<!-- Content Row -->
<div class="border">
    <div class="d-flex justify-content-between card-header">
        <div class="col-sm-5 text-center">
            <h5 class="h5">{{ $game->local->name }}</h5>
        </div>
        <div class="col-sm-2 text-center timeline">
            <h5 class="h5">vs</h5>
        </div>
        <div class="col-sm-5 text-center">
            <h5 class="h5">{{ $game->away->name }}</h5>
        </div>
    </div>

    @foreach ($game->events as $event)
    @if($event->player->teamId == $game->local->id)
    <div class="d-flex justify-content-between bg-white py-3">
        <div class="col-sm-5 text-right">
            <p>{{ $event->player->name }} <i class="{{ $event->icon }}"></i></p>
        </div>
        <div class="col-sm-2 text-center timeline">
            <p>{{ $event->minute }}"</p>
        </div>
        <div class="col-sm-5 text-center">
            <p></p>
        </div>
    </div>
    @elseif($event->player->teamId == $game->away->id)
    <div class="d-flex justify-content-between bg-white py-3">
        <div class="col-sm-5 text-center">
            <p></p>
        </div>
        <div class="col-sm-2 text-center timeline">
            <p>{{ $event->minute }}"</p>
        </div>
        <div class="col-sm-5 text-left">
            <p><i class="{{ $event->icon }}"></i> {{ $event->player->name }}</p>
        </div>
    </div>
    @endif
    @endforeach
</div>


@endsection

@section('styles')
<style>
    .timeline {
        max-width: 50px;
    }
</style>
@endsection