<div class="row mb-5">

    <div class="col-sm-12">
        <h3 class="clear-title">Fixture</h3>
    </div>

    <div class="col-lg-12 mb-2">
        <button class="filterBtn filterBtn--selected" data-filter-date="*">Todos</button>
        @foreach ($dates as $date)
        <button class="filterBtn" data-filter-date="{{ $date }}">{{ $date }}</button>
        @endforeach
    </div>

    <div class="col-lg-12">
        <table class="table-striped table-responsive table-hover">
            <thead>
                <tr>
                    <th>Local</th>
                    <th class="text-center">VS</th>
                    <th>Visitante</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody id="fixtureTabContent">

            </tbody>
        </table>
    </div>
</div>