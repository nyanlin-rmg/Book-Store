@extends('layouts.user-view')
@section('title')
    <title>Book Store</title>
@endsection
@section('css')
    <style>
        table tr td {
            padding: 30px;
        }
    </style>
@endsection
@section('content')
    <table class="table">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Price</th>
            <th></th>
        </tr>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td><a href="{{ url("store/$book->id") }}">{{ $book->title }}</a></td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->category->name }}</td>
                <td>${{ $book->price }}</td>
                <td><a href="{{ route('addToCart', $book) }}" class="btn btn-primary">Add To Cart</a></td>
            </tr>
        @endforeach
    </table>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
@endsection