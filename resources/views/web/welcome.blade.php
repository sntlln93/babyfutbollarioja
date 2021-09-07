@extends('web.layouts.app')

@section('content')
<style>
    .clubs {
        display: flex;
        flex-wrap: wrap;
    }

    .clubs>img {
        width: auto;
        height: 4rem;
        margin: 0.8em;
    }
</style>
<!-- section-hero-posts-->
<div class="hero-header">
    <!-- Hero Slider-->
    <div id="hero-slider" class="hero-slider">
        @if ($tournament)
        <!-- Item Slide-->
        <div class="item-slider" style="background:url({{ asset('storage/' . $tournament->image?->path) }});">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="info-slider">
                            <h1>{{ $tournament->name }} 2021</h1>
                            <p>Jugá con nosotros, nos jugamos por vos.</p>
                            <div class="clubs">
                                @foreach ($clubs as $club)
                                <img src="{{ asset('storage/' . $club->image->path) }}" alt="">
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="item-slider" style="background:url({{ asset('img/default-bg.jpg') }});">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="info-slider">
                            <h1>Torneos 2021</h1>
                            <p>Jugá con nosotros, nos jugamos por vos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Item Slide-->
        @endif

    </div>
    <!-- End Hero Slider-->
</div>
<!-- End section-hero-posts-->

