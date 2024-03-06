@extends('layouts.templet')
@section('name')
    <h1>publisher</h1>
@endsection
@section('Content')
    <div class="card">
        <div class="card-body">
            <form action="/publisher" class="" method="post" enctype="multipart/form-data">
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
                    <label class="form-label">address</label>
                    <input type="text"class="form-control @error('name') is-invalid @enderror" name="address"
                        placeholder="Input placeholder">
                    @error('address')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
