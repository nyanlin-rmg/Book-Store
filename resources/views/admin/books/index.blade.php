@extends('layouts.master')
@section('title')
    <title>Books</title>
@endsection
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item active">Book</li>
    </ol>
    @if(count($books) <= 0)
        <h3>There is no book!</h3>
        <hr>
    @else
        @foreach($books as $book)
            <div class="row" style="padding: 30px">
                <div class="col-md-2">
                    <img src="../images/{{$book->cover}}" width="100" height="120">
                </div>
                <div class="col-md-10">
                    <h3><a href="{{ route('book.show', $book) }}">{{$book->title}}</a></h3>
                    <i>-by <b>{{ $book->author }}</b></i><br><br>
                    <p>
                        {{ $book->summary }}
                    </p>
                    <strong>${{ $book->price }}</strong>
                </div>
            </div>
        @endforeach
    @endif
    <a href="{{ route('book.create') }}" class="btn btn-primary">Add New Book</a>

@endsection