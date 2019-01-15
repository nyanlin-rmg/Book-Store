@extends('layouts.master')
@section('title')
    <title>Add New Book</title>
@endsection
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/book">Book</a></li>
        <li class="breadcrumb-item active">Create Book</li>
    </ol>
    <form action="{{ route('book.store') }}" role="form" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('title') ? ' has-error' : ''}}">
            <label for="Title">Title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
            @if($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
            <label for="author">Author</label>
            <input type="text" class="form-control" name="author" value="{{ old('author') }}">
            @if($errors->has('author'))
                <span class="help-block">
                    <strong>{{ $errors->first('author') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('summary') ? ' has-error' : '' }}">
            <label for="summary">Summary</label>
            <textarea name="summary" cols="30" rows="10" class="form-control">{{ old('summary') }}</textarea>
            @if($errors->has('summary'))
                <span class="help-block">
                    <strong>{{ $errors->first('summary') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" value="{{ old('price') }}">
            @if($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
            <label for="category">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="" selected>~Choose Category~</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @if($errors->has('category_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('category_id') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('cover') ? ' has-error' : '' }}">
            <label for="cover">Choose Cover</label>
            <input type="file" class="form-control" value="{{ old('cover') }}" name="cover">
            @if($errors->has('cover'))
                <span class="help-block">
                    <strong>{{ $errors->first('cover') }}</strong>
                </span>
            @endif
        </div>
        <input type="submit" value="Add New Book" class="btn btn-primary">
    </form>
@endsection