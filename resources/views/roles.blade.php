@extends('_layouts.master')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Role</th>
                <th>Usr name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>
                    <ul>
                        @foreach($role->users as $user)
                        <li>{{ $user->name }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop