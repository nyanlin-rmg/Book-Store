@extends('layouts.master')
@section('title')
    <title>Category</title>
@endsection
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item active">Category</li>
    </ol>
    @if(count($categories) <= 0)
        <h2>There is no category....</h2>
        <hr>
    @else
        <table class="table">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Created Date</th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td><a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></td>
                    <td>{{ $category->created_at }}</td>
                </tr>
            @endforeach
        </table>
    @endif
    <a href="{{ route('category.create') }}" class="btn btn-primary">Add New Category</a>
@endsection