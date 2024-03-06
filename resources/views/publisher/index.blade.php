@extends('layouts.templet')
@section('name')
    <h1>publisher</h1>
@endsection
@push('btn')
    <a href="{{ route('publisher.create') }}" class="btn btn-primary">Create New Autho</a>
@endpush
@section('Content')
    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>address</th>
                        <th class="w-1"></th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($publishers as $publisher)
                        <tr>
                            <td>{{ $publisher->name }}</td>
                            <td>{{ $publisher->address }}</td>
                            <td>
                                <a class="btn btn-Delete" href="{{ route('publisher.edit', $publisher->id) }}">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('publisher.detroy', $publisher->id) }}" method="POST">
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
