@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    <form action="{{ route('products.index')}}" method="GET">
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
        <button type="submit">Filter</button>
        <br>
        <a href="{{ route('products.index')}}">Remove all filters</a>
    </form>
    <hr>
    @forelse($products as $product)
    <div style="display: flex; align-items: center; gap: 10px;">
        <p>{{ $product->name }}</p>
        <p>{{ $product->price}} SEK</p>
        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
        </form>
    </div>
    @empty
    <div>No results. <a href="{{route('products.index')}}">Go home</a></div>
    @endforelse

    <div>
        {{ $products->links() }}
    </div>
    
    <div class="logout">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
@endsection