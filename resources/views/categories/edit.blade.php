@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold text-font-primary mb-6">Edit Category</h1>

    <div class="bg-card rounded-xl shadow-sm p-6 max-w-lg">
        <form action="{{ route('categories.update', $category) }}" method="POST" class="flex flex-col gap-4">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-1">
                <x-filter-label for="name">Category Name</x-filter-label>
                <x-input-field type="text" id="name" name="name" value="{{ $category->name }}" required />
            </div>
            <x-primary-button type="submit">Update Category</x-primary-button>
        </form>
    </div>
@endsection
