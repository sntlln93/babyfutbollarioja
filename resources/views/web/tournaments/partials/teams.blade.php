<div class="row">
    <div class="col-sm-12">
        <h3 class="clear-title">Equipos</h3>
    </div>
</div>
@if(count($tournament->categories) > 1)
<div class="row">
    <div class="col-lg-12 mb-2">
        <button class="filterBtn filterBtn--selected" data-filter-date="all">Todos</button>
        @foreach ($tournament->categories as $category)
        <button class="filterBtn" data-filter-date="{{ $category->id }}">{{ $category->name
            }}</button>
        @endforeach
    </div>
</div>
@endif

<div class="row" id="teamsTabContent">
</div>