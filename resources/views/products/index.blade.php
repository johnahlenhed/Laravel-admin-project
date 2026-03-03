@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    @foreach($products as $product)
        <div style="display: flex; align-items: center; gap: 10px;">
            <p>{{ $product->name }}</p>
            <a href="{{ route('products.edit', $product->id) }}">Edit</a>

            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
            </form>
        </div>
    @endforeach
    <div class="logout">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
@endsection