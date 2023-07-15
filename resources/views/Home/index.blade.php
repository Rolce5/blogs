@extends('layouts.app')
@section('home', 'Manage Post')
@section('content')
<div class="container mt-5">
    <div class="container mb-5">
        <div>
            @foreach ($posts as $post)
                <div class="mb-4">
                    <h1 class="my-2 text-center"><a href="{{ route('post', $post->id)}}" class="text-decoration-none text-dark text-primary:hover">{{ $post->title }}</a></h1>
                    <p>{{ Str::limit($post->body, 1000) }}</p>
                    <small class="text-body-tertiary d-flex justify-content-end">Posted {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection