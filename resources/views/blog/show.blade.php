@extends('_layouts.master')

@section('content')
    <h3>{{ $blog->title }}</h3>
    <p>{{ $blog->content }}</p>

    <div class="card">
      <ul class="list-group list-group-flush">
        @foreach($blog->comments as $comment)
        <li class="list-group-item">{{ $comment->body }} </li>
        @endforeach
      </ul>
    </div>
    <form method="post" action="{{ route('comment.create', [ 'blog_id' => $blog->id ]) }}">
          {!! csrf_field() !!}
        <div class="form-group">
          <input type="text" class="form-control" name="body" id="body">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
      </form>
@stop