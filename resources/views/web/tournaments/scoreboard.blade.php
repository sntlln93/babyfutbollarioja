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
                            <th class="text-left">Equipo</th>
                            <th class="text-center">P</th>
                            <th class="text-center">W</th>
                            <th class="text-center">D</th>
                            <th class="text-center">L</th>
                            <th class="text-center">GS</th>
                            <th class="text-center">GA</th>
                            <th class="text-center">+/-</th>
                            <th class="text-center">PTS</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">
                        @foreach ($scoreboard as $row)
                        <tr>
                            <td class="text-left number">
                                {{ $loop->iteration }}
                            </td>
                            <td class="text-left">
                                <span>{{ $row['team']->name}}</span>
                            </td>
                            <td>{{ $row['gp'] }}</td>
                            <td>{{ $row['w'] }}</td>
                            <td>{{ $row['d'] }}</td>
                            <td>{{ $row['l'] }}</td>
                            <td>{{ $row['gf'] }}</td>
                            <td>{{ $row['ga'] }}</td>
                            <td>{{ $row['gd'] }}</td>
                            <td>{{ $row['pts'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection