@extends('dashboard.layouts.app')

@section('styles')
<style>
    .club-btn {
        background-color: #F8F9FA;
        padding: 1em;
        margin: 1em;
        border-radius: 50%;
        height: 100px;
        width: 100px;
        border: 3px solid #DC3545;
        outline: none;
    }

    .club-btn img {
        pointer-events: none;
        height: auto;
        width: 100%;
    }

    .club-btn--selected {
        border-color: #28A745;
    }
</style>
@endsection

@section('content')
<!-- Page Heading -->
<div class=" d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Agregar clubes a Torneo {{ $tournament->name }}</h1>
</div>

<div class="row">
    <div class="col-sm-12">
        <form action="{{ route('tournaments.add-teams', ['tournament' => $tournament->id]) }}" method="POST">
            @csrf
            <div class="hidden-inputs">
                @if($tournament->clubs)
                @foreach ($tournament->clubs as $club)
                <input type="hidden" name="clubs[]" value="{{ $club->id }}">
                @endforeach
                @endif
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0 font-weight-bold text-primary">Clubes disponibles</h4>
                    <p class="text-muted mb-0">Selecciona los participantes clickando en sus escudos</p>
                </div>
                <div class="card-body d-flex flex-wrap">
                    @foreach ($clubs as $club)
                    <button
                        class="btn club-btn {{ $tournament->isParticipating($club->id) ? 'club-btn--selected' : '' }}"
                        title="{{ $club->name }}" data-club="{{ $club->id }}">
                        <img src="{{ asset('storage/'.$club->logo) }}" alt="{{ $club->name }}">
                    </button>
                    @endforeach
                </div>
            </div>

            @if($errors->any())
            <div class="mt-3 alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <button class="btn btn-primary w-100" type="submit">Confirmar clubes</button>
        </form>
    </div>
</div>

@endsection

@section('scripts')

<script>
    const clubs = document.querySelectorAll('.club-btn');

    const onClubSelected = (event) => {
        event.preventDefault();
        const club = event.target;
        club.classList.toggle('club-btn--selected');
        addClubToForm(club);
    }

    const addClubToForm = (club) => {
        const clubId = club.dataset.club;
        const form = document.querySelector('.hidden-inputs');
        let input = form.querySelector(`input[value="${clubId}"]`);

        if(input) {
            input.remove();
        } else {
            input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'clubs[]';
            input.value = clubId;
            form.appendChild(input);
        }

    }

    clubs.forEach(club => {
        club.addEventListener('click', e => onClubSelected(e));
    });
</script>
@endsection