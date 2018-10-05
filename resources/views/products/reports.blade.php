
@extends('layouts.layout')

@section('content')
<table class = "table table-condensed table-striped table-bordered table-hover">
<tr>
    <th>Category</th>
    <th>Number of products</th>
</tr>
@foreach($products as $product)
<tr>
    <td>{{ $product->category_name }}</td>
    <td>{{$product->category}}</td>

</tr>
@endforeach
@endsection