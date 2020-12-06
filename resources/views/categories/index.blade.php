@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>
            Administration des categories
            <small class="text-muted">With faded secondary text</small>
        </h3>
        <div class="card">
            <div class="card-header">{{ __('categories') }}</div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Ajouter</a>
                <table class="table mt-2">
                    <caption>List of categories</caption>
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td scope="row">{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('categories.edit', $category) }}" class="block btn btn-primary mr-1">Editer</a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST">
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
