@extends('_layouts.master')

@section('content')
    <form method="post" action="{{ route('blog.edit', [ 'id' => $blog->id ]) }}">
        {!! csrf_field() !!}
        {!! method_field('put') !!}
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ $blog->title }}">
      </div>
      <div class="form-group">
        <label for="content">content</label>
        <textarea class="form-control" name="content">{{ $blog->content }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
@stop