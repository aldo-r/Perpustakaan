@extends('layouts.templet')
@section('name')
    <h1>authors edit</h1>
@endsection
@section('Content')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit Author</div>
            <div class="card-body">
                <form method="POST" action="{{ route('authors.update', $author->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ $author->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo"
                            name="photo">
                        @error('photo')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- @section('Content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('author.update', $author->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Input placeholder"
                        value="{{ $author->name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">photo</label>
                    <input type="file" class="form-control" name="photo" placeholder="Input placeholder"
                        value="{{ $author->photo }}">
                </div>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection --}}
