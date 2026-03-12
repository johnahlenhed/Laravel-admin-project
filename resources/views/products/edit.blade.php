@extends('layouts.app')

@section('content')

    <h1>Edit Product</h1>
    <x-filter-form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" required>
        </div>

        <div>
            <label for="category_id">Category:</label>
            <select id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="{{ $product->price }}" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" value="{{ $product->description }}" required>
        </div>
        
        <x-primary-button type="submit">Update Product</x-primary-button>
    </x-filter-form>

@endsection