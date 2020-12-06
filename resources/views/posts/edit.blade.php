@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Edit a post') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Post title</label>
                                <input type="text" name="title" value="{{$post->title}}" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="Post title">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="form-group form-check">
                                    <input type="checkbox" name="is_featured" class="form-check-input" id="feature"
                                           {{($post->is_featured? 'checked' : '')}} >
                                    <label class="form-check-label" for="feature">Featured</label>
                                </div>
                                <div class="ml-5 form-group form-check">
                                    <input type="checkbox" name="is_online" {{($post->is_online? 'checked' : '')}} class="form-check-input" id="is_online">
                                    <label class="form-check-label" for="is_online">Is Online</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea rows="4" cols="3" name="content" class="form-control @error('content') is-invalid @enderror" id="content" aria-describedby="content">{{ $post->content  }}</textarea>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category_id" class="form-control" id="category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($category->id == $post->category_id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file">File</label>
                                <input type="file" name="file" class="form-control-file" id="file">
                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
