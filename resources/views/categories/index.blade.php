@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Categories</h1>

    <!-- Create Category Button -->
    <a href="{{ route('categories.create') }}" class="inline-block mb-4 py-2 px-4 bg-blue-500 text-white font-bold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
        Create Category
    </a>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="py-2 px-4 border-b border-gray-300 text-left">Name</th>
                    <th class="py-2 px-4 border-b border-gray-300 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @foreach ($categories as $category)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b border-gray-300">{{ $category->name }}</td>
                    <td class="py-2 px-4 border-b border-gray-300">
                        <!-- Edit Button -->
                        <a href="{{ route('categories.edit', $category->id) }}" class="inline-block mr-2 py-1 px-3 bg-yellow-500 text-white text-sm font-bold rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50">
                            Edit
                        </a>
                        
                        <!-- Delete Button -->
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this category?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="py-1 px-3 bg-red-500 text-white text-sm font-bold rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
