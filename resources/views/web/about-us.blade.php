@extends('web.layouts.app')

@section('content')
<section class="content-info">

    <!-- White Section -->
    <div class="white-section paddings">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <img src="{{ asset('web/img/slide/1.jpg')}}" alt="">
                </div>
                <div class="col-lg-7">
                    <h4 class="subtitle">
                        ¿Quiénes somos?
                    </h4>
                    <p>Somos una asociación que reúne clubes infantiles y les da las herramientas para comenzar a transitar el camino hacia una vida sana y orientada al deporte.</p>

                    <div class="row">
                        <div class="col-lg-6">
                            <h5>Nuestra misión</h5>
                            <p>Impulsar y liderar la práctica deportiva, con la finalidad de promover la concienciación y el interés por la participación en las actividades físicas, deportivas y formativas en la comunidad, para contribuir a mejorar la salud y el bienestar de las personas; con un compromiso de gestión orientado a la mejora continua y la obtención de buenos resultados.</p>
                        </div>
                        <div class="col-lg-6">
                            <h5>Nuestra visión</h5>
                            <p>Ser una organización innovadora e integradora, reconocida en el ámbito local y regional, con un equipo de profesionales cualificados y altamente motivados, que prestan un servicio orientado a las necesidades y expectativas de la sociedad, en sinergia con otras entidades y administraciones deportivas con unas modernas instalaciones, que contribuyen al desarrollo de hábitos deportivos saludables.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row padding-top">
                <div class="col-md-6 col-xl-3">
                    <div class="item-boxed-service text-center">
                        <span>Torneos organizados</span>
                        <h1>+20</h1>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="item-boxed-service text-center">
                        <span>Equipos involucrados</span>
                        <h1>40</h1>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="item-boxed-service text-center">
                        <span>Años de trayectoria</span>
                        <h1>7</h1>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="item-boxed-service text-center">
                        <span>Partidos disputados</span>
                        <h1>+2000</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End White Section -->
    
</section>
@endsection