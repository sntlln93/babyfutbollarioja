@extends('dashboard.layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jugadores</h1>
        <a id="qw" href="{{ route('players.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Nuevo jugador</a>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listado</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Equipo</th>
                            <th>Creado</th>
                            <th>Actualizado</th>
                            <th>Editar</th>
                            <th>Abrir</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($players as $player)
                            <tr>
                                <td>{{ $player->full_name }}</td>
                                <td>{{ $player->dni }}</td>
                                <td>{{ $player->team->club->name }}</td>
                                <td>{{ $player->created_at->diffForHumans() }}</td>
                                <td>{{ $player->updated_at->diffForHumans() }}</td>
                                <td class="text-center">
                                    <a href="{{ route('players.edit', ['player' => $player->id]) }}"
                                        class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('players.show', ['player' => $player->id]) }}"
                                        class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                </td>
                                <td class="text-center">
                                    @include('dashboard._partials.delete_button', ['id' => $player->id, 'prefix' =>
                                    'player'])
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center"> Aún no hay jugadores guardados. Agregá uno desde el
                                    botón
                                    de la
                                    esquina superior derecha!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $players->links() }}
            </div>
        </div>
    </div>
@endsection
