@extends('layouts.app')

@section('content')
<h1>Create Category</h1>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <label for="name">Category Name:</label>
    <input type="text" id="name" name="name">
    <button type="submit">Create</button>
</form>
@endsection
