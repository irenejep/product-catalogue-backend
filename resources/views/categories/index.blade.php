@extends('layouts.layout')

@section('content')
<a href='/categories/create' class="btn btn-warning">New Category<a>
<table class = "table table-condensed table-striped table-bordered table-hover">
<tr>
    <th>#</th>
    <th>Name</th>
    <th colspan="3">Actions</th>
</tr>
@foreach($categories as $category)
<tr>
    <td>{{ $category->id }}</td>
    <td>{{$category->category_name}}</td>
    <td> <a href='/categories/edit/{{ $category->id }}' class="btn btn-primary">Edit</a></td>
    <td> 
        <form action='/categories/delete/{{ $category->id }}' method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="btn btn-danger">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" class="btn btn-danger" >Delete</button>
        </form>
    </td>
</tr>
@endforeach
@endsection