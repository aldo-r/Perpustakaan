@extends('layouts.templet')
@section('name')
    <h1>authors</h1>
@endsection
@push('btn')
    <a href="{{ route('books.create') }}" class="btn btn-primary">Create New Autho</a>
@endpush
@section('Content')
    <form action="" method="get">
        <input type="text" name="search" class="border border-gray-300 shadow  rounded p-3" placeholder="Cari data..."
            value="{{ request('search') }}">
    </form>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                        <th>title</th>
                        <th>author</th>
                        <th>publisher</th>
                        <th>cover</th>
                        <th>year</th>
                        <th class="w-1"></th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($book as $books)
                        <tr>
                            <td><a href="{{ route('books.show', $books->id) }}">{{ $books->title }}</a></td>
                            <td>{{ $books->author->name }}</td>
                            <td>{{ $books->publisher->name }}</td>
                            <td><img src="{{ asset('storage/' . $books->cover) }}" height="150px" alt=""></td>
                            <td>{{ $books->year }}</td>
                            <td>
                                <a class="btn btn-Delete" href="{{ route('books.edit', $books->id) }}">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('books.destroy', $books->id) }}" method="POST">
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
