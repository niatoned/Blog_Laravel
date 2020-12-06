@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editer une catégorie') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categories.update', $category) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="category">Nom de la catégorie</label>
                                <input type="text" name="name" value="{{ $category->name }}" class="form-control @error('name') is-invalid @enderror" id="category" aria-describedby="Category name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
