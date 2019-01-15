@extends('layouts.master')
@section('title')
    <title>{{ $category->name }}</title>
@endsection
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/category">Category</a></li>
        <li class="breadcrumb-item active">{{ $category->name }}</li>
    </ol>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Remark</th>
            <th>Created Date</th>
            <th>Updated Date</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->remark }}</td>
            <td>{{ $category->created_at }}</td>
            <td>{{ $category->updated_at }}</td>
            <td><a href="{{ route('category.edit', $category) }}" class="btn btn-primary btn-sm">Edit</a></td>
            <td>
                <form action="{{ route('category.destroy', $category) }}" role="form" method="POST">
                    <input type="hidden" name="_method" value="delete">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete();" value="Delete">
                </form>
            </td>
        </tr>
    </table>
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