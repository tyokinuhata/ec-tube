@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="h3">User information</div>
        <table class="table table-striped">
            <tr>
                <th>Name</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>E-mail</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Zip code</th>
                <td>{{ $user->zip }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $user->address }}</td>
            </tr>
            <tr>
                <th>Registered</th>
                <td>{{ $user->created_at }}</td>
            </tr>
        </table>
        <a href="{{ url('user/edit') }}" class="btn btn-danger">Edit</a>
    </div>
@endsection