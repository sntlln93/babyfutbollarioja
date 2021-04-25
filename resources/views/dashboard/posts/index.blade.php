@extends('dashboard.layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Baby Sports</h1>
        <a id="qw" href="{{ route('posts.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Nuevo post</a>
    </div>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header d-flex flex-row justify-content-between">
                        <strong>{{ Str::limit($post->title, 30) }}</strong>
                        <div class="d-flex flex-row">
                            <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn mr-1 btn-sm btn-warning"><i
                                    class="fas fa-edit"></i></a>
                            @include('dashboard._partials.delete_button', ['id' => $post->id, 'prefix' => 'post'])
                        </div>

                    </div>
                    <div class="card-body">
                        <p class="mb-0">
                            <i>Por <strong>{{ $post->author->full_name }}</strong>,
                                {{ $post->created_at->diffForHumans() }}</i>
                        </p>
                        <div class="d-flex justify-content-around">
                            <img class="post--image" src="{{ asset('storage/' . $post->image->path) }}" alt="">
                        </div>
                        {{ Str::limit($post->body, 500) }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('styles')
    <style>
        .post--image {
            width: 25%;
        }

    </style>
@endsection
