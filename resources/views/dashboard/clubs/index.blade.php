@extends('dashboard.layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Clubes</h1>
        <a id="qw" href="{{ route('clubs.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Nuevo club</a>
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
                            <th>Cancha</th>
                            <th>Contacto</th>
                            <th>Creado</th>
                            <th>Actualizado</th>
                            <th>Editar</th>
                            <th>Abrir</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($clubs as $club)
                            <tr>
                                <td>{{ $club->name }}</td>
                                <td>{{ $club->field_description }}</td>
                                <td><i class="fas fa-phone-alt"></i><a
                                        href="tel:+54{{ $club->phone->full_number }}">{{ $club->phone->full_number }}</a>
                                </td>
                                <td>{{ $club->created_at->diffForHumans() }}</td>
                                <td>{{ $club->updated_at->diffForHumans() }}</td>
                                <td class="text-center">
                                    <a href="{{ route('clubs.edit', ['club' => $club->id]) }}" class="btn btn-warning"><i
                                            class="fas fa-edit"></i></a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('clubs.show', ['club' => $club->id]) }}" class="btn btn-info"><i
                                            class="fas fa-eye"></i></a>
                                </td>
                                <td class="text-center">

                                    <form action="{{ route('clubs.destroy', ['club' => $club->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center"> Aún no hay clubes guardados. Agregá uno desde el botón
                                    de la
                                    esquina superior derecha!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $clubs->links() }}
            </div>
        </div>
    </div>
@endsection
