@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 align="center">Users</h1>
                
                <!-- Link to create a new user -->
                <a href="{{ route('user.create') }}" class="btn btn-primary mt-4 mb-4">Create User</a>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Role</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Update</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                          <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>
                            <td>{{ $user->role }}</td>

                            <td>
                              <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            </td>
                            <td>
                              <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>

                            </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection