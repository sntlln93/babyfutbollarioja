@extends('web.layouts.app')

@section('styles')
<style>
    .category__filter {
        background: #18191B;
        font-weight: bold;
        padding: .6em;
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, .1);
        color: white;
        cursor: pointer;
    }

    .category__filter:active {
        outline: none;

    }

    .category__filter--active,
    .category__filter:hover {
        background: white;
        color: #18191B
    }

    .clubs {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(4rem, 1fr));
        grid-gap: 1em;
    }

    .clubs__logo {
        margin-block: auto;
    }

    .clubs__logo img {
        width: 100%;
    }
</style>
@yield('custom_styles')
@endsection

@section('content')
<div class="hero-header">
    <div id="hero-slider" class="hero-slider">
        @yield('hero')
    </div>
</div>

<!-- Section Area - Content Central -->
<section class="content-info">
    <!-- Dark Home -->
    @yield('tournament_info')
    <!-- Dark Home -->

    <!-- Content Central -->
    <div class="container padding-top">
        <div class="row">

            <!-- content Sidebar Center -->
            <aside class="col-sm-6 col-lg-3 col-xl-3">
                <!-- Locations -->
                <div class="panel-box">
                    <div class="titles no-margin">
                        <h4><i class="fas fa-ad mr-2"></i>Sponsor</h4>
                    </div>
                    <!-- Locations Carousel -->
                    <img src="{{ asset('img/sponsors/aleua.jpg') }}" />
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
                        <h4><i class="fas fa-newspaper mr-2"></i>Baby Sports</h4>
                    </div>

                    <!-- Post Item -->
                    @foreach ($posts as $post)
                    <div class="post-item">
                        <div class="row">
                            @if ($post->photo)
                            <div class="col-md-4">
                                <div class="img-hover">
                                    <img src="{{ asset('storage/' . $post->photo) }}" alt="" class="img-responsive">
                                    <div class="overlay"><a href="{{ route('web.post.show', ['post' => 1]) }}">+</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="{{ $post->image()->exists() ? 'col-md-8' : 'col' }}">
                                <h5><a href="{{ route('web.post.show', ['post' => 1]) }}">{{ $post->title }}</a>
                                </h5>
                                <span class="data-info">{{ $post->author->full_name }}.
                                    {{ $post->created_at->diffForHumans() }}</span>
                                <p>{{ Str::limit($post->body, 250, '...') }}
                                    <a href="{{ route('web.post.show', ['post' => 1]) }}">Leer más [+]</a>
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
                <!-- Diary -->

                <!-- Adds Sidebar -->
                <div class="panel-box">
                    <div class="titles no-margin">
                        <h4><i class="fas fa-ad mr-2"></i>Sponsor</h4>
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