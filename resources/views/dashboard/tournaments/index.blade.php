@extends('dashboard.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Torneos</h1>
    <a id="qw" href="{{ route('tournaments.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Nuevo torneo</a>
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
                        <th>Activo</th>
                        <th>Categorías</th>
                        <th>Creado</th>
                        <th>Actualizado</th>
                        <th>Editar</th>
                        <th>Abrir</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tournaments as $tournament)
                    <tr>
                        <td>{{ $tournament->name }}</td>
                        <td>{{ $tournament->is_active ? 'Sí' : 'No' }}</td>
                        <td>
                            @foreach ($tournament->categories as $category)
                            <span class="badge badge-primary">{{ $category->name }}</span>
                            @endforeach
                        </td>
                        <td>{{ $tournament->created_at->diffForHumans() }}</td>
                        <td>{{ $tournament->updated_at->diffForHumans() }}</td>
                        <td class="text-center">
                            <a href="{{ route('tournaments.edit', ['tournament' => $tournament->id]) }}"
                                class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('tournaments.show', ['tournament' => $tournament->id]) }}"
                                class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                        </td>
                        <td class="text-center">
                            @include('dashboard._partials.delete_button', ['id' => $tournament->id, 'prefix' =>
                            'tournament'])
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Aún no hay torneos guardados. ¡Inicia la temporada desde <a
                                href="{{ route('tournaments.create') }}">acá</a>!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $tournaments->links() }}
        </div>
    </div>
</div>
@endsection