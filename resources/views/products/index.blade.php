@extends('layouts.app')

@section('content')
<h1>Products</h1>

<!-- Display success message -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('products.create') }}" class="btn btn-primary">Create Product</a>

<table class="table table-striped mt-3">
    <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Photo</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name }}</td>
            <td>
                @if ($product->photo)
                    <img src="{{ asset('storage/' . $product->photo) }}" alt="Product Photo" style="width: 100px; height: auto;">
                @else
                    No photo
                @endif
            </td>
            <td>${{ number_format($product->price, 2) }}</td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">No products found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
