@extends('layouts.app')

@section('content')
    <h1>Categories</h1>
    @forelse($categories as $category)
    <div style="display: flex; align-items: center; gap: 10px;">
        <p>{{ $category->name }}</p>
        <a href="{{ route('categories.edit', $category) }}">Edit</a>
        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
        </form>
    </div>
    @empty
    <div>No results. <a href="{{route('categories.index')}}">Go home</a></div>
    @endforelse

    
    <div class="logout">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
@endsection