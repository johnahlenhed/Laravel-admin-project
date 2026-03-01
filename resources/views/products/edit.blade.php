@extends('layouts.app')

@section('content')

    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <button type="submit">Update Product</button>
    </form>

@endsection