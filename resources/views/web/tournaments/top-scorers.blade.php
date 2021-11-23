@extends('web.layouts.app')

@section('content')
<section class="content-info">

    <div class="container paddings-mini">
        <div class="row">
            <div class="col-lg-12">
                <table class="table-striped table-responsive table-hover result-point">
                    <thead class="point-table-head">
                        <tr>
                            <th class="text-left">#</th>
                            <th class="text-center">Jugador</th>
                            <th class="text-center">Equipo</th>
                            <th class="text-center">Goles</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">
                        @foreach ($topScorers as $row)
                        <tr>
                            <td class="text-left number">
                                {{ $loop->iteration }}
                            </td>
                            <td class="text-left">
                                <span>{{ $row->player->name}}</span>
                            </td>
                            <td class="text-left">
                                <img src="{{ asset('storage/'.$row->logo) }}" alt="">
                                <span>{{ $row->team}}</span>
                            </td>
                            <td>{{ $row->goals }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection