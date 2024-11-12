@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Edit Category</h1>
        
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <label for="name">Category Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required>
            <button type="submit">Update Category</button>
        </form>
        
    </div>
@endsection
