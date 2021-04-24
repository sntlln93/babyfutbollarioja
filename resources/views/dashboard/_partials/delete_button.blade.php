<form action="{{ route(Str::plural($prefix).'.destroy', [$prefix => $id]) }}" method="POST">
    @csrf
    @method('delete')
    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
</form>