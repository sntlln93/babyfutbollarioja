<div class="form-row mb-2">
    <div class="col-sm-12">
        <label for="name">Nombre</label>
        <input type="text" class="form-control @error('name') border-danger @enderror" id="name" name="name"
            placeholder="Nombres" value="{{ old('name', isset($club) ? $club->name : '') }}" required>
        <span class="invalid-feedback" role="alert">
            <strong>Este campo es obligatorio</strong>
        </span>
        @error('name')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-row mb-2">
    <div class="col-sm-12">
        <label for="field_description">Cancha</label>
        <input type="text" class="form-control @error('field_description') border-danger @enderror"
            id="field_description" name="field_description" placeholder="Describí la cancha de este equipo"
            value="{{ old('field_description', isset($club) ? $club->field_description : '') }}" required>
        <span class="invalid-feedback" role="alert">
            <strong>Este campo es obligatorio</strong>
        </span>
        @error('field_description')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-row mb-2">
    <div class="col-sm-12">
        <label for="name">Código de area</label>
        <input type="text" class="form-control @error('area_code') border-danger @enderror" id="area_code"
            name="area_code" placeholder="Colocá la característica. Ej: 380, 351"
            value="{{ old('area_code', isset($club) ? $club->phone?->area_code : '') }}" required>
        <span class="invalid-feedback" role="alert">
            <strong>Este campo es obligatorio</strong>
        </span>
        @error('area_code')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-row mb-2">
    <div class="col-sm-12">
        <label for="name">Número de teléfono</label>
        <input type="text" class="form-control @error('number') border-danger @enderror" id="number" name="number"
            placeholder="Escribí el resto del número. Ej: 624080, 9870816"
            value="{{ old('number', isset($club) ? $club->phone?->number : '') }}" required>
        <span class="invalid-feedback" role="alert">
            <strong>Este campo es obligatorio</strong>
        </span>
        @error('number')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>