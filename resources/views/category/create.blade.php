@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Create Category</h1>
        
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <label for="name">Category Name:</label>
            <input type="text" id="name" name="name" required>
            <button type="submit">Create Category</button>
        </form>
        
    </div>
@endsection
