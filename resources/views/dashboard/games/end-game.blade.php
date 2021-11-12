@extends('dashboard.layouts.app')

@section('styles')
<style>
    .timeline {
        background-color: #363636;
        color: #fff;
        width: 50px;
        text-align: center;
        font-weight: 700;
    }

    .timeline-head {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .timeline-tail {
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    tr:last-child {
        text-align: left;
    }

    tr:first-child {
        text-align: right;
    }
</style>
@endsection

@section('content')
<div class="mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $game->tournament->name }}</h1>
    <p class="mb-0 text-gray-800">
        <small class="text-uppercase font-weight-bold">{{ $game->group }}</small> | {{ $game->name }}<small>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="m-0 font-weight-bold text-primary">
            Finalizar partido
        </h4>
    </div>
    <div class="card-body">
        <div class="row events">
            <div class="col">
                <div class="form-group">
                    <label for="event">Evento</label>
                    <select class="form-control" id="event">
                        <option>Evento</option>
                        <option value="goal">Gol</option>
                        <option value="yellow">Tarjeta amarilla</option>
                        <option value="red">Tarjeta roja</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="team">Equipo</label>
                    <select class="form-control" id="team">
                        <option>Equipo</option>
                        <option value="{{ $game->local->id }}">{{ $game->local->name }}</option>
                        <option value="{{ $game->away->id }}">{{ $game->away->name }}</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="player">Jugador</label>
                    <select class="form-control" id="player" disabled>
                        <option></option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="minute">Minuto <small class="text-muted font-italic">(opcional)</small></label>
                    <input type="number" min="0" max="120" class="form-control" name="minute" id="minute">
                </div>
            </div>
        </div>

        <button id="addEventBtn" class="btn btn-info">Agregar</button>

        <table class="table table-borderless">
            <thead>
                <tr>
                    <th width="45%" class="text-right" data-local="{{ $game->local->id }}">{{ $game->local->name }}</th>
                    <th width="10%" class="timeline timeline-head">0"</th>
                    <th width="45%" class="text-left" data-away="{{ $game->away->id }}">{{ $game->away->name }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td class="timeline timeline-tail">90"</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <form action="{{ route('games.end', ['game' => $game->id]) }}" method="POST">
            @method('PUT')
            @csrf
            <div id="eventForm"></div>
            <button class="my-3 btn btn-primary w-100" type="submit">Finalizar partido</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const baseUrl = "{{ env('APP_URL') }}";
    const localId = "{{ $game->local->id }}";
    const awayId = "{{ $game->away->id }}";

    const eventIcons = {
        goal: '<i class="fas fa-futbol"></i>',
        yellow: '<i class="fas fa-square text-warning"></i>',
        red: '<i class="fas fa-square text-danger"></i>'
    };

    let addedEvents = [];
    const addEventBtn = document.querySelector('#addEventBtn');
    const eventSelect = document.querySelector('#event');
    const teamSelect = document.querySelector('#team');
    const playerSelect = document.querySelector('#player');
    const minuteInput = document.querySelector('#minute');

    const drawPlayers = (players) => {
        playerSelect.innerHTML = '<option>Jugador</option>';
        players.forEach(player => {
            const option = document.createElement('option');
            option.value = player.id;
            option.innerHTML = `${player.name} ${player.lastname}`;
            playerSelect.appendChild(option);
        });
        
        playerSelect.disabled = false;
    }

    const onTeamSelected = () => {
        const teamsId = Object.values(teamSelect.options).map(option => option.value).filter(value => value !== 'Equipo');
        const selectedTeam = teamSelect.value;

        if(teamsId.includes(selectedTeam)){
            fetch(`${baseUrl}/dashboard/teams/${selectedTeam}/players`)
            .then(response => response.json())
            .then(players => drawPlayers(players))
            .catch(error => console.error(error));
        } else {
            playerSelect.innerHTML = '<option>Jugador</option>';
            playerSelect.disabled = true;
        }
    } 

    teamSelect.addEventListener('change', () => {
        onTeamSelected();
        teamSelect.classList.remove('is-invalid');
    });
    eventSelect.addEventListener('change', () => {
        eventSelect.classList.remove('is-invalid');
    });
    playerSelect.addEventListener('change', () => {
        playerSelect.classList.remove('is-invalid');
    });
    
    const deleteBtnHtml = (eventOrder) => {
        const styles = `
            font-size: .8em;
            padding: .5em;
        `;

        const classes = "btn btn-danger btn-xs";

        return `<button class="${classes}" data-event="${eventOrder}" data-role="removeEvent" style="${styles}"><i class="fas fa-trash" style="pointer-events: none;"></i></button>`;
    }

    const drawTimeline = () => {
        const timeline = document.querySelector('tbody');
        timeline.innerHTML = '';

        addedEvents.forEach((event, index) => {
            const tr = document.createElement('tr');
            const localTd = document.createElement('td');
            const minuteTd = document.createElement('td');
            const awayTd= document.createElement('td');

            localTd.classList.add('text-right');
            minuteTd.classList.add('timeline');
            awayTd.classList.add('text-left');

            if(localId === event.team){
                localTd.innerHTML = `${deleteBtnHtml(index)} ${event.player.name} ${eventIcons[event.type]}`;
            } else {
               awayTd.innerHTML = `${eventIcons[event.type]} ${event.player.name} ${deleteBtnHtml(index)}`;
            }

            minuteTd.innerText = `${event.minute}"`;

            tr.appendChild(localTd);
            tr.appendChild(minuteTd);
            tr.appendChild(awayTd);

            timeline.appendChild(tr);
        });

        const tail = document.createElement('tr');
        tail.innerHTML = `<td></td><td class="timeline timeline-tail">90"</td><td></td>`;
        timeline.appendChild(tail);
    }

    const createInput = (event) => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = "events[]";
        input.value = JSON.stringify(event);
        document.querySelector('#eventForm').appendChild(input); 
    }

    const fillInputs = () => {
        document.querySelector('#eventForm').innerHTML = '';
        const form = document.querySelector('#eventForm');
        addedEvents.forEach(event => {
            createInput(event);
        });
    }

    addEventBtn.addEventListener('click', () => {
        const teamsId = Object.values(teamSelect.options).map(option => option.value).filter(value => value !== 'Equipo');
        const events = Object.values(eventSelect.options).map(option => option.value).filter(value => value !== 'Evento');
        const players = Object.values(playerSelect.options).map(option => option.value).filter(value => value !== 'Jugador');
        const minute = minuteInput.value;

        let passedValidation = true;

        if(!teamsId.includes(teamSelect.value)){
            passedValidation = false;
            teamSelect.classList.add('is-invalid');
        }

        if(!events.includes(eventSelect.value)){
            passedValidation = false;
            eventSelect.classList.add('is-invalid');
        }

        if(!players.includes(playerSelect.value)){
            passedValidation = false;
            playerSelect.classList.add('is-invalid');
        }

        if(passedValidation) {
            addedEvents.push({
                    type: eventSelect.value,
                    team: teamSelect.value,
                    player: {name: playerSelect.options[playerSelect.selectedIndex].innerText, id: playerSelect.value, teamId: teamSelect.value},
                    minute: Number.isInteger(parseInt(minute)) ? minute : 0
            });

            addedEvents = addedEvents.sort((a, b) => a.minute - b.minute);
            fillInputs();
            drawTimeline();
        }
    });

    document.addEventListener('click' , e => {
        if(e.target.dataset.role === 'removeEvent') {
            //remove element in addedEvents at given index
            const eventOrder = e.target.dataset.event;
            addedEvents.splice(eventOrder, 1);

            drawTimeline();
        }
    });
</script>
@endsection