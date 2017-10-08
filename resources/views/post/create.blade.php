@extends('_layouts.master')

@section('content')
    <form method="post" action="{{ route('post.create') }}">
        {!! csrf_field() !!}
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title">
      </div>
      <div class="form-group">
        <label for="content">content</label>
        <textarea class="form-control" name="content"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
    </form>
@stop