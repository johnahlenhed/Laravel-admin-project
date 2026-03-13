@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold text-font-primary mb-6">Edit Product</h1>

    <div class="bg-card rounded-xl shadow-sm p-6 max-w-lg">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-1">
                <x-filter-label for="name">Product Name</x-filter-label>
                <x-input-field type="text" id="name" name="name" value="{{ $product->name }}" required />
            </div>
            <div class="flex flex-col gap-1">
                <x-filter-label for="category_id">Category</x-filter-label>
                <x-select id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>
            <div class="flex flex-col gap-1">
                <x-filter-label for="price">Price (SEK)</x-filter-label>
                <x-input-field type="number" step=".01" id="price" name="price" value="{{ $product->price }}" required />
            </div>
            <div class="flex flex-col gap-1">
                <x-filter-label for="description">Description</x-filter-label>
                <x-input-field type="text" id="description" name="description" value="{{ $product->description }}" required />
            </div>
            <div class="flex flex-col gap-1">
                <x-filter-label for="image">Product Image</x-filter-label>
                @if($product->image_url)
                    <img src="{{ Storage::url($product->image_url) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded-lg mb-2" />
                @endif
                <input type="file" id="image" name="image" accept="image/*"
                    class="text-sm text-font-primary file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-primary file:text-white hover:file:opacity-90 cursor-pointer" />
                @error('image')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <x-primary-button type="submit">Update Product</x-primary-button>
        </form>
    </div>
@endsection
