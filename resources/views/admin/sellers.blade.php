@extends('layouts.admin')
@section('title', 'Seller Management')
@section('content')
    <div class="container">
        <h2>All sellers</h2>
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
                    @if ($sellers->isNotEmpty())
                        @foreach ($sellers as $seller)
                            <tr>
                                <td>{{ $seller->id }}</td>
                                <td>{{ $seller->name }}</td>
                                <td>{{ $seller->email }}</td>
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
