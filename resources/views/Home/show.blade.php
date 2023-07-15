@extends('layouts.app')
@section('home', 'Manage Post')
@section('content')
<div class="container mt-5">
        <div>
            <h1 class="text-center">{{ $post->title }}</h1>
            @if ($post->image)
                <img src="{{ asset('storage/' .$post->image)}}" alt="{{$post->title}}" class="img-fluid my-5">
            @endif
            <p>{{ $post->body }}</p>
        </div>
    <div class="container">
        <h2 class="mt-5 mb-2 text-4xl font-bold text-center text-gray-900">Comments</h2>
        <form method="POST" action="{{ route('comment.store', $post) }}" class="mb-0">
            @csrf
            <div class="form-group mb-3">
                <label for="author" class="text-sm font-medium text-gray-700">Author</label>
                <input type="text" id="author" name="author" class="form-control" value="{{ old('author') }}" required>
            </div>
            <div class="form-group">
                <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="comment" class="text-sm font-medium text-gray-700 mt-4">Text</label>
                <textarea id="comment" name="comment" class="form-control" required>{{ old('comment') }}</textarea>
            </div>
            @if ($errors->any())
                <div class="mt-4">
                    <ul class="bg-danger px-4 py-5 rounded">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit" class="btn btn-primary mt-2">Post</button>
        </form>
        <div class="mt-4">
            {{-- @foreach ($post->comments() as $comment) --}}
            @foreach ($post->comments as $comment)
                <div class="mb-3 bg-white p-4 rounded shadow">
                    <div class="d-flex align-items-center">
                        <div class="mr-4 flex-shrink-0">
                            <span class="bg-dark-subtle p-3 rounded-circle">{{ strtoupper(implode('', array_map(function($word) { return $word[0]; }, explode(' ', $comment->author)))) }}</span>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <p class="mb-0 font-weight-bold">{{ $comment->author }}</p>
                            <p class="mb-0 text-muted">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="mt-3 ms-2">
                        <p>{{ $comment->comment }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection