@extends('dashboard.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $tournament->name }}</h1>
    <small class="mb-0 text-gray-800">{{ Str::upper($tournament->type->type) }}</small>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Clubes participantes</h6>
    </div>
    <div class="card-body clubs">
        @foreach ($clubs as $club)
        <div>
            <img src="{{ asset('storage/'.$club->image->path) }}" alt="{{ $club->name }}">
        </div>
        @endforeach
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Partidos</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>Categoría</th>
                        <th>Partido</th>
                        <th>Resultado</th>
                        <th>Creado</th>
                        <th>Actualizado</th>
                        <th>Finalizar</th>
                        <th>Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($games as $game)
                    <tr>
                        <td>{{ $game->local->category->name }}</td>
                        <td>{{ $game->local->club->name }} vs {{ $game->away->club->name }}</td>
                        <td>{{ $game->local_score }} - {{ $game->away_score }}</td>
                        <td>{{ $tournament->created_at->diffForHumans() }}</td>
                        <td>{{ $tournament->updated_at->diffForHumans() }}</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-primary"><i class="fas fa-futbol"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">Este torneo aún no tiene partidos.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $games->links() }}

        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .clubs {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(175px, 1fr));
        grid-gap: 1rem;
        align-items: center;
    }

    .clubs>* {
        margin: 0 auto;
    }

    .clubs img {
        width: auto;
        height: 75px;
    }
</style>
@endsection