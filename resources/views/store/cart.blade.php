@extends('layouts.app')
@section('title')
    <title>Cart</title>
@endsection
@section('content')
    @if ($carts == null)
        <h3>There is no item in your cart...</h3>
    @else
        <table class="table">
            <tr>
                <th>Title</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Price</th>
                <th></th>
            </tr>
            @foreach($carts as $cart)
                <tr>
                    <td>{{ $cart['name'] }}</td>
                    <td>{{ $cart['quantity'] }}</td>
                    <td>${{ $cart['price'] }}</td>
                    <td>${{ $cart['price'] * $cart['quantity']}}</td>
                    <td>
                        <a href="{{ route('removeFromCart', $cart['id']) }}" class="btn btn-danger btn-sm">Remove</a>
                    </td>
                </tr>
            @endforeach
            <tr>
                <th></th>
                <th></th>
                <th>Total:</th>
                <th>{{ $total_quantity }}</th>
                <th>${{ $total_price }}</th>
            </tr>
        </table>
        <hr>
        <div class="row">
            <form action="{{ route('order') }}" method="POST" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    @if($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" class="form-control" value="{{ old('phone') }}">
                    @if($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address">Address</label>
                    <textarea name="address" cols="30" rows="10" class="form-control">{{ old('address') }}</textarea>
                </div>
                <input type="submit" value="Submit Order" class="btn btn-primary btn-lg" onclick="return submitOrder();">
            </form>
        </div>
    @endif
@endsection
@section('scripts')
    <script>
        function submitOrder() {
            var x = confirm('Are you sure to order the products?');
            if(x)
                return true;
            else
                return false;
        }
    </script>
@endsection