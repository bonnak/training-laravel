@extends('_layouts.master')

@section('content')
    <form method="post" action="{{ route('user.edit', [ 'id' => $user->id ]) }}">
        {!! csrf_field() !!}
        {!! method_field('put') !!}
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
      </div>
      <div class="form-group">
        <label>Role</label>
        @foreach($roles as $role)
        <div>
          <input type="checkbox" name="roles[]"
              value="{{ $role->id }}"
              {{ $user->roles->contains($role->id) ? 'checked' : '' }}>  <!-- condition ? true : false -->
              {{ $role->name }}
        </div>
        @endforeach
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
@stop