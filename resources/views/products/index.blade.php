@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    <x-form-input action="{{ route('products.index')}}" method="GET">
        <div class="form-group">
                <label for="category">Category:</label>
                <select name="category" id="category" placeholder="Category">
                    <option value="">All categories</option>
                @foreach($categories as $category)
                    <option {{ request('category') == $category->id ? 'selected' : '' }} value="{{ $category->id }}"> {{ $category->name }}</option>
                @endforeach
                </select>
        </div>

        <div class="form-group">
            <div>
                <label for="minPrice">Minimal price:</label>
                <input 
                name="minPrice"
                value="{{ request('minPrice')}}" 
                type="number" 
                id="minPrice">
            </div>
            <div>
               <label for="maxPrice">Maximum price:</label>
               <input 
                name="maxPrice"
                value="{{ request('maxPrice')}}" 
                type="number" 
                id="maxPrice">
            </div>
            <div>
                <label for="sort">Sort by price: </label>
                <select name="sort" id="sort">
                    <option value="asc"  {{ request('sort') == 'asc'  ? 'selected' : '' }}>Low to High</option>
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>High to Low</option>
                </select>
            </div>
        </div>
        <x-primary-button type="submit">Filter</x-primary-button>
        <a href="{{ route('products.index')}}">Remove all filters</a>
    </x-form-input>
    <hr>
    @forelse($products as $product)
    <x-product-wrapper>
        <p>{{ $product->name }}</p>
        <p>{{ $product->price}} SEK</p>
        <img src="{{ asset($product->image_url) }}"
        alt="{{ $product->name }}" 
        class="w-32 h-32 object-cover"
        onerror="this.src='https://placehold.co/300x300?text={{ $product->name }}';">
        <p>{{ $product->description }}</p>
        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <x-danger-button type="submit" onclick="return confirm('Are you sure you want to delete this product?')">Delete</x-danger-button>
        </form>
    </x-product-wrapper>
    @empty
    <div>No results. <a href="{{route('products.index')}}">Go home</a></div>
    @endforelse

    <div>
        {{ $products->links() }}
    </div>
    
@endsection