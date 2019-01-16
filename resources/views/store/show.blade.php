@extends('layouts.user-view')
@section('title')
    <title>{{ $book->title }}</title>
@endsection
@section('content')
    <div class="row" style="padding: 20px;">
        <div class="col-md-2">
            <img src="http://127.0.0.1:8000/images/{{ $book->cover }}" width="170" height="200">
        </div>
        <div class="col-md-9 col-md-offset-1">
            <h3>{{ $book->title }}</h3>
            <p><i>by <b>{{ $book->author }}</b></i></p>
            @if($book->category != null)
                <p>-Category : <b>{{$book->category->name}}</b></p>
                <br>
            @endif
            <p>
                -{{ $book->summary }}
            </p>
            <strong>${{ $book->price }}</strong><br><br>
            <p>
                <a href="#" class="btn btn-primary"><i class="fas fa-cart-plus"></i> Add To Card </a>
            </p>
        </div>
    </div>
@endsection