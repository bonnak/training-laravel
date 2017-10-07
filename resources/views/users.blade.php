@extends('_layouts.master')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>User name</th>
                <th>Roles</th>
                <th>Blogs</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>
                    <ul>
                        @foreach($user->roles as $role)
                        <li>{{ $role->name }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach($user->blogs as $blog)
                        <li>{{ $blog->title }}</li>
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