@extends('dashboard.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Categorías</h1>
    <a href="{{ route('categories.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Nueva categoría</a>
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
                        <th>Creada</th>
                        <th>Actualizada</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->is_active ? 'Sí' : 'No' }}</td>
                        <td>{{ $category->created_at->diffForHumans() }}</td>
                        <td>{{ $category->updated_at->diffForHumans() }}</td>
                        <td class="text-center">
                            @include('dashboard._partials.delete_button', ['id' => $category->id, 'prefix' =>
                            'category'])
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="5">Aún no hay categorías guardadas. <a
                                href="{{ route('categories.create') }}">Carga una acá</a></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection