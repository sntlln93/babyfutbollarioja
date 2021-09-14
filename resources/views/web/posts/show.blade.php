@extends('web.layouts.app')

@section('styles')
<style>
    .post__body {
        columns: 3 250px;
        margin-bottom: 5rem;
    }

    .post__body img {
        margin-bottom: 1rem;
    }
</style>
@endsection

@section('content')
<!-- Sponsors-->
<section class="content-info">
    <div class="white-section pt-5 mb-1">
        <div class="container">
            <div class="row no-line-height">
                <div class="col-sm-12">
                    <div class="post__header">
                        <h2>{{ $post->title }}</h2>
                        <p>{{ $post->author->full_name }}, {{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="post__body">
                        @if($post->image)
                        <img src="{{ asset('storage/'.$post->image->path) }}" alt="{{ $post->title }}"
                            class="img-fluid">
                        @endif
                        <p>
                            {{ $post->body }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Sponsors -->
@endsection