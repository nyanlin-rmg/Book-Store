@extends('layouts.master')
@section('title')
    <title>Order</title>
@endsection
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/order">Order</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
    <div class="row">
        <div class="col-md-6"><h4>Order Details</h4></div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-2"><label for="name">Name</label></div>
        <div class="col-md-10">- {{ $order->name }}</div>
    </div>
    <div class="row">
        <div class="col-md-2"><label for="email">Email</label></div>
        <div class="col-md-10">{{ $order->email }}</div>
    </div>
    <div class="row">
        <div class="col-md-2"><label for="phone">Phone</label></div>
        <div class="col-md-10">{{ $order->phone}}</div>
    </div>
    <div class="row">
        <div class="col-md-2"><label for="address">Address</label></div>
        <div class="col-md-10">{{ $order->address }}</div>
    </div>
    <div class="row">
        <div class="col-md-2"><label for="order_items">Order Items</label></div>
        <div class="col-md-10">
            @foreach($books as $book)
                <div><b>- <i><a href="{{ route('book.show', $book->id) }}">{{ $book->title }}</a></i></b></div>
                <div><b>Price - ${{ $book->price }}</b></div>
                <div><b>Qty - {{ $book->pivot->quantity }}</b></div>
                <hr>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">Order Status</div>
        <div class="col-md-10">
            @if($order->status == 0)
                <b>Pending</b>
            @else
                <b>Delivered</b>
            @endif
        </div>
    </div>
    <div class="row"><br></div>
    <div class="row">
        <div class="col-md-2">
            @if($order->status == 0)
                <a href="{{ route('markDelivered', $order->id) }}" class="btn btn-primary btn-sm">Delivered</a>
            @else
                <a href="{{ route('markDelivered', $order->id) }}" class="btn btn-primary btn-sm">Undo</a>
            @endif
        </div>
    </div>
@endsection