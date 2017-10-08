@extends('_layouts.login')

@section('content')
@if(session()->has('msg_error'))
    <div class="alert alert-danger" role="alert">{{ session('msg_error') }}</div>
@endif
@if(session()->has('msg_success'))
    <div class="alert alert-danger" role="alert">{{ session('msg_success') }}</div>
@endif
<form action="{{ route('login') }}" method="post">
    {!! csrf_field() !!}
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input" name="remember">
      Remember
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
@stop