@extends('dashboard.layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $club->name }}</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Equipos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Categoría</th>
                            <th>Creado</th>
                            <th>Jugadores</th>
                            <th>Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($club->teams as $team)
                            <tr>
                                <td>{{ $team->category->name }}</td>
                                <td>{{ $team->created_at->diffForHumans() }}</td>
                                <td>{{ $team->players->count() }}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-primary"><i class="fas fa-futbol"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Este club aún no tiene equipos.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .clubs {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .clubs>img {
        width: auto;
        height: 75px;
    }

</style>
@endsection
