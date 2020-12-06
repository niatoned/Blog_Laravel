@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Bienvenue sur le Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="{{ route('categories.index') }}" class="btn btn-primary">Gestion des catégories</a>
                        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Gestion des articles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
