@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-font-primary">Products</h1>
        <a href="{{ route('products.create') }}" class="bg-primary text-white font-bold py-2 px-4 rounded text-center cursor-pointer">Add Product</a>
    </div>

    <x-filter-form action="{{ route('products.index') }}" method="GET">
        <div class="flex flex-col gap-1">
            <x-filter-label for="category">Category</x-filter-label>
            <x-select name="category" id="category">
                <option value="">All categories</option>
                @foreach($categories as $category)
                    <option {{ request('category') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </x-select>
        </div>

        <div class="flex flex-col gap-1">
            <x-filter-label for="minPrice">Min price</x-filter-label>
            <x-input-field name="minPrice" value="{{ request('minPrice') }}" type="number" id="minPrice" />
        </div>

        <div class="flex flex-col gap-1">
            <x-filter-label for="maxPrice">Max price</x-filter-label>
            <x-input-field name="maxPrice" value="{{ request('maxPrice') }}" type="number" id="maxPrice" />
        </div>

        <div class="flex flex-col gap-1">
            <x-filter-label for="sort">Sort by price</x-filter-label>
            <x-select name="sort" id="sort">
                <option value="asc"  {{ request('sort') == 'asc'  ? 'selected' : '' }}>Low to High</option>
                <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>High to Low</option>
            </x-select>
        </div>

        <div class="flex flex-col justify-end gap-2">
            <x-primary-button type="submit">Filter</x-primary-button>
            <x-edit-link href="{{ route('products.index') }}">Clear</x-edit-link>
        </div>
    </x-filter-form>

    <div class="flex flex-col gap-2 mt-6">
        @forelse($products as $product)
        <x-product-wrapper>
            <div class="min-w-40">
                <p class="text-primary text-xl font-bold">{{ $product->name }}</p>
                <p class="text-font-secondary text-sm mt-1">{{ $product->price }} SEK</p>
            </div>

            <p class="text-font-secondary text-sm max-w-xs">{{ $product->description }}</p>

            <img src="{{ asset($product->image_url) }}"
                alt="{{ $product->name }}"
                class="w-20 h-20 object-cover rounded-lg"
                onerror="this.src='https://placehold.co/300x300?text={{ $product->name }}';">

            <div class="flex flex-col justify-center items-center gap-2">
                <x-edit-link href="{{ route('products.edit', $product->id) }}">Edit</x-edit-link>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-danger-button type="submit" onclick="return confirm('Are you sure you want to delete this product?')">Delete</x-danger-button>
                </form>
            </div>
        </x-product-wrapper>
        @empty
        <p class="text-font-secondary mt-4">No products found. <a class="text-primary underline" href="{{ route('products.index') }}">Clear filters</a></p>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
@endsection
