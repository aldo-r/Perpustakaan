@extends('layouts.templet')
@section('name')
    <h1>books</h1>
@endsection
@section('Content')
    <div class="card">
        <div class="card-header">Add Book</div>
        <div class="card-body">
            <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Author ID</label>
                    <select class="form-control" name="author_id">
                        @foreach ($author as $authors)
                            <option value="{{ $authors->id }}">{{ $authors->name }}</option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Publisher ID</label>
                    <select class="form-control" name="publisher_id">
                        @foreach ($publisher as $publishers)
                            <option value="{{ $publishers->id }}">{{ $publishers->name }}</option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        placeholder="Input title">
                    @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Cover</label>
                    <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover"
                        placeholder="Input cover">
                    @error('cover')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Year</label>
                    <input type="date" class="form-control @error('year') is-invalid @enderror" name="year"
                        placeholder="Input year">
                    @error('year')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
