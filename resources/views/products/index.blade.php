@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    @foreach($products as $product)
        <div style="display: flex; align-items: center; gap: 10px;">
            <p>{{ $product->name }}</p>
            <a href="{{ route('products.edit', $product->id) }}">Edit</a>
        </div>
    @endforeach
@endsection