@extends('layouts.app')

@section('content')
<h1>Edit Category</h1>
<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Category Name:</label>
    <input type="text" id="name" name="name" value="{{ $category->name }}">
    <button type="submit">Update</button>
</form>
@endsection
