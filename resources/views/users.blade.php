@extends('_layouts.master')

@section('content')
    <a class="btn btn-primary" href="{{ route('user.create') }}">Create User</a>
    <table class="table">
        <thead>
            <tr>
                <th>User name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Posts</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <ul>
                        @foreach($user->roles as $role)
                        <li>{{ $role->name }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach($user->posts as $post)
                        <li>{{ $post->title }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <a href="{{ route('user.edit', [ 'id' => $user->id ]) }}">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop