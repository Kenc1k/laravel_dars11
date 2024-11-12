@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 align="center">Categories</h1>
                <!-- Link to create a new category -->
                <a href="{{ route('category.create') }}" class="btn btn-primary mt-4 mb-4">Create</a>
                
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Update</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $category)
                          <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>

                            <!-- Delete button with route and category ID -->
                            <td>
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>

                            <!-- Update button with link to edit category -->
                            <td><a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">Update</a></td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
