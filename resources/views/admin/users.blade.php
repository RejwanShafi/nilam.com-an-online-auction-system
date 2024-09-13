@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>All Users</h2>
        <div class="box">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($normalUsers->isNotEmpty())
                        @foreach ($normalUsers as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><button class="btn btn-primary">View</button></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">No users found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
