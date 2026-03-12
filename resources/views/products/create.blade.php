@extends('layouts.app')

@section('content')
    <h1>Add New Product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
       <div>
            <label for="category_id">Category:</label>
            <select id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" required>
        </div>
        <button type="submit">Add Product</button>
    </form>
@endsection