@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Create Category</h1>

    <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
        @csrf

        <div class="form-group">
            <label for="name" class="block text-sm font-medium text-gray-700">Category Name:</label>
            <input type="text" id="name" name="name" required 
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white font-bold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Create
        </button>
    </form>
</div>
@endsection
