@extends('layouts.templet')
@section('name')
    <h1>authors</h1>
@endsection
@section('Content')
    <div class="card">
        <div class="card-header">Add Author</div>
        <div class="card-body">
            <form action="/authors" class="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        placeholder="Input placeholder">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">photo</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo"
                        placeholder="Input placeholder">
                    @error('photo')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">photo</label>
                </div>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
