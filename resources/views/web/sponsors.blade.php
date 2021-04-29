@extends('web.layouts.app')

@section('content')
<!-- Sponsors-->
<section class="content-info">
<div class="white-section pt-5 mb-1">
    <div class="container">
        <div class="row no-line-height">
              <div class="col-md-12">
                  <h2>Auspiciantes</h2>
                  <p class="text-muted">ARBFI no sería posible sin la colaboración de las siguientes empresas</p>
              </div>
        </div>
    </div>
</div>
<div class="default-section pt-2 pb-2">
    <div class="container">
        <!--Sponsors CLub -->
       
        <!--End Sponsors CLub -->

        <ul class="d-flex flex-wrap justify-content-around align-items-center list-unstyled">
            <li class="col-md-3"><a href="#"><img class="w-75" src="{{ asset('web/img/sponsors/distritolr.svg') }}" alt=""></a></li>
            <li class="col-md-3"><a href="#"><img class="w-75" src="{{ asset('web/img/sponsors/aleua.svg') }}" alt=""></a></li>
        </ul>

    </div>
</div>
</section>
<!-- End Sponsors -->
@endsection