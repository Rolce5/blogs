@extends('layouts.app')
@section('Post', 'Post Create')
@section('content')
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="col-md-10 mx-auto col-lg-7">
        <form class="p-4 p-md-5 border bg-light" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">Create a Post</h2>
            </header>
            <div class="form-group mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title"
                       value="{{ old('title') }}"
                       class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}">
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label>Image</label>
                <input type="file" accept="image/*" name="image"
                       class="form-control @error('image') is-invalid @enderror">
                       @if ($errors->has('image'))
                        <span class="invalid-feedback">{{ $errors->first('image') }}</span>
                       @else      
                        <small class="d-block text-muted mt-1">Accepted format: .png, .jpg, .svg</small>
                       @endif
            </div>

            <div class="form-group mb-3">
                <label>Body</label>
                <textarea class="form-control tiny-textarea {{ $errors->has('body') ? ' is-invalid' : '' }}"
                          rows="5"
                          name="body">{{ old('body') }}</textarea>

                @error('body')
                <span class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="mb-6">
                <button type="submit" class="btn btn-success">Create</button>
                <a href="{{ route('posts.index')}}" class="text-black ml-4">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection