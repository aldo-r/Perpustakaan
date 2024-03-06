@extends('layouts.templet')
@section('name')
    <h1>authors</h1>
@endsection
@push('btn')
    <a href="{{ route('author.create') }}" class="btn btn-primary">Create New Autho</a>
@endpush
@section('Content')
    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Photo</th>
                        <th class="w-1"></th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($authors as $author)
                        <tr>
                            <td>{{ $author->name }}</td>
                            <td><img src="{{ asset('storage/' . $author->photo) }}" height="150px" alt=""></td>
                            <td>
                                <a class="btn btn-Delete" href="{{ route('author.edit', $author->id) }}">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
