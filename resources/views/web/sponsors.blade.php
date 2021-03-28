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

        <ul class="d-flex flex-wrap list-unstyled">
            <li class="col-md-4"><a href="#"><img src="{{ asset('web/img/sponsors/1.png') }}" alt=""></a></li>
            <li class="col-md-4"><a href="#"><img src="{{ asset('web/img/sponsors/2.png') }}" alt=""></a></li>
            <li class="col-md-4"><a href="#"><img src="{{ asset('web/img/sponsors/3.png') }}" alt=""></a></li>
            <li class="col-md-4"><a href="#"><img src="{{ asset('web/img/sponsors/4.png') }}" alt=""></a></li>
            <li class="col-md-4"><a href="#"><img src="{{ asset('web/img/sponsors/5.png') }}" alt=""></a></li>
            <li class="col-md-4"><a href="#"><img src="{{ asset('web/img/sponsors/3.png') }}" alt=""></a></li>
        </ul>

    </div>
</div>
</section>
<!-- End Sponsors -->
@endsection