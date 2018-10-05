@extends('layouts.layout')

@section('content')
<form action="/products/{{ $product->id }}" method="POST">
    {{csrf_field() }}
    {{method_field('PATCH') }}
    <div class="form-group">
        <label for="name">Name of product</label>
        <input type="text" class="form-control" name="product_name" value = "{{ $product->product_name}}">
    </div>
    <a href='/products' class="btn btn-warning">Back</a>
    <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection