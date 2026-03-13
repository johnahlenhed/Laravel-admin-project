@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-font-primary">Categories</h1>
        <a class="bg-primary text-white font-bold py-2 px-4 rounded text-center cursor-pointer" href="{{ route('categories.create') }}">Add Category</a>
    </div>

    <div class="flex flex-col gap-2">
        @forelse($categories as $category)
        <x-product-wrapper>
            <p class="text-primary text-xl font-semibold">{{ $category->name }}</p>
            <div class="flex items-center gap-3">
                <x-edit-link href="{{ route('categories.edit', $category) }}">Edit</x-edit-link>
                <form action="{{ route('categories.destroy', $category) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-danger-button type="submit" onclick="return confirm('Are you sure you want to delete this category?')">Delete</x-danger-button>
                </form>
            </div>
        </x-product-wrapper>
        @empty
        <p class="text-font-secondary mt-4">No categories found.</p>
        @endforelse
    </div>
@endsection
