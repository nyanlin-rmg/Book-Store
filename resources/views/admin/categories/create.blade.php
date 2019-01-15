@extends('layouts.master')
@section('title')
    <title>Create New Category</title>
@endsection
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/category">Category</a></li>
        <li class="breadcrumb-item active">Create Category</li>
    </ol>
    <form action="{{ route('category.store') }}" role="form" method="POST">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            @if($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
            <label for="remark">Remark</label>
            <textarea name="remark" cols="30" rows="10" class="form-control">{{ old('remark') }}</textarea>
            @if($errors->has('remark'))
                <span class="help-block">
                    <strong>{{ $errors->first('remark') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <input type="submit" value="Add New Category" class="btn btn-primary">
        </div>
    </form>
@endsection