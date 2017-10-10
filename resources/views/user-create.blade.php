@extends('_layouts.master')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('user.create') }}">
        {!! csrf_field() !!}
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password">
      </div>
      <div class="form-group">
        <label for="password_again">Confirm Password</label>
        <input type="password" class="form-control" name="password_again" id="password_again">
      </div>
      <div class="form-group">
        <label>Role</label>
        @foreach($roles as $role)
        <div>
          <input type="checkbox" name="roles[]" value="{{ $role->id }}"> {{ $role->name }}
        </div>
        @endforeach
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
    </form>
@stop