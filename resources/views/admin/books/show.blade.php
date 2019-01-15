@extends('layouts.master')
@section('title')
    <title>{{ $book->title }}</title>
@endsection
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/book">Book</a></li>
        <li class="breadcrumb-item active">{{ $book->title }}</li>
    </ol>
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
            <strong>${{ $book->price }}</strong>
            <p>Created Date : {{ $book->created_at }}</p>
            <p>Updated Date : {{ $book->updated_at }}</p>
            <form action="{{ route('book.destroy', $book) }}" method="POST" enctype="multipart/form-data" role="form">
                {{ csrf_field() }}
                <a href="{{ route('book.edit', $book) }}" class="btn btn-primary btn-sm">Edit</a>
                <input type="hidden" name="_method" value="delete">
                <input type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete();" value="Delete">
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function confirmDelete() {
            var x = confirm("Are you sure do you want to delete?");

            if(x)
                return true;
            else
                return false;
        }
    </script>
@endsection