<!-- Section Area - Content Central -->
<section class="content-info">
    <!-- Dark Home -->
    <div class="dark-home">
        <div class="container">
            <div class="row">
                {{-- <!-- Left Content - Tabs and Carousel -->
                    @if ($tournament)
                        @if ($tournament->games)

                            <div class="col-xl-9 col-md-12">
                                <!-- Nav Tabs -->
                                <ul class="nav nav-tabs" id="myTab">
                                    <li class="active"><a href="#statistics" data-toggle="tab">Estadísticas</a></li>
                                    <li><a href="#" data-toggle="tab">Próximos partidos</a></li>
                                </ul>
                                <!-- End Nav Tabs -->

                                <!-- Content Tabs -->
                                <div class="tab-content">
                                    <!-- Tab Theree - statistics -->
                                    <div class="tab-pane active" id="statistics">
                                        <div class="row">
                                            <!-- Club Ranking -->
                                            <div class="col-lg-4">
                                                <div class="club-ranking">
                                                    <h5><a href="#">Posiciones</a></h5>
                                                    <div class="info-ranking">
                                                        <ul>
                                                            <li>
                                                                <span class="position">
                                                                    1
                                                                </span>
                                                                <a href="single-team.html">
                                                                    <img src="{{ asset('Barcelona_FC_logo.svg') }}"
                alt="">
                Russia
                </a>
                <span class="points">
                    90
                </span>
                </li>

                <li>
                    <span class="position">
                        2
                    </span>
                    <a href="single-team.html">
                        <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                        Saudi Arabia
                    </a>
                    <span class="points">
                        86
                    </span>
                </li>

                <li>
                    <span class="position">
                        3
                    </span>
                    <a href="single-team.html">
                        <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                        Egypt
                    </a>
                    <span class="points">
                        84
                    </span>
                </li>

                <li>
                    <span class="position">
                        4
                    </span>
                    <a href="single-team.html">
                        <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                        Uruguay
                    </a>
                    <span class="points">
                        70
                    </span>
                </li>

                <li>
                    <span class="position">
                        5
                    </span>
                    <a href="single-team.html">
                        <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                        Portugal
                    </a>
                    <span class="points">
                        67
                    </span>
                </li>

                <li>
                    <span class="position">
                        6
                    </span>
                    <a href="single-team.html">
                        <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                        Spain
                    </a>
                    <span class="points">
                        60
                    </span>
                </li>

                <li>
                    <span class="position">
                        7
                    </span>
                    <a href="single-team.html">
                        <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                        Morocco
                    </a>
                    <span class="points">
                        90
                    </span>
                </li>

                <li>
                    <span class="position">
                        8
                    </span>
                    <a href="single-team.html">
                        <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                        IR Iran
                    </a>
                    <span class="points">
                        53
                    </span>
                </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Club Ranking -->

    <!-- recent-results -->
    <div class="col-lg-4">
        <div class="recent-results">
            <h5><a href="group-list.html">Partidos recientes</a></h5>
            <div class="info-results">
                <ul>
                    <li>
                        <span class="head">
                            Portugal Vs Spain <span class="date">27 Jun 2017</span>
                        </span>

                        <div class="goals-result">
                            <a href="single-team.html">
                                <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                                Portugal
                            </a>

                            <span class="goals">
                                <b>2</b> - <b>3</b>
                            </span>

                            <a href="single-team.html">
                                <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                                Spain
                            </a>
                        </div>
                    </li>

                    <li>
                        <span class="head">
                            Rusia Vs Colombia <span class="date">30 Jun 2017</span>
                        </span>

                        <div class="goals-result">
                            <a href="single-team.html">
                                <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                                Rusia
                            </a>

                            <span class="goals">
                                <b>2</b> - <b>3</b>
                            </span>

                            <a href="single-team.html">
                                <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                                Colombia
                            </a>
                        </div>
                    </li>

                    <li>
                        <span class="head">
                            Uruguay Vs Portugal <span class="date">31 Jun
                                2017</span>
                        </span>

                        <div class="goals-result">
                            <a href="single-team.html">
                                <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                                Uruguay
                            </a>

                            <span class="goals">
                                <b>2</b> - <b>3</b>
                            </span>

                            <a href="single-team.html">
                                <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                                Portugal
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end recent-results -->

    <!-- Top player -->
    <div class="col-lg-4">
        <div class="player-ranking">
            <h5><a href="group-list.html">Fairplay</a></h5>
            <div class="info-player">
                <ul>
                    <li>
                        <span class="position">
                            1
                        </span>
                        <a href="single-team.html">
                            <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                            Russia
                        </a>
                        <span class="points">
                            0
                        </span>
                    </li>

                    <li>
                        <span class="position">
                            2
                        </span>
                        <a href="single-team.html">
                            <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                            Saudi Arabia
                        </a>
                        <span class="points">
                            1
                        </span>
                    </li>

                    <li>
                        <span class="position">
                            3
                        </span>
                        <a href="single-team.html">
                            <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                            Egypt
                        </a>
                        <span class="points">
                            1
                        </span>
                    </li>

                    <li>
                        <span class="position">
                            4
                        </span>
                        <a href="single-team.html">
                            <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                            Uruguay
                        </a>
                        <span class="points">
                            7
                        </span>
                    </li>

                    <li>
                        <span class="position">
                            5
                        </span>
                        <a href="single-team.html">
                            <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                            Portugal
                        </a>
                        <span class="points">
                            8
                        </span>
                    </li>

                    <li>
                        <span class="position">
                            6
                        </span>
                        <a href="single-team.html">
                            <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                            Spain
                        </a>
                        <span class="points">
                            8
                        </span>
                    </li>

                    <li>
                        <span class="position">
                            7
                        </span>
                        <a href="single-team.html">
                            <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                            Morocco
                        </a>
                        <span class="points">
                            9
                        </span>
                    </li>

                    <li>
                        <span class="position">
                            8
                        </span>
                        <a href="single-team.html">
                            <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                            IR Iran
                        </a>
                        <span class="points">
                            13
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Top player -->
    </div>
    </div>
    <!-- Tab Theree - statistics -->

    <!-- Tab One - Groups List -->
    <div class="tab-pane" id="groups">
        <div class="groups-list">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <h5><a href="groups.html">GROUP A</a></h5>
                    <div class="item-group">
                        <ul>
                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/rusia.png" alt="">
                                    Russia
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/arabia.png" alt="">
                                    Saudi Arabia
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/egy.png" alt="">
                                    Egypt
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/uru.png" alt="">
                                    Uruguay
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5><a href="groups.html">GROUP B</a></h5>
                    <div class="item-group">
                        <ul>
                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/por.png" alt="">
                                    Portugal
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/esp.png" alt="">
                                    Spain
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/mar.png" alt="">
                                    Morocco
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/irn.png" alt="">
                                    IR Iran
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5><a href="group-list.html">GROUP C</a></h5>
                    <div class="item-group">
                        <ul>
                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/fra.png" alt="">
                                    France
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/aus.png" alt="">
                                    Australia
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/per.png" alt="">
                                    Peru
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/den.png" alt="">
                                    Denmark
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5><a href="group-list.html">GROUP D</a></h5>
                    <div class="item-group">
                        <ul>
                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/arg.png" alt="">
                                    Argentina
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/isl.png" alt="">
                                    Iceland
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/cro.png" alt="">
                                    Croatia
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/nga.png" alt="">
                                    Nigeria
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <h5><a href="group-list-html">GROUP E</a></h5>
                    <div class="item-group">
                        <ul>
                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/bra.png" alt="">
                                    Brazil
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/sui.png" alt="">
                                    Switzerland
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/costa-rica.png" alt="">
                                    Costa rica
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/srb.png" alt="">
                                    Serbia
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5><a href="group-list-html">GROUP F</a></h5>
                    <div class="item-group">
                        <ul>
                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/ger.png" alt="">
                                    Germany
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/mex.png" alt="">
                                    Mexico
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/swe.png" alt="">
                                    Sweden
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/kor.png" alt="">
                                    Korea Rep
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5><a href="group-list-html">GROUP G</a></h5>
                    <div class="item-group">
                        <ul>
                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/bel.png" alt="">
                                    Belgium
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/pan.png" alt="">
                                    Panama
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/tun.png" alt="">
                                    Tunisia
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/eng.png" alt="">
                                    England
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5><a href="group-list-html">GROUP H</a></h5>
                    <div class="item-group">
                        <ul>
                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/pol.png" alt="">
                                    Poland
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/sen.png" alt="">
                                    Senegal
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/colombia.png" alt="">
                                    Colombia
                                </a>
                            </li>

                            <li>
                                <a href="single-team.html">
                                    <img src="img/clubs-logos/japan.png" alt="">
                                    Japan
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Tab One - Groups List -->
    </div>
    <!-- Content Tabs -->
    </div>
    @endif
    @endif
    <!-- Left Content - Tabs and Carousel -->

    <!-- Right Content - Content Counter -->
    <div class="col-xl-3 col-md-12">
        <img src="{{ asset('chilecito_v.png') }}" alt="" class="img-hover">
        <!-- Content Counter -->
    </div>
    <!-- End Right Content - Content Counter --> --}}
    </div>
    </div>
    </div>
    <!-- Dark Home -->

    <!-- Content Central -->
    <div class="container padding-top">
        <div class="row">

            <!-- content Sidebar Center -->
            <aside class="col-sm-6 col-lg-3 col-xl-3">
                <!-- Locations -->
                <div class="panel-box">
                    <div class="titles no-margin">
                        <h4>Sponsor</h4>
                    </div>
                    <!-- Locations Carousel -->
                    <img src="{{ asset('img/sponsors/aleua.jpg') }}"
                        style="background: red; width: 100%; height: auto;" />
                    <!-- Locations Carousel -->
                </div>
                <!-- End Locations -->
            </aside>
            <!-- End content Sidebar Center -->

            <!-- content Column Left -->
            <div class="col-lg-6 col-xl-7">
                <!-- Recent Post -->
                <div class="panel-box">

                    <div class="titles">
                        <h4>Baby Sports</h4>
                    </div>

                    <!-- Post Item -->
                    @foreach ($posts as $post)
                    <div class="post-item">
                        <div class="row">
                            @if ($post->image()->exists())
                            <div class="col-md-4">
                                <div class="img-hover">
                                    <img src="{{ asset('storage/' . $post->image->path) }}" alt=""
                                        class="img-responsive">
                                    <div class="overlay"><a href="{{ route('web.posts', ['post' => 1]) }}">+</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="{{ $post->image()->exists() ? 'col-md-8' : 'col' }}">
                                <h5><a href="{{ route('web.posts', ['post' => 1]) }}">{{ $post->title }}</a>
                                </h5>
                                <span class="data-info">{{ $post->author->full_name }}.
                                    {{ $post->created_at->diffForHumans() }}</span>
                                <p>{{ $post->body }}
                                    <a href="{{ route('web.posts', ['post' => 1]) }}">Leer más [+]</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Post Item -->
                </div>
                <!-- End Recent Post -->
            </div>
            <!-- End content Left -->

            <!-- content Sidebar Right -->
            <aside class="col-sm-6 col-lg-3 col-xl-2">
                @if($tournament?->games > 0)
                <!-- Diary -->
                <div class="panel-box">
                    <div class="titles">
                        <h4><i class="fa fa-calendar"></i>Calendario</h4>
                    </div>

                    <!-- List Diary -->
                    <ul class="list-diary">
                        <!-- Item List Diary -->
                        <li>
                            <h6>GROUP A <span>14 JUN 2018 - 18:00</span></h6>
                            <ul class="club-logo">
                                <li>
                                    <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                                    <span>RUSSIA</span>
                                </li>
                                <li>
                                    <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                                    <span>SAUDI ARABIA</span>
                                </li>
                            </ul>
                        </li>
                        <!-- End Item List Diary -->

                        <!-- Item List Diary -->
                        <li>
                            <h6>GROUP E <span>22 JUN 2018 - 15:00</span></h6>
                            <ul class="club-logo">
                                <li>
                                    <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                                    <span>BRAZIL</span>
                                </li>
                                <li>
                                    <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                                    <span>COSTA RICA</span>
                                </li>
                            </ul>
                        </li>
                        <!-- End Item List Diary -->

                        <!-- Item List Diary -->
                        <li>
                            <h6>GROUP H <span>19 JUN 2018 - 15:00</span></h6>
                            <ul class="club-logo">
                                <li>
                                    <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                                    <span>COLOMBIA</span>
                                </li>
                                <li>
                                    <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                                    <span>JAPAN</span>
                                </li>
                            </ul>
                        </li>
                        <!-- End Item List Diary -->

                        <!-- Item List Diary -->
                        <li>
                            <h6>GROUP C <span>16 JUN 2018 - 15:00</span></h6>
                            <ul class="club-logo">
                                <li>
                                    <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                                    <span>FRANCE</span>
                                </li>
                                <li>
                                    <img src="{{ asset('Barcelona_FC_logo.svg') }}" alt="">
                                    <span>AUSTRALIA</span>
                                </li>
                            </ul>
                        </li>
                        <!-- End Item List Diary -->
                    </ul>
                    <!-- End List Diary -->
                </div>
                <!-- End Diary -->
                @endif

                <!-- Adds Sidebar -->
                <div class="panel-box">
                    <div class="titles no-margin">
                        <h4></i>Sponsor</h4>
                    </div>
                    <a href="https://www.instagram.com/distritolr/" target="_blank">
                        <img src="{{ asset('img/sponsors/distritolr.png') }}" class="w-100 img-responsive" alt="">
                    </a>
                </div>
                <!-- End Adds Sidebar -->
            </aside>
            <!-- End content Sidebar Right -->

        </div>
    </div>
    <!-- End Content Central -->


</section>
<!-- End Section Area -  Content Central -->
@endsection