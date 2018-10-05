@extends('layouts.layout')

@section('content')
<form action="/products" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="category">Category</label>
        <select class="form-control" name="category_id">
            <option value="0">---Select category---</option>
            @foreach ($categories as $category) 
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="name">Name of product</label>
        <input type="text" class="form-control" name="product_name"  placeholder="Enter Name of product">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>


@endsection