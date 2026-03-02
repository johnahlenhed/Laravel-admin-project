@extends('layouts.app')

@section('content')

    <h1>Add New Product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <button type="submit">Add Product</button>
    </form>

@endsection