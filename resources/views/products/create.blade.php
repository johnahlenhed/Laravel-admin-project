@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold text-font-primary mb-6">Add New Product</h1>

    <div class="bg-card rounded-xl shadow-sm p-6 max-w-lg">
        <form action="{{ route('products.store') }}" method="POST" class="flex flex-col gap-4">
            @csrf
            <div class="flex flex-col gap-1">
                <x-filter-label for="name">Product Name</x-filter-label>
                <x-input-field type="text" id="name" name="name" required />
            </div>
            <div class="flex flex-col gap-1">
                <x-filter-label for="category_id">Category</x-filter-label>
                <x-select id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-select>
            </div>
            <div class="flex flex-col gap-1">
                <x-filter-label for="price">Price (SEK)</x-filter-label>
                <x-input-field type="number" id="price" name="price" required />
            </div>
            <div class="flex flex-col gap-1">
                <x-filter-label for="description">Description</x-filter-label>
                <x-input-field type="text" id="description" name="description" required />
            </div>
            <x-primary-button type="submit">Add Product</x-primary-button>
        </form>
    </div>
@endsection
