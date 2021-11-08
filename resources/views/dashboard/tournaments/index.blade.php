@extends('dashboard.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Torneos</h1>
    <a id="qw" href="{{ route('tournaments.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Nuevo torneo</a>
</div>

<!-- Content Row -->
<div class="table-responsive">
    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr class="text-center">
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Torneo principal</th>
                <th>Visibilidad</th>
                <th>Categorías</th>
                <th>Creado</th>
                <th>Editar</th>
                <th>Abrir</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @forelse ($tournaments as $tournament)
            <tr>
                <td>{{ $tournament->name }}</td>
                <td>{{ $tournament->type }} ({{ $tournament->double_game ? "Doble partido" : "Partido único" }})
                </td>
                <td>{{ $tournament->is_main ? 'Sí' : 'No' }}</td>
                <td><span class="badge badge-sm {{ $tournament->is_public ? 'badge-warning' : 'badge-success' }}">{{
                        $tournament->visibility }}</span></td>
                <td>
                    @foreach ($tournament->categories as $category)
                    <span class="badge badge-primary">{{ $category->name }}</span>
                    @endforeach
                </td>
                <td>{{ $tournament->created_at->diffForHumans() }}</td>
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
                <td colspan="9" class="text-center">Aún no hay torneos guardados. ¡Inicia la temporada desde <a
                        href="{{ route('tournaments.create') }}">acá</a>!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $tournaments->links() }}
</div>
@endsection