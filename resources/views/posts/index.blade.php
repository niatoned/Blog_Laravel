@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>
            Administration des articles
            <small class="text-muted">With faded secondary text</small>
        </h3>
        <div class="card">
            <div class="card-header">{{ __('Articles') }}</div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Ajouter</a>
                <table class="table mt-2">
                    <caption>List of posts</caption>
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Category</th>
                        <th scope="col">Is Online</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>
                                @if($post->file)
                                    <img width="50" height="50" src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($post->file) }}" alt="">
                                @else
                                    <img src="https://place-hold.it/50x50.png" alt="" width="50" height="50">
                                @endif
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->is_online ? 'Yes' : 'No' }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('posts.edit', $post) }}" class="block btn btn-primary mr-1">Editer</a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
