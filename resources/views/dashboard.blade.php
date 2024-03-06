@extends('layouts.templet')
@section('name')
    <h1>dashbord</h1>
@endsection
@section('Content')
    <div class="row row-deck row-cards flex justify-center">
        <div class="col-sm-6 col-lg-4">
            <div class="card items-center text-center">
                <label class="form-label card-title">Authors</label>
                <h1>{{ $author }}</h1>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card items-center text-center">
                <label class="form-label card-title">Publiser</label>
                <h1>{{ $publisher }}</h1>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card items-center text-center">
                <label class="form-label card-title">Books</label>
                <h1>{{ $book }}</h1>
            </div>
        </div>
    </div>
@endsection
