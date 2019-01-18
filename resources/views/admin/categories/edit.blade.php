@extends('layouts.master')
@section('title')
    <title>Edit Category</title>
@endsection
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/category">Category</a></li>
        <li class="breadcrumb-item"><a href="/admin/category/{{ $category->id }}">{{ $category->name }}</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <form action="{{ route('category.update', $category) }}" method="POST">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
            @if($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
            <label for="remark">Remark</label>
            <textarea name="remark" cols="30" rows="10" class="form-control">{{ $category->remark }}</textarea>
            @if($errors->has('remark'))
                <span class="help-block">
                    <strong>{{ $errors->first('remark') }}</strong>
                </span>
            @endif
        </div>
        <input type="submit" value="Edit" class="btn btn-primary">
    </form>
@endsection