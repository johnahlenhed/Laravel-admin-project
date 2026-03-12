@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    <x-filter-form action="{{ route('products.index')}}" method="GET">
        <div class="flex flex-col justify-center align-center gap-4">
                <x-filter-label for="category">Category:</x-filter-label>
                <x-select name="category" id="category" placeholder="Category">
                    <option value="">All categories</option>
                @foreach($categories as $category)
                    <option {{ request('category') == $category->id ? 'selected' : '' }} value="{{ $category->id }}"> {{ $category->name }}</option>
                @endforeach
                </x-select>
        </div>

        <div class="flex flex-row justify-center align-center gap-4">
            <div>
                <x-filter-label for="minPrice">Minimal price:</x-filter-label>
                <x-input-field 
                    name="minPrice"
                    value="{{ request('minPrice')}}" 
                    type="number" 
                    id="minPrice">
                </x-input-field>
            </div>
            <div>
               <x-filter-label for="maxPrice">Maximum price:</x-filter-label>
               <x-input-field 
                name="maxPrice"
                value="{{ request('maxPrice')}}" 
                type="number" 
                id="maxPrice">
               </x-input-field>
            </div>
            <div>
                <x-filter-label for="sort">Sort by price: </x-filter-label>
                <x-select name="sort" id="sort">
                    <option value="asc"  {{ request('sort') == 'asc'  ? 'selected' : '' }}>Low to High</option>
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>High to Low</option>
                </x-select>
            </div>
        </div>
        <x-primary-button type="submit">Filter</x-primary-button>
        <x-edit-link class="text-xs" href="{{ route('products.index')}}">Remove all filters</x-edit-link>
    </x-filter-form>

    @forelse($products as $product)
    <x-product-wrapper>
        <div>
            <p class="text-primary text-4xl m-4 min-w-xs">{{ $product->name }}</p>
            <p class="text-font-secondary text-1x1 m-4">{{ $product->price}} SEK</p>
        </div>
        <p class="text-font-secondary max-w-xs m-4">{{ $product->description }}</p>

        <div>
            <img src="{{ asset($product->image_url) }}"
            alt="{{ $product->name }}" 
            class="w-32 h-32 object-cover"
            onerror="this.src='https://placehold.co/300x300?text={{ $product->name }}';">
        </div>

        <div class="flex flex-col justify-center align-center gap-4">
            <x-edit-link href="{{ route('products.edit', $product->id) }}">Edit</x-edit-link>

            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <x-danger-button type="submit" onclick="return confirm('Are you sure you want to delete this product?')">Delete</x-danger-button>
            </form>
        </div>
        

    </x-product-wrapper>
    @empty
    <div>No results. <a href="{{route('products.index')}}">Go home</a></div>
    @endforelse

    <div>
        {{ $products->links() }}
    </div>
    
@endsection