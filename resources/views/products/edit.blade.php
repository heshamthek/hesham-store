@extends('layouts.app')

@section('content')
<h1>Edit Product</h1>

<!-- Display validation errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Display success message -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
    </div>

    <div class="form-group">
        <label for="category_id">Category:</label>
        <select id="category_id" name="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="photo">Product Photo:</label>
        <input type="file" id="photo" name="photo" accept="image/*">
        
        @if ($product->photo)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $product->photo) }}" alt="Current Photo" style="width: 150px;">
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="price">Product Price:</label>
        <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" step="0.01" required>
    </div>

    <button type="submit">Update</button>
</form>
@endsection
