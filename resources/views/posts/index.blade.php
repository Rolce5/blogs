@extends('layouts.app')
@section('Post', 'Manage Post')
@section('content')
<div class="container px-4 py-5">
    <div class="col-md-10 mx-auto col-lg-10">
        <h1>Manage Post</h1>
        <div class="d-flex justify-content-end text-right mb-3">
            <a href="{{ route('posts.create')}}" class="btn btn-success">Create Post</a>
        </div>
        <div class="table-responsive position-relative">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Body</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->body }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                       class="btn btn-sm btn-secondary"><i class="bi bi-pencil-square"></i></a>
                                       <button type="button" class="btn btn-danger btn-sm" 
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="bi bi-trash3-fill"></i>
                                      </button>
                                </div>
                            </td>
                        </tr>

  
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    Are you sure you want to delete this post <b>({{ $post->title }})</b> ?
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                NO
                                            </button>
                                            <button type="submit" class="btn btn-danger">YES</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">No records found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection