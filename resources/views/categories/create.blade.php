@extends('layouts.layout')

@section('content')
<form action="/categories" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name of Category</label>
        <input type="text" class="form-control" id="name" name="category_name"  placeholder="Enter Name of Category">
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection