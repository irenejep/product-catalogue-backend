@extends('layouts.layout')

@section('content')
<div class="row">
    <div class=col-md-8>
    <a href='/products/create' class="btn btn-warning">New Product<a>
        <table class = "table table-condensed table-striped table-bordered table-hover">
            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Product Name</th>
                
                <th colspan="4">Actions</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->category_name }}</td>
                <td>{{$product->product_name}}</td>
                <td> <a href='/products/edit/{{$product->id}}' class="btn btn-primary">Edit</a></td>
                <td> 
                    <form class="form-horizontal" action="/products/{{$product->id}}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger" >Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="col-md-2">
    </div>
</div>

@endsection