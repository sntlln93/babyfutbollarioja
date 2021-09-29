@extends('dashboard.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Modificar post de {{ $post->author->name }}</h1>
</div>

<div class="row">
    <div class="col-sm-12 col-md-8 mx-auto">
        <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST" class="needs-validation"
            novalidate enctype="multipart/form-data">
            @csrf
            @method('put')

            @include('dashboard.posts._form')


            <div class="form-row mb-2">
                <div class="col-sm-12">
                    <label for="photo">Foto <small><i>(OPCIONAL)</i></small></label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" name="photo"
                                class="custom-file-input @error('photo') border-danger @enderror" id="photo">
                            <label id="file_inner" class="custom-file-label" for="shield">Podés elegir una imagen para
                                reemplazar ésta. Este campo es opcional</label>
                        </div>
                    </div>
                    @if ($post->image)
                    <img class="img-fluid" src="{{ asset('storage/' . $post->image->path) }}" alt="">
                    @endif
                    @error('photo')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <button class="my-3 btn btn-primary w-100" type="submit">Guardar torneo</button>
        </form>
    </div>
</div>

@endsection

@section('scripts')

<script>
    const fileInput = document.getElementById("photo");

        fileInput.addEventListener("change", () => {
            const file_name = fileInput.value.replace(/^.*?([^\\\/]*)$/, '$1');
            document.getElementById("file_inner").innerText = file_name;
        });

</script>

@include('dashboard._partials.validation')
@endsection