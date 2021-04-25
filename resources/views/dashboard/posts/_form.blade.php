<div class="form-row mb-2">
    <div class="col-sm-12">
        <label for="title">Título</label>
        <input type="text" class="form-control @error('title') border-danger @enderror" id="title"
            name="title" placeholder="Título" value="{{ $post->title ?? old('title') }}" required>
        <span class="invalid-feedback" role="alert">
            <strong>Este campo es obligatorio</strong>
        </span>
        @error('title')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-row mb-2">
    <div class="col-sm-12">
        <label for="body">Cuerpo</label>
        <textarea class="form-control @error('body') border-danger @enderror" id="body" name="body"
            placeholder="Escribí un cuerpo para este post" rows="10" required>{{ $post->body ?? old('body') }}</textarea>
        <span class="invalid-feedback" role="alert">
            <strong>Este campo es obligatorio</strong>
        </span>
        @error('body')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>