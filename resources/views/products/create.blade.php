@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Create Product</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li> 
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Display success message -->
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div class="form-group">
            <label for="name" class="block text-sm font-medium text-gray-700">Product Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required 
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
        </div>

        <div class="form-group">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Category:</label>
            <select id="category_id" name="category_id" required 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="photo" class="block text-sm font-medium text-gray-700">Product Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*" 
                   class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100">
        </div>

        <div class="form-group">
            <label for="price" class="block text-sm font-medium text-gray-700">Product Price:</label>
            <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" required 
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
        </div>

        <button type="submit" class="w-full py-2 px-4 bg-yellow-500 text-white font-bold rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50">
            Create
        </button>
    </form>
</div>
@endsection
